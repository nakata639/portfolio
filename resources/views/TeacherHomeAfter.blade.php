<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset='utf-8'>
	<title>教員用座席登録開始後トップ画面</title>
</head>
<body>
    <form method="post" action="{{ route('restrict',['id'=>$subject -> subject_id]) }}">

    {{ csrf_field() }}

<dl>
	
@if (Auth::check())

	{{ csrf_field() }}

	<!-- 座席登録が開始中の時の画面 -->

	<p>{{ \Auth::user()->name }}先生。
	    <br>座席登録が開始されています。</br></p>
    <p> {{ $subject->subject_name }}</p>
    <p> 第{{ $class_time->class_times }}回</p>
    <p><button type="submit" method='post'>座席登録を終了</button></p>
	</form>


	<form method="post" action="{{ route('seatconfirm') }}">
    {{ csrf_field() }}
    <p><button type="submit" method='post'>着席場所を確認</button></p>
    </form>

</dl>
	<p><a href="/TeacherLogout">ログアウト</a></p>

@endif
</body>
</html>