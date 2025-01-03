
<html>
   <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">

          <title>Basic HTML Template</title>

     <!-- Flipbook StyleSheet -->
      <link href="/lib/css/main.css" rel="stylesheet" type="text/css">

     <!-- Icons Stylesheet -->
     <link href="/lib/css/themify-icons.min.css" rel="stylesheet" type="text/css">

   </head>
    <body  style="display:flex ; justify-content:center ; align-items:center ; ">
    <div class="_df_thumb" id="df_manual_thumb" source="{{$book->pdf_path}}" thumb="{{$book->cover_path}}"> {{$book->title}}</div >
    <!-- Refer to other examples on how to create different types of flipbook -->

    <!-- jQuery 1.9.1 or above -->
    <script src="/lib/js/libs/jquery.min.js" type="text/javascript"></script>

    <!-- Flipbook main Js file -->
    <script src="/lib/js/flip.js" type="text/javascript"></script>

    </body>
    </html>
