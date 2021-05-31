            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            @if (Auth::check()) 
                                Hola {{Auth::user()->name}}  Rol: {{Auth::user()->rol}}
                            @else
                                Hola desconocid@, indentifícate
                            @endif

                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->