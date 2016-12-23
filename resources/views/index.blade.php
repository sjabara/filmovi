@extends('layouts.app')

@section('title', 'Filmovi')

@section('content')
<div class = "container">
<div class = "col-md-10 col-md-offset-1">
</div>
<div class = "panel-body">
<ul class = "list-group">
@foreach($film as $fil)
<li class = "list-group-item"><a href = "film/{{$fil->id}}">
	{{$fil->name}}</a>
	<form action = "/film/{{$fil->id}}" method = "POST">
		{{ csrf_field() }}
	</li>
@endforeach

</ul>
</div>
</div>
</div>

@endsection