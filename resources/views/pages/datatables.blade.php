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
<!-- Hero -->

<!-- END Hero -->

<!-- Page Content -->
<div class="content header-title-content">
    <div class="block-content block-content-full ">
            <div class="d-flex justify-content-between align-items-center">
            <h5 class="flex-grow-1 fw-semibold my-2 my-sm-3">
                <img class="profile-user-img img-fluid img " src="{{asset('images/group.png')}}" alt="avatar"
                    style="width: 30px;border-radius: 50%"> Liste des personnels
            </h5>
        <a href="{{ route('users.create.index') }}" class="btn btn-14 btn-outline-info radius-30 mt-2 mt-lg-0 " type="button">
            <img class="profile-user-img img-fluid img" src="{{asset('images/add-group.png')}}" alt="avatar"
                style="width: 22px;">
            Nouveau personnel </a>
        <br>
     </div>



        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded mb-4 p-4">


            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">

                <thead>
                    <tr>
                        <th class="text-center" style="width: 7%;"></th>
                        <th style="width: 25%;">Nom et Prénom</th>
                        <th style="width: 15%;">Roles</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                        <th style="width: 35%;">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )

                    <tr>
                        <td class="text-center"> <img class="profile-user-img img-fluid img rounded-circle "
                                src="{{asset('images/user.png')}}" alt="avatar" style="width: 30px;"></td>
                        <td class="text-center">
                            <a href="javascript:void(0)"> {{ $user->first_name }} {{ $user->last_name }}</a>
                        </td>
                        <td class="text-center">
                            <ul style="list-style: none;padding: 0;">
                          @foreach ($user->roles as $role)
                              <li>
                                <span class="badge badge-primary" style="background: #e04f1a;">
                                    {{ $role->name }}
                                </span>
                            </li>
                          @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            {{ $user->email }}
                        </td>
                        <td class="text-center">

                            <a href="{{ route('users.edit.index', $user->id) }}" class="btn btn-secondary "
                                role="button" style="font-size: 12px;width: 80px;">Editer
                            </a>

                            <a class="btn btn-danger delete-user" href="#" data-url="{{ route('users.delete', $user->id) }}" style="font-size: 12px;width: 80px;">
                                Supprimer
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
    $(document).on('click','.delete-user',function(event){
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
