<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset='utf-8'>
    <title>ログインフォーム</title>
</head>
<body>
@isset($errors)
    <p style="color:red">{{ $errors->first('message') }}</p>
@endisset
<form name="loginform" action="/login" method="post">
    {{ csrf_field() }}
<dl>
    <dt>学籍番号:</dt><dd><input type="text" name="number" size="30" value="{{ old('number') }}"></dd>
    <dt>パスワード:</dt><dd><input type="password" name="password" size="30"></dd>
</dl>
<button type='submit' name='action' value='send'>ログイン</button>
</form>
</body>
</html>

