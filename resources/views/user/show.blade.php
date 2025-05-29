<h1>{{ $movie->name }}</h1>
<p>情報：{{ $movie->information }}</p>
<p>カテゴリ：{{ $movie->category?->name }}</p>
<p>シリーズ：{{ $movie->series?->name }}</p>
<p>視聴回数：{{ $movie->view }}</p>
<p>公開日時：{{ $movie->released_at }}</p>

<a href="{{ route('user.index') }}">映画一覧へ戻る</a>
<a href="{{ route('user.evaluation', ['movie_id' => $movie->id]) }}">評価を書き込む</a>
<a href="/user/reviews/{{ $movie->id }}">口コミを見る</a>
