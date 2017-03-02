<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

            <!-- Main -->
            <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
            <li class="active"><a href="{{ url('/admin') }}"><i class="icon-home4"></i> <span>INICIO</span></a></li>
            <li>
                <a href="#"><i class="icon-office"></i> <span>Institutos</span></a>
                <ul>
                    <li><a href="{{ route('institutos-nuevo') }}">Registrar Instituto</a></li>
                    <li><a href="{{ route('institutos-ver') }}">Ver Institutos</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-book"></i><span>Partidas</span></a>
                <ul>
                    <li><a href="{{ route('partidas-nueva') }}">Crear Partida</a></li>
                    <li><a href="{{ route('partidas-ver') }}">Ver Partidas</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-credit-card"></i><span>Clasificador General</span></a>
                <ul>
                    <li><a href="{{ route('clasifGnral-nuevo') }}">Nuevo Elemento Clasificador</a></li>
                    <li><a href="{{ route('clasifGnral-ver') }}">Ver Clasificador</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-piggy-bank"></i><span>Origen de Fondos</span></a>
                <ul>
                    <li><a href="{{ route('origenFondos-nuevo') }}">Nuevo Origen de Fondos</a></li>
                    <li><a href="{{ route('origenFondos-ver') }}">Ver Origenes de Fondos</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-cash3"></i><span>Tipos de Gastos</span></a>
                <ul>
                    <li><a href="{{ route('tipoGasto-nuevo') }}">Nuevo Tipo de Gasto</a></li>
                    <li><a href="{{ route('tipoGasto-ver') }}">Ver Tipos de Gastos</a></li>
                </ul>
            </li>
            <!-- /page kits -->
        </ul>
    </div>
</div>
