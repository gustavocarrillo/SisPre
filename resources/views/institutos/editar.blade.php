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
    <form action="{{ route('institutos-editado') }}" method="post" class="form-horizontal">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{ $instituto->id }}">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Modificar Instituto<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
            </div>

            <div class="panel-body">

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre:</label>
                    <div class="col-lg-9">
                        <input type="text" name="nombre" value="{{ $instituto->nombre }}" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Sector:</label>
                    <div class="col-lg-9">
                        <input type="text" name="sector" value="{{ $instituto->sector }}" class="form-control" placeholder="">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Programa:</label>
                    <div class="col-lg-9">
                        <input type="text" name="programa" value="{{ $instituto->programa }}" class="form-control" placeholder="">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-4 control-label">Sub Programa:</label>
                    <div class="col-lg-8">
                        <input type="text" name="sub_programa" value="{{ $instituto->sub_programa }}" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Proyecto:</label>
                    <div class="col-lg-9">
                        <input type="text" name="proyecto" value="{{ $instituto->proyecto }}" class="form-control" placeholder="">
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Actividad:</label>
                    <div class="col-lg-9">
                        <input type="text" name="actividad" value="{{ $instituto->actividad }}" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Operación:</label>
                    <div class="col-lg-9">
                        <input type="text" name="operacion" value="{{ $instituto->operacion }}" class="form-control" placeholder="">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Dirección:</label>
                    <div class="col-lg-9">
                        <input type="text" name="direccion" value="{{ $instituto->direccion }}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Responsable:</label>
                    <div class="col-lg-9">
                        <input type="text" name="responsable" value="{{ $instituto->responsable }}" class="form-control" placeholder="">
                    </div>
                </div>

                @if(Auth::user()->nivel == 'director' && $instituto->final == 'N')
                <div class="form-group">
                    <label class="col-lg-3 control-label"><strong>Finalizado?</strong></label>
                    <div class="col-lg-9">
                        <select name="final" class="form-control">
                            <option value="S" @if($instituto->final == 'S') selected @endif>SI</option>
                            <option value="N" @if($instituto->final == 'N') selected @endif>NO</option>
                        </select>
                    </div>
                </div>
                @endif

                <div class="text-right">
                    <button type="submit" class="btn btn-primary legitRipple">Modificar Instituto<i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
        </div>
    </form>
    </div>
@endsection