<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<h1>口コミ一覧</h1>
@if ($reviews->count() > 0)
    <table>
        <tr>
            <th>映画名</th>
            <th>ユーザー</th>
            <th>口コミ</th>
            <th>評価</th>
        </tr>
        {{-- @foreach ディレクティブで、1件ずつ処理 --}}
        @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->movie->name }}</td>
                <td>{{ $review->user->name }}</td>
                <td>{{ $review->review }}</td>
                <td>{{ $review->rating }}</td>
            </tr>
        @endforeach
    </table>
@else
    <p>レビューはありません</p>
@endif
<a href="/admin/show/{{ $review->movie_id }}">詳細に戻る</a>
<a href="/admin/index/">一覧に戻る</a>
