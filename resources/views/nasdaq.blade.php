<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Nasdaq historical quotes</title>

	<style>
		.main-container{margin: 20px}
	</style>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="/js/nasdaq.js"></script>
</head>
<body>
	<div class="main-container">
		<h1 class="text-center">Nasdaq historical quotes</h1>
		<div class="container">
			@include('form')
		</div>
		@if(isset($results) and is_array($results))
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						@include('table ')
					</div>
					<div class="col-md-6">
						@include('chart ')
					</div>
				</div>
			</div>
		@else
			{{ $results ?? '' }}
		@endif
	</div>
</body>
</html>
