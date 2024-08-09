<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset='utf-8'>

	<title>学生用座席登後トップ画面</title>
</head>
<body>
<form method="post" action="{{ route('reseatregist',['id'=>$array['subject'], 'user_id'=>\Auth::user()->id, 'class_time'=>$array['class_time'], 'seat_name'=>$seat_name ]) }}">
    {{ csrf_field() }}

<dl>
	
@if (Auth::check())

	{{ csrf_field() }}

	<p>{{ \Auth::user()->name }}さん。
	<p> {{ $subject_name_php }} </p>
	<p> 第{{ $array['class_time'] }}回授業の座席登録が完了しています。 </p>
	<p> 座席場所は{{ $seat_name }} </p>
	<p><button type="submit" method='post'>修正</button></p>
	
	
	

	


</dl>
<p><a href="/logout">ログアウト</a></p>

@endif
</form>
</body>
</html>