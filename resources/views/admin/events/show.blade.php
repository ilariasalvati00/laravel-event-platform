@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          {{$event->name}}
          <div class="container-2">
          @foreach ($event->tags as $tag)
            <span class="badge bg-primary p-1">{{$tag->name}}</span>
          @endforeach
          </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Data: {{$event->date}}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
         Biglietti disponibili: {{$event->available_tickets}}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Evento creato da: {{$event->user->name}}
           </li>
      </ul>

      <a href="{{route("admin.events.edit", $event->id)}}"><button class="btn btn-primary">Modifica Evento</button></a>
      <form class="mt-2" action="{{route("admin.events.destroy", $event->id)}}" method="POST">
          @csrf
          @method("DELETE")
          <button type="submit" class="btn btn-danger">Elimina Evento</button>
      </form>
</div>
@endsection

