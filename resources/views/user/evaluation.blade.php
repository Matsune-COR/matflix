<h1>{{ $movie->name }}</h1>
<p>情報：{{ $movie->information }}</p>
<p>カテゴリ：{{ $movie->category?->name }}</p>
<p>シリーズ：{{ $movie->series?->name }}</p>
<p>視聴回数：{{ $movie->view }}</p>
<p>公開日時：{{ $movie->released_at }}</p>

<p>お名前：{{ Auth::user()->name }}</p>

<a href="{{ route('user.show', ['movie_id' => $movie->id]) }}">詳細へ戻る</a>

{{-- <form action="{{ route('user.evaluation.post', ['movie_id' => $movies->id]) }}" method="POST"> --}}
<form action="/user/evaluation/{{ $movie->id }}" method="POST">
    @csrf
    <p>評価：<input type="number" name="rating" value="" min="1" max="5" step="0.1"></p>
    <div>
        口コミ：<textarea name="review" id="review" rows="4" cols="40"></textarea>
    </div>
    <button>送信</button>
</form>
