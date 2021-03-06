<x-layout>
    <x-slot name="title">Risultati ricerca</x-slot>
    
    
    <x-half_header />
    
    
    
    
    
    @if($announcements)

    
    
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-12">

                @if($q)

                    <h2>{{__('ui.risultati')}}: {{$q}}</h2>
                    
                @else

                <h2>Ecco i risultati per la tua ricerca</h2>

                @endif

            </div>
        </div>
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
    
    
    
    @else
    
    <div class="row">
        <div class="col-12">
            
            <h2>{{__('ui.risultati')}}: {{$q}}</h2>
            <h3>Non esistono annunci per questa ricerca</h3>
        </div>
    </div>
    
    @endif
    
    
    
    
    
    <div class="container">
        <div class="row">
            
            <div class="row justify-content-center">
                <div class="col-12">
                    {{$announcements->links()}}
                </div>
            </div>
            
        </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
</x-layout>    
