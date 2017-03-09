@extends('admin.plantilla')

@section('js')
    <script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery_ui/interactions.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/form_layouts.js')}}"></script>
@endsection

@section('contenido')
    <div class="col-lg-4">
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
        <form action="{{ route('origenFondos-editado') }}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{ $modif->id }}">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Editar Modificación</strong><a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                </div>

                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-lg-4 control-label">Nombre:</label>
                        <div class="col-lg-7">
                            <input type="text" name="nombre" value="{{ $modif->nombre }}" id="nombre" class="form-control" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">Nombre:</label>
                        <div class="col-lg-7">
                            <select name="tipo" value="{{ $modif->tipo }}" id="tipo" class="form-control text-right" required>
                                    <option value="A" @if($modif->tipo == 'Adición') selected @endif>Adición</option>
                                    <option value="T" @if($modif->tipo == 'T') selected @endif>T</option>
                                    <option value="D" @if($modif->tipo == 'Disminución') selected @endif>Disminución</option>

                            </select>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary legitRipple">Modificar Origen de Fondos<i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js_pie')

@endsection