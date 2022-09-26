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
<!-- Page Content -->
<div class="content header-title-content">
    <!-- Info -->

    <!-- END Info -->
    <div class="block-content block-content-full ">
            <div class="d-flex justify-content-between align-items-center">
            <h5 class="flex-grow-1 fw-semibold my-2 my-sm-3">
                <img class="profile-user-img img-fluid img " src="{{asset('images/group.png')}}" alt="avatar"
                    style="width: 30px;border-radius: 50%"> Liste des fiches d'acceuil
            </h5>
        <a href="{{ route('sheet.create.index') }}" class="btn btn-14 btn-outline-info radius-30 mt-2 mt-lg-0 " type="button">
            <img class="profile-user-img img-fluid img" src="{{asset('images/add-group.png')}}" alt="avatar"
                style="width: 22px;">
            Nouvelle fiche d'acceuil </a>
        <br>
            </div>
        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded mb-4 p-4">

            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">

                <thead>
                    <tr>
                        <th>Accueillante</th>
                        <th>Femme</th>
                        <th>Date de naissance</th>
                        <th>Etat civil</th>
                        <th>Orienté par</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($fiches as $fiche)
                    <tr>
                        <td>{{$fiche->accueillante->last_name}} {{$fiche->accueillante->first_name}}</td>
                        <td>{{$fiche->femme}}</td>
                        <td>{{$fiche->naissance}}</td>
                        <td>{{$fiche->etat_civil}}</td>
                        <td>{{$fiche->oriente_par}}</td>
                        <td class="block text-center">

                            <a href="{{ route('ecoute.create.index', $fiche->id) }}" class="btn btn-warning "
                                role="button"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                 <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                 <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                               </svg>
                            </a>

                            <a href="{{ route('sheet.rdv', $fiche->id) }}" class="btn btn-outline-secondary "
                                role="button"> <img class="profile-user-img img-fluid img" src="{{asset('images/appointment.png')}}" alt="avatar"
                                style="width: 30px;">
                            </a>
                            <a href="{{ route('sheet.edit.index', $fiche->id) }}" class="btn btn-outline-secondary "
                                role="button"> <img class="profile-user-img img-fluid img" src="{{asset('images/bouton-modifier.png')}}" alt="avatar"
                                style="width: 25px;">
                            </a>

                            <a class="btn btn-outline-danger delete-fiche" href="#"
                                data-url="{{ route('sheet.delete', $fiche->id) }}">
                                <img class="profile-user-img img-fluid img" src="{{asset('images/supprimer.png')}}" alt="avatar"
                                style="width: 25px;">
                            </a>

                            <a href="{{ Route('sheet.pdf', $fiche->id) }}" class="btn">
                                <img class="profile-user-img img-fluid img " src="{{asset('images/telecharger-le-pdf.png')}}" alt="avatar"
                            style="width: 25px;">
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
</div>
<!-- END Page Content -->
@endsection
@push('js_after')
<script>
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
