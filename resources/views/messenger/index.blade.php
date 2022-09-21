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
        {{ __('Messages') }}
    </h2>
</x-slot>
<div class="content header-title-content">
    <div class="block-content block-content-full" style="margin-top: 10px;">
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($message = Session::get('success'))
                        <div class="w-full px-5 py-4 mb-5 bg-green-100 border-l-4 border-green-500">
                            {{ $message }}
                        </div>
                    @endif

                    <div class="grid grid-cols-12 gap-x-4">
                        <div style="text-align: right">
                            <a href="{{ route('messages.create') }}"
                                class="btn btn-sm btn-primary w-full p-2 text-center align-right" style="width: 200px">New
                                Message</a>
                        </div>
                        <div class="col-span-9">
                            <table class="table table-bordered min-w-full leading-normal">
                                <thead class="border-b bg-gray-50">
                                    <th style="text-align: center;"
                                        class="px-3 py-3 text-xs font-normal text-left text-black-500 uppercase align-middle">
                                        Sender</th>
                                    <th style="text-align: center;"
                                        class="px-3 py-3 text-xs font-normal text-left text-black-500 uppercase align-middle">
                                        Subject</th>
                                    <th style="text-align: center;"
                                       class="px-3 py-3 text-xs font-normal text-left text-black-500 uppercase align-middle">
                                       Message</th>
                                    <th style="text-align: center;width: 15%"
                                        class="px-3 py-3 text-xs font-normal text-left text-gray-500 uppercase align-middle">
                                        Actions
                                    </th>
                                </thead>
                                <tbody>
                                    <span class="badge badge-pill badge-info">

                                    @each('messenger.partials.thread', $threads, 'thread',
                                    'messenger.partials.no-threads')
                                    </span>
                                </tbody>
                            </table>
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

