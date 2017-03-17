@extends('admin.plantilla')

@section('titulo')
    Registro de Usuarios
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/pages/form_layouts.js')}}"></script>
@endsection

@section('contenido')
    <div class="col-lg-6 col-lg-offset-3">
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
    <form action="{{ route('user-guardado') }}" method="post" class="form-horizontal">
        {{csrf_field()}}
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Registrar Nuevo Usuario<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
            </div>

            <div class="panel-body">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre:</label>
                    <div class="col-lg-9">
                        <input type="text" name="nombre" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Usuario:</label>
                    <div class="col-lg-9">
                        <input type="text" name="usuario" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Clave:</label>
                    <div class="col-lg-9">
                        <input type="password" name="clave" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Confirmar Clave:</label>
                    <div class="col-lg-8">
                        <input name="clave_confirmation" type="password" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-9">
                        <input type="email" name="email" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tipo:</label>
                    <div class="col-lg-9">
                        <select  class="form-control" name="tipo">
                            <option value="instituto" selected>INSTITUTO</option>
                            <option value="administrador">ADMINISTRADOR</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nivel:</label>
                    <div class="col-lg-9">
                        <select  class="form-control" name="nivel">
                            <option value="transcriptor" selected>TRANSCRIPTOR</option>
                            <option value="director">DIRECTOR</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Estatus:</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="estatus">
                            <option value="activo" selected>ACTIVO</option>
                            <option value="inactivo">INACTIVO</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Instituto:</label>
                    <div class="col-lg-9">
                        <select  class="form-control" name="instituto">
                            @foreach($institutos as $inst)
                                <option value="{{ $inst->id }}">{{ $inst->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{--<div class="form-group">
                    <label class="col-lg-3 control-label">Genero:</label>
                    <div class="col-lg-9">
                        <label class="radio-inline">
                            <div class=""><span class="checked"><input type="radio" class="styled" name="gender" checked="checked"></span></div>
                            Hombre
                        </label>

                        <label class="radio-inline">
                            <div class=""><span><input type="radio" class="styled" name="gender"></span></div>
                            Mujer
                        </label>
                    </div>
                </div>--}}

                <div class="form-group">
                    <label class="col-lg-3 control-label">Foto:</label>
                    <div class="col-lg-9">
                        <div class="uploader">
                            <input type="file" class="file-styled">
                        </div>
                        <span class="help-block">Formatos soportados: png, jpg. Tamaño maximo 2Mb</span>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary legitRipple">Crear Usuario<i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection