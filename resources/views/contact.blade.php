@extends('layouts.app')




@section('content')

    <h1>Contact Page</h1>

    @if(count($people))

        <ul>

    @foreach($people as $person)
        <li>{{$person}}</li>

    @endif
        </ul>
@stop


@section('footer')
    {{--<script>alert('Hello visitor ')</script>--}}

@stop