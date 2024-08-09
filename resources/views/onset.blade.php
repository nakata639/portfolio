<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset='utf-8'>
	<title>座席登録開始の授業回選択画面</title>
</head>

<body>

	<p> {{ \Auth::user()->name }}先生。</p>
	<!-- onsetviewメソッドで$subject変数に入ってたデータからsubject_nameを指定して表示する。そのまま $subject->subject_id と記述すれば選択した科目のsubject_idを表示できる。 -->
	<p> {{ $subject->subject_name }}の授業回を選択してください。 </p>

	<!-- route名がonsetのルーティングを呼び出して、id変数を定義して$subjectに入ってるsubject_idの値をルートに渡す。-->
	<form method="post" action="{{ route('onset',['id'=>$subject -> subject_id]) }}">

	<!-- この下のやつを入れないと遷移時に419 PAGE EXPIREDエラーが表示される。意味はわからん -->
	{{ csrf_field() }}
	<div class="form-group row">	<!-- このclassで囲ったところをグループ化するっぽい　-->
	<label for="sel01" class="col-md-4 col-form-label text-md-right">授業回</label> <!-- ここのclassはcssファイルのクラスの呼び出しっぽい -->
	<div class="col-md-6"> <!-- ここもグループ化か -->

		<!-- nameで名前を与えてコントローラーで選択した授業回のvalue値を取得できる(valueからテキストに変換するときはimplode関数を使う　-->
		<select class="form-control" id="sel01" name="class_time_set">

			<!-- valueの後に数字を書いているがvarchar型として格納されるため、コントローラーで値を受け取った後にint型にキャスト(変換)する必要がある　-->
			<option value="1" selected>第1回</option>
			<option value="2">第2回</option>
			<option value="3">第3回</option>
			<option value="4">第4回</option>

			<!-- 第5回から15回まではデータベースにデータを入れてない
			<option value="5">第5回</option>
			<option value="6">第6回</option>
			<option value="7">第7回</option>
			<option value="8">第8回</option>
			<option value="9">第9回</option>
			<option value="10">第10回</option>
			<option value="11">第11回</option>
			<option value="12">第12回</option>
			<option value="13">第13回</option>
			<option value="14">第14回</option>
			<option value="15">第15回</option>
			-->

		</select>
	</div>
	</div>

	<!--  submitでデータ送信型、onsetって名前でボタンを区別、postでpostメソッドとしてデータ送信(postの時のルーティングが呼び出される) -->
	<p><button type="submit" name="onset" method='post'>座席登録を開始</button></p>

	</form>

	<form method="post" action="{{ route('BackToThome') }}">
    {{ csrf_field() }}
    <p><button type="submit" method='post'>戻る</button></p>
    </form>

</body>
</html>