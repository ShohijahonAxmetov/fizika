<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{route('test')}}" method="get">
		@foreach($params as $paramKey => $param)
		<div style="display: flex;">
			<select name="vars[]">
				@foreach($params as $param)
				<option value="{{$param}}" {{$paramKey == $loop->index ? 'selected' : ''}}>{{$param}}</option>
				@endforeach
			</select>
			<input type="integer" name="vars_values[]">
		</div>
		@endforeach
		<div style="display: flex;">
			<label>Что нужно найти</label>
			<select name="q">
				@foreach($params as $param)
				<option value="{{$param}}">{{$param}}</option>
				@endforeach
			</select>
		</div>
		<button type="submit">Answer</button>
	</form>
</body>
</html>