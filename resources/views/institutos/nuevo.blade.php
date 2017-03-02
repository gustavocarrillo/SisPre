@extends('admin.plantilla')

@section('js')
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/pages/form_layouts.js')}}"></script>
@endsection

@section('contenido')
    <div class="col-lg-8">
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
    <form action="{{ route('institutos-guardado') }}" method="post" class="form-horizontal">
        {{csrf_field()}}
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Registrar Instituto<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
            </div>

            <div class="panel-body">

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre:</label>
                    <div class="col-lg-9">
                        <input type="text" name="nombre" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Sector:</label>
                    <div class="col-lg-9">
                        <input type="text" name="sector" class="form-control" placeholder="">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Programa:</label>
                    <div class="col-lg-9">
                        <input type="text" name="programa" class="form-control" placeholder="">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-4 control-label">Sub Programa:</label>
                    <div class="col-lg-8">
                        <input type="text" name="sub_programa" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Proyecto:</label>
                    <div class="col-lg-9">
                        <input type="text" name="proyecto" class="form-control" placeholder="">
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Actividad:</label>
                    <div class="col-lg-9">
                        <input type="text" name="actividad" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Operación:</label>
                    <div class="col-lg-9">
                        <input type="text" name="operacion" class="form-control" placeholder="">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Dirección:</label>
                    <div class="col-lg-9">
                        <input type="text" name="direccion" class="form-control" placeholder="">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Responsable:</label>
                    <div class="col-lg-9">
                        <input type="text" name="responsable" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary legitRipple">Registrar Instituto<i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
        </div>
    </form>
    </div>
@endsection