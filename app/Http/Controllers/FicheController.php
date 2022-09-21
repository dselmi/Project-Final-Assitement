<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewSheetRequest;
use App\Models\Agresseur;
use App\Models\BesoinVictime;
use App\Models\Fiche;
use App\Models\InformationAdditionel;
use App\Models\Rapport;
use App\Models\RenderVous;
use App\Models\Renseignement;
use App\Models\Victime;
use App\Models\Violence;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FicheController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view_fiche_ecoute()
    {
        $fiches = Fiche::where('type', 'ecoute')->get();
        return view('FicheEcoute.index', compact('fiches'));
    }

    public function view_fiche()
    {
        $fiches = Fiche::where('type', 'acceuil')->get();
        return view('FicheAccueil.index', compact('fiches'));
    }
    public function view_fiche_garde()
    {
        $fiches = Fiche::where('type', 'garde')->get();
        $fiches_accueil = Fiche::where('type', 'acceuil')->get();
        return view('FicheGarde.index', compact('fiches', 'fiches_accueil'));
    }
    public function view_fiche_consultation()
    {
        $fiches = Fiche::where('type', 'consultation')->get();
        $fiches_accueil = Fiche::where('type', 'acceuil')->get();
        return view('FicheConsultation.index', compact('fiches', 'fiches_accueil'));
    }

    public function create_accueil()
    {
        return view('FicheAccueil.create');
    }
    public function create_ecoute(Fiche $fiche)
    {
        if ($fiche->ecoute()->first()) {
            return back()->with('error', 'Cette fiche acceuil a deja une fiche ecoute');
        }
        return view('FicheEcoute.create', compact('fiche'));
    }
    public function create_garde(Fiche $fiche)
    {
        return view('FicheGarde.create', compact('fiche'));
    }
    public function create_consultation(Fiche $fiche)
    {

        return view('FicheConsultation.create', compact('fiche'));
    }

    public function StoreFicheAccueil(StoreNewSheetRequest $request)
    {
        $request['user_id'] = auth()->id();
        $request['type'] = 'acceuil';
        if ($fiche = Fiche::create($request->only('user_id', 'date', 'type', 'lieu', 'femme', 'naissance', 'etat_civil', 'adresse', 'oriente_par', 'motif_visite', 'agresseur', 'type_violence', 'fils_victimes', 'etapes'))) {
            if (RenderVous::create(['fiche_id' => $fiche->id, 'date_rdv' => $request->date_rdv, 'phone_femme' => $request->phone_femme])) {
                return redirect(route('sheet.index'))->with('success', 'Fiche insérée avec succès.');
            }
        }
    }

    public function StoreFicheEcoute(Request $request, Fiche $fiche)
    {
        $request['parent_id'] = $fiche->id;
        $request['user_id'] = auth()->id();
        $request['type'] = 'ecoute';

        if ($FicheEcoute = Fiche::create($request->only('parent_id', 'type', 'user_id'))) {
            $FicheEcoute->update(['lieu' => $request->fiche_ecoute['lieu'], 'date' => $request->fiche_ecoute['date']]);

            $renseignement = $request->input('renseignement');
            $renseignement['fiche_id'] = $FicheEcoute->id;
            Renseignement::create($renseignement);

            $situation_state_victime = $request->input('situation_state_victime');
            $situation_state_victime['fiche_id'] = $FicheEcoute->id;
            Victime::create($situation_state_victime);

            $situation_agresseur = $request->input('situation_agresseur');
            $situation_agresseur['fiche_id'] = $FicheEcoute->id;
            Agresseur::create($situation_agresseur);

            /* $fiche = $request->input('fiche');
            $fiche['fiche_id'] = $FicheEcoute->id;
            $fiche['user_id'] =  auth()->id();
            Rapport::create($fiche); */

            if ($request->has('violence_verbale')) {
                $violence_verbale = $request->input('violence_verbale');
                $violence_verbale['violence_type'] = 'verbale';
                $violence_verbale['fiche_id'] = $FicheEcoute->id;
                Violence::create($violence_verbale);
            }
            if ($request->has('harcelement')) {
                $harcelement = $request->input('harcelement');
                $harcelement['violence_type'] = 'harcelement';
                $harcelement['fiche_id'] = $FicheEcoute->id;
                Violence::create($harcelement);
            }
            if ($request->has('violence_psychologiques')) {
                $violence_psychologiques = $request->input('violence_psychologiques');
                $violence_psychologiques['violence_type'] = 'psychologique';
                $violence_psychologiques['fiche_id'] = $FicheEcoute->id;
                Violence::create($violence_psychologiques);
            }
            if ($request->has('violence_economiques')) {
                $violence_economiques = $request->input('violence_economiques');
                $violence_economiques['violence_type'] = 'economique';
                $violence_economiques['fiche_id'] = $FicheEcoute->id;
                Violence::create($violence_economiques);
            }
            if ($request->has('violence_physiques')) {
                $violence_physiques = $request->input('violence_physiques');
                $violence_physiques['violence_type'] = 'physique';
                $violence_physiques['fiche_id'] = $FicheEcoute->id;
                Violence::create($violence_physiques);
            }
            if ($request->has('violence_sexuelles')) {
                $violence_sexuelles = $request->input('violence_sexuelles');
                $violence_sexuelles['violence_type'] = 'sexuelle';
                $violence_sexuelles['fiche_id'] = $FicheEcoute->id;
                Violence::create($violence_sexuelles);
            }
            if ($request->has('additional_information')) {
                $additional_information = $request->input('additional_information');
                $additional_information['fiche_id'] = $FicheEcoute->id;
                InformationAdditionel::create($additional_information);
            }
            if ($request->has('besoins_victime')) {
                $besoins_victime = $request->input('besoins_victime');
                $besoins_victime['fiche_id'] = $FicheEcoute->id;
                BesoinVictime::create($besoins_victime);
            }

            if (Rapport::create(['fiche_id' => $FicheEcoute->id, 'rapport_type' => $request->decision, 'user_id' => $request->user_id])) {
                return redirect(route('ecoute.index'))->with('success', 'Fiche insérée avec succès.');
            } else {
                return back()->with('error', 'Something went wrong');
            }
        }
    }

    public function StoreFicheGarde(StoreNewSheetRequest $request)
    {
        $request['user_id'] = auth()->id();
        $request['type'] = 'garde';
        if ($fiche = Fiche::create($request->only('user_id', 'type', 'date', 'activities', 'demande'))) {
            return redirect(route('garde.index'))->with('success', 'Fiche insérée avec succès.');
        }

    }
    public function StoreFicheConsultation(StoreNewSheetRequest $request)
    {
        $request['user_id'] = auth()->id();
        $request['type'] = 'consultation';
        if ($fiche = Fiche::create($request->only('user_id', 'type', 'date', 'seance_num', 'rapport'))) {
            return redirect(route('consultation.index'))->with('success', 'Fiche insérée avec succès.');
        }
    }

    public function edit_accueil(Fiche $fiche)
    {
        if (auth()->user()->hasRole(1)) {
            return redirect(route('sheet.index'))->with('error', 'You cannot edit this');
        }
        return view('FicheAccueil.edit', compact('fiche'));
    }

    public function edit_ecoute(Fiche $fiche)
    {
        if (auth()->user()->hasRole(2)) {
            return redirect(route('ecoute.index'))->with('error', 'Vous ne pouvez pas la modifier!');
        }
        return view('FicheEcoute.edit', compact('fiche'));
    }
    public function edit_garde(Fiche $fiche)
    {
        if (auth()->user()->hasRole(1)) {
            return redirect(route('garde.index'))->with('error', 'Vous ne pouvez pas la modifier!');
        }
        return view('FicheGarde.edit', compact('fiche'));
    }
    public function edit_consultation(Fiche $fiche)
    {
        //if (auth()->user()->hasRole(1)) {
        //    return redirect(route('consultation.index'))->with('error', 'You cannot edit this');
        //}
        return view('FicheConsultation.edit', compact('fiche'));
    }

    public function UpdateFicheAccueil(Request $request, Fiche $fiche)
    {
        if ($fiche->update($request->only('date', 'lieu', 'femme', 'naissance', 'etat_civil', 'adresse', 'oriente_par', 'motif_visite', 'agresseur', 'type_violence', 'fils_victimes', 'etapes'))) {
            return redirect(route('sheet.index'))->with('success', 'Fiche mis à jour avec succès.');
        }
    }

    public function UpdateFicheEcoute(Request $request, Fiche $fiche)
    {
        $renseignement = $request->input('renseignement');
        Renseignement::where('fiche_id', $fiche->id)->update($renseignement);

        $situation_state_victime = $request->input('situation_state_victime');
        Victime::where('fiche_id', $fiche->id)->update($situation_state_victime);

        $situation_agresseur = $request->input('situation_agresseur');
        Agresseur::where('fiche_id', $fiche->id)->update($situation_agresseur);

        if ($request->has('violence_verbale')) {
            $violence_verbale = $request->input('violence_verbale');
            Violence::where(['fiche_id' => $fiche->id, 'violence_type' => 'verbale'])->update($violence_verbale);
        }
        if ($request->has('harcelement')) {
            $harcelement = $request->input('harcelement');
            Violence::where(['fiche_id' => $fiche->id, 'violence_type' => 'harcelement'])->update($harcelement);
        }
        if ($request->has('violence_psychologiques')) {
            $violence_psychologiques = $request->input('violence_psychologiques');
            Violence::where(['fiche_id' => $fiche->id, 'violence_type' => 'psychologique'])->update($violence_psychologiques);
        }
        if ($request->has('violence_economiques')) {
            $violence_economiques = $request->input('violence_economiques');
            Violence::where(['fiche_id' => $fiche->id, 'violence_type' => 'economique'])->update($violence_economiques);
        }
        if ($request->has('violence_physiques')) {
            $violence_physiques = $request->input('violence_physiques');
            Violence::where(['fiche_id' => $fiche->id, 'violence_type' => 'physique'])->update($violence_physiques);
        }
        if ($request->has('violence_sexuelles')) {
            $violence_sexuelles = $request->input('violence_sexuelles');
            Violence::where(['fiche_id' => $fiche->id, 'violence_type' => 'sexuelle'])->update($violence_sexuelles);
        }
        if ($request->has('additional_information')) {
            $additional_information = $request->input('additional_information');
            InformationAdditionel::where('fiche_id', $fiche->id)->update($additional_information);
        }
        if ($request->has('besoins_victime')) {
            $besoins_victime = $request->input('besoins_victime');
            BesoinVictime::where('fiche_id', $fiche->id)->update($besoins_victime);
        }

        return redirect(route('ecoute.index'))->with('success', 'Fiche mis à jour avec succès.');

    }
    public function UpdateFicheGarde(Request $request, Fiche $fiche)
    {
        if ($fiche->update($request->only('date', 'activities', 'demande'))) {
            return redirect(route('garde.index'))->with('success', 'Fiche mis à jour avec succès.');
        }
    }
    public function UpdateFicheConsultation(Request $request, Fiche $fiche)
    {
        if ($fiche->update($request->only('date', 'seance_num', 'rapport'))) {
            return redirect(route('consultation.index'))->with('success', 'Fiche mis à jour avec succès.');
        }
    }

    public function delete(Fiche $fiche)
    {
        $fiche->delete();

        return response()->json(['success', 'Fiche à étè supprimer avec succès.']);
    }

    public function pdf(StoreNewSheetRequest $request)
    {
        $fiches = Fiche::all();
        $pdf = PDF::loadView('FicheAccueil.create', array('fiches' => $fiches));
        return $pdf->stream();

    }
    public function stat(Request $request)
    {
        //'psychologique','harcelement','verbale','economique','physique','sexuelle'

        $stats = collect(DB::select('SELECT (
                                        SELECT COUNT(*) FROM `violences` WHERE `violence_type` = "psychologique"
                                    ) as violence_psychologique,
                                    (
                                        SELECT COUNT(*) FROM `violences` WHERE `violence_type` = "harcelement"
                                    ) as violence_harcelement,
                                    (
                                        SELECT COUNT(*) FROM `violences` WHERE `violence_type` = "verbale"
                                    ) as violence_verbale,
                                    (
                                        SELECT COUNT(*) FROM `violences` WHERE `violence_type` = "economique"
                                    ) as violence_economique,
                                    (
                                        SELECT COUNT(*) FROM `violences` WHERE `violence_type` = "physique"
                                    ) as violence_physique,
                                    (
                                        SELECT COUNT(*) FROM `violences` WHERE `violence_type` = "sexuelle"
                                    ) as violence_sexuelle
                                    '))[0];

        return view('stat',compact('stats'));
    }

    public function rdv(){
        return view('FicheAccueil.rdv');

    }
}
