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
            <h5 class="panel-title">Compromisos <strong>{{ \App\MisHelpers\MisHelpers::_Instituto() }}</strong></h5>
        </div>

        <table class="table datatable-scroll-y" width="100%">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Tipo</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                    <th>Partida</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($compromisos as $cp)
            <tr @if($cp->anulada == 's') style="color: red; font-weight: 500" @endif>
                <td>{{ $cp->numero }}</td>
                <td>{{ strtoupper($cp->tipo) }}</td>
                <td>{{ strtoupper($cp->monto) }}</td>
                <td>{{ strtoupper(date('d-m-Y',strtotime($cp->fecha))) }}</td>
                <td>{{ $cp->partida}}</td>
                <td class="text-center">
                    <ul class="icons-list">
                        <li class="text-green-600"><a href="{{ route('compromisos-ver',$cp->id) }}"><i class="icon-file-eye2"></i></a></li>
                        <li class="text-primary-600"><a href="{{ route('compromisos-editar',$cp->id) }}"><i class="icon-pencil7"></i></a></li>
                        <li class="text-danger-600"><a class="eliminar" id="{{ $cp->id }}"><i class="icon-trash"></i></a></li>
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