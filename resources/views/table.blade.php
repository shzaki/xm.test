<div>
	<table id="nasdaq" class="table table-hover table-striped datatable">
		@foreach($results as $row)
				@if ($loop->first)
					<thead>
						<tr>
							@foreach($row as $th)
								<th>{{$th}}</th>
							@endforeach
						</tr>
					</thead>
				@else
					<tr>
						@foreach($row as $td)
							<td>{{$td}}</td>
						@endforeach
					</tr>
				@endif

		@endforeach
	</table>
</div>