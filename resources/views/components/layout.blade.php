<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
     
    {{-- Slick CSS --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" />
    
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    
    <title>{{$title}}- Presto.it</title>
</head>
<body>
    <x-nav />
    
    
    
    
    
    
    
    
    
    
    
    {{$slot}}
    
    
    
    
    
    
    
    
    
    
    
    
    <x-footer />
    
    
    
    
    
    
    
    
    
    
    
    {{-- Font-Awesome --}}
    <script src="https://kit.fontawesome.com/8701b28911.js" crossorigin="anonymous"></script>


      
    {{-- jquery scripts --}}
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>


    {{-- TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>


    
    
    
    
    {{-- Slick SCRIPT --}}
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js" integrity="sha512-WNZwVebQjhSxEzwbettGuQgWxbpYdoLf7mH+25A7sfQbbxKeS5SQ9QBf97zOY4nOlwtksgDA/czSTmfj4DUEiQ==" crossorigin="anonymous"></script>
    
   
    <script>
        
        
        // slick carousel in treatment-template
        
        
        $('.bigCarousel').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            fade: true,
            asNavFor: '.smallCarousel'
        });
        $('.smallCarousel').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.bigCarousel',
            dots: false,
            arrows: false,
            centerMode: true,
            focusOnSelect: true
        });
        
        // end slick



        
        
    </script>
    
    
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>   
</body>
</html>