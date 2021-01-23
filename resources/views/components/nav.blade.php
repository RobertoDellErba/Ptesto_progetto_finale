







<nav id="navbar"  class="navbar navbar-expand-lg fixed-top py-0">
    <a href="{{route('homepage')}}" class=" logo  align-items-center d-flex text-decoration-none mr-2"> 
        <img src="/media/logo-w.png" class="pr-1" height="50px" alt="">
        <h1 class="h3 text_light font-weight-bold m-0">Prestissimo</h1>
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fas fa-bars text_light"></i></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav list-unstyled pt-3">
            <li class="nav-item active lead">
                <a class="nav-link text_light" href="{{route('homepage')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item lead">
                <a class="nav-link text_light" href="{{route('announcements.index')}}">{{__('ui.annunci')}}</a>
            </li>
            <li class="nav-item lead">
                <a class="nav-link text_light" href="{{route('announcements.create')}}">{{__('ui.crea_annuncio')}}</a>
            </li>
            
            <li class="nav-item lead dropdown ">
                <a class="nav-link text_light dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{__('ui.categorie')}}
                </a>
                <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                    
                    @foreach($categories as $category)
                    
                    <a class="dropdown-item" href="{{route('announcements.category', [$category->title, $category->id])}}">{{$category->title}}</a>
                    
                    @endforeach    
                    
                </div>
            </li>
            
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link text_light lead" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif
            
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link text_light lead" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link text_light dropdown-toggle lead" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                
                
                
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        
        
        
        
        @if( Auth::user()->is_revisor )
        {{-- <li class="nav-item">
            <a class="nav-link text_light lead" href="{{ route('revisor.index') }}"> {{__('ui.revisor_home')}}
                
                <span class="badge badge-pill badge-warning">
                    {{App\Models\Announcement::ToBeRevisionedCount()}}
                </span>
                
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text_light lead" href="{{ route('revisor.bin') }}"> {{__('ui.cestino')}}               
                <span class="badge badge-pill badge-danger">
                    {{App\Models\Announcement::ToBeRepristinatedCount()}}
                </span>
            </a>
        </li> --}}
        
        
        
        <li class="nav-item dropdown">
            
            <a class="nav-link text_light lead dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-shield "></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               
                <ul class="list-unstyled ">

                    <li class="dropdown-item">
                        <a class="nav-link text-dark lead tonino" href="{{ route('revisor.index') }}"> {{__('ui.revisor_home')}}
                            
                            <span class="badge badge-pill badge-warning">
                                {{App\Models\Announcement::ToBeRevisionedCount()}}
                            </span>
                            
                        </a>
                    </li>
                    <li class="dropdown-item">
                        <a class="nav-link text-dark lead tonino" href="{{ route('revisor.bin') }}"> {{__('ui.cestino')}}               
                            <span class="badge badge-pill badge-danger">
                                {{App\Models\Announcement::ToBeRepristinatedCount()}}
                            </span>
                        </a>
                    </li>

                    <li class="dropdown-item">
                        <a class="nav-link text-dark lead tonino" href="{{ route('revisor.maker') }}"> {{__('ui.add_revisor')}} </a>         
                           
                        
                    </li>
                    
                </ul>
                
            </div>
        </li>
        
        
        @else 
        <li class="nav-item">
            <a class="nav-link text_light lead" href="{{ route('revisor.create') }}">{{__('ui.collabora')}}</a>
        </li>  
        
        







        @endif    
        @endguest

       


        
        <li class="nav-item dropdown">
            
            <a class="nav-link text_light lead dropdown-toggle" href="#" id="langueges" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-globe-europe "></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="langueges">
                <form action="{{route('locale','it')}}" method="POST">
                    @csrf
                    <button class="dropdown-item">  <span class="flag-icon flag-icon-it">
                 
                    </span> ITA</button>
                </form>
                
                <form action="{{route('locale','gb')}}" method="POST">
                    @csrf
                    <button class="dropdown-item">  <span class="flag-icon flag-icon-gb">
                 
                    </span> ENG</button>
                </form>
                
            </div>
        </li>
    </ul>
    
    
</div>
</nav>








