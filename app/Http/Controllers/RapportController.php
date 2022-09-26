<?php

namespace App\Http\Controllers;

use App\Models\Fiche;
use App\Models\Rapport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RapportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list_rapports_ecoutantes()
    {
        $rapports= DB::table('rapports')
        ->leftjoin('types', 'types.id', 'rapports.rapport_id')
        ->select('rapports.*', 'types.name as type_rapport')
        ->where('rapport_id', 1)
        ->get();
         $fiches_accueil = Fiche::where('type', 'acceuil')->get();
         return view('Rapport_ecoutante.index', compact('rapports', 'fiches_accueil'));
    }

    public function list_rapports_psychologues()
    {
        $rapports= DB::table('rapports')
       ->leftjoin('typa_rapports', 'typa_rapports.id', 'rapports.rapport_id')
       ->select('rapports.*', 'typa_rapports.name as type_rapport')
       ->where('rapport_id', 3)
       ->get();
        $fiches_accueil = Fiche::where('type', 'acceuil')->get();
        return view('Rapport_ecoutante.index', compact('rapports', 'fiches_accueil'));
    }

    public function list_rapports_assistantes()
    {
        $rapports= DB::table('rapports')
       ->leftjoin('typa_rapports', 'typa_rapports.id', 'rapports.rapport_id')
       ->select('rapports.*', 'typa_rapports.name as type_rapport')
       ->where('rapport_id', 2)
       ->get();
        $fiches_accueil = Fiche::where('type', 'acceuil')->get();
        return view('Rapport_ecoutante.index', compact('rapports', 'fiches_accueil'));
    }
    public function list_rapports_avocat()
    {
        $rapports= DB::table('rapports')
        ->leftjoin('typa_rapports', 'typa_rapports.id', 'rapports.rapport_id')
        ->select('rapports.*', 'typa_rapports.name as type_rapport')
        ->where('rapport_id', 4)
        ->get();
         $fiches_accueil = Fiche::where('type', 'acceuil')->get();
         return view('Rapport_ecoutante.index', compact('rapports', 'fiches_accueil'));
    }

    public function create_rapport_ecoutante(Fiche $fiche)
    {
        if ($fiche->rapport()->first()) {
            return redirect(route('ecoute.index'))->with('error', 'Cette fiche a deja un rapport associée');
        }
        return view('Rapport_ecoutante.create', compact('fiche'));
    }

    public function create_rapport_psychologue(Fiche $fiche)
    {
        if ($fiche->rapport()->first()) {
            return redirect(route('ecoute.index'))->with('error', 'Cette fiche a deja un rapport associée');
        }
        return view('Rapport_psychologue.create', compact('fiche'));
    }

    public function create_rapport_assistante(Fiche $fiche)
    {
        if ($fiche->rapport()->first()) {
            return redirect(route('ecoute.index'))->with('error', 'Cette fiche a deja un rapport associée');
        }
        return view('Rapport_assistante.create', compact('fiche'));
    }
    public function create_rapport_avocat(Fiche $fiche)
    {
        if ($fiche->rapport()->first()) {
            return redirect(route('ecoute.index'))->with('error', 'Cette fiche a deja un rapport associée');
        }
        return view('Rapport_avocat.create', compact('fiche'));
    }

    public function edit_rapport_ecoutante($id)
    {
        $rapport = Rapport::where('id', $id)->first();
        return view('Rapport_ecoutante.edit', compact('rapport'));
    }

    public function edit_rapport_psychologue($id)
    {
        $rapport = Rapport::where('id', $id)->first();
        return view('Rapport_psychologue.edit', compact('fiche'));
    }

    public function edit_rapport_assistante($id)
    {
        $rapport = Rapport::where('id', $id)->first();
        return view('Rapport_assistante.edit', compact('rapport'));
    }
    public function edit_rapport_avocat($id)
    {
        $rapport = Rapport::where('id', $id)->first();
        return view('Rapport_avocat.edit', compact('fiche'));
    }

    public function StoreRapportEcoutante(Request $request, Fiche $fiche)
    {

        $request['user_id'] = auth()->id();
        $request['rapport_type'] = 'ecoutante';
        $request['fiche_id'] = $fiche->id;

        if (Rapport::create($request->only('fiche_id', 'rapport_type', 'user_id', 'type', 'date', 'place', 'rapport'))) {
            return redirect(route('rapport_ecoutante.index'))->with('success', 'Rapport ecoutante ajouté avec succès.');
        }

    }

    public function StoreRapportPsychologue(Request $request, Fiche $fiche)
    {
        $request['user_id'] = auth()->id();
        $request['rapport_type'] = 'psychologue';
        $request['fiche_id'] = $fiche->id;
        if (Rapport::create($request->only('fiche_id', 'rapport_type', 'user_id', 'type', 'date', 'place', 'rapport'))) {
            return redirect(route('rapport_psychologue.index'))->with('success', 'Rapport psychologue ajouté avec succès.');
        }

    }

    public function StoreRapportAssistante(Request $request, Fiche $fiche)
    {
        $request['user_id'] = auth()->id();
        $request['rapport_type'] = 'assistante';
        $request['fiche_id'] = $fiche->id;
        if (Rapport::create($request->only('fiche_id', 'rapport_type', 'user_id', 'type', 'date', 'place', 'rapport'))) {
            return redirect(route('rapport_assistante.index'))->with('success', 'Rapport assistante ajouté avec succès.');
        }

    }

    public function StoreRapportAvocat(Request $request, Fiche $fiche)
    {
        $request['user_id'] = auth()->id();
        $request['rapport_type'] = 'avocat';
        $request['fiche_id'] = $fiche->id;
        if (Rapport::create($request->only('fiche_id', 'rapport_type', 'user_id', 'type', 'date', 'place', 'rapport'))) {
            return redirect(route('rapport_avocat.index'))->with('success', 'Rapport avocat ajouté avec succès.');
        }

    }

    public function UpdateRapportEcoutante(Request $request, Rapport $rapport)
    {
        if ($rapport->update($request->only('date', 'place', 'rapport'))) {
            return redirect(route('rapport_ecoutante.index'))->with('success', 'Rapport écoutante mis à jour avec succès.');
        }
    }

    public function UpdateRapportPsychologue(Request $request, Rapport $rapport)
    {
        if ($rapport->update($request->only('date', 'place', 'rapport'))) {
            return redirect(route('rapport_psychologue.index'))->with('success', 'Rapport psychologue mis à jour avec succès.');
        }
    }

    public function UpdateRapportAssistante(Request $request, Rapport $rapport)
    {
        if ($rapport->update($request->only('date', 'place', 'rapport'))) {
            return redirect(route('rapport_assistante.index'))->with('success', 'Rapport assistante sociale mis à jour avec succès.');
        }
    }

    public function UpdateRapportAvocat(Request $request, Rapport $rapport)
    {
        if ($rapport->update($request->only('date', 'place', 'rapport'))) {
            return redirect(route('rapport_avocat.index'))->with('success', 'Rapport avocat mis à jour avec succès.');
        }
    }

    public function delete(Rapport $rapport)
    {
        $rapport->delete();
        return response()->json(['success', 'Rapport supprimé avec succès.']);
    }
}
