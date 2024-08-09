<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset='utf-8'>
	<title>トップ画面</title>
</head>
<body>
	<p>こんにちは！
@if (Auth::check())
<!-- 学生用ログイン時の画面 -->
	{{ \Auth::user()->name }}さん</p>
	<p>今日も1日がんばりましょう。</p>
	<p>現在座席登録が可能な授業はありません。</p>
	

	

	<p><a href="/logout">ログアウト</a></p>

@else
<!-- 非ログイン時の画面 -->
	ゲストさん。</p>
	<p>ログインをお願いします。</p>
	<p><a href="/login">ログイン</a><br><a href="/register">ユーザ登録</a></p>
@endif
</body>
</html>
