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
<div class="content header-title-content">
<div class="block-content block-content-full ">
<div class="row">

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <h2 class="text-center" style="margin-top: 15px;font-size: 30px;"><code>Entres</code></h2>

                <div class="additional-btn" style="text-align: right">
                    <a href="{{ route('entres.create.index') }}"><button
                            class="btn btn-sm btn-primary pull-right" style="width: 150px">Ajouter</button></a>
                </div>
            </div>
            <div class="widget-content">
                <br>
                <div class="table-responsive">
                    <form class='form-horizontal' role='form'>
                        <table id="datatables-1" class="table table-striped table-bordered table-light" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>N° Facture</th>
                                    <th>Quantite</th>
                                    <th>Prix Unitaire</th>
                                    <th>Fournisseur</th>
                                    <th>Solde</th>
                                    <th>Options</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach($entres as $entre)
                                <tr>
                                    <td>{{ $entre->type->name }}</td>
                                    <td>{{ date('d/m/Y',strtotime($entre->date)) }}</td>
                                    <td>{{ $entre->nfacture }}</td>
                                    <td>{{ $entre->quantite}}</td>
                                    <td>{{ $entre->prix_uni}}</td>

                                    <td>{{ $entre->fourni }}</a></td>
                                    <td>{!! $entre->solde = $entre->quantite * $entre->prix_uni !!}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group btn-group-xs mr-2">
                                            <a href="{{ route('entres.edit.index',$entre->id) }}" style="margin-right: 5px; border-radius: 3px"
                                                class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                            <a href="#" data-url="{{ route('entres.delete', $entre->id) }}" style="border-radius: 3px"
                                                class="btn btn-sm btn-danger delete-entry ml-2"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection
@push("script")
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>


@endpush


@push('js_after')
<script>
    $(document).on('click','.delete-entry',function(event){
        event.preventDefault();
        let url = $(this).data('url')
        var csrf = $('meta[name="csrf-token"]').attr('content')
        $.ajax({
            beforeSend: function(xhr){
                return xhr.setRequestHeader('X-CSRF-TOKEN',csrf);
            },
            url,
            type:"delete",
            success:function(){
                location.reload()
            }
        })
    });
</script>
@endpush
