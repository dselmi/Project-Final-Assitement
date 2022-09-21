<?php

namespace App\Http\Controllers;

use App\Models\Generation;
use App\Models\Type;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class generationController extends Controller
{

    //--------------------------------------------------Generation-----------------------------------------//

    public function generation_home()
    {
        $generation = Generation::OrderBy('date')->get();
        return view('generation.home', compact('generation'));
    }
    public function get_edit_generation($id)
    {
        $generation = Generation::find($id);
        $types = Type::all();
        $modifier = array();
        foreach ($types as $type) {
            $modifier[$type->id] = $type->name;
        }
        return view('generation.edit', compact('generation, types, modifier'));
    }
    public function edit_generation(Request $request, Generation $generation)
    {
        if ($generation->update($request->only('type_id', 'date', 'nfacture', 'prix_uni', 'quantite', 'fourni'))) {
            return redirect(route('generation.home'))->with('success', 'Vous avez bien modifier votre stock');
        }
    }

    //delete

    public function destroy_generation($id)
    {

        $generation = Generation::find($id);
        $generation->delete();

        //Session::flash('failed','Vous avez bien supprimer votre generation');
        return redirect()->route('generation.home');

    }

    //---------------------------------------------------------------------------------------------------------------------------------------------------Entres-----------------------------------------------------------------------------
    //

    public function show_entres()
    {
        $entres = Generation::where('mode', 1)->OrderBy('date')->get();
        return view('In.show', compact('entres'));
    }
    public function get_add_entres()
    {
        $types = type::all();
        return view('In.add', compact('types'));
    }
    public function post_add_entres(Request $request)
    {
        $request['mode'] = 1;
        if (Generation::create($request->only('type_id', 'date', 'nfacture', 'prix_uni', 'quantite', 'fourni', 'mode'))) {
            return redirect(route('entres.index'))->with('success', 'Vous Avez Bien Ajouer votre nouveaux Commande');
        }
    }
    //Edit entres

    public function get_edit_entres($id)
    {
        $entres = Generation::find($id);
        $types = type::all();
        $typo = [];
        foreach ($types as $type) {
            $typo[$type->id] = $type->name;
        }
        return view('In.edit', compact('entres', 'types', 'typo'));
    }

    public function edit_entres(Request $request, Generation $generation)
    {
        $request['mode'] = 1;
        if ($generation->update($request->only('type_id', 'date', 'nfacture', 'prix_uni', 'quantite', 'fourni', 'mode'))) {
            return redirect(route('entres.index'))->with('success', 'Vous avez bien modifier votre entres');
        }
    }

    //delete

    public function destroy_entres(Generation $generation)
    {
        $generation->delete();
        session()->flash('success', 'Vous avez bien supprimer votre entres');
        return response()->noContent();
    }
    //---------------------------------------------------------------------------------------------------------------------------------------------END ENTRES-------------------------------------------------------------------------------

//-----------------------------------------------------------------BEGIN SORTIE--------------------------------------------------------------------------------------
    //
    public function show_sorties()
    {
        $sorties = Generation::where('mode', '=', '2')->OrderBy('date')->get();
        return view('Out.show', compact('sorties'));
    }
    public function get_add_sorties()
    {
        $types = type::all();
        return view('Out.add', compact('types'));
    }
    public function post_add_sorties(Request $request)
    {
        $request['mode'] = 2;
        if (Generation::create($request->only('type_id', 'date', 'nfacture', 'prix_uni', 'quantite', 'fourni', 'mode'))) {
            return redirect(route('entres.index'))->with('success', 'Vous Avez Bien Ajouer votre nouveaux Commande');
        }
    }
    //Edit sorties

    public function get_edit_sorties($id)
    {
        $sorties = Generation::find($id);
        $types = type::all();
        $typo = [];
        foreach ($types as $type) {
            $typo[$type->id] = $type->name;
        }
        return view('Out.edit', compact('sorties', 'types', 'typo'));
    }

    public function get_sorties(Request $request, Generation $generation)
    {
        $request['mode'] = 2;
        if ($generation->update($request->only('type_id', 'date', 'nfacture', 'prix_uni', 'quantite', 'fourni', 'mode'))) {
            return redirect(route('entres.index'))->with('success', 'Vous avez bien modifier votre entres');
        }
    }

    //delete

    public function destroy_sorties(Generation $generation)
    {
        $generation->delete();
        session()->flash('success', 'Vous avez bien supprimer votre entres');
        return response()->noContent();
    }

//--------------------------------------------------------------------------------------------------------------------------------------------END SORTIE-------------------------------------------------------------------------------------
    //types

    public function index_types()
    {
        $types = type::all();
        return view('type.home', compact('types'));
    }
    public function post_types(Request $request)
    {
        if (Type::create(['name' => $request->name])) {
            return redirect(route('type.index'))->with('success', 'Vous Avez bien Ajouter votre Type');
        }
    }
    public function single_type($id)
    {
        $types = Generation::where('type_id', $id)->get();
        $name = type::find($id);
        return view('type.page', compact('types', 'name'));
    }
    public function get_edit_page_types($id)
    {
        $types = Generation::find($id);
        return view('type.edit', compact('types'));
    }

    public function destroy_type(Type $type)
    {
        $type->delete();
        session()->flash('success', 'Vous avez bien supprimé(e) votre type');
        return response()->noContent();

    }
}
