@extends('layouts.backend')

@section('css_before')
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
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

@section('content')
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Médicaments</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Modification médicament</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->
                    <div class="row">
                        <div class="col-xl-7 mx-auto">
                            <h6 class="mb-0 text-uppercase">Médicament</h6>
                            <hr/>
                            <div class="card border-top border-0 border-4 border-primary">
                                <div class="card-body p-5">
                                    <form id="medicamentsForm" class="row g-3">
                                        <div class="col-md-8 mb-2">
                                            <label class="form-label">Nom</label>
                                            <input type="text" class="form-control" name="title" value="{{$medicament->title}}">
                                        </div>
                                        <div class="col-8 mb-2">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="description" rows="6">{{$medicament->description}}</textarea>
                                        </div>
                                        <div class="col-8 mb-2">
                                            <label class="form-label">Mode et durée d'utilisation</label>
                                            <textarea class="form-control" name="mode_duree_use" rows="6">{{$medicament->mode_duree_use}}</textarea>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-2 mb-2">
                                            <label class="form-label">Quantité</label>
                                            <input type="text" class="form-control" name="quantity" value="{{$medicament->quantity}}">
                                        </div>
                                        <div class="col-md-10"></div>
                                        <div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-body mb-4">
                                                            <div class="d-flex flex-column align-items-center text-center">
                                                                {!! Form::file('image',array('onchange'=>'previewFile()','class'=>'hide input-file','id'=>'image_medicament')) !!}
                                                                <img src="{{!is_null($medicament->image) && $medicament->image != '' ? $medicament->image : assets/images/medicaments/medicament.jpg}}" id="previewImg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-info text-white w-40 change-image">Modifier l'image</button>
                                        </div>
                                        <hr/>
                                        <div class="col-12">
                                            <input type="hidden" name="medicament_id" value="{{$medicament->id}}">
                                            <button type="submit" class="btn btn-primary px-5">Enregistrer</button>
                                            <button type="button" class="btn btn-danger px-5 cancel-edit">Annuler</button>
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

@section('style')
<style type="text/css">
    .hide {
        display: none;
    }
    #previewImg {
      cursor: pointer;
      width: 100%;
      height: auto;
    }
</style>
@endsection

@section('script')

    <script src="assets/plugins/datetimepicker/js/legacy.js"></script>
    <script src="assets/plugins/datetimepicker/js/picker.js"></script>
    <script src="assets/plugins/datetimepicker/js/picker.time.js"></script>
    <script src="assets/plugins/datetimepicker/js/picker.date.js"></script>
    <script src="assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
    <script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>

    <script>

        function previewFile() {
            var preview = document.querySelector('#previewImg');
            var file    = document.querySelector('input[type=file]').files[0];
            var reader  = new FileReader();

            reader.addEventListener("load", function () {
              preview.src = reader.result;
            }, false);

            if (file) {
            reader.readAsDataURL(file);
            }
        }

        $(document).ready( function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click','#previewImg',function(e) {
                $('.input-file').click();
            });

            $(document).on('click','.change-image',function(e) {
                $('.input-file').click();
            });

            $(document).on('click','.cancel-edit',function(e) {
                window.location.href = "/list-medicaments";
            });

            $("#medicamentsForm").submit(function(e) {
                e.preventDefault();
                var data_medicament = $("#medicamentsForm").serialize();
                var formData = new FormData();
                formData.append('_method','put');
                formData.append('data_medicaments',data_medicament);
                formData.append('file', $('#image_medicament')[0].files[0]);
                    $.ajax({
                         type:"POST",
                         url:"/medicament-modification",
                         data:formData,
                         processData: false,
                         contentType: false,
                         success:function(res) {
                            toastr.success("Votre médicament a été modifiéé avec succès.");
                            setTimeout(function() {
                            window.location.href = "/list-medicaments";
                            },2000);
                         }
                    });

            });

        });
    </script>
@endsection



