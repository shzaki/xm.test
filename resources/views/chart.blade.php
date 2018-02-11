<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>

<div id="container" style="height: 400px; min-width: 310px">
</div>

<script>

	$(function() {

		data = ({{$jsonResults}});

		console.log(data);
		Highcharts.stockChart('container', {

			rangeSelector: {
				selected: 1
			},

			title: {
				text: 'AAPL Stock Price'
			},

			series: [{
				type: 'candlestick',
				name: 'AAPL Stock Price',
				data: data,
				dataGrouping: {
					units: [
						[
							'week', // unit name
							[1] // allowed multiples
						], [
							'month',
							[1, 2, 3, 4, 6]
						]
					]
				}
			}]
		});
	});

</script>