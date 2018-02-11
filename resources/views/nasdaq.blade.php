<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Test</title>

	<style>

	</style>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
</head>
<body>



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

		$(".datatable").DataTable();

		$('.chosen-select').chosen({
			width: "100%"
		});

		$.ajax({
			url: "/get-symbols/",
			type: "get",
			data: {
			},
			success: function (data) {
				console.log(data);

				for (var i=0;i<data.length;i++){
					// Trimming quotes around symbol

					symbol = data[i].substring(1, data[i].length-1);

					$('<option/>').val(symbol).html(symbol).appendTo('#symbol');
				}
				$("#symbol").trigger("chosen:updated");
			},
			error: function (data) {
				alert('Error');
				console.log(data);
			}
		});

	});

</script>

</body>
</html>
