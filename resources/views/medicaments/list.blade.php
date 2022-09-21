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
    <!--start page wrapper -->
    <div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Accueil</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Médicaments</li>
              </ol>
            </nav>
          </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
          <div class="card-body">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
              <!-- <div class="position-relative">
                <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
              </div> -->
              <div class="ms-auto"><a href="{{ url('/medicament-create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Nouveau Médicament</a></div>
            </div>
            @if(count($medicaments) > 0)
            <div class="table-responsive list-medicaments">
              <table class="table mb-0 list-medicaments">
                <thead class="table-light">
                  <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>quantity</th>
                    <th>Description</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($medicaments as $key => $medicament)
                  <tr>
                    <td>
                      {{$key +1}}
                      <img src="{{!is_null($medicament->image) && $medicament->image != '' ? $medicament->image : 'assets/images/medicaments/medicament.jpg'}}" class="rounded-circle p-1 border" width="45" height="45">
                    </td>
                    <td>{{$medicament->title}}</td>
                    <td>{{$medicament->quantity}}</td>
                    <td>
                      {{strlen($medicament->description) > 120 ? substr($medicament->description,0,120).'...' : $medicament->description}}
                    </td>
                    <td>
                      <div class="d-flex order-actions">
                        <button type="button" class="btn btn-success edit-medicament" data-id="{{$medicament->id}}"><i class="bx bx-edit mr-1"></i></button>
                        <button type="button" class="btn btn-danger delete-medicament mx-4" id="medicament-{{$medicament->id}}" data-bs-toggle="modal" data-bs-target="#supprimer-modal" data-id="{{$medicament->id}}"><i class="bx bx-trash mr-1"></i></button>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @else
            <div class="col col-lg-4 alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
              <div class="d-flex align-items-center">
                  <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                  </div>
                  <div class="ms-3">
                    <h6 class="mb-0 text-dark">Aucun médicament trouvé</h6>
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
                                                            <h5 class="modal-title">Suppression médicament</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Voulez vous supprimer ce médicament</p>
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

    @section('style')
    <style type="text/css">
        .list-medicaments tbody tr td{
            vertical-align: middle;
        }
      </style>
    @endsection

    @section("script")
    <script>
        $(document).ready( function () {

          $(document).on('click','.edit-medicament',function(e) {
              var id = $(this).attr('data-id');
              window.location.href = "/medicament-"+id;
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
                         url:"/medicament/"+id,
                         data:{"_method":"delete", "_token": "{{ csrf_token() }}"},
                         success:function(res) {

                            toastr.success("Médicament a été supprimer avec succès.")

                            $('#supprimer-modal').modal('toggle');
                            var row = $("#medicament-"+id).closest('tr');
                            row.fadeOut("slow", function() {
                              $(this).remove();
                            });
                        }
                });

            });
        });
    </script>

    @endsection
