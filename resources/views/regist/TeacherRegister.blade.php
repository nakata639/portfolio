<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset='utf-8'>
	<title>教員登録フォーム</title>
</head>
<body>
<form name="TeacherRegistform" action="/TeacherRegister" method="post" id="TeacherRegistform">
	{{ csrf_field() }}
	<dl>
		<dt>名前:</dt>
		<dd><input type="text" name="teacher_name" size="30">
			<span>{{ $errors->first('teacher_name') }}</span></dd>
	</dl>
	<dl>
		<dt>教員番号:</dt>
		<dd><input type="text" name="teacher_number" size="30">
			<span>{{ $errors->first('teacher_number')}}</span></dd>
	</dl>
	<dl>
		<dt>パスワード:</dt>
		<dd><input type="password" name="teacher_password" size="30">
			<span>{{ $errors->first('teacher_password') }}</span></dd>
	</dl>
	<dl>
		<dt>パスワード(確認):</dt>
		<dd><input type="password" name="teacher_password_confirmation" size="30">
			<span>{{ $errors->first('teacher_password_confirmation') }}</span></dd>
	</dl>
	<button type='submit' name='action' value='send'>送信</button>
</form>
</body>
</html>