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

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <h2 class="text-center"><strong>Generations</strong></h2>

            </div>
            <div class="widget-content">
                <br>
                <div class="table-responsive">
                    <form id="ficheForm" action="{{ route('generation.home') }}" method="get" class="row g-3">
                        @csrf
                        <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>Types</th>
                                    <th>Date</th>
                                    <th>N°=Facture</th>
                                    <th>Quantite</th>
                                    <th>Prix Unitaire</th>
                                    <th>Fournisseur</th>
                                    <th>Solde</th>
                                    <th>Options</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach($generation as $generations)


                                <tr class="generation">

                                    @if($generations->mode == 1)
                                    <script>
                                        $('.generation').addClass('color-generation-green');
                                    </script>
                                    @endif
                                    @if($generations->mode == 2)
                                    <script>
                                        $('.generation').addClass('color-generation-red');
                                    </script>
                                    @endif
                                    <td>{{ $generations->type->name }}</td>
                                    <td>{{ date('d/m/Y',strtotime($generations->date)) }}</td>
                                    <td>{{ $generations->nfacture }}</td>
                                    <td>{{ $generations->quantite}}</td>
                                    <td>{{ $generations->prix_uni}}</td>

                                    <td>{{ $generations->fourni }}</td>
                                    <td>{!! $generations->solde = $generations->quantite * $generations->prix_uni !!}
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            <a href="{{ route('generation.edit.index',$generations->id) }}"
                                                class="btn btn-default"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('generation.delete',$generations->id) }}"
                                                class="btn btn-default"><i class="fa fa-trash"></i></a>

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


@push("script")
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<script>
    $(document).on('change','#fiche-accueil',function(){
        var url = "{{ route('generation.home',':id') }}";
        url = url.replace(':id',$(this).val())
        window.location.href = url
    })
    $(document).ready(function() {
    $('#example').DataTable();
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
    $(document).on('click','.delete-fiche',function(event){
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
