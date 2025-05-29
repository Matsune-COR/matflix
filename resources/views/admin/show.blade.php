<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<table>
    <tr>
        <th>ID</th>
        <th>タイトル</th>
        <th>映画情報</th>
        <th>カテゴリ</th>
        <th>シリーズ</th>
        <th>視聴回数</th>
        <th>配信フラグ</th>
        <th>公開日</th>
    </tr>
    <tr>
        <td>{{ $movie->id }}</td>
        <td>{{ $movie->name }}</td>
        <td>{{ $movie->information }}</td>
        <td>{{ $movie->category->name ?? 'カテゴリなし' }}</td>
        <td>{{ $movie->series->name ?? 'カテゴリなし' }}</td>
        <td>{{ $movie->view }}</td>
        <td>{{ $movie->is_distribution }}</td>
        <td>{{ $movie->released_at }}</td>
    </tr>
</table>
<p><a href="/admin/edit/{{ $movie->id }}">編集画面</a></p>
