<x-layout>
    <x-slot name="title">Revisore</x-slot>
    <x-half_header />
    
    
    
    @if($announcement)
    <div class="container">
        
        
        
        
        
        
        <div class="row justify-content-center">
            
            
            @foreach($announcement as $rejected)
            
            <div class="col-12">
                
                <div class="card mb-5">
                    <div class="card-header">
                        <p>Annuncio #{{$rejected->id}}</p>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-2"><h3>Utente</h3></div>
                            <div class="col-md-10">
                                # {{$rejected->user->id}},
                                {{$rejected->user->name}},
                                {{$rejected->user->email}},
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2"><h3>Titolo</h3></div>
                            <div class="col-md-10">
                                <h5 class="card-title">{{$rejected->title}}</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2"><h3>Descrizione</h3></div>
                            <div class="col-md-10">
                                <h5 class="card-title">{!!$rejected->body!!}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><h3>Immagini</h3></div>
                            <div class="col-md-10">
                                
                                @foreach ($rejected->images as $image)
                                <div class="row mb-2">
                                    
                                    <div class="col-md-4">
                                        <img src="{{$image->getUrl(300,200)}}" alt="" class="rounded">
                                    </div>
                                    
                                    
                                </div>
                                
                                @endforeach
                                
                                
                                
                            </div>
                        </div>
                        
                        <div class="row justify-content-center my-3">
                            <div class="col-12 col-md-6 text-center">
                                <form action="{{route('revisor.destroy', $rejected->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-lg">Elimina</button>
                                </form>
                            </div>
                            <div class="col-12 col-md-6 text-center">
                                <form action="{{route('revisor.redo', $rejected->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-lg">Ripristina</button>
                                </form>
                            </div>
                            
                            
                        </div>
                    </div>
                    
                    
                    
                </div>
                
                
            </div>
            
            
            
            
            @endforeach
        </div>
        
    </div>
    
    
    @else
    
    
    
    
    
    
    
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Non ci sono annunci da approvare</h3>
            </div>
        </div>
    </div>
    
    @endif
    
    
    
    
    
    
    
    
</x-layout>    