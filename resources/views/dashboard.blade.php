@extends('layouts.blank')

@section('title', 'Dashboard')

@section('content')

<h1>Dashboard:  {{ Auth::user()->name }}<h1>

@endsection
