@extends('admin.plantilla')

@section('js')
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/pages/form_layouts.js')}}"></script>
@endsection

@section('contenido')
    <div class="col-lg-10">

    @include('flash::message')

    @if (count($errors) > 0)
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
    @endif

        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title"><strong>{{ \App\MisHelpers\MisHelpers::_Instituto() }}</strong><a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
            </div>

            <div class="panel-body">

            <div class="col-lg-6">
                <div class="row">
                    <label class="col-xs-3 control-label"><strong>SECTOR:</strong></label>
                </div>
                <div class="row">
                    <label class="col-xs-9 control-label label-striped">{{ $instituto->sector }}</label>
                </div>

                <div class="row">
                    <label class="col-xs-3 control-label"><strong>PROGRAMA:</strong></label>
                </div>
                <div class="row">
                    <label class="col-xs-9 control-label label-striped">{{ $instituto->programa }}</label>
                </div>

                <div class="row">
                    <label class="col-xs-4 control-label"><strong>SUB PROGRAMA:</strong></label>
                </div>
                <div class="row">
                    <label class="col-xs-9 control-label label-striped">{{ $instituto->sub_programa }}</label>
                </div>

                <div class="row">
                    <label class="col-xs-3 control-label"><strong>PROYECTO:</strong></label>
                </div>
                <div class="row">
                    <label class="col-xs-9 control-label label-striped">{{ $instituto->proyecto }}</label>
                </div>

                <div class="row">
                    <label class="col-xs-3 control-label"><strong>ACTIVIDAD:</strong></label>
                </div>
                <div class="row">
                    <label class="col-xs-9 control-label label-striped">{{ $instituto->actividad }}</label>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="row">
                    <label class="col-xs-3 control-label"><strong>OPERACIÓN:</strong></label>
                </div>
                <div class="row">
                    <label class="col-xs-9 control-label label-striped">{{ $instituto->operacion }}</label>
                </div>

                <div class="row">
                    <label class="col-xs-3 control-label"><strong>DIRECCIÓN:</strong></label>
                </div>
                <div class="row">
                    <label class="col-xs-9 control-label label-striped">{{ $instituto->direccion }}</label>
                </div>

                <div class="row">
                    <label class="col-xs-3 control-label"><strong>RESPONSABLE:</strong></label>
                </div>
                <div class="row">
                    <label class="col-xs-9 control-label label-striped">{{ $instituto->responsable }}</label>
                </div>

                <div class="row">
                    <label class="col-xs-3 control-label"><strong>FINALIZADO?</strong></label>
                </div>
                <div class="row">
                    <label class="col-xs-9 control-label label-striped">@if($instituto->final == 'S') SI @else NO @endif</label>
                </div>
            </div>

        </div>
        </div>
        <div class="panel panel-flat">
            <div class="panel-body">
                <div class="text-center">
                    <a href="{{ route('institutos-editar',Auth::user()->id_instituto) }}" class="btn btn-primary btn-rounded legitRipple"></i>Modificar Instituto<i class="glyphicon glyphicon-pencil position-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection