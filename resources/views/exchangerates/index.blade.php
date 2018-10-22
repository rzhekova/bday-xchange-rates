<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Birthday Currency Rates</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>


<body>

  <div class="container text-center">

      <div class="card" style="padding: 60px; margin: 70px;">
        <h1 style="margin-bottom: 30px;">Welcome to Birthday Currency Rates</h1>
          <p>Please fill in the form below to find out what the exchage rate on your last birthday was.</p>

        <form class="row" style="justify-content: center; margin-top: 60px;" action="/" method="post">
        {{ csrf_field() }}
        
            <label for="date"></label>
            <input style="width: 250px" type="date" class="form-control" name="date" id="date"  min="{{$minus_a_year}}" max="{{$current_date}}">
          <button type="submit">Submit</button>
        </form>
      
      </div>
     

  </div>


</body>
</html>