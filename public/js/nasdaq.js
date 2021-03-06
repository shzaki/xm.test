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

		$('.loading_page').fadeIn('fast');

		$.ajax({
			url: "/get-symbols/",
			type: "get",
			data: {
			},
			success: function (data) {
				for (var i=0;i<data.length;i++) {
					$('<option/>').val(data[i]).html(data[i]).appendTo('#symbol');
				}
				$("#symbol").trigger("chosen:updated");
			},
			error: function (data) {
				alert('Error while getting company symbols.');
				console.log(data);
			}
		});

	});

