<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medicament;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Hash;
use Illuminate\Support\Facades\Storage;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;

class MedicamentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $userauth = Auth::user();

        if (auth()->user()->hasRole(7)){
            $medicaments = Medicament::all();
            return view('medicaments.list',compact('medicaments'));
        }
        else{
            $medicaments = Medicament::where('quantity','>',0)->get();
            return view('medicaments.index',compact('medicaments'));
        }
    }

    public function create()
    {
        return view('medicaments.create');
    }

    public function edit($id)
    {
        $medicament = Medicament::where('id',$id)->first();
        $userauth = Auth::user();
        return view('medicaments.edit',compact('medicament','userauth'));
    }

    public function details($id)
    {
        $medicament = Medicament::where('id',$id)->first();
        $userauth = Auth::user();
        return view('medicaments.details',compact('medicament','userauth'));
    }


    public function MedicamentRegistration(Request $request)
    {

        $data = $request->all();
        $medicament = $this->store($data);
        $file = $request->file('file');

        if($file){

                $filename = $file->getClientOriginalName();

                if(!File::exists(public_path() . "/medicaments"))
                Storage::makeDirectory(public_path() . "/medicaments");

                $path = 'medicaments/'.$medicament->id.'/';
                $file_path = '/'.$path;

                if(!File::exists(public_path() . "/".$path))
                Storage::makeDirectory(public_path() . "/".$path);

                if(!is_null($medicament->image) && $medicament->image != "" && file_exists(public_path().$medicament->image))
                unlink(public_path().$medicament->image);

                if($file->move(public_path().$file_path,$filename)){
                  $medicament = Medicament::findOrFail($medicament->id);
                  $medicament->image = $file_path.$filename;
                  $medicament->save();
                }
        }

        return response()->json($medicament);
    }

    public function MedicamentModification(Request $request)
    {
        $data = $request->all();
        $medicament = $this->update($data);
        $file = $request->file('file');

        if($file){

                $filename = $file->getClientOriginalName();

                if(!File::exists(public_path() . "/medicaments"))
                Storage::makeDirectory(public_path() . "/medicaments");

                $path = 'medicaments/'.$medicament->id.'/';
                $file_path = '/'.$path;

                if(!File::exists(public_path() . "/".$path))
                Storage::makeDirectory(public_path() . "/".$path);

                if(!is_null($medicament->image) && $medicament->image != "" && file_exists(public_path().$medicament->image))
                unlink(public_path().$medicament->image);

                if($file->move(public_path().$file_path,$filename)){
                  $medicament = Medicament::findOrFail($medicament->id);
                  $medicament->image = $file_path.$filename;
                  $medicament->save();
                }
        }

        return response()->json($medicament);
    }

    public function store(array $infos)
    {
      parse_str($infos['data_medicaments'],$data);

      $userauth = Auth::user();

      $medicament_data = [
        'user_id' => $userauth->id,
        'title' => $data['title'],
        'description' => $data['description'],
        'mode_duree_use' => $data['mode_duree_use'],
        'quantity' => $data['quantity'],
      ];

      $medicament = Medicament::create($medicament_data);

      return $medicament;
    }

    public function update(array $infos)
    {
      parse_str($infos['data_medicaments'],$data);
      $medicament_id  = $data['medicament_id'];

      $medicament = Medicament::findOrFail($medicament_id);

      $medicament_data = [
        'title' => $data['title'],
        'description' => $data['description'],
        'mode_duree_use' => $data['mode_duree_use'],
        'quantity' => $data['quantity'],
      ];

      $medicament->update($medicament_data);

      return $medicament;
    }

    public function orders()
    {

        $userauth = Auth::user();

        $orders = Order::with('medicament')->get();
        return view('medicaments.orders',compact('orders','userauth'));
    }

    public function CommandeRegistration(Request $request)
    {

      $infos = $request->all();
      parse_str($infos['data_order'],$data);

      $userauth = Auth::user();

      $order_number = Order::where('id','>',0)->count() + 1;

      $order_data = [
        'user_id' => $userauth->id,
        'medicament_id' => $data['medicament_id'],
        'status' => 'En attente',
        'number' => $order_number,
        'quantity' => $data['quantity'],
      ];

      $order = Order::create($order_data);

        return response()->json($order);
    }

    public function AcceptCommande($id)
    {

        $order = Order::findOrFail($id);

        $order->status = "Confirmé";

        $order->save();

        $medicament_id = $order->medicament_id;

        $medicament = Medicament::findOrFail($medicament_id);

        $new_qt = (int)$medicament->quantity - (int)$order->quantity;

        $medicament_data = [
            'quantity' => $new_qt,
        ];

        $medicament->update($medicament_data);


        return response()->json('success');
    }

    public function RejectCommande($id)
    {

        $order = Order::findOrFail($id);

        $order->status = "Rejetée";

        $order->save();

        return response()->json('success');
    }


    public function destroyCommande($id)
    {

        $order = Order::findOrFail($id);

        $order->delete();
        return response()->json('success');
    }

    public function Destroy($id)
    {

        $medicament = Medicament::findOrFail($id);

        $medicament->delete();
        return response()->json('success');
    }
}
