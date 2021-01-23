<x-layout>
    <x-slot name="title">
        
        <x-half_header />
        
        <div class="container">
            
            <div class="row">
                <div class="col-12">
                    
                    @if(session('send'))
                    <div class="alert alert-success">
                        {{session('send')}}
                    </div>
                    @endif
                    
                </div>
            </div>
            
            <div class="row my-5">
                <div class="col-12 p-5">
                    <div class="card p-3 ">
                        
                        
                        <h2 class="text_base font-weight-bold text-center">Lavora (gratis) con noi</h2>
                        
                        
                        <div class="card-body">
                            
                            <form action="{{route('revisor.mail')}}" method="POST">
                                @csrf
                                <div class="mb-3">                 
                                    
                                    <label for="nameNewRevisor" class="form-label">Nome Completo</label>
                                    <p>{{Auth::user()->name}}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="emailNewRevisor" class="form-label">Email address</label>
                                    <p>{{Auth::user()->email}}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="tantoNonleggiamo" class="form-label">Referenze</label>
                                    <textarea class="form-control" name="reference" id="tantoNonleggiamo" rows="3"></textarea>
                                    <button type="submit" class="btn btn-presto btn-lg mt-3">Invia</button>
                                    
                                </div>
                            </form>  
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        
        
        
        
        
        
        
    </x-layout>