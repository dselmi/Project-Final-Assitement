@extends('layouts.backend')

@section('css_before')
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
@endsection



@section("content")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Fiche</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Nouvelle fiche d’accueil</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-7 mx-auto">
                <h6 class="mb-0 text-uppercase">Accueil</h6>
                <hr />
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <form id="ficheForm" action="{{ route('sheet.edit.update',$fiche->id) }}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-md-8">
                                <label for="date" class="form-label">Date</label>
                                <input type="text" class="form-control" name="date" id="date" value="{{$fiche->date->format('d-m-Y')}}">
                            </div>
                            <div class="col-md-8">
                                <label for="lieu" class="form-label">Lieu</label>
                                <input type="text" class="form-control" name="lieu" value="{{$fiche->lieu}}" id="lieu">
                            </div>
                            <div class="col-md-8">
                                <label for="femme" class="form-label">Nom et prénom de la femme</label>
                                <input type="text" class="form-control" name="femme" value="{{$fiche->femme}}"
                                    id="femme">
                            </div>
                            <div class="col-8">
                                <label for="birth_date" class="form-label">Date de naissance</label>
                                <input type="text" class="form-control" name="naissance" value="{{$fiche->naissance->format('d-m-Y')}}"
                                    id="birth_date">
                            </div>
                            <div class="col-md-8">
                                <label for="state" class="form-label">Etat civil</label>
                                <input type="text" class="form-control" name="etat_civil" value="{{$fiche->etat_civil}}"
                                    id="state">
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Adresse</label>
                                <textarea class="form-control" id="address" name="adresse"
                                    rows="3">{{$fiche->adresse}}</textarea>
                            </div>
                            <div class="col-md-8">
                                <label for="ordered_by" class="form-label">Qui a vous orienté ?</label>
                                <input type="text" class="form-control" name="oriente_par"
                                    value="{{$fiche->oriente_par}}" id="ordered_by">
                            </div>
                            <div class="col-12">
                                <label for="motif" class="form-label">LE MOTIF DE LA VISITE/ATTENTES/ BESOINS</label>
                                <select id="motif_visite" name="motif_visite[]" class="form-select" multiple>
                                    <option value="Suivi psychologique"

                                    @if (in_array("Suivi psychologique",$fiche->motif_visite) )
                                        selected="selected"
                                        @endif
                                    >Suivi psychologique</option>
                                    <option value="Hébergement" @if (in_array("Hébergement",$fiche->motif_visite) )
                                        selected="selected"
                                        @endif>Hébergement</option>
                                    <option value="Suivi psychologique pour ses enfants" @if (in_array("Suivi psychologique pour ses
                                    enfants",$fiche->motif_visite) )
                                        selected="selected"
                                        @endif>Suivi psychologique pour ses
                                        enfants</option>
                                    <option value="Conseil juridique" @if (in_array("Conseil juridique",$fiche->motif_visite) )
                                        selected="selected"
                                        @endif>Conseil juridique</option>
                                    <option value="autre" @if (in_array("autre",$fiche->motif_visite) )
                                        selected="selected"
                                        @endif>Autres</option>
                                </select>
                            </div>
                            <div class="col-md-8">

                                <label for="agresser" class="form-label">Qui sont les agresseurs?</label>
                                <select id="agresseur" name="agresseur[]" class="form-select" multiple>
                                    <option value="Son Mari"
                                        @if ( in_array("Son Mari",$fiche->agresseur) )
                                            selected="selected"
                                        @endif
                                        >Son Mari</option>
                                    <option value="Son père" @if (in_array("Son père",$fiche->agresseur) )
                                        selected="selected"
                                        @endif
                                        >Son père</option>
                                    <option value="Son frère" @if (in_array("Son frère",$fiche->agresseur))
                                        selected="selected"
                                        @endif
                                        >Son frère</option>
                                    <option value="Son patron" @if (in_array("Son patron",$fiche->agresseur) )
                                        selected="selected"
                                        @endif
                                        >Son patron</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="violence_type" class="form-label">Types de violence</label>
                                <select id="type_violence" name="type_violence[]" class="form-select" multiple>
                                    <option value="Violence physique" @if (in_array("Violence physique",$fiche->type_violence) )
                                        selected="selected"
                                        @endif>Violence physique</option>
                                    <option value="Violence psychologique" @if (in_array("Violence psychologique",$fiche->type_violence) )
                                        selected="selected"
                                        @endif>Violence psychologique</option>
                                    <option value="Violence economique" @if (in_array("Violence economique",$fiche->type_violence) )
                                        selected="selected"
                                        @endif>Violence economique</option>
                                    <option value="Violence sexuelle" @if (in_array("Violence sexuelle",$fiche->type_violence) )
                                        selected="selected"
                                        @endif>Violence sexuelle</option>
                                    <option value="Harcelement" @if (in_array("Harcelement",$fiche->type_violence) )
                                        selected="selected"
                                        @endif>Harcelement</option>
                                    <option value="Violence verbale" @if (in_array("Violence verbale",$fiche->type_violence) )
                                        selected="selected"
                                        @endif>Violence verbale</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="fils_victimes" class="form-label">Enfants victimes de violence?</label>


                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fils_victimes" id="inlineRadio1"
                                            value="1" @if ($fiche->fils_victimes)
                                                checked
                                            @endif>
                                        <label class="form-check-label" for="inlineRadio1"><img
                                                class="profile-user-img img-fluid img " src="{{asset('images/coche.png')}}"
                                                alt="avatar" style="width: 30px;"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fils_victimes" id="inlineRadio2"
                                            value="0" @if (!$fiche->fils_victimes)
                                            checked
                                        @endif>
                                        <label class="form-check-label" for="inlineRadio2"><img
                                                class="profile-user-img img-fluid img " src="{{asset('images/cancel.png')}}"
                                                alt="avatar" style="width: 30px;"></label>
                                    </div>
                            </div>
                            <div class="col-12">
                                <label for="steps_taken" class="form-label">Quelles démarches effectuées par la
                                    femme?</label>
                                <textarea class="form-control" name="etapes" id="etapes"
                                    rows="3">{{$fiche->etapes}}</textarea>
                            </div>
                            <br><br>
                            <!--<div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                </div>
                                <h5 class="mb-0 text-info">RENDEZ-VOUS</h5>
                            </div>
                            <hr />
                            <div class="col-12">
                                <label for="date_rdv" class="form-label">Date de la séance d'écoute avec
                                    l'écoutante ou specialiste</label>
                                <input type="text" class="form-control" name="date_rdv" id="date_rdv" value="{{ $fiche->rdv->date_rdv->format('d-m-Y')}}">
                            </div>
                            <div class="col-12">
                                <label for="phone_femme" class="form-label">Numéro de téléphone de la femme</label>
                                <input type="text" class="form-control" name="phone_femme" id="phone_femme" value="{{ $fiche->rdv->phone_femme  }}">
                            </div>-->

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">Enregistrer</button>
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
@endpush
