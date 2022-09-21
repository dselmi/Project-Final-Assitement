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
<div class="row">
    <div class="col-md-6 col-md-offset-3 portlets ui-sortable">
        <div class="widget">
            <div class="widget-header transparent">
                <h2><strong>Modifier</strong> sorties</h2>
            </div>
            <div class="widget-content padding">
                <div id="basic-form">
                    <form action="{{ route('sorties.edit.update',$sorties->id) }}" method="POST" role="form">
                        @csrf

                </div>
                <div class="form-group ">
                    <label for="date">Date</label>
                    <input type="text" class="form-control" name="date"  value="{{$sorties->date}}">


                </div>
                <div class="form-group ">
                    <label for="nfacture">N°Facture</label>
                    <input type="text" class="form-control" value="{{ $sorties->nfacture }}" name="nfacture">

                </div>
                <div class="form-group @if($errors->has('quantite')) has-error @endif">
                    <label for="quantite">Quantité</label>
                    <input type="text" class="form-control" value="{{ $sorties->quantite }}" name="quantite"
                        data-mask="999999" placeholder="999999">
                    @if($errors->has('quantite')) <div class="help-block">
                        {{ $errors->first('quantite') }}
                    </div>
                    @endif
                </div>
                <div class="form-group @if($errors->has('prix_uni')) has-error @endif">
                    <label for="prix_uni">Prix Unitaire</label>
                    <input type="text" class="form-control" value="{{ $sorties->prix_uni }}" name="prix_uni"
                        data-mask="999999" placeholder="999999">
                    @if($errors->has('prix_uni')) <div class="help-block">
                        {{ $errors->first('prix_uni') }}
                    </div>
                    @endif
                </div>
                <div class="form-group @if($errors->has('fourni')) has-error @endif">
                    <label for="fourni">Fournisseur</label>
                    <input type="text" class="form-control" value="{{ $sorties->fourni }}" name="fourni">
                    @if($errors->has('fourni')) <div class="help-block">
                        {{ $errors->first('fourni') }}
                    </div>
                    @endif
                </div>
                <div>

                <button type="submit" class="btn btn-primary px-5">Enregistrer</button>
                </div>
                </form>
            </div>
        </div>
    </div>

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
