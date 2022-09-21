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
  <div class="row">
  <div class="col-md-12">
    <div class="widget clearfix">
      <div class="widget-header transparent clearfix">
        <h3 style="font-size: 16px;margin-top: 15px;margin-bottom: 10px"><strong>New</strong> Type</h3>
      </div>
      <div class="widget-content padding clearfix">
        <div id="basic-form">
          <form action="{{ route('type.create.store') }}" method="POST" role="form" style="display: inline-flex;width: 100%;">
         <div class="col-md-10">
          <div class="form-group @if($errors->has('name')) has-error @endif">
          <input type="text" class="form-control"  name="name">
          </div>
        </div>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
        <button type="submit" class="btn btn-primary pull-left btn-regist">Enregistrer</button>
      </form>
    </div>
  </div>
            </div>
      </div>
      <hr/>
      <div class="col-md-12">
        <div class="widget">
          <div class="widget-header transparent">
          </div>
          <div class="widget-content">
            <div class="table-responsive">
              <table data-sortable class="table table-bordered table-light">
                <thead>
                  <tr>
                    <th style="width: 20%;">N°</th>
                    <th style="width: 30%;">Nom</th>
                    <th style="width: 30%;">Crée à</th>
                    <th style="width: 20%;">Actions</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($types as $type)
                  <tr>
                    <td>
                      {{ $type->id }}
                    </td>
                    <td>
                      <a href="{{ route('type.create.index',$type->id) }}">{{ $type->name }}</a>
                    </td>
                    <td>
                      {{ date('d/m/Y H:i',strtotime($type->created_at)) }}
                    </td>
                    <td style="text-align: center;">
                        <a href="#" data-url="{{ route('type.delete', $type->id) }}" class="btn btn-danger delete-type" style="font-size: 12px;width: 100px;line-height: 1;">
                         Supprimer
                        </a>
                      </td>
                  </tr>
                @endforeach
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
    @push('js_after')
<script>
    $(document).on('click','.delete-type',function(event){
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
