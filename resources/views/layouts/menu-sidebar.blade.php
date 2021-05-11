        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{route('home')}}">
                    <img  src="{{asset('image/Hand-Drawn-Fat-Cat-4.jpg')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#" style="color: olive;">
                                <i class="fas fa-cat" style="color: olive;"></i>The Fat Cat Hotel</a>
                                
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="{{route('aboutUS')}}" style="color: darkolivegreen;">Quienes somos</a>
                                    </li>
                                    <li>
                                        <a href="{{route('reservas')}}" style="color: darkolivegreen;">Reservas</a>
                                    </li> 
                                        <a href="{{route('habitaciones')}}" style="color: darkolivegreen;">Habitaciones</a>
                                    </li>                               
                                    
                                </ul>
                        </li>                        
                        <li class="has-sub">
                            <a class="js-arrow" href="#" style="color: olive;">
                                <i class="fas fa-copy" style="color: olive;"></i>Menú usuario</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="{{route('login')}}" style="color: darkolivegreen;">Inicia sesión</a>
                                    </li>
                                    <li>
                                        <a href="{{route('register')}}" style="color: darkolivegreen;">Regístrate</a>
                                    </li>
                                    <li>
                                        <a href="{{route('password.request')}}" style="color: darkolivegreen;">Contraseña olvidada</a>
                                    </li>
                                </ul>
                        </li>
                      
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->