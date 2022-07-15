<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <link  rel="icon" type="image/x-icon" href="{{url('images/favicon.png')}}" />
      <link  rel="shortcut icon" type="image/x-icon" href="{{url('images/favicon.png')}}" />
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
      <!-- Styles -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css" integrity="sha512-72McA95q/YhjwmWFMGe8RI3aZIMCTJWPBbV8iQY3jy1z9+bi6+jHnERuNrDPo/WGYEzzNs4WdHNyyEr/yXJ9pA==" crossorigin="anonymous" />

      <link rel="stylesheet" href="{{ asset('css/admin/app.css') }}">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
      <!-- Scripts -->
      <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
      <script src="{{ asset('js/admin/app.js') }}" defer></script>   
      <!--<script src="{{ asset('js/admin/image-uploader.js') }}"></script>-->
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />  
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
           
   </head>
   <body>
      <div class="min-h-screen flex flex-col bg-white bg-gray-100" x-data="{ open: false }" @keydown.window.escape="open = false"> 
         <div class="flex-grow flex overflow-hidden">
            @include('admin.layouts.sidebar')  
            <div class="md:pl-64 flex flex-col flex-1 w-full"> 
               <!-- Header -->
               @include('admin.layouts.header')             
               <!-- Page Content --> 
               <main class="w-full relative mx-auto"> 
                  <!-- Page Heading -->
                  @isset($header)
                  <header class="bg-white shadow">
                     <div class="w-full mx-auto py-3 px-4">
                        {{ $header }}
                     </div>
                  </header>
                  @endisset
                  <div class="p-4">
                     {{ $slot }}  
                  </div>
               </main>
               @include('admin.layouts.js')  
            </div> 
         </div> 
      </div>
   </body>
</html> 