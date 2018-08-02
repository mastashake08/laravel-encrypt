@extends('layouts.app')

@section('content')
<read-message v-bind:message="{{$message}}"></read-message>
@endsection
