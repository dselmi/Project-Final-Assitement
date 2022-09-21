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
        <h6 class="mb-0 text-uppercase">Fiches de consultation</h6>
        <hr/>
        <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body p-5">
                <form id="FicheGardeForm" action="{{ route('consultation.create.store',$fiche) }}" method="post" class="row g-3">
                    @csrf
                    <div class="col-md-8">
                        <label for="date" class="form-label">Date</label>
                                <input type="text" class="form-control" name="date" id="date">
                    </div>
                    <br>
                    <div class="col-8">
                        <label for="activities" class="form-label">Numéro de séance</label>
                        <input type="number" class="form-control" id="seance_num" name="seance_num" >
                    </div>
                    <div class="col-12">
                        <label for="demande" class="form-label">Rapport</label>
                        <textarea class="form-control" id="rapport" name="rapport" rows="15"></textarea>
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
