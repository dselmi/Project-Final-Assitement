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
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" rel="stylesheet">
<!-- Page JS Code -->
<script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endpush

@section('content')
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create new message') }}
        </h2>
    </x-slot>
<div class="content header-title-content">
    <div class="block-content block-content-full" style="margin-top: 10px;">
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('messages.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <!-- Subject Form Input -->
                            <div>
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Subject</label>
                                <input id="subject" class="form-control block w-full mt-1" type="text" name="subject"
                                    :value="old('subject')" />
                            </div>
                            <!-- Recipients list -->
                            <form class="form-inline">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Recipient</label>

                                    <select name="recipient" class="form-control custom-select my-1 mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                    @foreach ($users['0'] as $user)
                                        <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Message Form Input -->
                            <div class="mt-4">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Message</label>
                                <textarea name="message" rows="6"
                                    class="block form-control w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('message') }}</textarea>
                            </div>
                            <!-- Submit Form Input -->
                            <div class="mt-4" style="text-align: right">
                                <button class="btn btn-sm btn-primary" style="width: 150px">Submit</button>
                            </div>
                        </div>
                    </form>

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

