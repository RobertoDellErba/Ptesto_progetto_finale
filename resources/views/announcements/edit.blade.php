<x-layout>
  <x-slot name="title">Nuovo Annuncio </x-slot>

  <x-half_header />
  
  
  
  <!-- Carica nuovo annuncio -->
  <div class="container  bg_second rounded shadow my-2">
    <div class="row pt-2">
      <div class="col-12">

        @if(session('message'))
        <div class="alert alert-success">
          {{session('message')}}
        </div>
        @endif

      </div>
    </div>





    <div class="row py-3">
      <div class="col-12 ">
        <p class="h1 text-main border-text font-weight-bold mb-4 text-light">{{__('ui.crea_annuncio')}} <i class="fas fa-user text-main  ml-3" title="Visibile solo all'utente"></i> </p>
      </div>
      <div class="col-12">
        {{-- <h3>DEBUG:: SECRET {{$uniqueSecret}}</h3> --}}
        <form action="{{route('announcements.update', compact('announcement'))}}" method="POST" class="card shadow border-0 rounded p-2 p-md-5 bg_light">
          @csrf
          @method('PUT')
        {{-- <input type='hidden' name="uniqueSecret" value="{{$uniqueSecret}}"> --}}
          <div class="form-row mb-3">
            <div class="col-12 mb-3">
              <label class="text-footer font-weight-bold lead" for="nomeProdotto " >{{__('ui.product_name')}}</label>
              <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="nomeProdotto"   placeholder="" value="{{$announcement->title}}">
              @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            {{-- //Form Categoria --}}
            {{-- <div class="col-md-3 mb-3">
              <label class="text-footer font-weight-bold lead" for="categoriaProdotto">{{__('ui.categorie')}}</label>                        
              <select name="category" type class="form-control  @error('category') is-invalid @enderror" id="categoriaProdotto" required>

                <option selected disabled>Seleziona categoria</option>
                
                @foreach ($categories as $category)                            
              <option value="{{$category->id}}" {{old('category') == $category->id ? 'selected' : ' '}}>{{$category->title}}</option>
                @endforeach
                
              </select>

              @error('category')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

            </div> --}}
            {{-- Form località --}}
            {{-- <div class="col-md-3 mb-3">
              <label class="text-footer font-weight-bold lead" for="categoriaProdotto">{{__('ui.località')}}</label>                        
              <select name="location" type class="form-control  @error('location') is-invalid @enderror" id="categoriaProdotto" required>
  
               
                
                @foreach ($locations as $location)                            
              <option value="{{$location->id}}" {{old('location') == $location->id ? 'selected' : ' '}}>{{$location->location}}</option>
                @endforeach
                
              </select>
  
              @error('location')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
  
            </div> --}}
  
            {{-- fine località --}}
          </div>
          <div class="form-row mb-3">
            <div class="col-12 mb-3">
              <label class="text-footer font-weight-bold lead" for="mytextarea">{{__('ui.product_body')}}</label>
              <textarea type="text" name="body" id="mytextarea" class="form-control @error('body') is-invalid @enderror" cols="30" rows="3">{{$announcement->body}}</textarea>
              @error('body')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="form-row mb-3">







            
            <div class="col-md-6 mb-3">
              <label class="text-footer font-weight-bold lead" for="prezzoProdotto">{{__('ui.price')}}</label>                        
              <input type="number" step="0.01" name="price" id="prezzoProdotto" min="0" class="form-control @error('price') is-invalid @enderror" placeholder="€€€" value="{{$announcement->price}}">
              @error('price')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>                      
          </div>
          
          {{-- <div class="form-row mb-3">
            <div class="col-12">
              <label class="text-footer font-weight-bold lead " for="images">{{__('ui.product_img')}}</label>
              <div class="col-12">
                <div class="dropzone" id="drophere"></div>
               
              </div>
            </div>
          </div>
          --}}


          <button type="submit" class="btn btn-warning btn-presto text_light w-100">{{__('ui.product_submit')}}</button>
        </form>
      </div>
    </div>
  </div>
  
  
</x-layout>    