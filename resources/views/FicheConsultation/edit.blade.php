@extends('layouts.backend')

@section('css_before')
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
@endsection

@section('js_after')
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
@endsection

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content ">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">
                <img class="profile-user-img img-fluid img " src="{{asset('images/accueil.png')}}" alt="avatar"
                    style="width: 40px;"> Liste des fiches d'acceuil
            </h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item">Accueil</li>
            <li class="breadcrumb-item active" aria-current="page">Liste des personnels</li>-->
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->

        <div class="row">
            <div class="col-xl-7 mx-auto">
                <h6 class="mb-0 text-uppercase">Fiches de consultation</h6>
                <hr/>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <form id="FicheConsultationForm" action="{{ route('consultation.edit.update',$fiche->id) }}" method="post" class="row g-3">
                            @csrf
                            <div class="col-md-8">
                                <b for="date" class="form-label">Date:</b>
                                <input type="text" class="form-control" name="date" value="{{$fiche->date}}" id="date">
                            </div>

                            <div class="col-md-8">
                                <b for="seance_num" class="form-label">Séance Num °:</b>
                                <input type="number" class="form-control w-75" name="seance_num" value="{{$fiche->seance_num}}" id="seance_num">

                            </div>
                            <div class="col-12">
                                <b for="rapport" class="form-label">Rapport de la consultation:</b>
                                <textarea class="form-control" id="rapport" name="rapport" rows="15">{{$fiche->rapport}}</textarea>

                            </div>
                            <div class="col-12">
                                <input type="hidden" name="fiche_id" value="{{$fiche->id}}">
                                <button type="submit" class="btn btn-primary px-5">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    <!-- Info -->

    <!-- END Info -->

       @endsection

    @section("script")
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#example').DataTable();
        } );
    </script>
    <script>
      $(document).ready(function() {

        $('.single-select').select2({
          theme: 'bootstrap4',
          width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
          placeholder: $(this).data('placeholder'),
          allowClear: Boolean($(this).data('allow-clear')),
        });

            $(document).on('click','.edit-fiche',function(e) {
                var id = $(this).attr('data-id');
                window.location.href = "/fiche-consultation-"+id;
            });

              $('#fiche-accueil').on('change', function (e) {
                    var fiche_id = this.value;
                    var refresh = window.location.protocol + "//" + window.location.host + window.location.pathname;
                    if(fiche_id != "" && fiche_id > 0)
                    refresh += '?fiche_accueil_id='+fiche_id;
                    window.location.href = refresh;
              });

              $('#add-fiche-consultation').on('click', function (e) {
                    var refresh = window.location.protocol + "//" + window.location.host+"/fiche-consultation-create";
                    var fiche_id = <?php echo isset($_GET['fiche_accueil_id'])?$_GET['fiche_accueil_id']:0; ?>;
                    refresh += '?fiche_accueil_id='+fiche_id;
                    window.location.href = refresh;
              });

              $('#supprimer-modal').on('show.bs.modal', function (e) {
                  var id = $(e.relatedTarget).attr('data-id');

                  $(this).find('.modal-footer #delete').data('id',id);
                  $(this).find('.modal-footer #delete').attr('data-id',id);
              });

             $('#supprimer-modal').find('.modal-footer #delete').on('click', function(e){
                var id = parseInt($("#delete").data("id"));

                  $.ajax({
                           type:"POST",
                           dataType: "json",
                           url:"/fiche-consultation/"+id,
                           data:{"_method":"delete", "_token": "{{ csrf_token() }}"},
                           success:function(res) {

                              toastr.success("Fiche de consultation a été supprimer avec succès.")

                              $('#supprimer-modal').modal('toggle');
                              var row = $("#fiche-"+id).closest('tr');
                              row.fadeOut("slow", function() {
                                $(this).remove();
                              });
                          }
                  });

              });
      } );
    </script>
    @endsection
