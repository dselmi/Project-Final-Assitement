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
<!-- Page Content -->
<div class="content content header-title-content">
<div class="block-content block-content-full ">
            <div class="d-flex justify-content-between align-items-center">
            <h5 class="flex-grow-1 fw-semibold my-2 my-sm-3">
                <img class="profile-user-img img-fluid img " src="{{asset('images/accueil.png')}}" alt="avatar"
                    style="width: 30px;border-radius: 50%"> Liste des rapports assistante sociale
            </h5>
            <select class="single-select fiche-accueil" id="fiche-accueil">
                <option value="0">Choisir une fiche d'accueil femme</option>
                @foreach($fiches_accueil as $fch)
                <option value="{{$fch->id}}">Fiche {{$fch->femme}}</option>
                @endforeach
            </select>
     </div>
    <div class="card">
        <div class="card-body">
            @if(count($rapports) > 0)
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Lieu</th>
                            <th>Rapport</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rapports as $rapports)
                        <tr>
                            <td>{{$rapports->date}}</td>
                            <td>{{$rapports->place}}</td>
                            <td>{{$rapports->rapport}}</td>

                            <td >


                                    <a href="{{ route('rapport_assistante.edit.index', $rapports->id) }}" class="btn btn-secondary "
                                        role="button"><img class="profile-user-img img-fluid img"
                                        src="{{asset('images/bouton-modifier.png')}}" alt="avatar" style="width: 25px;">
                                    </a>

                                    <a class="btn btn-danger delete-fiche" href="#"
                                        data-url="{{ route('rapport_assistante.delete', $rapports->id) }}">
                                        <img class="profile-user-img img-fluid img"
                                            src="{{asset('images/supprimer.png')}}" alt="avatar" style="width: 25px;">
                                    </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="col col-lg-4 alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-dark"><div class="font-35 text-dark"><img class="profile-user-img img-fluid img"
                        src="{{asset('images/info.png')}}" alt="avatar" style="width: 40px;">
                    </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-dark">Aucun rapport assistante sociale trouvé</h6>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="supprimer-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Suppression fiche de garde</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Voulez vous supprimer cette fiche de garde</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger" id="delete">Supprimer</button>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
@endsection

@push("script")
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<script>
    $(document).on('change','#fiche-accueil',function(){
        var url = "{{ route('rapport_assistante.create.index',':id') }}";
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
