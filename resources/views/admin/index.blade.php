<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<h1>映画一覧</h1>
@if ($movies->count() > 0)
    <table>
        <tr>
            <th>タイトル</th>
            <th>映画情報</th>
            <th>カテゴリ</th>
            <th>シリーズ</th>
            <th>視聴回数</th>
            <th>配信フラグ</th>
            <th>公開日</th>
            <th>映画詳細</th>
        </tr>
        {{-- @foreach ディレクティブで、1件ずつ処理 --}}
        @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie->name }}</td>
                <td>{{ $movie->information }}</td>
                <td>{{ $movie->category->name ?? 'カテゴリなし' }}</td>
                <td>{{ $movie->series->name ?? 'カテゴリなし' }}</td>
                <td>{{ $movie->view }}</td>
                <td>{{ $movie->is_distribution }}</td>
                <td>{{ $movie->released_at }}</td>
                <td><a href="/admin/show/{{ $movie->id }}">詳細</a></td>
            </tr>
        @endforeach
    </table>
@else
    <p>お問い合わせはありません</p>
@endif
<p><a href="/admin/create">映画新規登録</a></p>
{{-- ソート機能実装 --}}

<form action="/admin/index" method="GET">
    {{-- 検索 --}}
    <label for="keywords">キーワード検索:</label>
    <input type="text" name="keywords" id="keywords" placeholder="キーワードを入力">
    <button type="submit">検索</button>

    {{--ここの値を使った条件式をコントローラーで実装 --}}
    <p>並び替え方法を選択してください:</p>

    <label>
        <input type="radio" name="sort" value=1> 人気順（再生数）
    </label>
    <label>
        <input type="radio" name="sort" value=2> 公開日（昇順）
    </label>
    <label>
        <input type="radio" name="sort" value=3> 公開日（降順）
    </label>
    <br>
    <p>カテゴリ別</p>

    <label>
        <input type="radio" name="sort" value=4> アニメーション
    </label>
    <label>
        <input type="radio" name="sort" value=5> コメディ
    </label>
    <label>
        <input type="radio" name="sort" value=6> アクション
    </label>
    <label>
        <input type="radio" name="sort" value=7> ホラー
    </label>
    <br><br>
    <button type="submit">ソート実行</button>
</form>
<p><a href="/admin/index">ソートリセット</a></p>

