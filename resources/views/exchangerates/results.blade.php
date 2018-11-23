<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  @include('partials.head')

  <style>
	body {
		font-family: 'Work Sans', sans-serif;
	}

	h1, h4 {
		font-weight: 700;
		background-size: 100% 100%;
		background-image: linear-gradient(180deg,transparent 0,transparent 60%, lightsalmon 0);
		display: table;
		padding: 0 5px;
	}

	h1 {
		margin: 0 auto;	
		margin-bottom: 50px; 
		text-align: center
	}

	h2 {
		margin-bottom: 80px; 
        margin-top: 20vh;
        font-weight: 700;
		text-align: center;
	}

	button {
		background-color: white;
		border: 2px solid lightsalmon;
		border-radius: 0;
		transition: 0.7s;
		font-weight: 600;
		letter-spacing: 1px;
		display: flex;
		margin: 0 auto;
		padding: 10px 15px;
		color: black;
	}

	button:hover {
		background-color: lightsalmon;
		color: white;
		cursor: pointer;
	}

	a:hover {
		text-decoration: none;
	}

	hr {
		border: none;
		height: 2px;
		/* background-color: #9bafca; */
		background-color: lightsalmon;
	}

	p {
		text-align: center;
	}

	td, th {
		width: 25%;
	}

	table {
		width: 100%;
	}

	#flash-message {
		position: absolute;
		z-index: 10;
		top: 60px;
		width: 30%;
		left: 35%;
		text-align: center;
		animation: flash-message 5s forwards;
	}

	@keyframes flash-message {
		0%   {opacity: 1;}
    	100% {opacity: 0; display:none;}
	}

	.card {
		border-radius: 0;
		border-color: grey;
		padding: 59px 60px; 
		margin: 20px;
	}
  </style>
</head>
<body>

@include('partials.toplines')

<div class="container">
	<div style="padding: 50px; margin: 50px;">
		@if($flash = session('message'))
			<div class="alert alert-success" id="flash-message" role="alert">
				{{ $flash }}
			</div>
		@endif

		@if($results->isEmpty())
			
			@if($browser === 'Firefox')
				<div style="min-height: 52.5vh;">
			@else 
				<div style="height: 51.5vh">
			@endif
			
				<h2>There are no results to show</h2>

				<a href="/">
					<button><< Back to Homepage</button>
				</a>	
			</div>


		@else
			@if($browser === 'Firefox')
				<div style="min-height: 72.5vh;">
			@else 
				<div style="min-height: 69.3vh;">
			@endif

			<h1>Results</h1>
			<p style="font-size: 24px; margin-bottom: 0;">EUR</p>
			<p style="font-size: 13px; margin-bottom: 50px;">base currency</p>

			@foreach($results as $result)
			<?php $rates = $result['exchange_rates']; ?>

			<section class="card">
				<header style="margin: 0px 25px 30px 30px;">
					<h4>{{$result['formatted_date']}}</h4>
					<p style="text-align: left;">Number of searches: <strong>{{$result['appears']}}</strong></p>
				</header>
				<table>
					<thead>
						<tr style="text-align: center">
							<th>USD</th>
							<th>GBP</th>
							<th>JPY</th>
							<th>CAD</th>
						</tr>
					</thead>

					<tbody>
						<tr style="text-align: center">
							<td>{{$rates->USD}}</td>
							<td>{{$rates->GBP}}</td>
							<td>{{$rates->JPY}}</td>
							<td>{{$rates->CAD}}</td>
						</tr>
					</tbody>
				</table>
			</section>
			@endforeach
			</div>
		@endif
	</div>
</div>

@include('partials.bottomlines')

</body>
</html>