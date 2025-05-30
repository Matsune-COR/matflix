<h1>映画一覧</h1>

<table border="1">
    <thead>
        <tr>
            <th>映画名</th>
            <th>情報</th>
            <th>カテゴリID</th>
            <th>シリーズID</th>
            <th>視聴回数</th>
            <th>公開日時</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($movies as $movie)
            <tr>
                <td><a href="/user/show/{{ $movie->id }}">{{ $movie->name }}</a></td>
                <td>{{ $movie->information }}</td>
                <td>{{ $movie->category?->name }}</td>
                <td>{{ $movie->series?->name }}</td>
                <td>{{ $movie->view }}</td>
                <td>{{ $movie->released_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<form action="/user/index" method="GET">
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
<p><a href="/user/index">ソートリセット</a></p>
