@extends('layouts.main')

@section('title', 'Editando : '.$event->title)

@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Editando : {{ $event->title}}</h1>

        <form action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Imagem do Evento : </label>
                <input type="file" id="image" name="image" class="from-control-file">
                <img src="/img/events/{{$event->image}}" alt="{{$event->title}}" class="image-preview">
            </div>
            <div class="form-group">
                <label for="date">Data do Evento : </label>
                <input type="date" name="date" id="date" class="form-control" value="{{$event->date->format('Y-m-d')}}">
            </div>
            <div class="form-group">
                <label for="title">Evento : </label>
                <input type="text" name="title" id="title" class="form-control" placeholder="{{$event->title}}" value="{{$event->title}}">
            </div>
            <div class="form-group">
                <label for="city">Cidade : </label>
                <input type="text" name="city" id="city" class="form-control" placeholder="{{$event->city}}" value ="{{$event->city}}">
            </div>
            <div class="form-group">
                <label for="description">Descrição: </label>
                <textarea name="description" id="description" class="form-control"
                    placeholder="{{$event->description}}"></textarea>
            </div>
            <div class="form-group">
                <label for="title">Adicione Itens de Infraestrutura: </label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco"> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cerveja_gratis"> Cerveja Gratis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open_food"> Open Food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Brindes"> Brindes
                </div>
            </div>
            <div class="form-group">
                <label for="title">É privado? </label>
                <select name="private" id="private" class="form-control">
                    <option value=null></option>
                    <option value="0"> Nao </option>
                    <option value="1"{{$event->private == 1? "selected='selected'" : ""}}> Sim </option>
                </select>
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value="Editar Evento">
        </form>
    </div>
@endsection
