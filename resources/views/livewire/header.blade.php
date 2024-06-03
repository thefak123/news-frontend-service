<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <header class="tech-header header">
        <div class="container-fluid">
            <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="tech-index.html"><img src="images/version/tech-logo.png" alt=""></a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href={{route("home")}}>Home</a>
                        </li>
                        @if(!session()->has("token"))
                        <li>
                
                            <a class="nav-link" href={{route("login")}}>Login</a>
                        </li>
                        @endif
                    </ul>
                    <ul class="navbar-nav mr-2">
                        @if(session()->has("token"))
                        <li>
                
                            <a class="nav-link" wire:click="logout">Logout</a>
                        </li>
                       @endif
                    </ul>
                </div>
            </nav>
        </div><!-- end container-fluid -->
    </header><!-- end market-header -->
</div>
