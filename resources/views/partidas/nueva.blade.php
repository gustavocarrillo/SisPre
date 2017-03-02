@extends('admin.plantilla')

@section('js')
    <script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery_ui/interactions.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/form_select2.js') }}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/form_layouts.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/maskMoney.js') }}"></script>
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
    <form action="{{ route('partidas-guardada') }}" method="post" class="form-horizontal">
        {{csrf_field()}}
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Crear Partida para <strong>{{ $instituto->nombre }}</strong><a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
            </div>

            <div class="panel-body">

                <div class="form-group">
                    <label class="col-lg-4 control-label">Clasificador:</label>
                    <div class="col-lg-7">
                        <select name="clasificador" class="select-search">
                            @foreach($clsfGnral as $clsf)
                                <option value="{{ $clsf->id }}">{{ $clsf->partida }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Monto Original:</label>
                    <div class="col-lg-7">
                        <input type="text" name="monto_original" id="monto_original" class="form-control text-right" placeholder="" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Tipo de Gasto:</label>
                    <div class="col-lg-7">
                        <select name="tipo_gasto" class="select-search">
                            @foreach($tGastos as $tg)
                                <option value="{{ $tg->id }}">{{ $tg->tipo_gasto }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Origen Fondos:</label>
                    <div class="col-lg-7">
                        <select name="origen_fondos" class="select-search">
                            @foreach($oFondos as $of)
                                <option value="{{ $of->id }}">{{ $of->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary legitRipple">Crear Partida<i class="icon-arrow-right14 position-right"></i></button>
                </div>
        </div>
        </div>
    </form>
    </div>
@endsection

@section('js_pie')
    <script>
        $('#monto_original').maskMoney({prefix:'', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
    </script>
@endsection