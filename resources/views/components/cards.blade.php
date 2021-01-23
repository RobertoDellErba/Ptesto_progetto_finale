

{{-- @props (['title','createdAt','body','price','id']) --}}





<div class="row position-relative cards-height rounded-lg shadow mt-5 mb-3">
    <div class="col-12 col-xl-4 p-0">

        @if($image)
        <img class="img-fluid d-none d-xl-block rounded" src="{{$image}}" alt="">
        <img class="img-fluid d-xl-none d-block mx-auto rounded" src="{{$imageSm}}" alt="">
        @else
        <img class="img-fluid d-none d-xl-block rounded" src="\media\logo-gradient.png" alt="">
        @endif

    </div>
    <div class="col-12 col-xl-8 py-3">
        
        <a href="{{route('announcements.show', ['announcement'=>$id])}}"  class="text-decoration-none">
            <h3 class="text_base text-hover text-truncate font-weight-bold mb-3" data-toggle="tooltip" data-placement="top" title="{{$title}}">{{$title}}</h3>
        </a> 

        <div class="d-flex justify-content-between pr-2">

            <div class="mt-0 pr-3">
                <p class="card-text text-dark  mb-0">Utente: <span class="text_base font-weight-bold">{{$user}}</span></p>
                <p class="card-text text-dark my-0 ">Dove: 
                    
                    <span class="text_base font-weight-bold">{{$location}}</span>
                    
                </p>
                <p class=" font-italic mt-0">Creato: <span class="text_base font-weight-bold">{{$createdAt}}</span></p>
            </div>
            <div>

                <a href="{{route('announcements.category', ['id'=>$categoryId, 'title'=>$category])}}"  class="text-decoration-none link-hover text_light font-weight-bold px-3 py-2 btn-presto rounded-pill ">
                    {{$category}}
                </a>
                
            </div>
                
        </div>
        
        <p class="card-text text-dark lead mt-2">{!!$body!!}</p>
        <p class="card-text h2 font-weight-bold text_base position-absolute fixed_custom">{{$price}}€</p>
        
    </div>
    
</div>




{{-- <div class="card  mt-5 ml-2 border-0 shadow img-shrink" style="width: 18rem;">
    <img class="card-ovhidden img-fluid img-opacity d-block mx-auto rounded-top" src="https://via.placeholder.com/300x200
    " alt="">
    <div class="card-body">
        
        <a href="{{route('announcements.show', ['announcement'=>$id])}}"  class="text-decoration-none">
            <h3 class="text-second text-hover text-truncate">{{$title}}</h3>
        </a> 
        
        <a href="{{route('announcements.category', ['id'=>$categoryId, 'title'=>$category])}}"  class="text-decoration-none">
            <p class="card-text text-dark small">Categoria:{{$category}}</p>
        </a>
        
        <p class="small font-italic">{{$createdAt}}</p>
        <p class="card-text text-dark text-truncate">{{$body}}</p>
        <p class="card-text text-dark">{{$price}}€</p>
        <p class="card-text text-dark small">{{$user}}</p>
    </div>
</div> --}}



