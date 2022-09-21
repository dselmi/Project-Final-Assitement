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
        <hr />
        <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body p-5">
                <form id="FicheGardeForm" action="{{ route('garde.edit.update',$fiche->id) }}" method="post" class="row g-3">
                    @csrf
                    <div class="col-md-8">
                        <b for="date" class="form-label">Date: </b>
                        <input type="text" class="form-control" name="date" value="{{$fiche->date}}" id="date">

                    </div>
                    <div class="col-12">
                        <b for="activities" class="form-label">Activités: </b>
                        <textarea class="form-control" id="activities" name="activities">{{$fiche->activities}}</textarea>

                    </div>
                    <div class="col-12">
                        <b for="demande" class="form-label">Demande:</b>
                        <textarea class="form-control" id="demande" name="demande" >{{$fiche->demande}}</textarea>
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
@endsection
