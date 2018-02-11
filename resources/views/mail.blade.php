<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Styles -->
	<style>

		p span{
			padding-left:5px
		}
	</style>
</head>
<body>
<div class="container"></div>
	<h1>Nasdaq report for {{$symbol}} from {{$fromDate}} to {{$toDate}}</h1>
		<p>
			Hi {{$email}},<br>
			<span>Thank you for your enquiry here is the result for {{$symbol}} from {{$fromDate}} to {{$toDate}}</span>
		</p>
<div>
@include('table')
</div>
</body>
</html>
