@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    @foreach ($events as $evento)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
            <h5 class="card-title">{{$evento->name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$evento->user->name}}</h6>
            <p class="card-text">{{$evento->date}}</p>
            <p class="card-text">Posti disponibili: {{$evento->available_tickets}}</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    @endforeach
</div>
@endsection