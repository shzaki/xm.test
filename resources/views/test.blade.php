<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Test</title>

	<!-- Styles -->
	<style>

	</style>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

{{--<script src="js/scripts.js"></script>--}}

<div class="container">
	<form autocomplete="off" id="apiForm" class="form-horizontal validate-me" method="post" action="/test">
		@csrf
		<div class="form-group row">
			<label for="symbol" class="col-sm-2 col-form-label">Symbol</label>
			<div class="col-sm-10">
				<input required type="text" name="symbol" class="form-control-plaintext" id="symbol"  placeholder="Please enter a company symbol">
			</div>
		</div>
		<div class="form-group row">
			<label for="email" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
				<input required type="email" name="email" class="form-control" id="email" placeholder="Please enter your email">
			</div>
		</div>

		<div class="form-group row">
			<label for="fromDate" class="col-sm-2 col-form-label">From</label>
			<div class="col-sm-10">
				<input required name="fromDate" class="form-control date-picker" id="fromDate" placeholder="Please enter from date">
			</div>
		</div>

		<div class="form-group row">
			<label for="toDate" class="col-sm-2 col-form-label">To</label>
			<div class="col-sm-10">
				<input required name="toDate" class="form-control date-picker" id="toDate" placeholder="Please enter to date">
			</div>
		</div>

		<div class="form-group row">
			<button type="submit" class="btn btn-primary pull-right">Submit</button>
		</div>

		<script type="text/javascript">
			$(function () {
				$('#fromDate').datepicker({ maxDate: new Date, dateFormat:'yy-mm-dd',
					onSelect: function(selected) {
					$("#toDate").datepicker("option","minDate", selected)
					}
				});
				$('#toDate').datepicker({ maxDate: new Date, dateFormat:'yy-mm-dd',
					onSelect: function(selected) {
					$("#fromDate ").datepicker("option","maxDate", selected)
					}
				});

				$(".date-picker").keypress(function(event) {event.preventDefault();});
			});

		</script>
	</form>
</div>

</body>
</html>
