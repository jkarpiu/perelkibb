@extends('layouts.app')

@section('content')
    @guest
        <div style="margin: auto; padding: 50px;">
            Zaloguj się, aby dodać obiekt
        </div>
    @else
        <div class="form">
            <form action="/add" method="post" enctype="multipart/form-data">
                @csrf
                <p>
                    Nazwa:
                    <input class="form-control" type="text" name="name">
                </p>
                <p>
                    Ulica:
                    <input class="form-control" id="location" type="text" name="location">
                </p>
                <p>
                    Zdjęcie:
                    <input type="file" class="file-field" name="image" id="">
                </p>
                <p>
                    Opis: <br>
                    <textarea name="desc" id="desc" class="form-control" rows="10"></textarea>
                </p>

                <button type="submit" class="btn btn-primary add_sendButton">Wyślij do weryfikacji</button>
            </form>
        </div>

    @endguest
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByH-eAVXSXKSx0Th5jVhNTg_0Xv9kEm70&libraries=places"></script>
    <script src="js/maps.js"></script>
@endsection
