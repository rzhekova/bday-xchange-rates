<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  @include('partials.head')

  <style>
    body {
        font-family: 'Work Sans', sans-serif;
        text-align: center;
    }

    h1 {
        margin-bottom: 80px; 
        margin-top: 20vh;
        font-weight: 700;
    }

    p {
        font-size: 20px;
    }
      
    hr {
          border: none;
          height: 2px;
          /* background-color: #9bafca; */
          background-color: lightsalmon;
    }

    .container {
        min-height: 71.7vh;
    }
  </style>

</head>
<body>

@include('partials.toplines')

<div class="container">

    <h1>:(</h1>
    <p>Unfortunately, the service is unavailable at this moment. Please, try again later.</p>

</div>

 @include('partials.bottomlines')

</body>
</html>