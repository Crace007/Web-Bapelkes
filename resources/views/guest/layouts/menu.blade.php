<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- boostrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    {{-- my style --}}
    <link rel="stylesheet" href="/css/style.css">

    <title>{{$title}}</title>
</head>

<body class="bg-gradient-body">
  {{-- <div id="demo" class="body-stiky d-flex flex-column bd-highlight"> --}}
  <div style="min-height:100vh; display:flex; flex-direction:column; 
  justify-content:space-between;">
    <div>
      {{-- navbar --}}
      @include('guest.layouts.navbar')
  
      {{-- content --}}
      <article class="container content ">
        @yield('content')
      </article>
    </div>
    

     <!-- Footer -->
     <footer>
       @include('guest.layouts.footer')
     </footer>
  </div>
      
    
  {{-- </div> --}}

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </body>

  </html>