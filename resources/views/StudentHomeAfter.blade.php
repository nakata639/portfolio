<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset='utf-8'>
	<title>学生用座席登録開始後トップ画面</title>
</head>
<body>
	<form method="post" action="{{ route('seatregist',['id'=>$subject -> subject_id, 'user_id'=>\Auth::user()->id, 'class_time'=>$class_time -> class_times]) }}">
    {{ csrf_field() }}

<dl>
	
@if (Auth::check())

	{{ csrf_field() }}

	<!-- 座席登録が開始中の時の画面 -->
	<p>{{ \Auth::user()->name }}さん。
	    <br>座席登録が開始されています。</br></p>
    <p> {{ $subject->subject_name }}</p>
    <p> 第{{ $class_time->class_times }}回</p>
    <p><button type="submit" method='post'>座席登録</button></p>
	


</dl>
<p><a href="/logout">ログアウト</a></p>

@endif
</form>
</body>
</html>