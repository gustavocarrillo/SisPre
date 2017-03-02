@extends('admin.plantilla')

@section('js')
    <script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    {{--<script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/bootbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
@endsection

@section('contenido')
    <div class="col-lg-9">
        @include('flash::message')
        <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Institutos</h5>
        </div>

        <table class="table datatable-scroll-y" width="100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Direccción</th>
                    <th>Responsable</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($institutos as $inst)
            <tr>
                <td>{{ $inst->nombre }}</td>
                <td>{{ $inst->direccion }}</td>
                <td>{{ $inst->responsable }}</td>
                <td class="text-center">
                    <ul class="icons-list">
                        <li class="text-primary-600"><a href="{{ route('institutos-editar',$inst->id) }}"><i class="icon-pencil7"></i></a></li>
                        <li class="text-danger-600"><a class="eliminar" id="{{ $inst->id }}"><i class="icon-trash"></i></a></li>
                        {{--<li class="text-teal-600"><a href="#"><i class="icon-cog7"></i></a></li>--}}
                    </ul>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection

@section('js_pie')
    <script>
    $('.eliminar').on('click', function() {
       id = $(this).attr('id');
        //alert(id)
        bootbox.confirm({
            message:"Esta seguro de eleminar este Instituto?",
            buttons:{
                confirm: {
                    label: 'Si',
                    classname: 'btn-primary'
                },
                cancel: {
                    label: 'No',
                    classname: 'btn-normal'
                }
            },
            callback: function(result){
                if(result == true) {
                    $(location).attr('href', 'eliminar/' + id);
                }
            }
        });
    });
    </script>
@endsection