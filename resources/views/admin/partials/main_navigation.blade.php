<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

            <!-- Main -->
            <li class="navigation-header"><span>MENU</span> <i class="icon-menu" title="Main pages"></i></li>
            <li class="active"><a href="{{ url('/admin') }}"><i class="icon-home4"></i> <span>INICIO</span></a></li>
            <li>
                <a href="#"><i class="icon-office"></i> <span>Institutos</span></a>
                <ul>
                    @if(Auth::user()->tipo == 'administrador')
                        <li><a href="{{ route('institutos-nuevo') }}">Registrar Instituto</a></li>
                        <li><a href="{{ route('institutos-verTodos') }}">Ver Institutos</a></li>
                    @else
                        <li><a href="{{ route('institutos-ver') }}">Ver Instituto</a></li>
                    @endif
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-book"></i><span>Partidas</span></a>
                <ul>
                    <li><a href="{{ route('partidas-nueva') }}">Crear Partida</a></li>
                    <li><a href="{{ route('partidas-verTodas') }}">Ver Partidas</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-credit-card"></i><span>Clasificador General</span></a>
                <ul>
                    @if(Auth::user()->tipo == 'administrador')
                        <li><a href="{{ route('clasifGnral-nuevo') }}">Nuevo Elemento Clasificador</a></li>
                    @endif
                    <li><a href="{{ route('clasifGnral-verTodos') }}">Ver Clasificador</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-piggy-bank"></i><span>Origen de Fondos</span></a>
                <ul>
                    <li><a href="{{ route('origenFondos-nuevo') }}">Nuevo Origen de Fondos</a></li>
                    <li><a href="{{ route('origenFondos-verTodos') }}">Ver Origenes de Fondos</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-cash3"></i><span>Tipos de Gastos</span></a>
                <ul>
                    <li><a href="{{ route('tipoGasto-nuevo') }}">Nuevo Tipo de Gasto</a></li>
                    <li><a href="{{ route('tipoGasto-verTodos') }}">Ver Tipos de Gastos</a></li>
                </ul>
            </li>
            @if(Auth::user()->tipo == 'administrador')
                <li>
                    <a href="#"><i class="icon-pencil6"></i><span>Catalogo de Modificaciones</span></a>
                    <ul>
                        <li><a href="{{ route('catalogoModif-nuevo') }}">Nueva Modificación</a></li>
                        <li><a href="{{ route('catalogoModif-verTodas') }}">Ver Modificaciones</a></li>
                    </ul>
                </li>
            @endif

            <!-- /page kits -->
        </ul>
    </div>
</div>
