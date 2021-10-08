@extends('layouts.main')
@section('title', 'Events')
@section('content')
    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Informe o Evento">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        @if ($search)
            <h2>Resultados para : {{ $search }}</h2>
        @else
            <h2> Proximos Eventos </h2>
            <p class="subtitle">Veja os Eventos Proximos</p>
        @endif
        <div id="cards-container" class="row">
            @foreach ($events as $event)
                <div class="card col-md-3">
                    <img src="img/events/{{ $event->image }}" alt="{{ $event->title }}">
                    <p class="card-body"></p>
                    <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-participants">{{count($event->users)}} Participantes</p>
                    <a href="/events/{{ $event->id }}" class="btn btn-primary">Saiba Mais</a>
                </div>
            @endforeach
            @if (count($events) == 0 && $search)
                <p>Nao Foi possivel encontrar o Evento relacionado a :  {{ $search }}!<a href="/"> Ver Todos</a></p>
            @elseif (count($events) == 0)
                <p>Não há eventos proximos</p>
            @endif
        </div>
    </div>
@endsection
