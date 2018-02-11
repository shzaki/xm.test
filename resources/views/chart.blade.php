<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>

<div id="chart" style="height: 100%"></div>
<script>
	$(function() {
		data = ({{$jsonResults}});

		console.log(data);
		Highcharts.stockChart('chart', {

			rangeSelector: {
				selected: 1
			},
			title: {
				text: 'History quotes for {{$symbol}} from {{$fromDate}} to {{$toDate}}'
			},
			series: [{
				type: 'candlestick',
				name: 'AAPL Stock Price',
				data: data,
				dataGrouping: {
					/*units: [
						[
							'week', // unit name
							[1] // allowed multiples
						], [
							'month',
							[1, 2, 3, 4, 6]
						]
					]*/
				}
			}]
		});
	});

</script>