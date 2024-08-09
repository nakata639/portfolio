<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset='utf-8'>
    <title>教員ログインフォーム</title>
</head>
<body>
@isset($errors)
    <p style="color:red">{{ $errors->first('message') }}</p>
@endisset
<form name="TeacherLoginform" action="/TeacherLogin" method="post">
    {{ csrf_field() }}
<dl>
    <dt>教員ナンバー:</dt><dd><input type="text" name="teacher_number" size="30" value="{{ old('teacher_number') }}"></dd>
    <dt>パスワード:</dt><dd><input type="password" name="teacher_password" size="30"></dd>
</dl>
<button type='submit' name='action' value='send'>ログイン</button>
</form>
</body>
</html>