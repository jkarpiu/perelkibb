@foreach ($item->comments as $comment)
    <div class="comment">
        <p>{{ $comment->content }}</p>
    <small>Utworzono: {{ $comment->created_at }} Autor: {{ $comment -> user -> name}}</small>
    </div>
@endforeach

@guest
    <div style="margin: auto; padding: 50px;">
        Zaloguj się aby dodać komentarz
    </div>

@else

    <form action="/com_add" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $item->id }}">
        <textarea name="content" id="content" class="form-control" rows="5"></textarea>
        <button class="btn btn-primary add_comment_button" type="submit">Dodaj komentarz</button>
    </form>

@endguest
