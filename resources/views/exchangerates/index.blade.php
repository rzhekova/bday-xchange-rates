<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  
  @include('partials.head')

  <style>
	body {
		font-family: 'Work Sans', sans-serif;
	}

	h1 {
		font-weight: 700;
		background-size: 100% 100%;
		background-image: linear-gradient(180deg,transparent 0,transparent 60%, lightsalmon 0);
		width: max-content;
		padding: 0 5px;
		margin: 0 auto;
		margin-bottom: 30px; 
		margin-top: 10vh;
	}

	form {
		justify-content: center; 
		margin-top: 60px;
	}

	input.form-control {
		width: 250px;
		border-radius: 0;
		border: 2px solid lightsalmon;
		border-style: none none solid none;
		text-align: center;
		letter-spacing: 2px;
		font-weight: 600;
	}

	.welcome-page {
		padding: 80px;
		margin: 70px;
	}

	.alert {
		position: absolute;
		width: 30%;
		left: 35%;
		text-align: center;
		top: 90px;
		padding: 0;
	}

	hr {
		border: none;
		height: 2px;
		/* background-color: #9bafca; */
		background-color: lightsalmon;
	}
	
	ul {
		margin: 10px;
		list-style: none;
		padding: 0;
	}

	button {
		background-color: white;
		border: 2px solid lightsalmon;
		border-radius: 0;
		transition: 0.7s;
		font-weight: 600;
		letter-spacing: 1px;
		padding: 10px 15px;
		color: black;
	}

	button:hover {
		background-color: lightsalmon;
		color: white;
		cursor: pointer;
	}

	button:focus {
  		outline: none;
	}
  </style>
</head>


<body>

@include('partials.toplines')


		@if ($errors->any())
    		<div class="alert alert-danger" role="alert">
        		<ul>
            		@foreach ($errors->all() as $error)
               			<li>{{ $error }}</li>
						   
            		@endforeach
        		</ul>
    		</div>
		@endif

  <div class="container text-center">

			@if($browser === 'Firefox')
				<div class="welcome-page" style="height: 78.8vh;">
			@else 
				<div class="welcome-page" style="height: 78vh;">
			@endif


        <h1>Welcome to Birthday Currency Rates</h1>
				<p>Please enter your date of birth below to find out what the exchage rate on your last birthday was</p>

        <form class="row" action="/" method="post">
        {{ csrf_field() }}
        
            <label for="date"></label>
            <input type="date" class="form-control" name="date" id="date" min="{{$minus_a_year}}" max="{{$current_date}}">
			<button type="submit">Submit</button>

        </form>
      
      </div>
     

  </div>

@include('partials.bottomlines')

</body>
</html>