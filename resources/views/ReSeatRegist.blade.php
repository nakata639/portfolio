<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset='utf-8'>
	<meta http-equiv="Content-Script-Type" content="JavaScript">

	{{ csrf_field() }}
	
	<title>座席登録画面</title>
</head>
<body>
	{{ csrf_field() }}
	
	<form method="post" action="{{ route('StudentHomeSeatRegist',['array'=>$seat_array]) }}" >
	
<dl>
	
@if (Auth::check())

	{{ csrf_field() }}


	<meta name="csrf-token" content="{{ csrf_token() }}">

	<p>座席登録画面</p>
	<p>{{ \Auth::user()->name }}さん。</p>
	<p> {{ $subject->subject_name }}</p>
	<p> 第{{ $class_time_set }}回</p>
    <p> 修正前は{{ $seat_array['seat_name'] }}です。</p>

	<!-- この下のやつを入れると何故かクリックした時の黄色くする部分がずれる　-->
	<!-- <p> {{$json}} </p> -->

	<!-- seat_arrayに入っているid、class_time、subjectを表示している 
	<p> {{$seat_array['id']}} </p>
	<p> {{$seat_array['class_time']}} </p>
	<p> {{$seat_array['subject']}} </p>
	-->


	<br>修正後に登録する座席を選択してください。</br>

	<!-- このcanvasタグがないとダメ。300×300はJavaScriptで描画する場所を作ってる -->
	<canvas id="2_101" width="850" height="450">
	</canvas>

	
	<!-- これでjavascriptに値を渡す　-->
	<div id="id" title="{{$seat_array['id']}}">
	<div id="class_time" title="{{$seat_array['class_time']}}">
	<div id="subject" title="{{$seat_array['subject']}}">
    <div id="seat_name" title="{{$seat_array['seat_name']}}">


	<script	type="text/javascript" src="{{ asset('js/Re_classroom_2_101.js') }}"></script>

	<!-- ここでJavaScriptのjson_nameを受け取っってる? -->
	<input type="hidden" name="json_name" value=""/>	

	<p><button type="submit" name="StudentHomeSeatRegist" id="btn" method='post'>戻る</button></p>
	{{ csrf_field() }}
	


<p><a href="/logout">ログアウト</a></p>
@endif
<!-- </form> -->
</body>
</html>