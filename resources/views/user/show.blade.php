<h1>{{ $movies->name }}</h1>
<p>情報：{{ $movies->information }}</p>
<p>カテゴリ：{{ $movies->category?->name }}</p>
<p>シリーズ：{{ $movies->series?->name }}</p>
<p>視聴回数：{{ $movies->view }}</p>
<p>公開日時：{{ $movies->released_at }}</p>

<a href="{{ route('user.index') }}">映画一覧へ戻る</a>
<a href="{{ route('user.evaluation', ['movie_id' => $movies->id]) }}">評価を書き込む</a>
