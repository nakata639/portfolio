<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset='utf-8'>
	<title>教員用トップ画面</title>
</head>
<body>

    {{ csrf_field() }}

<dl>
	<p>こんにちは！
@if (Auth::check())
<!-- 教員ログイン時の画面 -->

	{{ csrf_field() }}

	<!-- 座席登録が開始されてない場合　-->
	{{ \Auth::user()->name }}先生。</p>

	<p>出席登録を開始する授業を選択してください。</p>

	 <!-- $subjectに入ってる配列を一つずつ取り出す -->
	 <td>@foreach($subject as $subject)

	 <!-- aタグのhref属性でクリックした後のアクションを=の後に書く。route名がonsetviewのルーティングを呼び出して、ここでid変数を定義して$subjectに入ってるsubject_idの値を格納しonsetviewルートに渡す。-->
	 <li>  <a href="{{ route('onsetview',['id'=>$subject -> subject_id]) }}">{{ $subject -> subject_name }}</a> </li>
			@endforeach
	</td>

</dl>

	<p><a href="/TeacherLogout">ログアウト</a></p>

@endif
</form>
</body>
</html>