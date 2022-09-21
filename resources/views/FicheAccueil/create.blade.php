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
                            style="width: 30px;border-radius: 50%"> Nouvelle fiche d'acceuil
                    </h5>
                <br>
             </div>
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <form id="ficheForm" action="{{ route('sheet.create.store') }}" method="post" class="row g-3" >
                            @csrf

                            <div class="col-12">
                                <label for="date" class="form-label">Date</label>
                                <input type="text" class="form-control" name="date" id="date">
                            </div>
                            <div class="col-12">
                                <label for="lieu" class="form-label">Lieu</label>
                                <input type="text" class="form-control" name="lieu" id="lieu">
                            </div>
                            <div class="col-12">
                                <label for="femme" class="form-label">Nom et prénom de la femme</label>
                                <input type="text" class="form-control" name="femme" id="femme">
                            </div>
                            <div class="col-12">
                                <label for="naissance" class="form-label">Date de naissance</label>
                                <input type="text" class="form-control" name="naissance" id="naissance">
                            </div>
                            <div class="col-12">
                                <label for="state" class="form-label">Etat civil</label>
                                <input type="text" class="form-control" name="etat_civil" id="etat_civil">
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Adresse</label>
                                <input class="form-control" id="adresse" name="adresse" />
                            </div>

                            <label for="ordered_by" class="form-label">Qui a vous orienté ?</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="police" name="oriente_par"
                                    value="police">
                                <label class="form-check-label" for="Police">Police</label>
                            </div>


                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="urgence" name="oriente_par"
                                    value="urgence">
                                <label class="form-check-label" for="Urgence">Urgence</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="association" name="oriente_par"
                                    value="Association">
                                <label class="form-check-label" for="association">Association</label>
                            </div>

                            <label for="motif_visite" class="form-label">LE MOTIF DE LA VISITE/ATTENTES/ BESOINS</label>
                            <select id="motif_visite" name="motif_visite[]" class="form-select" multiple>
                                <option value="" selected>Choisir LE MOTIF DE LA VISITE/ATTENTES/ BESOINS</option>
                                <option value="Suivi psychologique">Suivi psychologique</option>
                                <option value="Hébergement">Hébergement</option>
                                <option value="Suivi psychologique pour ses enfants">Suivi psychologique pour ses enfants</option>
                                <option value="Conseil juridique">Conseil juridique</option>
                                <option value="autre">Autres</option>
                            </select>



                            <label for="agresseur" class="form-label">Qui sont les agresseurs?</label>

                            <select id="agresseur" name="agresseur[]" class="form-select" multiple>
                                <option value="" selected>Choisir les agresseurs</option>
                                <option value="Son Mari">Son Mari</option>
                                <option value="Son père">Son père</option>
                                <option value="Son frère">Son frère</option>
                                <option value="Son patron">Son patron</option>
                            </select>

                            <label for="type_violence" class="form-label">Types de violence</label>

                            <select id="type_violence" name="type_violence[]" class="form-select" multiple>
                                <option value="" selected>Choisir Types de violence</option>
                                <option value="Violence physique">Violence physique</option>
                                <option value="Violence psychologique">Violence psychologique</option>
                                <option value="Violence economique">Violence economique</option>
                                <option value="Violence sexuelle">Violence sexuelle</option>
                                <option value="Harcelement">Harcelement</option>
                                <option value="Violence verbale">Violence verbale</option>
                            </select>

                            <label for="fils_victimes" class="form-label">Enfants victimes de violence?</label>
                            <div class="inline">
                            <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="fils_victimes" id="inlineRadio1"
                                                                value="1">
                                                            <label class="form-check-label" for="inlineRadio1"><img
                                                                    class="profile-user-img img-fluid img " src="{{asset('images/coche.png')}}"
                                                                    alt="avatar" style="width: 30px;margin-top:-3px"></label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="fils_victimes" id="inlineRadio2"
                                                                value="0">
                                                            <label class="form-check-label" for="inlineRadio2"><img
                                                                    class="profile-user-img img-fluid img " src="{{asset('images/cancel.png')}}"
                                                                    alt="avatar" style="width: 22px;margin-top:-3px;margin-left:4px"></label>
                                                        </div>
                            </div>

                            <div class="col-12">
                                <label for="steps_taken" class="form-label">Quelles demarches effectuées par la
                                    femme?</label>
                                <textarea class="form-control" name="etapes" id="steps_taken" row="3"></textarea>
                            </div>
                            <br><br>
                           <!-- <h5 class="mb-0 text-info" style="margin-bottom: -10px !important;margin-top: 25px;">RENDEZ-VOUS</h5>
                            <hr />
                            <div class="col-12">
                                <label for="date_rdv" class="form-label">Date de la séance d'écoute avec
                                    l'écoutante ou specialiste</label>
                                <input type="text" class="form-control" name="date_rdv" id="date_rdv">
                            </div>
                            <div class="col-12">
                                <label for="phone_femme" class="form-label">Numéro de téléphone de la femme</label>
                                <input type="text" class="form-control" name="phone_femme" id="phone_femme">
                            </div>
  -->
                            <div class="col-12" style="text-align: right;">
                                <button type="submit" class="btn btn-primary px-5">Enregistrer</button>
                            </div>

                            </a>
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
        class pageTablesDatatables {
  /*
   * Init DataTables functionality
   *
   */
  static initDataTables() {
    // Override a few default classes
    jQuery.extend(jQuery.fn.dataTable.ext.classes, {
      sWrapper: "dataTables_wrapper dt-bootstrap5",
      sFilterInput: "form-control",
      sLengthSelect: "form-select"
    });

    // Override a few defaults
    jQuery.extend(true, jQuery.fn.dataTable.defaults, {
      language: {
        lengthMenu: "_MENU_",
        search: "_INPUT_",
        searchPlaceholder: "Search..",
        info: "Page <strong>_PAGE_</strong> of <strong>_PAGES_</strong>",
        paginate: {
          first: '<i class="fa fa-angle-double-left"></i>',
          previous: '<i class="fa fa-angle-left"></i>',
          next: '<i class="fa fa-angle-right"></i>',
          last: '<i class="fa fa-angle-double-right"></i>'
        }
      }
    });

    // Override buttons default classes
    jQuery.extend(true, jQuery.fn.DataTable.Buttons.defaults, {
      dom: {
        button: {
          className: 'btn btn-sm btn-primary'
        },
      }
    });

    // Init full DataTable
    jQuery('.js-dataTable-full').DataTable({
      pageLength: 5,
      lengthMenu: [[5, 10, 20], [5, 10, 20]],
      autoWidth: false
    });

    // Init DataTable with Buttons
    jQuery('.js-dataTable-buttons').DataTable({
      pageLength: 5,
      lengthMenu: [[5, 10, 20], [5, 10, 20]],
      autoWidth: false,
     // buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
      dom: "<'row'<'col-sm-12'<'text-center bg-body-light py-2 mb-2'B>>>" +
            "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"
    });
  }

  /*
   * Init functionality
   *
   */
  static init() {
    this.initDataTables();
  }
}

// Initialize when page loads
Dashmix.onLoad(pageTablesDatatables.init());

</script>
@endpush
