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
          <div class="breadcrumb-title pe-3">Médicaments</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Commandes</li>
              </ol>
            </nav>
          </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
          <div class="card-body">
            @if(count($orders) > 0)
            <!-- <div class="d-lg-flex align-items-center mb-4 gap-3">
              <div class="position-relative">
                <input type="text" class="form-control ps-5 radius-30" placeholder="Recherche Commande"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
              </div>
            </div> -->
            <div class="table-responsive">
              <table class="table mb-0">
                <thead class="table-light">
                  <tr>
                    <th>N° commande</th>
                    <th>Nom de médicament</th>
                    <th>Quantité</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="ms-2">
                          <h6 class="mb-0 font-14">{{$order->number}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>{{$order->medicament->title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>
                      @php
                      $class = "text-warning bg-light-warning";
                      if($order->status == 'Confirmé')
                      $class = "text-info bg-light-info";
                      if($order->status == 'Rejetée')
                      $class = "text-danger bg-light-danger";
                      if($order->status == 'Reçue')
                      $class = "text-success bg-light-success";
                      @endphp
                      <div class="badge rounded-pill p-2 text-uppercase px-3 {{$class}}"><i class='bx bxs-circle me-1'></i>{{$order->status}}
                      </div>
                    </td>
                    <td>{{$order->created_at}}</td>
                    <td>
                      <div class="d-flex order-actions">
                        @if($order->status == 'En attente' && auth()->user()->hasRole(7))
                        <button type="button" class="btn btn-success accept-order mx-4" id="accept-order-{{$order->id}}" data-bs-toggle="modal" data-bs-target="#accept-modal" data-id="{{$order->id}}">Accepter</button>
                        <button type="button" class="btn btn-danger accept-order mx-4" id="reject-order-{{$order->id}}" data-bs-toggle="modal" data-bs-target="#reject-modal" data-id="{{$order->id}}">Réjeter</button>
                        @endif
                        @if($order->status != 'Confirmé' && auth()->user()->hasRole(6))
                        <button type="button" class="btn btn-danger delete-order mx-4" id="order-{{$order->id}}" data-bs-toggle="modal" data-bs-target="#supprimer-modal" data-id="{{$order->id}}"><i class="bx bx-trash mr-1"></i></button>
                        @endif
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
                    <h6 class="mb-0 text-dark">Aucune commande trouvée</h6>
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
                                                            <h5 class="modal-title">Suppression commande</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Voulez vous supprimer cette commande</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="button" class="btn btn-danger" id="delete">Supprimer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="accept-modal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Acceptation commande</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Voulez vous accepter cette commande ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="button" class="btn btn-success" id="accept">Accepter</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="reject-modal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Réjection commande</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Voulez vous rejeter cette commande ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="button" class="btn btn-danger" id="reject">Rejeter</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    <!--end page wrapper -->
    @endsection

    @section("script")
    <script>
        $(document).ready( function () {

            $('#supprimer-modal').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).attr('data-id');
                $(this).find('.modal-footer #delete').data('id',id);
                $(this).find('.modal-footer #delete').attr('data-id',id);
            });

            $('#accept-modal').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).attr('data-id');
                $(this).find('.modal-footer #accept').data('id',id);
                $(this).find('.modal-footer #accept').attr('data-id',id);
            });

            $('#reject-modal').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).attr('data-id');
                $(this).find('.modal-footer #reject').data('id',id);
                $(this).find('.modal-footer #reject').attr('data-id',id);
            });

           $('#supprimer-modal').find('.modal-footer #delete').on('click', function(e){
              var id = parseInt($("#delete").data("id"));

                $.ajax({
                         type:"POST",
                         dataType: "json",
                         url:"/commande/"+id,
                         data:{"_method":"delete", "_token": "{{ csrf_token() }}"},
                         success:function(res) {

                            toastr.success("Commande a été supprimer avec succès.")

                            $('#supprimer-modal').modal('toggle');
                            var row = $("#order-"+id).closest('tr');
                            row.fadeOut("slow", function() {
                              $(this).remove();
                            });
                        }
                });

            });

            $('#accept-modal').find('.modal-footer #accept').on('click', function(e){
              var id = parseInt($("#accept").data("id"));

                $.ajax({
                         type:"POST",
                         dataType: "json",
                         url:"/accept-commande/"+id,
                         data:{"_method":"post", "_token": "{{ csrf_token() }}"},
                         success:function(res) {

                            toastr.success("Commande a été acceptée avec succès.")

                            $('#accept-modal').modal('toggle');
                            setTimeout(function() {
                            window.location.href = "/commandes";
                            },2000);
                        }
                });

            });

            $('#reject-modal').find('.modal-footer #reject').on('click', function(e){
              var id = parseInt($("#reject").data("id"));

                $.ajax({
                         type:"POST",
                         dataType: "json",
                         url:"/reject-commande/"+id,
                         data:{"_method":"post", "_token": "{{ csrf_token() }}"},
                         success:function(res) {

                            toastr.success("Commande a été réjetée avec succès.")

                            $('#reject-modal').modal('toggle');
                            setTimeout(function() {
                            window.location.href = "/commandes";
                            },2000);
                        }
                });

            });

        });
    </script>

    @endsection
