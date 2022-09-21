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
<div class="row">
    <div class="col-xl-7 mx-auto">
        <h6 class="mb-0 text-uppercase">Fiches de garde</h6>
        <hr/>
        <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body p-5">
                <form id="FicheGardeForm" action="{{ route('garde.create.store',$fiche) }}" method="post" class="row g-3">
                    @csrf
                    <div class="col-md-8">
                        <label for="date" class="form-label">Date</label>
                                <input type="text" class="form-control" name="date" id="date">
                    </div>
                    <div class="col-12">
                        <label for="activities" class="form-label">Activités</label>
                        <textarea class="form-control" id="activities" name="activities" rows="15"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="demande" class="form-label">Demande</label>
                        <textarea class="form-control" id="demande" name="demande" rows="15"></textarea>
                    </div>
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
              window.location.href = "/fiche-garde-"+id;
          });

            $('#fiche-accueil').on('change', function (e) {
                  var fiche_id = this.value;
                  var refresh = window.location.protocol + "//" + window.location.host + window.location.pathname;
                  if(fiche_id != "" && fiche_id > 0)
                  refresh += '?fiche_accueil_id='+fiche_id;
                  window.location.href = refresh;
            });

            $('#add-fiche-garde').on('click', function (e) {
                  var refresh = window.location.protocol + "//" + window.location.host+"/fiche-garde-create";
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
                         url:"/fiche-garde/"+id,
                         data:{"_method":"delete", "_token": "{{ csrf_token() }}"},
                         success:function(res) {

                            toastr.success("Fiche de garde a été supprimer avec succès.")

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
  <script>
    $(function () {
            $('#date').datepicker({
                format: 'dd-mm-yyyy',
                language: 'fr'
            });


        });

</script>
  @endsection
