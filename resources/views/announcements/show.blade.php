<x-layout>
    <x-slot name="title">Show</x-slot>
    
    <x-half_header />
    
    
    <div class="container mb-5 py-3">
        <div class="row my-3 text-dark">
            <div class="col-12 col-md-8">
                <h2 class="text_base font-weight-bold mb-3 h1"> {{$announcement->title}}</h2>
                
            </div>
            
            <div class="col-12 col-md-4 d-flex justify-content-end">

                
                @if(Auth::user() && Auth::user()->id == $announcement->user->id)

                <div>

                    <a href="{{route('announcements.edit', compact('announcement'))}}" class="btn btn-lg btn-info text-light font-weight-bold mx-5">Modifica</a>

                </div>

                
                <form action="{{route('announcements.destroy', compact('announcement'))}}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-lg btn-danger"><i class="fas fa-dumpster  text-light"></i></button>
             
                    
                    
                    
                </form>
                
                @endif

            </div>
        
            
        </div>
        <div class="row latest justify-content-around">
            <div class="col-12 col-md-6 mt-4">
                
                <div class="row">
                    
                    <div class="col-12 mb-3">
                        <div class="bigCarousel">

                            @if($announcement->images->first())
                            
                                @foreach($announcement->images as $image)
                            

                                <div class="px-2">
                                    <img src="{{$image->getUrl(600,400)}}" class="mx-auto d-block img-fluid" alt="tonino-is-god">
                                </div>

                           
                                @endforeach
                            
                            @else
                          
                                <img src="\media\logo-gradient.png" class="mx-auto d-block img-fluid" alt="">
                           
                            @endif

                        </div>
                    </div>
                    
                    
                    <div class="col-12 ">
                        <div class="smallCarousel">                           
                            @foreach($announcement->images as $image)
                            <div class="px-2">
                                <img src="{{$image->getUrl(300,200)}}" class="mx-auto d-block img-fluid" alt="tonino-is-god">
                            </div>
                            @endforeach
                        </div>
                    </div>                   
                </div>
                
                
                
                
            </div>
            <div class="col-12 col-md-6 px-4">
                <div class="card border-0" >
                    <div class="card-body px-0 bg_light">

                        <h3 class="font-weight-bold text-center text-md-left text_dark separate">Descrizione Prodotto:</h3>
                        
                        <p class="card-text mb-5">
                            {!!$announcement->body!!}</p>
                            
                            
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
            
            
            <div class="row mb-5 pb-5 mt-4 pt-4 bg_light rounded shadow">
                <div class="col-12 col-md-4 ">
                    <p class="text-dark font-weight-bold mb-0 lead">Prezzo: <span class=" font-weight-bold text_base lead">{{$announcement->price}}  €</span></p>
                    <p class="text-dark font-weight-bold mb-0 lead">Categoria: <span class="text_base font-weight-bold lead">{{$announcement->category->title}}</span></p>
                    <p class="text-dark font-weight-bold mb-0 lead"> Luogo: <span class="text_base font-weight-bold lead">{{$announcement->location->location}}</p>
                </div>
                
                <div class="col-12 col-md-4 ">
                    <p class="text-dark font-weight-bold mb-0 lead">Caricato da: <span class="text_base font-weight-bold lead">{{$announcement->user->name}}</span></p>
                    <p class="text-dark font-weight-bold mb-0 lead">Caricato il: <span class="font-italic font-weight-bold text_base lead">{{$announcement->created_at->format('d/m/Y')}}</span></p>
                    
                </div>
                <div class="col-12 col-md-4 my-3 my-md-0">
                    <a href="mailto:{{$announcement->user->email}}" class="btn btn-lg btn-warning btn-presto">Contatta</a>
                </div>
            </div>
            
            
            
            
            
        </div>
        
        <div class="cointainer-fluid newsletter mt-5 py-5">
            <div class="row py-5 mx-0 px-0">
                <div class="col-12 ">
    
                    <h2 class="text-center text-light mb-5 font-weight-bold">Iscriviti alla Newsletter</h2>
    
                    <div class="col-12 offset-md-3 col-md-6">
    
                        <div class="form-group d-flex ">
                            
                            <input type="email" name="email" class="form-control" placeholder="pippo@baudo.rai" id="exampleInputEmail1" aria-describedby="emailHelp">
    
                            <button type="submit" class="btn btn-dark text_light ml-1 w-25">Invia</button>
                            
                            
                        </div>
    
    
                    </div>
    
    
    
    
    
    
    
    
                </div>
            </div>
        </div>
        
        
        
        
    </x-layout>