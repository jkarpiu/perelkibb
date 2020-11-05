@extends('layouts.app')
@section('content')
    @foreach ($collection as $item)
        <a href="/item/{{ $item->id }}">
            <div class="indexContainer">
                <div class="itemInfoContainer">
                    <p class="itemName">{{ $item->name }}</p>
                    <p>Wynik: {{ $item->score }}</p>
                    <p class="itemLocation">Lokalizacja: {{ $item->street }}</p>
                </div>
                <img class="itemPhoto" src="{{ $item->image }}" alt="">
            </div>
        </a>
    @endforeach
@endsection
