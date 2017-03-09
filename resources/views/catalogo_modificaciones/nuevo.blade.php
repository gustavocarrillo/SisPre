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
    <form action="{{ route('catalogoModif-guardado') }}" method="post" class="form-horizontal">
        {{csrf_field()}}
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Nueva Modificación</strong><a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
            </div>

            <div class="panel-body">

                <div class="form-group">
                    <label class="col-lg-4 control-label">Nombre:</label>
                    <div class="col-lg-7">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Tipo:</label>
                    <div class="col-lg-7">
                        <select name="tipo" id="tipo" class="form-control" placeholder="" required>
                            <option value="a">Adición</option>
                            <option value="x">X</option>
                            <option value="d">Disminución</option>
                        </select>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary legitRipple">Crear Modificación<i class="icon-arrow-right14 position-right"></i></button>
                </div>
        </div>
        </div>
    </form>
    </div>
@endsection

@section('js_pie')

@endsection