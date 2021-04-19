@extends('layouts/app')

@section('content')
<div class="row">
        <div class="col-lg-3">
            <div class="card text-center my-2">
                <div class="card-body">
                    <h5 class="card-title">{{ $property->title }}</h5>
                    <p class="card-text">{{ Str::limit($property->description, 25) }}</p>
                </div>
                <div class="card-footer text-muted">
                    {{ number_format($property->price) }} €
                </div>
            </div>
        </div>
</div>
@endsection