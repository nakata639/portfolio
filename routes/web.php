<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//ユーザ(学生)のトップ画面のルーティング定義
Route::get('/home', function() {
	return view('home');
});


//ユーザ登録のルーティング定義
Route::get('/register', [App\Http\Controllers\RegisterController::class, 'create'])
	->middleware('guest')
	->name('register');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store'])
	->middleware('guest');


//ログインのルーティング定義
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])
	->middleware('guest')
	->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate'])
	->middleware('guest');


//ログアウトのルーティング定義
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])
	->middleware('auth')
	->name('logout');
	

//教員用のトップ画面のルーティング定義
Route::get('/thome', function() {

	//subject変数に配列でsubject1とsubject2とsubject3を格納
	$subject = ['subject1', 'subject2', 'subject3'];

	//thomeに遷移するのと同時にthome.bladeファイルに変数subjectを渡す
	return view('thome',compact('subject'));
});


/*
教員用のユーザ登録のルーティング定義

Route::get('/TeacherRegister', [App\Http\Controllers\TeacherRegisterController::class, 'TeacherCreate'])
	->middleware('guest')
	->name('TeacherRegister');
Route::post('/TeacherRegister', [App\Http\Controllers\TeacherRegisterController::class, 'TeacherStore'])
	->middleware('guest');


教員用のログインのルーティング定義

Route::get('/TeacherLogin', [App\Http\Controllers\TeacherLoginController::class, 'TeacherIndex'])
	->middleware('guest')
	->name('TeacherLogin');
Route::post('/TeacherLogin', [App\Http\Controllers\TeacherLoginController::class, 'TeacherAuthenticate'])
	->middleware('guest');
*/



//教員用のログアウトのルーティング定義 これは今も使用中
Route::get('/TeacherLogout', [App\Http\Controllers\TeacherLoginController::class, 'TeacherLogout'])
	->middleware('auth')
	->name('TeacherLogout');

/*
Route::post('/thome', function () {
    return view('thome');
});
*/


//科目をクリックして/onsetにアクセスしたらTeacherHomeControllerのonsetviewメソッドを呼び出す。
//そしてこのルーティングの名前をonsetviewにする(URLから値を渡すのに使用する)。
Route::get('/onset/{id}', 'App\Http\Controllers\TeacherHomeController@onsetview')->name('onsetview');

//授業回選択画面で「座席登録開始」ボタンが押されるとこのメソッドが呼び出されて、 TeacherHomeControllerのonsetメソッドが呼び出される
Route::post('/TeacherHomeAfter/{id}', 'App\Http\Controllers\TeacherHomeController@onset')->name('onset');

Route::put('/thome', 'App\Http\Controllers\TeacherHomeController@backtothome')->name('BackToThome');

//座席登録開始後のホーム画面で「座席登録を制限」ボタンを押したら呼び出される
Route::post('/thome', 'App\Http\Controllers\TeacherHomeController@restrict')->name('restrict');

//座席登録ボタンが押された時に呼び出される
Route::post('/SeatRegist/subject_id={id}/user_id={user_id}/class_time={class_time}', 'App\Http\Controllers\StudentHomeController@seatregist')->name('seatregist');

//座席登録画面で戻るボタンが押された時に呼び出される
Route::post('/StudentHomeSeatRegist', 'App\Http\Controllers\StudentHomeController@studenthomeseatregist')->name('StudentHomeSeatRegist');

//座席をクリックした時に呼び出される
Route::post('/renewal_url', 'App\Http\Controllers\StudentHomeController@seatrenewal')->name('seatrenewal');

//修正ボタンが押されたときに呼び出される
Route::post('/ReSeatRegist/subject_id={id}/user_id={user_id}/class_time={class_time}/seat_name={seat_name}', 'App\Http\Controllers\StudentHomeController@reseatregist')->name('reseatregist');

//教員トップ画面で着席場所を確認ボタンが押されたときに呼び出される
Route::post('/TeacherSeatConfirm', 'App\Http\Controllers\TeacherHomeController@seatconfirm')->name('seatconfirm');

//教員が学生の着席場所を表示するための科目と授業回選択画面で表示ボタンが押されたときに呼び出される
Route::post('/ShowStudentSeat', 'App\Http\Controllers\TeacherHomeController@showstudentseat')->name('ShowStudentSeat');