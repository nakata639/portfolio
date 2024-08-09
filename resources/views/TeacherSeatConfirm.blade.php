<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset='utf-8'>
	<title>確認する科目と授業回選択画面</title>
</head>

<body>

	<p> {{ \Auth::user()->name }}先生。</p>
	<p> 着席場所を確認したい科目と授業回を選択してください。 </p>

    <form method="post" action="{{ route('ShowStudentSeat') }}">

    <div class="form-group row">	<!-- このclassで囲ったところをグループ化するっぽい　-->
	<label for="subject" class="col-md-5 col-form-label2 text-md-right2">科目</label> <!-- ここのclassはcssファイルのクラスの呼び出しっぽい -->
	<div class="col-md-6"> <!-- ここもグループ化か -->

		<!-- nameで名前を与えてコントローラーで選択した授業回のvalue値を取得できる(valueからテキストに変換するときはimplode関数を使う　-->
		<select class="form-control2" id="sel02" name="subject_name_select">

            @foreach($subject as $subject)
			<!-- valueの後に数字を書いているがvarchar型として格納されるため、コントローラーで値を受け取った後にint型にキャスト(変換)する必要がある　-->
			    <option value="{{ $subject -> subject_id }}">{{ $subject -> subject_name }}</option>
            @endforeach

		</select>
	</div>
	</div>

    <!-- class="col-md-6"> のグループ化してるっぽいのは授業回の方まで含めた方がいいのか? -->

    <p>
    <div class="form-group row">	<!-- このclassで囲ったところをグループ化するっぽい　-->
	<label for="class_time" class="col-md-6 col-form-label3 text-md-right3">授業回</label> <!-- ここのclassはcssファイルのクラスの呼び出しっぽい -->
	<div class="col-md-7"> <!-- ここもグループ化か -->

		<!-- nameで名前を与えてコントローラーで選択した授業回のvalue値を取得できる(valueからテキストに変換するときはimplode関数を使う　-->
		<select class="form-control3" id="sel03" name="class_time_select">

			<!-- valueの後に数字を書いているがvarchar型として格納されるため、コントローラーで値を受け取った後にint型にキャスト(変換)する必要がある　-->
			<option value="1" selected>第1回</option>
			<option value="2">第2回</option>
			<option value="3">第3回</option>
			<option value="4">第4回</option>

		</select>
	</div>
	</div>
    </p>
    <p><button type="submit" name="ShowStudentSeat" method='post'>表示</button></p>
	
</form>
</body>
</html>