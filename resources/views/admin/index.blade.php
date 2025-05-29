<link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
        @foreach ($movies as $movies)
            <tr>
                <td>{{ $movies->name }}</td>
                <td>{{ $movies->information }}</td>
                <td>{{ $movies->category->name ?? 'カテゴリなし' }}</td>
                <td>{{ $movies->series->name ?? 'カテゴリなし' }}</td>
                <td>{{ $movies->view }}</td>
                <td>{{ $movies->is_distribution }}</td>
                <td>{{ $movies->released_at }}</td>
                <td><a href="/admin/show/{{ $movies->id }}">詳細</a></td>
            </tr>
        @endforeach
    </table>
@else
    <p>お問い合わせはありません</p>
@endif
<p><a href="/admin/create">映画新規登録</a></p>
