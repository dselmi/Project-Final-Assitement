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
          <div class="breadcrumb-title pe-3">Médicament</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Médicament Details</li>
              </ol>
            </nav>
          </div>
        </div>
        <!--end breadcrumb-->

         <div class="card">
          <div class="row g-0">
            <div class="col-md-4 border-end">
            <div class="image-zoom-section">
              <div class="product-gallery owl-carousel owl-theme border p-3" data-slider-id="1">
                <div class="item">
                  <img src="{{!is_null($medicament->image) && $medicament->image != '' ? $medicament->image : assets/images/medicaments/medicament.jpg}}" class="img-fluid" alt="">
                </div>
              </div>
            </div>
            </div>
            <div class="col-md-8">
            <form id="orderForm" class="row g-3">
            <div class="card-body">
              <h4 class="card-title">{{$medicament->title}}</h4><br><br>
              <div class="mb-3">
              <span class="h4">Description:</span>
              <p class="card-text fs-6">{{$medicament->description}}</p>
              <hr>
              <div class="row row-cols-auto align-items-center mt-3">
              @if($medicament->quantity == 0)
              <h3 class="text-danger">En repture de stock</h3>
              @else
               @if($userauth->roles[0]->slug == "accompagnatrice")
              <div class="col">
                <label class="form-label">Quantité</label>
                <select class="form-select form-select-sm" name="quantity">
                  @for($i=1;$i<=$medicament->quantity;$i++)
                  <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
              </div>
               @endif
              @endif

            </div>
            <!--end row-->
            @if($medicament->quantity > 0 && $userauth->roles[0]->slug == "accompagnatrice")
            <div class="d-flex gap-2 mt-3">
              <button type="submit" class="btn btn-primary"><i class="bx bxs-cart-add"></i>Commander</button>
            </div>
            <input type="hidden" name="medicament_id" value="{{$medicament->id}}">
            @endif
            </div>
            </div>
          </form>
          </div>
                    <hr/>
          <div class="card-body">
            <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#mode_duree_use" role="tab" aria-selected="true">
                  <div class="d-flex align-items-center">
                    <div class="tab-icon"><i class='bx bx-comment-detail font-18 me-1'></i>
                    </div>
                    <div class="tab-title"> Mode et durée d'utilisation </div>
                  </div>
                </a>
              </li>
            </ul>
            <div class="tab-content pt-3">
              <div class="tab-pane fade show active" id="mode_duree_use" role="tabpanel">
                <p>{{$medicament->mode_duree_use}}</p>
              </div>
            </div>
          </div>

          </div>


      </div>
    </div>
    <!--end page wrapper -->
    @endsection
    @section("script")
    <script src="assets/plugins/OwlCarousel/js/owl.carousel.min.js"></script>
    <script src="assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js"></script>
    <script src="assets/js/product-details.js"></script>

    <script>

        $(document).ready( function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $("#orderForm").submit(function(e) {
                e.preventDefault();
                var data_order = $("#orderForm").serialize();
                var formData = new FormData();
                formData.append('_method','post');
                formData.append('data_order',data_order);
                    $.ajax({
                         type:"POST",
                         url:"/commande-registration",
                         data:formData,
                         processData: false,
                         contentType: false,
                         success:function(res) {
                            toastr.success("Votre commande a été créé avec succès.");
                            setTimeout(function() {
                            window.location.href = "/commandes";
                            },2000);
                         }
                    });

            });

        });
    </script>
@endsection
