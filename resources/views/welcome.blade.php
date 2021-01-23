<x-layout>
    <x-slot name=title>Home </x-slot>      
    <x-header />
    
   
    <div class="container-fluid my-5 pb-5">

        <div class="row d-block px-5 pt-5 mb-5">
            <h2 class="font-weight-bold h1 d-none d-md-block text-center text-md-left pl-md-5 text_dark separate"> {{__('ui.ultimi_annunci')}}</h2>

            <h2 class="font-weight-bold h3 d-block d-md-none text-center text-md-left pl-md-5 text_dark separate"> {{__('ui.ultimi_annunci')}}</h2>
        </div>

        <div class="row px-5 flex-nowrap cardScroll scrollbar-primary">


            @foreach ($announcements as $announcement)
            
            <div class="col-12 col-md-4  mx-2 pb-5">


               
                
                <x-cards
                
                id="{{$announcement->id}}"
                title="{{$announcement->title}}"
                body="{!!Str::words(strip_tags($announcement->body),10,'...')!!}"
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

    <div class="py-5 my-5"></div>


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
