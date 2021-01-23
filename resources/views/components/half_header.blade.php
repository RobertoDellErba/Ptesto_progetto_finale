<header class="pt-1 half-header">
    <div class="container-fluid d-none d-md-block mt-5 my-md-5">
        <div class="row py-3 py-md-5 px-1 px-md-5">
            
            <div class="col-12 bg_light mb-2 mb-md-5 px-3 py-4 rounded shadow ">
                <form class="d-flex align-items-center flex-wrap " action="{{route('search')}}" method="GET">
                    <div class="col-12 pb-3 d-md-none">
                        <h2>{{__('ui.cosa_cerchi')}}</h2>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label class="d-none d-md-block" for="exampleInputEmail1">{{__('ui.cosa_cerchi')}}</label>
                            <input type="text" name="q" class="form-control" placeholder="es. Laptop, Iphone ecc." id="exampleInputEmail1" aria-describedby="emailHelp">
                            
                            
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label class="d-none d-md-block" for="exampleFormControlSelect1">{{__('ui.categorie')}}</label>
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
            
           
        </div>
    </div>
</header>
