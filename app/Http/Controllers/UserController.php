<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $flasherInterface;

    protected $full_path = "app/public/";
    protected $path = "public/";

    public function __construct(ToastrFactory $flasherInterface)
    {
        $this->middleware('auth');
        $this->flasherInterface = $flasherInterface;

    }

    public function profile(User $user)
    {
        return view('users.profile', compact('user'));

    }

    public function update_profile(UpdateUserRequest $request, User $user)
    {
        $request['password'] = Hash::make($request->password);
        if ($user->update($request->only('first_name', 'last_name', 'email', 'password', 'phone'))) {
            $this->flasherInterface->addSuccess("Mis à jour avec succès!");
            return back();
        }
    }

    public function StoreProfile(Request $request)
    {
        $input = $request->all();

        $userauth = Auth::user();

        parse_str($input['data_profile'], $infos);

        $user = User::where('id', $userauth->id)->first();
        $user->first_name = $infos['first_name'];
        $user->last_name = $infos['last_name'];
        $user->email = $infos['email'];
        if (isset($infos['password']) && $infos['password'] != "") {
            $user->password = Hash::make($infos['password']);
        }

        $user->phone = $infos['phone'];
    }

    public function crop(Request $request, User $user)
    {
        $image = $request->file('file');
        $fileName = 'image_' . time() . mt_rand();
        $ext = "jpg";
        $allowed_fileName = $this->createUniqueFileName($fileName, $ext);
        $upload = $this->original($image, $allowed_fileName);
        if (!$upload) {
            return response()->json(['status' => 0, 'msg' => 'Something went wrong, try again later']);
        }

        if ($user->update(['image' => $allowed_fileName])) {
            return response()->json(['status' => 1, 'msg' => 'Image has been cropped successfully.', 'name' => $allowed_fileName]);
        }
    }

    private function createUniqueFileName($fileName, $ext)
    {
        $path = storage_path($this->full_path . $fileName . '.' . $ext);

        if (File::exists($path)) {
            $token = substr(sha1(mt_rand()), 0, 5);
            return $fileName . '-' . $token . '.' . $ext;
        }
        return $fileName . '.' . $ext;
    }

    private function original($photo, $fileName)
    {
        $image = $photo->move(storage_path($this->full_path), $fileName);
        return $image;
    }

    public function render()
    {
        $users = User::get()->except(auth()->id());
        return view('pages.datatables', compact('users'));
    }

    public function create_user()
    {
        $roles = Role::get();
        return view('pages.create', compact('roles'));
    }

    public function store_User(StoreUserRequest $request)
    {
        if ($user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ])) {
            $user->assignRole($request->role);

            return redirect(route('users.index'))->with("$user->email ajouté(e) avec succès!");
        } else {
            $this->flasherInterface->addError("$user->email User already exists!");

        }

    }

    public function edit_user(User $user)
    {
        $roles = Role::where('name', '<>', 'admin')->get();
        return view('pages.edit', compact('user', 'roles'));
    }

    public function update_user(Request $request, User $user)
    {
        if ($user->update($request->only('first_name', 'last_name', 'email', 'phone'))) {
            return redirect(route('users.index'))->with('Success',"$user->email modifié(e) avec succès!");

        }
    }

    public function delete(User $user)
    {
            $user->delete();
            $this->flasherInterface->addSuccess("user supprimé(e) avec succès!");
            return response()->noContent();
    }

}
