<form autocomplete="off" id="apiForm" class="form-horizontal validate-me" method="post" action="{{route('nasdaq')}}">
	@csrf
	<div class="form-group row">
		<label for="symbol" class="col-sm-2 col-form-label">Symbol</label>
		<div class="col-sm-10">
			<select required name="symbol" class="form-control chosen-select" id="symbol">
				@if(!empty(Request::old('symbol')))
					<option value="{{Request::old('symbol')}}" selected>{{Request::old('symbol')}}</option>
				@elseif(isset($symbol))
					<option value="{{$symbol}}" selected>{{$symbol}}</option>
				@else
					<option value="" selected>Company Symbol</option>
				@endif

			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-10">
			<input required type="email" name="email" class="form-control" id="email" placeholder="Customer's email"
				   @if(!empty(Request::old('email')))
				   value="{{Request::old('email')}}"
				   @elseif(isset($email))
				   value="{{$email}}"
					@endif>
		</div>
	</div>

	<div class="form-group row">
		<label for="fromDate" class="col-sm-2 col-form-label">From</label>
		<div class="col-sm-10">
			<input required  name="fromDate" class="form-control date-picker" id="fromDate" placeholder="Start Date"
				   @if(!empty(Request::old('fromDate')))
				   value="{{Request::old('fromDate')}}"
				   @elseif(isset($fromDate))
				   value="{{$fromDate}}"
					@endif >
		</div>
	</div>

	<div class="form-group row">
		<label for="toDate" class="col-sm-2 col-form-label">To</label>
		<div class="col-sm-10">
			<input required name="toDate" class="form-control date-picker" id="toDate" placeholder="End Date"
				   @if(!empty(Request::old('toDate')))
				   value="{{Request::old('toDate')}}"
				   @elseif(isset($toDate))
				   value="{{$toDate}}"
					@endif>
		</div>
	</div>

	<div class="form-group row">
		<button type="submit" class="btn btn-primary pull-right">Submit</button>
	</div>

</form>
