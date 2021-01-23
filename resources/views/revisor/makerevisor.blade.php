
<x-layout>
    <x-slot name="title">
        
        <x-half_header />
        
        <div class="container">
            
            <div class="row">
                <div class="col-12">
                    
                    @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                    @endif
                    
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                    @endif
                    
                </div>
            </div>


            
            
            <div class="row my-5">
                <div class="col-12 p-5">
                    <div class="card p-3 ">
                        
                        
                        <h2 class="text_base font-weight-bold text-center">Rendi Revisore</h2>
                        
                        
                        <div class="card-body">
                            
                            
                            <form action="{{route('revisor.make')}}" method="POST">
                                @csrf
                                <div class="form-row align-items-center ">
                                <div class="form-group col-12 col-md-5 mb-3 mt-2">                 
                                    
                                    <label for="nameNewRevisor" class="form-label">Nome Completo</label>
                                    <input type="text" name="name">
                                </div>
                                <div class="form-group col-12 col-md-5 mb-3 mt-2">
                                    <label for="emailNewRevisor" class="form-label">Email address</label>
                                    <input type="text" name="email">
                                </div>
                                <div class="form-group col-12 col-md-2  mb-4">
                                   
                                    <button type="submit" class="btn btn-presto btn-lg mt-3">Invia</button>
                                    
                                </div>
                            </div>
                            </form>  
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        
        
        
        
        
        
        
    </x-layout>