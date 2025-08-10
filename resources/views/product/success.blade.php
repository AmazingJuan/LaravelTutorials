@extends('layouts.app')

@section('title', $viewData["title"])

@section('content')
<div class="container mt-4">
    <div class="alert alert-success">
        <h1>{{ $viewData["title"] }}</h1>
        <p>Product successfully created.</p>
    </div>
</div>
@endsection
