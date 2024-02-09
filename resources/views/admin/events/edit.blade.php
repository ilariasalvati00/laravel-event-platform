@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <form action="{{route("admin.events.update", $event->id)}}" method="POST">
        @csrf
        @method("PUT")
        <div class="form-group">
          <label for="exampleFormControlInput1">Nome evento</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$event->name}}" placeholder="Scrivi nome evento" name="name">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput2">Data evento</label>
          <input type="date" class="form-control" id="exampleFormControlInput2" value="{{$event->date}}" placeholder="" name="date">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput3">Numero di biglietti</label>
          <input type="number" class="form-control" id="exampleFormControlInput3" value="{{$event->available_tickets}}" placeholder="" name="tickets">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect2">Tag</label>
          <select multiple class="form-control" id="exampleFormControlSelect2" name="tags[]">
            @foreach ($tags as $tag)
                <option {{$event->tags->contains($tag) ? "selected" : ""}} value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Modifica Evento</button>
      </form>

      <form class="mt-2" action="{{route("admin.events.destroy", $event->id)}}" method="POST">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-danger">Elimina Evento</button>
      </form>
</div>
@endsection