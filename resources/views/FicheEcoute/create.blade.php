@extends('layouts.backend')

@section('css_before')
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
@endsection



@section("content")
<div class="page-wrapper">
    <div class="content header-title-content">
        <div class="block-content block-content-full ">
                    <div class="d-flex justify-content-between align-items-center">
                    <h5 class="flex-grow-1 fw-semibold my-2 my-sm-3">
                        <img class="profile-user-img img-fluid img " src="{{asset('images/accueil.png')}}" alt="avatar"
                            style="width: 30px;border-radius: 50%"> Fiche guide pour l’écoute des victimes de violences
                    </h5>
                <br>
             </div>
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body px-5">
                        <form id="ficheForm" action="{{ route('ecoute.create.store',$fiche) }}" method="post"
                            class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label for="date" class="form-label">Date</label>
                                <input type="text" class="form-control" type = "date" name="fiche_ecoute[date]" id="date">
                            </div>
                            <div class="col-md-6">
                                <label for="lieu" class="form-label">Lieu</label>
                                <input type="text" class="form-control" name="fiche_ecoute[lieu]" id="lieu">
                            </div>
                            <br><br>
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                </div>
                                <h5 class="mb-0 text-info block-title">Renseignements</h5>
                            </div>
                            <hr />
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">Prénom</label>
                                <input type="text" class="form-control" name="renseignement[first_name]"
                                    id="first_name">
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="renseignement[last_name]" id="last_name">
                            </div>
                            <div class="col-md-4">
                                <label for="date_naissance" class="form-label">Date de naissance</label>
                                <input type="text" class="form-control" name="renseignement[date_naissance]"
                                    id="date_naissance">
                            </div>
                            <div class="col-md-4">
                                <label for="lieu_naissance" class="form-label">Lieu de naissance</label>
                                <input type="text" class="form-control" name="renseignement[lieu_naissance]"
                                    id="lieu_naissance">
                            </div>
                            <div class="col-md-4">
                                <label for="nationality" class="form-label">Nationalité</label>
                                <input type="text" class="form-control" name="renseignement[nationality]"
                                    id="nationality">
                            </div>
                            <div class="col-md-6">
                                <label for="profession" class="form-label">Profession</label>
                                <input type="text" class="form-control" name="renseignement[profession]"
                                    id="profession">
                            </div>
                            <div class="col-md-6">
                                <label for="level_instruction" class="form-label">Niveau d’instruction</label>
                                <input type="text" class="form-control" name="renseignement[level_instruction]"
                                    id="level_instruction">
                            </div>
                            <div class="col-md-6">
                                <label for="cin_passeport" class="form-label">N° CIN/passeport</label>
                                <input type="text" class="form-control" name="renseignement[cin_passeport]"
                                    id="cin_passeport">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Tél/GSM</label>
                                <input type="text" class="form-control" name="renseignement[phone]" id="phone">
                            </div>
                            <div class="col-md-12">
                                <label for="address" class="form-label">Adresse postale</label>
                                <textarea class="form-control" name="renseignement[address]" id="address"
                                    rows="3"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="delegation" class="form-label">Délégation</label>
                                <input type="text" class="form-control" name="renseignement[delegation]"
                                    id="delegation">
                            </div>
                            <div class="col-md-6">
                                <label for="governorate" class="form-label">Gouvernorat</label>
                                <input type="text" class="form-control" name="renseignement[governorate]"
                                    id="governorate">
                            </div>
                            <div class="col-md-12">
                                <label for="ordered_by" class="form-label">Orienté par </label>
                                <input type="text" class="form-control" name="renseignement[ordered_by]"
                                    id="ordered_by">
                            </div>
                            <div class="col-md-8">
                                <label for="ordered_by" class="form-label">Milieu de résidence: </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="renseignement[place_residence]"
                                        id="rural" value="Rural">
                                    <label class="form-check-label" for="rural">Rural</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="renseignement[place_residence]"
                                        id="urbain" value="Urbain">
                                    <label class="form-check-label" for="urbain">Urbain</label>
                                </div>
                            </div>
                            <br><br>
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-info block-title">Situation de famille et d'état civil de la victime</h5>
                            </div>
                            <hr />
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="situation_state_victime[state]"
                                        value="Mariée">
                                    <label class="form-check-label">Mariée</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="situation_state_victime[state]"
                                        value="Divorcée">
                                    <label class="form-check-label">Divorcée</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="situation_state_victime[state]"
                                        value="Veuve">
                                    <label class="form-check-label">Veuve</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="situation_state_victime[state]"
                                        value="Célibataire">
                                    <label class="form-check-label">Célibataire</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="situation_state_victime[state]"
                                        value="Relation libre">
                                    <label class="form-check-label">Relation libre</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="duration_state" class="form-label">Durée (Mariage, Divorce, …..) </label>
                                <input type="text" class="form-control" name="situation_state_victime[duration_state]"
                                    id="duration_state">
                            </div>
                            <div class="col-md-6">
                                <label for="nb_childrens" class="form-label">Nombre d’enfants </label>
                                <input type="text" class="form-control" name="situation_state_victime[nb_childrens]"
                                    id="nb_childrens">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Autres personnes vivant au foyer ?</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="situation_state_victime[check_other_people]" value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="situation_state_victime[check_other_people]" value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="other_people" class="form-label">Si oui,Qui ?</label>
                                <input type="text" class="form-control" name="situation_state_victime[other_people]"
                                    id="other_people">
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-9">
                                <label class="form-label">Situation actuelle de la victime:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="situation_state_victime[situation_victime][]" value="Enceinte">
                                    <label class="form-check-label">Enceinte</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="situation_state_victime[situation_victime][]" value="Handicapée">
                                    <label class="form-check-label">Handicapée</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="situation_state_victime[situation_victime][]" value="Maladie">
                                    <label class="form-check-label">Maladie</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="maladies" class="form-label">Précisez la ou les maladies s'il
                                    existes</label>
                                <input type="text" class="form-control" name="situation_state_victime[maladies]"
                                    id="maladies">
                            </div>

                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-info block-title">Situation de famille et renseignements d'état civil de
                                    l'auteur présumé</h5>
                            </div>
                            <hr />
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">Prénom </label>
                                <input type="text" class="form-control" name="situation_agresseur[first_name]"
                                    id="first_name">
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Nom </label>
                                <input type="text" class="form-control" name="situation_agresseur[last_name]"
                                    id="last_name">
                            </div>
                            <div class="col-md-6">
                                <label for="age" class="form-label">Age </label>
                                <input type="text" class="form-control" name="situation_agresseur[age]" id="age">
                            </div>
                            <div class="col-md-6">
                                <label for="nationality" class="form-label">Nationalité </label>
                                <input type="text" class="form-control" name="situation_agresseur[nationality]"
                                    id="nationality">
                            </div>
                            <div class="col-md-6">
                                <label for="profession" class="form-label">Profession </label>
                                <input type="text" class="form-control" name="situation_agresseur[profession]"
                                    id="profession">
                            </div>
                            <div class="col-md-6">
                                <label for="level_instruction" class="form-label">Niveau d’instruction </label>
                                <input type="text" class="form-control" name="situation_agresseur[level_instruction]"
                                    id="level_instruction">
                            </div>
                            <div class="col-md-6">
                                <label for="relation" class="form-label">Relation avec l’auteur présumé </label>
                                <input type="text" class="form-control" name="situation_agresseur[relation]"
                                    id="relation">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tél / GSM </label>
                                <input type="text" class="form-control" name="situation_agresseur[phone]">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Adresse postale</label>
                                <textarea class="form-control" name="situation_agresseur[address]" rows="3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="situation_agresseur[state]"
                                        value="Célibataire">
                                    <label class="form-check-label">Célibataire</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="situation_agresseur[state]"
                                        value="Veuve">
                                    <label class="form-check-label">Veuf</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="situation_agresseur[state]"
                                        value="Divorcée">
                                    <label class="form-check-label">Divorcé</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="situation_agresseur[state]"
                                        value="Mariée">
                                    <label class="form-check-label">Marié</label>
                                </div>
                            </div>


                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-info block-title">Renseignements sur le ou les faits déclenchant la démarche
                                </h5>
                            </div>
                            <hr />

                            @isset($fiche->type_violence)

                            @foreach ($fiche->type_violence as $key => $type_violence)
                            @switch($type_violence)
                            @case('Violence verbale')
                            <div class="card-title text-center">
                                <h5 class="mt-2 text-dark">Violence verbale</h5>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="violence[verbale][type][]"
                                        value="Insulte">
                                    <label class="form-check-label">Insulte</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="violence_verbale[type][]"
                                        value="Chantage">
                                    <label class="form-check-label">Chantage</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="violence_verbale[type][]"
                                        value="Humiliation">
                                    <label class="form-check-label">Humiliation</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="violence_verbale[type][]"
                                        value="Menaces de mort">
                                    <label class="form-check-label">Menaces de mort</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="first_name" class="form-label">Autre</label>
                                <input type="text" class="form-control" name="violence_verbale[autreex]" id="autre">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Cela arrive une ou plusieurs fois :</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="violence_verbale[times]"
                                        value="jour">
                                    <label class="form-check-label">Par jour</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="violence_verbale[times]"
                                        value="semaine">
                                    <label class="form-check-label">Par semaine</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="violence_verbale[times]"
                                        value="mois">
                                    <label class="form-check-label">Par mois</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">En quel(s) lieu(x) :</label>
                                <input type="text" class="form-control" name="violence_verbale[place]">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Depuis quand ?</label>
                                <input type="text" class="form-control" name="violence_verbale[from_when]">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Par qui?</label>
                                <input type="text" class="form-control" name="violence_verbale[by_who]">
                            </div>
                            @break
                            @case('Harcelement')
                            <div class="card-title text-center">
                                <h5 class="mt-2 text-dark">L’harcèlement</h5>
                            </div>
                            <div class="col-md-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="harcelement[type][]"
                                        value="Insulte">
                                    <label class="form-check-label">Insulte</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="harcelement[type][]"
                                        value="Chantage">
                                    <label class="form-check-label">Chantage</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="harcelement[type][]"
                                        value="Humiliation">
                                    <label class="form-check-label">Humiliation</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <label class="form-label">Autres menaces</label>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Contenu des messages</label>
                                <textarea class="form-control" name="harcelement[other]" rows="3"></textarea>
                            </div>
                            <div class="col-md-9">
                                <label class="form-label">Cela arrive une ou plusieurs fois :</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="harcelement[times]" value="jour">
                                    <label class="form-check-label">Par jour</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="harcelement[times]"
                                        value="semaine">
                                    <label class="form-check-label">Par semaine</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="harcelement[times]" value="mois">
                                    <label class="form-check-label">Par mois</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">En quel(s) lieu(x) :</label>
                                <input type="text" class="form-control" name="harcelement[place]">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Depuis quand ?</label>
                                <input type="text" class="form-control" name="harcelement[from_when]">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Par qui?</label>
                                <input type="text" class="form-control" name="harcelement[by_who]">
                            </div>
                            @break
                            @case('Violence psychologique')
                            <div class="card-title text-center">
                                <h5 class="mt-2 text-dark">Violences psychologiques</h5>
                            </div>
                            <div class="col-md-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="violence_psychologiques[type][]" value="Dénigrant mes opinions">
                                    <label class="form-check-label">Dénigrant mes opinions</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="violence_psychologiques[type][]" value="mes valeurs">
                                    <label class="form-check-label">mes valeurs</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="violence_psychologiques[type][]" value="mes actions">
                                    <label class="form-check-label">mes actions</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="violence_psychologiques[type][]" value="ma personne">
                                    <label class="form-check-label">ma personne</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <label class="form-label">Cela arrive une ou plusieurs fois :</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="violence_psychologiques[times]"
                                        value="jour">
                                    <label class="form-check-label">Par jour</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="violence_psychologiques[times]"
                                        value="semaine">
                                    <label class="form-check-label">Par semaine</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="violence_psychologiques[times]"
                                        value="mois">
                                    <label class="form-check-label">Par mois</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">En quel(s) lieu(x) :</label>
                                <input type="text" class="form-control" name="violence_psychologiques[place]">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Depuis quand ?</label>
                                <input type="text" class="form-control" name="violence_psychologiques[from_when]">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Par qui?</label>
                                <input type="text" class="form-control" name="violence_psychologiques[by_who]">
                            </div>
                            @break
                            @case('Violence economique')
                            <div class="card-title text-center">
                                <h5 class="mt-2 text-dark">Violences économiques</h5>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="violence_economiques[type][]"
                                        value="Me privé de mes besoins financier">
                                    <label class="form-check-label">Me privé de mes besoins financier</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="violence_economiques[type][]"
                                        value="Me priver de mon salaire">
                                    <label class="form-check-label">Me priver de mon salaire</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="violence_economiques[type][]"
                                        value="S’approprier de mon argent, mes biens sans son consentement">
                                    <label class="form-check-label">S’approprier de mon argent, mes biens sans son
                                        consentement</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="violence_economiques[type][]"
                                        value="M’empêcher de travailler">
                                    <label class="form-check-label">M’empêcher de travailler</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <label for="first_name" class="form-label">Autre</label>
                            </div>
                            <div class="col-md-9">
                                <label class="form-label">Cela arrive une ou plusieurs fois :</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="violence_economiques[times]"
                                        value="jour">
                                    <label class="form-check-label">Par jour</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="violence_economiques[times]"
                                        value="semaine">
                                    <label class="form-check-label">Par semaine</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="violence_economiques[times]"
                                        value="mois">
                                    <label class="form-check-label">Par mois</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">En quel(s) lieu(x) :</label>
                                <input type="text" class="form-control" name="violence_economiques[place]">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Depuis quand ?</label>
                                <input type="text" class="form-control" name="violence_economiques[from_when]">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Par qui?</label>
                                <input type="text" class="form-control" name="violence_economiques[by_who]">
                            </div>
                            @break
                            @case('Violence physique')
                            <div class="card-title text-center">
                                <h5 class="mt-2 text-dark">Violences physiques</h5>
                            </div>
                            <div class="col-md-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="violence_physiques[type_dommage][]" value="de coups">
                                    <label class="form-check-label">de coups</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="violence_physiques[type_dommage][]" value="des blessures">
                                    <label class="form-check-label">des blessures</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="violence_physiques[type_dommage][]" value="des brulures">
                                    <label class="form-check-label">des brulures</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="violence_physiques[type_dommage][]" value="autres">
                                    <label class="form-check-label">Autres</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="violence_physiques[violence_using][]" value="à main nue">
                                    <label class="form-check-label">à main nue</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="violence_physiques[violence_using][]" value="avec un objet">
                                    <label class="form-check-label">avec un objet</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="violence_physiques[violence_using][]" value="Avec une arme">
                                    <label class="form-check-label">Avec une arme</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="violence_physiques[violence_using][]" value="Autres">
                                    <label class="form-check-label">Autres</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <label class="form-label">L’auteur:casse des objets:</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="violence_physiques[breakage_objects]" value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="violence_physiques[breakage_objects]" value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Profère des menaces contre d’autres personnes:</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="violence_physiques[makes_threats_against_other_people]" value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="violence_physiques[makes_threats_against_other_people]" value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Si oui ,les quelles ?</label>
                                <input type="text" class="form-control" name="violence_physiques[which_ones]">
                            </div>
                            <div class="col-md-9">
                                <label class="form-label">Cela arrive une ou plusieurs fois :</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="violence_physiques[times]"
                                        value="jour">
                                    <label class="form-check-label">Par jour</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="violence_physiques[times]"
                                        value="semaine">
                                    <label class="form-check-label">Par semaine</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="violence_physiques[times]"
                                        value="mois">
                                    <label class="form-check-label">Par mois</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">En quel(s) lieu(x) :</label>
                                <input type="text" class="form-control" name="violence_physiques[place]">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Depuis quand ?</label>
                                <input type="text" class="form-control" name="violence_physiques[from_when]">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Par qui?</label>
                                <input type="text" class="form-control" name="violence_physiques[by_who]">
                            </div>
                            @break
                            @case('Violence sexuelle')
                            <div class="card-title text-center">
                                <h5 class="mt-2 text-dark">Violences sexuelles</h5>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Je suis victime d’une sexualité non consentie :</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="violence_sexuelles[victim_not_consensual_sexuality]" value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="violence_sexuelles[victim_not_consensual_sexuality]" value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Accompagnée de brutalité physique et/ou de menaces :</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="violence_sexuelles[accompanied_physical_brutality_threats]" value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="violence_sexuelles[accompanied_physical_brutality_threats]" value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Je suis contrainte à subir :
                                    des scénarios pornographiques:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="violence_sexuelles[forced_undergo_pornographic_scenarios]" value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="violence_sexuelles[forced_undergo_pornographic_scenarios]" value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Autres informations:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="violence_sexuelles[other_informations]" value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="violence_sexuelles[other_informations]" value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <label class="form-label">Cela arrive une ou plusieurs fois :</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="violence_sexuelles[times]"
                                        value="jour">
                                    <label class="form-check-label">Par jour</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="violence_sexuelles[times]"
                                        value="semaine">
                                    <label class="form-check-label">Par semaine</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="violence_sexuelles[times]"
                                        value="mois">
                                    <label class="form-check-label">Par mois</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">En quel(s) lieu(x) :</label>
                                <input type="text" class="form-control" name="violence_sexuelles[place]">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Depuis quand ?</label>
                                <input type="text" class="form-control" name="violence_sexuelles[from_when]">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Par qui?</label>
                                <input type="text" class="form-control" name="violence_sexuelles[by_who]">
                            </div>

                            @break
                            @endswitch
                            @endforeach

                            @endisset
                            <div class="card-title text-center">
                                <h5 class="mt-2 text-dark">Renseignements supplémentaires</h5>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Les faits se déroulent-ils en présence des enfants
                                    ?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="additional_information[events_with_presence_children]" value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="additional_information[events_with_presence_children]" value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Les enfants sont-ils également victimes de violences
                                    ?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="additional_information[check_children_victims_violence]" value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="additional_information[check_children_victims_violence]" value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Si oui, les quelles ?</label>
                                <input type="text" class="form-control" name="additional_information[which_ones]">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Les enfants sont-ils perturbés ?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="additional_information[check_children_disturbed]" value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="additional_information[check_children_disturbed]" value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Y’a-t-il d’autres témoins ?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="additional_information[check_other_witnesses]" value="1">
                                    <label class="form-check-label">Oui </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="additional_information[check_other_witnesses]" value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Si oui, les quelles ?</label>
                                <input type="text" class="form-control" name="additional_information[witnesses]">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Avez-vous, vous-même répondu verbalement et/ou physiquement à
                                    votre agresseur ?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="additional_information[check_responded_verbally_physically_to_attacker]"
                                        value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="additional_information[check_responded_verbally_physically_to_attacker]"
                                        value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">L’agresseur consomme-t-il de l’alcool, des stupéfiants, des
                                    médicaments ou autres ?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="additional_information[agresser_has_abuser_alcohol_narcotics_medication_other]"
                                        value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="additional_information[agresser_has_abuser_alcohol_narcotics_medication_other]"
                                        value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Si oui, de façon habituelle ?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="additional_information[usually]"
                                        value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="additional_information[usually]"
                                        value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Si oui, seulement au moment des violences ?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="additional_information[only_during_violence]" value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="additional_information[only_during_violence]" value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Son attitude après les violences ? </label><br>
                                <textarea class="form-control" name="additional_information[attitude_after_violence]"
                                    rows="3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Avez-vous peur ? Pourquoi, de quoi ? </label><br>
                                <textarea class="form-control" name="additional_information[check_afraid_and_of_what]"
                                    rows="3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Vous êtes vous déjà confiée / y a -t-il des témoins ?
                                </label><br>
                                <textarea class="form-control"
                                    name="additional_information[have_confided_and_check_witnesses]"
                                    rows="3"></textarea>
                            </div>

                            <div class="card-title text-center">
                                <h5 class="mt-2 text-dark">Les besoins de la victime</h5>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Première demande de la femme:</label>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Suivi médical :</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="besoins_victime[medical_follow]"
                                        value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="besoins_victime[medical_follow]"
                                        value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Suivi social :</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="besoins_victime[social_follow]"
                                        value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="besoins_victime[social_follow]"
                                        value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Suivi psychologique :</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="besoins_victime[psychological_follow]" value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="besoins_victime[psychological_follow]" value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Suivi juridique :</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="besoins_victime[legal_follow]"
                                        value="1">
                                    <label class="form-check-label">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="besoins_victime[legal_follow]"
                                        value="0">
                                    <label class="form-check-label">Non</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Autres besoins des aides pour elle et ses enfants
                                    :</label><br>
                                <textarea class="form-control" name="besoins_victime[other_needs]" rows="3"></textarea>
                            </div>

                            <div class="col-md-12">
                            <label class="form-label">Suivi juridique :</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="decision"
                                        value="ecoutante">
                                    <label class="form-check-label">Rapport écoutante</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="decision"
                                        value="assistante">
                                    <label class="form-check-label">Rapport assistante</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="decision"
                                        value="psychologue">
                                    <label class="form-check-label">Rapport psychologue</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="decision"
                                        value="avocat">
                                    <label class="form-check-label">Rapport avocat</label>
                                </div>
                            </div>

                            <div class="col-12" style="text-align: right">
                                <button type="submit" class="btn btn-sm btn-primary px-5">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>
