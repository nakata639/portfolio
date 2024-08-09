<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('number', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

                //教員(userテーブルのroleが1)かを判定して,
                //教員なら thome (教員用トップ画面)に遷移する。
                if (auth()->user()->role === 1){

                    
                    //class_limitが1になってるところのカラム数を取得してる(2だったらエラー出す)
                    $count = DB::table('class')
                        ->join('associates_user_and_subject',  'class.subject_id','=','associates_user_and_subject.subject_id')
                        ->where('user_id','=',auth()->user()->id)       //ここでログイン時の教員が担当している科目に制限している
                        ->where('class_limit', 1)
                        ->count();

                    //$countが2以上の場合の処理(エラー時)
                    if ($count >= 2) {      //$countの値が2以上なら
                        \DB::table('class')     
                            ->where('class_limit', '=', '1')    //class_limitが1のところの
                            ->update([
                            'class_limit' => '0'    //class_limitを0にする
                        ]);

                        $subject = DB::table('subject')     //ここがパラメータの受け渡しの始まり
                        ->join('associates_user_and_subject',  'subject.subject_id','=','associates_user_and_subject.subject_id')
                        ->select('subject.subject_id','subject_name')
                        ->where('user_id','=',auth()->user()->id)
                        ->get();

                        //thomeに遷移するのと同時にthome.bladeファイルに変数subjectを渡す
	                    return view('thome',compact('subject'));
                    

                        /*  エラー時にログアウトさせるコード。今は使ってない
                        Auth::logout();     //この3行でログアウトさせてる
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        return redirect(RouteServiceProvider::HOME);      //エラー扱いとしてホーム画面に遷移させる
                        */
                    }
                    //$countが1の時(座席登録が開始時)
                    elseif($count === 1){

                        //
                        $subject = DB::table('class')
                            ->join('subject',  'class.subject_id','=','subject.subject_id')
                            ->select('class_limit','class.subject_id','class_times','subject_name')
                            ->where('class_limit', '=', '1')
                            ->first();      //ここがget()だと　Property [class_times] does not exist on this collection instance.　ってエラー出る

                        $class_time = DB::table('class')
                            ->select('class_times')
                            ->where('class_limit', '=', '1')
                            ->first();

                        return view('/TeacherHomeAfter',compact('subject','class_time'));
                    }

                    //＄countが0の時(座席登録が開始されていない時)
                    else{                    

                    /*
                    ・$でまずsubject変数を宣言して、結合したいテーブル(今回は最終的に科目名をsubject変数に格納したいからそのカラムがあるsubjectテーブル)を()に入れる。
                    　joinでテーブル結合メソッド。最初の''ではsubjectテーブルと結合したいテーブル名を書く。その次の''では結合したいカラムがあるテーブルの書いた後に.を置いて
                    　そのカラムを書く。で = の後に結合したいもう一つのカラムがあるテーブルを書いて.の後にもう一つのカラムを書く。

                    ・selectではsubject_idに対応したsubject_nameをsubject変数に格納するため、subjectテーブルの後に.でsubject_idを書く。その後は
                    　「subject.」部分は書かず、subject_nameを書く。

                    ・whereでは現在ログインしているユーザに絞るためのコード。user_idがログイン中のidのデータに限定する。

                    ・getでそれらのデータを取得する。
                    */
                    $subject = DB::table('subject')     //ここがパラメータの受け渡しの始まり
                        ->join('associates_user_and_subject',  'subject.subject_id','=','associates_user_and_subject.subject_id')
                        ->select('subject.subject_id','subject_name')
                        ->where('user_id','=',auth()->user()->id)
                        ->get();

                    //thomeに遷移するのと同時にthome.bladeファイルに変数subjectを渡す
	                return view('thome',compact('subject'));
                    }

                }else{      //判定から外れた学生の処理

                    $count = DB::table('class')  
                        ->join('associates_user_and_subject',  'class.subject_id','=','associates_user_and_subject.subject_id')
                        ->where('user_id','=',auth()->user()->id)       //ここでログイン時の学生が受講している科目に制限している
                        ->where('class_limit', 1)
                        ->count();

                    if ($count >= 1) {      //座席登録が開始されている時

                        //$userid = DB

                        $subject = DB::table('subject')     //ここがパラメータの受け渡しの始まり
                            ->join('associates_user_and_subject',  'subject.subject_id','=','associates_user_and_subject.subject_id')
                            ->join('class',  'subject.subject_id','=','class.subject_id')
                            ->select('subject.subject_id','subject_name')                       
                            ->where('user_id','=',auth()->user()->id)       //ログインしている学生が受講している科目の
                            ->where('class_limit', 1)                       //class_limitが1になってるカラムの情報を取得
                            ->first();

                        //foreach($subject as $subject_id)
                        //{
                            
                        //}

                        $class_time = DB::table('class')
                            ->join('associates_user_and_subject',  'class.subject_id','=','associates_user_and_subject.subject_id')
                            ->join('subject',  'class.subject_id','=','subject.subject_id')
                            ->select('class_times')
                            ->where('user_id','=',auth()->user()->id)
                            ->where('class_limit', '=', '1')
                            ->first();

                        /*
                        $class_day = DB::table('class')
                            ->select('class_id')
                            ->where('subject_id','=',$subject->subject_id)
                            //->where('subject_id','=',3)
                            //->where('class_times','=',class_time)
                            //->where('class_times','=',1)
                            ->first();
                        */
                        
                            

                        return view('/StudentHomeAfter',compact('subject','class_time'));
                    }

                    elseif($count === 0){



            
                    return redirect()->intended(RouteServiceProvider::HOME);
                    }
                }
        }

        return back()->withErrors([
            'message' => '学籍番号またはパスワードが正しくありません。',
        ]);
    }

/*
ログアウト機能のメソッド
*/
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(RouteServiceProvider::HOME);
    }
}