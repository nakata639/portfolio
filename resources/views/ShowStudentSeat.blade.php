<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset='utf-8'>
	<meta http-equiv="Content-Script-Type" content="JavaScript">

	{{ csrf_field() }}
	
	<title>座席登録画面</title>
</head>
<body>
    <!-- セレクトボックスから値を取得できてることを確認できた
    <p>{{ $subject_id }}</p>
    <p>{{ $class_time }}</p>
    -->
	{{ csrf_field() }}
	
	
<dl>
	
@if (Auth::check())

	{{ csrf_field() }}


	<meta name="csrf-token" content="{{ csrf_token() }}">

	<p>学生の座席場所表示画面</p>
	<p>{{ \Auth::user()->name }}さん。</p>
	<p> {{ $subject_name }}</p>
	<p> 第{{ $class_time }}回</p>

	<!-- このcanvasタグがないとダメ。300×300はJavaScriptで描画する場所を作ってる -->
	<canvas id="2_101" width="850" height="450">
	</canvas>

    <div id="id" title="{{ $seat_information_stdClass }}">
    <div id="ia" title="{{ $json }}">

	<script	type="text/javascript" src="{{ asset('js/teacher_classroom_2_101.js') }}"></script>

	<!-- ここでJavaScriptのjson_nameを受け取っってる? -->
	<input type="hidden" name="json_name" value=""/>	

	<p><button type="submit" name="StudentHomeSeatRegist" id="btn" method='post'>戻る</button></p>
	{{ csrf_field() }}
	


<p><a href="/logout">ログアウト</a></p>
@endif
</body>
</html>