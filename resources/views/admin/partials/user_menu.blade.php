<div class="sidebar-user-material">
    <div class="category-content">
        <div class="sidebar-user-material-content">
            <a href="#"><img src="{{asset('assets/images/placeholder.jpg')}}" class="img-circle img-responsive" alt=""></a>
            <h6>Victoria Baker</h6>
            <span class="text-size-small">Santa Ana, CA</span>
        </div>

        <div class="sidebar-user-material-menu">
            <a href="#user-nav" data-toggle="collapse"><span>Mi Cuenta</span> <i class="caret"></i></a>
        </div>
    </div>

    <div class="navigation-wrapper collapse" id="user-nav">
        <ul class="navigation">
            {{--<li><a href="#"><i class="icon-comment-discussion"></i> <span><span class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>--}}
            <li class="divider"></li>
            <li><a href="#"><i class="icon-cog5"></i> <span>Configurar cuenta</span></a></li>
            <li><a href="{{ route('user-logout') }}"><i class="icon-switch2"></i> <span>Salir</span></a></li>
        </ul>
    </div>
</div>