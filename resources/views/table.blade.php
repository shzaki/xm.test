<div>
	<table id="nasdaq" class="table table-hover table-striped datatable">
		@forelse($results as $row)
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
		@empty
			<thead>
			<tr>
				<th>No Data Found</th>
			</tr>
			</thead>
		@endforelse
	</table>
</div>