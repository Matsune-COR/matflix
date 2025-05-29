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
