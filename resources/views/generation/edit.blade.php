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

<div class="row">
    <div class="col-md-6 col-md-offset-3 portlets ui-sortable">
        <div class="widget">
            <div class="widget-header transparent">
                <h2><strong>Generations</strong></h2>
            </div>
            <div class="widget-content padding">
                <div id="basic-form">
                    <form action="{{ route('edit.get_edit_generation',$generation->id) }}" method="POST" role="form">

                        <div class="form-group @if($errors->has('type_id')) has-error @endif">
                            {{ Form::label('type_id','Types : ')}}
                            {{ Form::select('type_id',$types, null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group @if($errors->has('date')) has-error @endif">
                            <label for="date">Date</label>
                            <input type="text" class="form-control datepicker-input" value="{{ $generation->date }}"
                                name="date" data-mask="9999-99-99">
                            @if($errors->has('date')) <div class="help-block">
                                {{ $errors->first('date') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group @if($errors->has('nfacture')) has-error @endif">
                            <label for="nfacture">N°Facture</label>
                            <input type="text" class="form-control" value="{{ $generation->nfacture }}" name="nfacture">
                            @if($errors->has('nfacture')) <div class="help-block">
                                {{ $errors->first('nfacture') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group @if($errors->has('quantite')) has-error @endif">
                            <label for="quantite">Quantité</label>
                            <input type="text" class="form-control" value="{{ $generation->quantite }}" name="quantite"
                                data-mask="999999" placeholder="999999">
                            @if($errors->has('quantite')) <div class="help-block">
                                {{ $errors->first('quantite') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group @if($errors->has('prix_uni')) has-error @endif">
                            <label for="prix_uni">Prix Unitaire</label>
                            <input type="text" class="form-control" value="{{ $generation->prix_uni }}" name="prix_uni"
                                data-mask="999999" placeholder="999999">
                            @if($errors->has('prix_uni')) <div class="help-block">
                                {{ $errors->first('prix_uni') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group @if($errors->has('fourni')) has-error @endif">
                            <label for="fourni">Fournisseur</label>
                            <input type="text" class="form-control" value="{{ $generation->fourni }}" name="fourni">
                            @if($errors->has('fourni')) <div class="help-block">
                                {{ $errors->first('fourni') }}
                            </div>
                            @endif
                        </div>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

endsection

@section("script")
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/plugins/select2/js/select2.min.js"></script>
@endsection
