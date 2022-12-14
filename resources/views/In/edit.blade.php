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
            <div class="d-flex justify-content-between align-items-center">
            <h5 class="flex-grow-1 fw-semibold my-2 my-sm-3">
                <img class="profile-user-img img-fluid img " src="{{asset('images/group.png')}}" alt="avatar"
                    style="width: 30px;border-radius: 50%"> Editer Entres
            </h5>
        <br>
     </div>
      <div class="row">
        <div class="col-xl-10 mx-auto portlets ui-sortable">
						<div class="card border-top border-0 border-4 border-primary">
							<div class="widget-content padding card-body px-5">
								<div id="basic-form" >
                                    <form action="{{ route('entres.edit.update',$entres->id) }}" method="POST" role="form">
                                        @csrf

                    <div class="form-group @if($errors->has('type_id')) has-error @endif">

                  </div>
                  <div class="form-group @if($errors->has('date')) has-error @endif">
                  <label for="date">Date</label>
                  <input type="text" class="form-control datepicker-input" value="{{ $entres->date }}"  name="date" data-mask="9999-99-99">
                    @if($errors->has('date')) <div class="help-block">
                       {{ $errors->first('date') }}
                    </div>
                  @endif
                </div>
                    <div class="form-group @if($errors->has('nfacture')) has-error @endif">
										<label for="nfacture">N?? Facture</label>
										<input type="text" class="form-control" value="{{ $entres->nfacture }}" name ="nfacture">
                    @if($errors->has('nfacture')) <div class="help-block">
                       {{ $errors->first('nfacture') }}
                    </div>
                  @endif
                    </div>
                    <div class="form-group @if($errors->has('quantite')) has-error @endif">
                    <label for="quantite">Quantit??</label>
                    <input type="text" class="form-control" value="{{ $entres->quantite }}" name="quantite" data-mask="999999" placeholder="999999">
                    @if($errors->has('quantite')) <div class="help-block">
                       {{ $errors->first('quantite') }}
                    </div>
                  @endif
                  </div>
                  <div class="form-group @if($errors->has('prix_uni')) has-error @endif">
                  <label for="prix_uni">Prix Unitaire</label>
                  <input type="text" class="form-control" value="{{ $entres->prix_uni }}" name="prix_uni" data-mask="999999" placeholder="999999">
                  @if($errors->has('prix_uni')) <div class="help-block">
                     {{ $errors->first('prix_uni') }}
                  </div>
                @endif
                </div>
                <div class="form-group @if($errors->has('fourni')) has-error @endif">
                <label for="fourni">Fournisseur</label>
                <input type="text" class="form-control" value="{{ $entres->fourni }}" name ="fourni">
                @if($errors->has('fourni')) <div class="help-block">
                   {{ $errors->first('fourni') }}
                </div>
              @endif
                </div>
                <div style="text-align: right">
                <input type="hidden" name="fiche_id" value="{{$entres->id}}">
                									  <button type="submit" class="btn btn-sm btn-primary" style="width: 150px">Submit</button>
                </div>
								</div>
							</div>
						</div>
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
                                  toastr.success("Votre fiche d'accueil a ??t?? cr???? avec succ??s.");
                                  setTimeout(function() {
                                  window.location.href = "/fiches_accueil";
                                  },2000);
                               }
                          });

                  });

              });*/
      </script>
      @endpush
