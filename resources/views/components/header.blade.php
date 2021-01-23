<div class="container-fluid alert_revisor">
    <div class="row">
        <div class="col-12">
            
            @if(session('revisor.only'))
            <div class="alert alert-danger text-center">
                {{session('revisor.only')}}
            </div>
            @endif
            
        </div>
    </div>
</div>
<header class="header d-flex align-items-center pt-3">
    <div class="container h-100 mt-5 my-md-5">
        <div class="row py-3 py-md-5 px-1 px-md-5">
            <div class="col-12">
                
                <h1 class="text_light text-center font-weight-bold">Prestissimo... Dove fare affari, è un attimo!</h1>
            </div>
            <div class="col-12 bg_light mb-2 mb-md-5 px-3 py-4 rounded shadow ">
                <form class="d-flex align-items-center flex-wrap " action="{{route('search')}}" method="GET">
                    <div class="col-12 pb-3 d-md-none">
                        <h2> {{__('ui.cosa_cerchi')}}</h2>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label class="d-none d-md-block" for="exampleInputEmail1"> {{__('ui.cosa_cerchi')}}</label>
                            <input type="text" name="q" class="form-control" placeholder="es. Laptop, Iphone ecc." id="exampleInputEmail1" aria-describedby="emailHelp">
                            
                            
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label class="d-none d-md-block" for="exampleFormControlSelect1"> {{__('ui.categorie')}}</label>
                            <select name="category" type class="form-control  @error('category') is-invalid @enderror" id="categoriaProdotto" required>

                                <option value="0" selected>Tutte le categorie</option>
                                
                                @foreach ($categories as $category)                            
                                <option value="{{$category->id}}" {{old('category') == $category->id ? 'selected' : ' '}}>{{$category->title}}</option>
                                @endforeach
                                
                            </select>
                            
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label class="d-none d-md-block" for="exampleFormControlSelect1"> {{__('ui.dove')}}</label>
                            <select name="location" type class="form-control  @error('location') is-invalid @enderror" id="categoriaProdotto" required>

                                <option value="0" selected>Tutta Italia</option>
                                
                                @foreach ($locations as $location)                            
                                <option value="{{$location->id}}" {{old('location') == $location->id ? 'selected' : ' '}}>{{$location->location}}</option>
                                @endforeach
                                
                            </select>
                            
                        </div>
                    </div>
                    <div class="col-12 col-md-2 pt-3">
                        <button type="submit" class="btn btn-warning btn-presto text_light w-100">{{__('ui.cerca')}}</button>
                    </div>
                </form>
            </div>
            
            <div class="col-12 py-4">
                <h2 class="text_light text-center font-weight-bold">{{__('ui.esplora')}}</h2>
            </div> 
            <div class="col-12 d-flex px-3 flex-nowrap cardScroll scrollbar-primary">
                <div class="col-12 col-md-6 col-lg-3 my-3">
                    <a href="{{route('announcements.category', [$category->title='casalinghi', $category->id=1])}}" class="category-card btn w-100 p-2 pb-4 bg_light rounded shadow text-center">
                        <h2 class="h3 font-weight-bold">
                            {{__('ui.casalinghi')}}
                        </h2>
                        <i class="fas fa-broom fa-3x"></i>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-3 my-3">
                    <a href="{{route('announcements.category', [$category->title='tech', $category->id=2])}}" class="category-card btn w-100 p-2 pb-4 bg_light rounded shadow text-center">
                        <h2 class="h3 font-weight-bold">
                            Tech
                        </h2>
                        <i class="fas fa-laptop fa-3x"></i>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-3 my-3">
                    <a href="{{route('announcements.category', [$category->title='sport', $category->id=3])}}" class="category-card btn w-100 p-2 pb-4 bg_light rounded shadow text-center">
                        <h2 class="h3 font-weight-bold">
                            Sport
                        </h2>
                        <i class="fas fa-futbol fa-3x"></i>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-3 my-3">
                    <a href="{{route('announcements.category', [$category->title='cucina', $category->id=4])}}" class="category-card btn w-100 p-2 pb-4 bg_light rounded shadow text-center">
                        <h2 class="h3 font-weight-bold">
                            {{__('ui.cucina')}}
                        </h2>
                        <i class="fas fa-cookie-bite fa-3x"></i>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-3 my-3">
                    <a href="{{route('announcements.category', [$category->title='vintage', $category->id=5])}}" class="category-card btn w-100 p-2 pb-4 bg_light rounded shadow text-center">
                        <h2 class="h3 font-weight-bold">
                            Vintage
                        </h2>
                        <i class="fas fa-camera fa-3x"></i>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-3 my-3">
                    <a href="{{route('announcements.category', [$category->title='immobili', $category->id=6])}}" class="category-card btn w-100 p-2 pb-4 bg_light rounded shadow text-center">
                        <h2 class="h3 font-weight-bold">
                            {{__('ui.immobili')}}
                        </h2>
                        <i class="fas fa-igloo fa-3x"></i>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-3 my-3">
                    <a href="{{route('announcements.category', [$category->title='giochi', $category->id=7])}}" class="category-card btn w-100 p-2 pb-4 bg_light rounded shadow text-center">
                        <h2 class="h3 font-weight-bold">
                            {{__('ui.giochi')}}
                        </h2>
                        <i class="fas fa-gamepad fa-3x"></i>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-3 my-3">
                    <a href="{{route('announcements.category', [$category->title='motori', $category->id=8])}}" class="category-card btn w-100 p-2 pb-4 bg_light rounded shadow text-center">
                        <h2 class="h3 font-weight-bold">
                            {{__('ui.motori')}}
                        </h2>
                        <i class="fas fa-car fa-3x"></i>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-3 my-3">
                    <a href="{{route('announcements.category', [$category->title='hobbistica', $category->id=9])}}" class="category-card btn w-100 p-2 pb-4 bg_light rounded shadow text-center">
                        <h2 class="h3 font-weight-bold">
                            Hobby
                        </h2>
                        <i class="fas fa-tools fa-3x"></i>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-3 my-3">
                    <a href="{{route('announcements.category', [$category->title='arredamento', $category->id=10])}}" class="category-card btn w-100 p-2 pb-4 bg_light rounded shadow text-center">
                        <h2 class="h3 font-weight-bold">
                            {{__('ui.arredamento')}}
                        </h2>
                        <i class="fas fa-couch fa-3x"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</header>
