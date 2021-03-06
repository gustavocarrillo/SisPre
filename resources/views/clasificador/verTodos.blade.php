@extends('admin.plantilla')

@section('js')
    <script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    {{--<script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/bootbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
@endsection

@section('contenido')

    <div class="col-lg-12">

    @include('flash::message')

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Clasificador General</h5>
        </div>

        <table class="table datatable-scroll-y" width="100%">
            <thead>
                <tr>
                    <th>Partida</th>
                    <th>Denominación</th>

                    @if(Auth::user()->tipo == 'administrador')
                        <th class="text-center">Acciones</th>
                    @endif

                </tr>
            </thead>
            <tbody>

            @foreach($clasifGnral as $cg)
            <tr>
                <td>{{ $cg->partida }}</td>
                <td>{{ $cg->denominacion }}</td>

                @if(Auth::user()->tipo == 'administrador')
                    <td class="text-center">
                    <ul class="icons-list">
                        <li class="text-primary-600"><a href="{{ route('clasifGnral-editar',$cg->id) }}"><i class="icon-pencil7"></i></a></li>
                        <li class="text-danger-600"><a class="eliminar" id="{{ $cg->id }}"><i class="icon-trash"></i></a></li>
                        {{--<li class="text-teal-600"><a href="#"><i class="icon-cog7"></i></a></li>--}}
                    </ul>
                </td>
                @endif

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
            message:"Esta seguro de eleminar este Elemento?",
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