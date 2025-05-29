<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@if ($reviews->count() > 0)
    <table>
        <tr>
            <th>映画名</th>
            <th>ユーザー</th>
            <th>口コミ</th>
            <th>評価</th>
            <th>戻る</th>
        </tr>
        {{-- @foreach ディレクティブで、1件ずつ処理 --}}
        @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->movie->name }}</td>
                <td>{{ $review->user->name }}</td>
                <td>{{ $review->review }}</td>
                <td>{{ $review->rating }}</td>
                <td><a href="/user/show/{{ $review->movie_id }}">詳細に戻る</a></td>
            </tr>
        @endforeach
    </table>
@else
    <p>レビューはありません</p>
    <a href="/user/index/">一覧に戻る</a>
@endif
