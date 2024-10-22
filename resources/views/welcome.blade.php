@extends('layouts.main')

@section('title', 'Test page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="color: #149FA8">Medicamentos</h1>
            </div>
        </div>
    </div>

    <x-medicine-card />
@endsection
