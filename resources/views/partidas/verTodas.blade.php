@extends('admin.plantilla')

@section('js')
    <script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    {{--<script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/bootbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
@endsection

@section('contenido')
    @include('flash::message')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Partidas del instituto <strong>{{ $inst->nombre }}</strong></h5>
        </div>

        <table class="table datatable-scroll-y" width="100%">
            <thead>
            <tr>
                <th>Clasificador</th>
                <th>Monto Original</th>
                <th>Fecha de Creación</th>
                <th>Partida Post-Cierre</th>
                <th>Tipo de Gasto</th>
                <th>Origen de Fondos</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($partidas as $p)
            <tr>
                <td>{{ $p->partida }}</td>
                <td>{{ number_format($p->monto_original,2,',','.') }}</td>
                <td>{{ date('d-m-Y',strtotime($p->fecha_creacion)) }}</td>
                <td>@if($p->partida_alterna == 'n') NO @else SI @endif</td>
                <td>{{ $p->tipo_gasto }}</td>
                <td>{{ $p->nombre }}</td>
                <td class="text-center">
                    <ul class="icons-list">
                        <li class="text-primary-600"><a href="{{ route('partidas-editar',$p->id) }}"><i class="icon-pencil7"></i></a></li>
                        <li class="text-danger-600"><a class="eliminar" id="{{ $p->id }}"><i class="icon-trash"></i></a></li>
                        {{--<li class="text-teal-600"><a href="#"><i class="icon-cog7"></i></a></li>--}}
                    </ul>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js_pie')
    <script>
    $('.eliminar').on('click', function() {
       id = $(this).attr('id');
        //alert(id)
        bootbox.confirm({
            message:"Esta seguro de eleminar esta Partida?",
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