@endsection


@push('js_after')
<!-- jQuery (required for DataTables plugin) -->
<script src="{{ asset('js/lib/jquery.min.js') }}"></script>

<!-- Page JS Plugins -->
<script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ asset('js/pages/tables_datatables.js') }}"></script>


<script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.fr-CH.min.js') }}"></script>

<script>
    $(function () {
            $('#date').datepicker({
                format: 'dd-mm-yyyy',
                language: 'fr'
            });

            $('#naissance').datepicker({
                format: 'dd-mm-yyyy',
                language: 'fr'
            });

            $('#date_rdv').datepicker({
                format: 'dd-mm-yyyy',
                language: 'fr'
            });
        })
      /*  $(document).ready( function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#ficheForm").submit(function(e) {
                e.preventDefault();
                var data_fiche = $("#ficheForm").serialize();
                var formData = new FormData();
                formData.append('_method','post');
                formData.append('data_fiche',data_fiche);
                    $.ajax({
                         type:"POST",
                         url:"/store_fiche_accueil",
                         data:formData,
                         processData: false,
                         contentType: false,
                         success:function(res) {
                            toastr.success("Votre fiche d'accueil a été créé avec succès.");
                            setTimeout(function() {
                            window.location.href = "/fiches_accueil";
                            },2000);
                         }
                    });

            });

        });*/
</script>
@endpush
