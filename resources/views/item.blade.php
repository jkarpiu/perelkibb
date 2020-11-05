@extends('layouts.app')
@section('content')
    <div>
        <div class="itemContainer">
            <div class="itemInfoContainer">
                <div style="display: flex; justify-content: space-between;">
                    <div>
                        <p class="itemName">{{ $item->name }}</p>

                        <small>
                            <i> #{{ $item->id }}</i>
                            <p>Autor: {{ $item->user->name }}</p>
                        </small>
                    </div>
                    <div style="margin: 15px;">
                        <form action="/per_plus" method="POST">
                            @csrf
                            <input name="id" type="hidden" value="{{ $item->id }}">
                            <button type="submit" class="btn btn-success">+</button>
                        </form>
                        <h3 style="padding-left: 8px; padding-top: 8px;">{{ $item->score }}</h3>
                        <form action="/per_minus" method="POST">
                            @csrf
                            <input name="id" type="hidden" value="{{ $item->id }}">
                            <button type="submit" class="btn btn-danger">-</button>
                        </form>
                    </div>
                </div>
                <p class="itemLocation">Lokalizacja: {{ $item->street }}</p>
                <p>{{ $item->desc }}</p>
            </div>
            <img class="itemPhoto" src="{{ $item->image }}" alt="">
            <div class="comments">
                @include('comments')
            </div>
        </div>
    </div>
@endsection
