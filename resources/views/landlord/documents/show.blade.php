@extends('layouts.main')

@section('content')
<div class="conteiner">
    <b>{{$document->title}}:</b>
    <br>
    {{$document->content}}
</div>

@endsection