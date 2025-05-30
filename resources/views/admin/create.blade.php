<h1>create</h1>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<h1>入力画面</h1>
<p>映画情報を入力してください</p>

{{-- エラーがある場合、一覧として表示 --}}
@if ($errors->any())
    {{-- エラー内容が出力されるが、処理が中断される  --}}
    {{-- @php dd($errors); @endphp --}}
    <ul>
        @foreach ($errors->all() as $error)
            <li><span class="error">{{ $error }}</span></li>
        @endforeach
    </ul>
@endif

<form action="/admin/store" method="POST">
    @csrf
    <div>
        映画名：<input type="text" id="name" name="name" value="{{ old('name') }}">
        {{-- name フィールドにエラーがある場合、エラーメッセージを表示 --}}
        @if ($errors->has('name'))
            <span class="error">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div>
        映画情報：<input type="text" id="name" name="information" value="{{ old('information') }}">
        {{-- name フィールドにエラーがある場合、エラーメッセージを表示 --}}
        @if ($errors->has('information'))
            <span class="error">{{ $errors->first('information') }}</span>
        @endif
    </div>
    <div>
        カテゴリID：<input type="number" name="category_id" value="{{ old('category_id') }}" min="1" max="5"
            step="1">
    </div>
    <div>
        シリーズID：<input type="number" name="series_id" value="{{ old('series_id') }}" min="1" max="5"
            step="1">
    </div>
    <div>
        視聴回数：<input type="number" name="view" value="{{ old('view') }}" min="0" max="10000000000"
            step="10000">
    </div>
    <div>
        <label>
            <input type="radio" name="is_distribution" value="1"
                {{ old('is_visible', '1') == '1' ? 'checked' : '' }}>
            配信
        </label>
        <label>
            <input type="radio" name="is_distribution" value="0"
                {{ old('is_visible', '0') == '0' ? 'checked' : '' }}>
            非配信
        </label>
    </div>
    <div>
        公開日：<input type="date" name="released_at" value="{{ old('released_at') }}">
    </div>
    <div>
        画像パス：<input type="text" name="image_path" value="{{ old('image_path') }}">
    </div>

    <input type="hidden" name="send">
    <button class="btn-blue">送信</button>
</form>
