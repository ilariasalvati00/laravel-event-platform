@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    @foreach ($events as $evento)
        <div class="card" style="width: 18rem;">
            <a href ="{{route("admin.events.show", $evento->id)}}" class="card-body text-decoration-none">
            <h5 class="card-title">{{$evento->name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$evento->user->name}}</h6>
            <p class="card-text">{{$evento->date}}</p>
            <p class="card-text">Posti disponibili: {{$evento->available_tickets}}</p>
            <a href="{{route("admin.events.edit", $evento->id)}}" class="card-link">Modifica evento</a>
            </a>
        </div>
    @endforeach
</div>
@endsection