<x-layout>
    <x-slot name="title">Annunci</x-slot>
    
    
    <x-half_header />
    
    <div class="container-fluid my-5">
        <div class="row offset-md-1">
            
            
            
            @foreach ($announcements as $announcement)
            <div class="col-12 col-md-5 mx-auto  mx-md-4">
                <x-cards
                
                id="{{$announcement->id}}"
                title="{{$announcement->title}}"
                body="{!!Str::words(strip_tags($announcement->body),16,'...')!!}"
                price="{{$announcement->price}}"
                createdAt="{{$announcement->created_at->format('d/m/Y')}}"
                category="{{$announcement->category->title}}"
                categoryId="{{$announcement->category->id}}"
                user="{{$announcement->user->name}}"
                image="{{optional($announcement->images->first())->getUrl(200,300)}}"
                imageSm="{{optional($announcement->images->first())->getUrl(300,200)}}"
                location="{{$announcement->location->location}}"
                />
                
                
                
            </div>
            @endforeach  

            
            
            
            
        </div>

        
    </div> 
    
    
    <div class="container">
        <div class="row justify-content-center">

            <div class="row ">
                <div class="col-12">
                    {{$announcements->links()}}
                </div>
            </div>
            
        </div>
    </div>
    
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</x-layout>    
