@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <form action="{{route("admin.events.store")}}" method="POST">
        @csrf
        
        <div class="form-group">
          <label for="exampleFormControlInput1">Nome evento</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Scrivi nome evento" name="name">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput2">Data evento</label>
          <input type="date" class="form-control" id="exampleFormControlInput2" placeholder="" name="date">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput3">Numero di biglietti</label>
          <input type="number" class="form-control" id="exampleFormControlInput3" placeholder="" name="tickets">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect2">Tag</label>
          <select multiple class="form-control" id="exampleFormControlSelect2" name="tags[]">
            @foreach ($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Crea Evento</button>
      </form>
</div>
@endsection