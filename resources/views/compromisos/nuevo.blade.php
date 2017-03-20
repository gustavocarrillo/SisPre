@extends('admin.plantilla')

@section('js')
    <script type="text/javascript" src="{{asset('assets/js/pages/form_layouts.js')}}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/jgrowl.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/daterangepicker.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/anytime.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/pickadate/picker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/pickadate/picker.date.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/pickadate/picker.time.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/pickadate/legacy.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/pages/picker_date.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/maskMoney.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/jquery.mask.js') }}"></script>

@endsection

@section('contenido')

    <div class="col-lg-5">

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

    <form action="{{ route('compromisos-guardado') }}" method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Nuevo Compromiso<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
            </div>

            <div class="panel-body">

            <div class="col-lg-12">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Numero:</label>
                    <div class="col-lg-9">
                        <input type="text" name="numero" id="numero" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha</label>
                    <div class="input-group">
                        <input type="text" name="fecha" id="fecha" class="form-control" placeholder="click aqui">
                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Tipo:</label>
                    <div class="col-lg-9">
                        <select name="tipo" class="form-control" placeholder="">

                            @foreach($ops as $op)
                                <option value="{{ $op->id }}">{{ strtoupper($op->nombre) }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Monto:</label>
                    <div class="col-lg-9">
                        <input type="text" name="monto" id="monto" class="form-control" placeholder="">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Partida</label>
                    <div class="col-lg-9">
                        <select name="partida" id="partida" class="form-control" placeholder="" required>
                            <option value="" selected>Seleccione...</option>

                            @foreach($clasif as $clsf)
                                <option value="{{ $clsf->id }}">{{ $clsf->partida }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12">
                        <label id="denominacion" class="alert-success"></label>
                    </div>
                    <div class="col-lg-12">
                        <label id="Lsaldo" class="alert-success hide">Saldo:</label>
                        <label id="saldo" class="alert-success"></label>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary legitRipple">Crear Compromiso<i class="icon-arrow-right14 position-right"></i></button>
                </div>

            </div>
        </div>
    </div>
    </form>
    </div>

@endsection

@section('js_pie')
    <script>
        $('#monto').maskMoney({prefix:'', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});

        //$('#numero').mask('0000000000',{placeholder:'0000000000'})

        $('#fecha').daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'DD-MM-YYYY',
                daysOfWeek: ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab','Dom'],
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                firstDay: 1
            }
        });

        $('#partida').change(function () {
           $.ajax({
               url: "{{ route('compromisos-denominacion') }}",
               headers: {'X-CSRF-TOKEN': $('#token').val()},
               type: 'POST',
               datatype: 'JSON',
               data: { partida: $(this).val() }
           }).done(function (resp) {
               den = resp;
               $('#denominacion').html(den.denominacion.toUpperCase());
               $('#saldo').html(den.saldo);
               $('#Lsaldo').removeClass('hide');
           })
        });
    </script>
@endsection