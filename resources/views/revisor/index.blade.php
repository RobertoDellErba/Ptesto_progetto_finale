<x-layout>
    <x-slot name="title">Revisore</x-slot>
    <x-half_header />
    {{--     
        @if($announcement)
        
        
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    
                    <div class="card mb-5">
                        <div class="card-header">
                            <p>Annuncio #{{$announcement->id}}</p>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-2"><h3>Utente</h3></div>
                                <div class="col-md-10">
                                    # {{$announcement->user->id}},
                                    {{$announcement->user->name}},
                                    {{$announcement->user->email}},
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2"><h3>Titolo</h3></div>
                                <div class="col-md-10">
                                    <h5 class="card-title">{{$announcement->title}}</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2"><h3>Descrizione</h3></div>
                                <div class="col-md-10">
                                    <h5 class="card-title">{!!$announcement->body!!}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><h3>Immagini</h3></div>
                                <div class="col-md-10">
                                    
                                    @foreach ($announcement->images as $image)
                                    <div class="row mb-2">
                                        
                                        <div class="col-md-4">
                                            <img src="{{$image->getUrl(300,200)}}" alt="" class="rounded">
                                        </div>
                                        
                                        
                                        <div class="col-md-8">
                                            
                                            {{$image->id}}<br>
                                            {{$image->file}}<br>
                                            {{Storage::url($image->file)}}<br>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    @endforeach
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                        
                        <div class="row justify-content-center my-3">
                            <div class="col-md-6 text-center">
                                <form action="{{route('revisor.reject', $announcement->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-lg w-25">Rifiuta</button>
                                </form>
                            </div>
                            <div class="col-md-6 text-center">
                                <form action="{{route('revisor.accept', $announcement->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-lg w-25">Accetta</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                </div>
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
        
        @endif --}}
        
        
        
        @if($announcement)
        
        
        
        <div class="container">
            <div class="row">
                <div class="col-12 table-responsive-sm">
                    
                    <table class=" table table-hover">
                        <caption>List of users</caption>
                        <thead>
                            <tr>
                                <th scope="col">Announcement ID</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Nome Utente</th>
                                <th scope="col">email Utente</th>
                                <th scope="col">Titolo Annuncio</th>
                                <th scope="col">Body Annuncio</th>
                                <th scope="col">Approva</th>
                                <th scope="col">Rifiuta</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($announcement as $toApprove)
                            
                            
                            <tr>
                                
                                <th scope="row">#{{$toApprove->id}}</th>
                                <td>{{$toApprove->user->id}}</td>
                                <td>{{$toApprove->user->name}}</td>
                                <td>{{$toApprove->user->email}}</td>
                                <td>{{$toApprove->title}}</td>
                                <td><!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal{{$toApprove->id}}">
                                        Corpo
                                    </button>
                                </td>
                                
                                <td>
                                    <form action="{{route('revisor.accept', $toApprove->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-lg">Approva</button>
                                    </form>
                                </td>
                                
                                <td>
                                    <form action="{{route('revisor.reject', $toApprove->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-lg">Rifiuta</button>
                                    </form>
                                </td>
                                
                            </tr>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$toApprove->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl mx-auto" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">#{{$toApprove->id}}:Descrizione ed Immagine</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <div class="row">
                                                <div class="col-12 px-5">
                                                    
                                                    {!!$toApprove->body!!}
                                                    
                                                </div>    
                                            </div>
                                            <hr>
                                            
                                            @foreach($toApprove->images as $image)
                                            <div class="row">
                                                <div class="col-12 col-md-6 ">
                                                    <img src="{{$image->getUrl(600,400)}}" class="mx-auto d-block img-fluid my-3" alt="tonino-is-god">
                                                </div>
                                                
                                                
                                                
                                                <div class="col-12 col-md-3 ">
                                                    
                                                    
                                                    {{-- <div id="scoresWrapper" class="row">
                                                        <!-- Qui c'è del javascript -->
                                                        
                                                    </div> --}}
                                                    Adult: {{$image->adult}}%
                                                    <x-progress imageValue="{{$image->adult}}" /><br>
                                                    Spoof:  {{$image->spoof}}%
                                                    <x-progress imageValue="{{$image->spoof}}" /><br>
                                                    Medical: {{$image->adult}}%   
                                                    <x-progress imageValue="{{$image->medical}}" /><br>
                                                    Violence: {{$image->adult}}%   
                                                    <x-progress imageValue="{{$image->violence}}" /><br>
                                                    Racy: {{$image->racy}}%    
                                                    <x-progress imageValue="{{$image->racy}}" /><br>
                                                    
                                                    
                                                    
                                                </div>
                                                
                                                <div class="col-12 col-md-3 p-3 ">
                                                    @if($image->labels)
                                                    
                                                    @foreach($image->labels as $label)
                                                    
                                                    <span class="lead">#{{$label}}  </span><br>
                                                    
                                                    
                                                    
                                                    
                                                    @endforeach                                                 
                                                    
                                                    
                                                    @endif
                                                    
                                                    
                                                    
                                                </div>
                                                
                                                
                                            </div>

                                            <hr>
                                            @endforeach
                                            
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                        <div class="modal-footer">
                                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                           
                                    






                            
                            @endforeach 
                        </tbody>         
                    </table>
                    
                </div>
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
            
            