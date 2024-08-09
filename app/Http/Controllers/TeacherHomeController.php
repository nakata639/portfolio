<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
//use Request as PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class TeacherHomeController extends Controller
{
    //科目名をクリックしてルーティング名がonsetviewのルートが呼び出された時にこのメソッドが呼び出される。　引数の$idでthome.bladeで定義した$idを受け取ってる(ルーティングを経由して)
    public function onsetview($id)
    {
        //subjectテーブル内で持ってきた$idの値と一致する行データを持ってくる
        $subject = Subject::find($id);
        return view('onset',compact('subject'));
    }


    //教員用授業回選択画面の座席登録開始ボタンを押すとルーティング定義により、onsetメソッドが呼び出される。
    public function onset(Request $request,$id)     //$requestでセレクトボックスで選択した値を受け取り、$idで選択した科目のsubject_idを受け取ってる
    {
        //ここで一度class_limitを0にすることでブラウザバック後に座席登録開始しても複数開始されなくなる
        \DB::table('class')     
            ->where('class_limit', '=', '1')    //class_limitが1のところの
            ->update([
                'class_limit' => '0'    //class_limitを0にする
            ]);

        //セレクトボックスで選択した値をclass_timeに入れてる
        $class_time_set = $request->class_time_set;

        //上のonsetviewメソッドと同じことをやってる
        $subject = Subject::find($id);

        \DB::table('class')
            ->join('subject',  'class.subject_id','=','subject.subject_id')
            ->where('class_times', '=', $class_time_set)  //$class_timeを''で囲むと文字列になっちゃう。ここでclassテーブルのclass_timesが選択した授業回になるよう制限をかけてる
            ->where('class.subject_id', '=', $id)     //座席登録開始をする科目を指定してる。subject_idの前にclass.をつけないと、classテーブルにもsubjectテーブルにもsubject_idがあり、どっちだよってエラー吐かれる。
            ->update([
                'class_limit' => '1'
                
            ]);

        //ログイン時に座席登録開始後のホームに行く時にclass_timesをこの書き方で取得してbladeでも{{ $class_time->class_times }}で表示してるから、わざわざこれ書いてる
        $class_time = DB::table('class')
                        ->select('class_times')
                        ->where('class_limit', '=', '1')
                        ->first();

        //echo phpinfo();

        return view('/TeacherHomeAfter',compact('class_time','subject'));
    }

    public function backtothome()   //授業回選択画面で戻るボタンが押された時に呼び出される
    {
        $subject = DB::table('subject')
            ->join('associates_user_and_subject',  'subject.subject_id','=','associates_user_and_subject.subject_id')
            ->select('subject.subject_id','subject_name')
            ->where('user_id','=',auth()->user()->id)
            ->get();

        //thomeに遷移するのと同時にthome.bladeファイルに変数subjectを渡す
        return view('thome',compact('subject'));
    }


    public function restrict()   //座席登録開始後のホーム画面で「座席登録を終了」ボタンが押されたら呼び出される
    {

        \DB::table('class')     
        ->where('class_limit', '=', '1')    //class_limitが1のところの
        ->update([
            'class_limit' => '0'    //class_limitを0にする
        ]);

        $subject = DB::table('subject')
            ->join('associates_user_and_subject',  'subject.subject_id','=','associates_user_and_subject.subject_id')
            ->select('subject.subject_id','subject_name')
            ->where('user_id','=',auth()->user()->id)
            ->get();

        //thomeに遷移するのと同時にthome.bladeファイルに変数subjectを渡す
	    return view('thome',compact('subject'));
    }


    public function seatconfirm()       //座席場所を確認ボタンが押されたら呼び出される
    {

        $subject = DB::table('subject')    
            ->join('associates_user_and_subject',  'subject.subject_id','=','associates_user_and_subject.subject_id')
            ->select('subject.subject_id','subject_name')
            ->where('user_id','=',auth()->user()->id)
            ->get();

	    return view('TeacherSeatConfirm',compact('subject'));
    }


    public function showstudentseat(Request $request)       //教員が学生の着席場所を表示するための科目と授業回選択画面で表示ボタンが押されたときに呼び出される
    {
        //セレクトボックスから値を取得してる
        $subject_id = $request->subject_name_select;    //subject_name_selectになってるけど取得してるのはsubject_id
        $class_time = $request->class_time_select;

        $subject_nam = DB::table('subject')
            ->select('subject_name')
            ->where('subject_id', '=', $subject_id)
            ->first();

        
        $subject_name = $subject_nam->subject_name;

        //$user_id_stdClass = new user_id();
        //$seat_id_stdClass = new seat_id();

        $user_id_stdClass = DB::table('seat_information')    
            ->select('user_id')       //選択した科目の授業回のuser_idとseat_idを持ってくる
            ->where('class_times','=', $class_time)
            ->where('subject_id','=', $subject_id)
            ->get();


        $seat_id_stdClass = DB::table('seat_information')    
            ->select('seat_id')       //選択した科目の授業回のuser_idとseat_idを持ってくる
            ->where('class_times','=', $class_time)
            ->where('subject_id','=', $subject_id)
            ->get();


        $seat_information_stdClass = DB::table('seat_information')    
            ->join('users',  'seat_information.user_id','=','users.id')
            ->select('user_id','seat_id','number')       //選択した科目の授業回のuser_idとseat_idを持ってくる
            ->where('class_times','=', $class_time)
            ->where('subject_id','=', $subject_id)
            ->get();

            $json=json_encode($seat_information_stdClass,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        
        /*
        foreach($seat_information_stdClass as $seat_information_stdClass)
        {
            $seat_information[] = $seat_information_stdClass->{"user_id"};     //$user_idを[]にして配列で宣言しないとけない
        }
        */

        //var_dump($json);
        
        foreach($user_id_stdClass as $user_id_stdClass)
        {
            $user_id[] = $user_id_stdClass->{"user_id"};     //$user_idを[]にして配列で宣言しないとけない
        }
        
        foreach($seat_id_stdClass as $seat_id_stdClass)
        {
            $seat_id[] = $seat_id_stdClass->{"seat_id"};     //$user_idを[]にして配列で宣言しないとけない
        }

        //var_dump($user_id);
        //var_dump($seat_id);


        /*
        $seat_array=array(
            'id'=>\Auth::user()->id,  
            'class_time'=>$class_time_set,
            'subject'=>$subject->subject_id,
            'seat_name'=>$seat_name1
        );
        */

            //$json=json_encode($seat_array,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        
	    return view('ShowStudentSeat',compact('subject_id', 'class_time','subject_name', 'user_id', 'seat_information_stdClass','json'));
    }
}
    
    
    

