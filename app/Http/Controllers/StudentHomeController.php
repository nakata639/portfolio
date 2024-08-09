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

class StudentHomeController extends Controller
{

    public function seatregist(Request $request,$id)  //座席登録ボタンが押されたら呼び出される
    {

        $subject = Subject::find($id);

        $class_time_set = $request->class_time;

        //配列に格納
        $seat_array=array(
            'id'=>\Auth::user()->id,  
            'class_time'=>$class_time_set,
            'subject'=>$subject->subject_id
        );

            //ここで座席登録に必要な変数をjson形式に変換する
            $json=json_encode($seat_array,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        
        
            //var_dump($seat_array);
        

        return view('SeatRegist',compact('subject','class_time_set','json','seat_array'));
    }
    

    public function seatrenewal(Request $request)  //学生が座席をクリックした時に呼び出される
    {
        $params = json_decode(file_get_contents('php://input'), true);   //javascriptからjson形式のregistを受け取ってる

        $id = $params["id_json"];       //ユーザID
        $subject = $params["subject_json"];     //subject_id
        $class_time = $params["class_time_json"];       //授業回
        $seat_name = $params["name_json"];      //seat_name

        /*
        $id = $request->input('id_json');   //ユーザID
        $seat = $request->input('name_json');   //座席名
        $subject = $request->input('subject_json');    //授業回
        $class_time = $request->input('class_time_json');
        */

        $idd = (int)$id;    //これでintに変換できてる
        $subjectt = (int)$subject;
        $class_timee = (int)$class_time;

        /*
        var_dump($params);
        var_dump($idd);  //これでidがintかvarcherか、また何が入っているかをログから確認できる
        var_dump($subjectt);
        var_dump($class_timee);
        var_dump($seat_name);
        */
        

        //ここでseat_nameとclassroom_idに対応したseat_idを取得する
        $seat_id = DB::table('seat')
            ->select('seat_id')
            ->where('seat_name', '=', $seat_name)
            ->where('classroom_id', '=', '1')   //classroom_idはsubjectと関連付けてもって来れそう
            ->first();

        var_dump($seat_id);     //このデータベースから持ってきたseat_idがstdClassに入ってしまってる！！
        
        $seat_id_php = $seat_id->seat_id;   //ここでctdClassに入っていたseat_idを取り出せた！

        //ここで持ってきたユーザid,科目id,授業名のseat_idを持ってきて変数に入れる
        //その変数が空だったら登録,値があれば更新にする
        $already = DB::table('seat_information')
            ->select('seat_id')
            ->where('user_id', '=', $idd)
            ->where('class_times', '=', $class_timee)
            ->where('subject_id', '=', $subjectt)
            ->first();  //firstにすることで値かnullを取得できる

        //ここでその授業で一度登録しているかを判定する
        if($already === null)   //初めて登録するとき
        {
            \DB::table('seat_information')
            ->insert([
                'user_id' => $idd,
                'seat_id' => $seat_id_php, 
                'class_times' => $class_timee,
                'subject_id' => $subject
            ]);
        }
        else    //既に登録済み(alreadyに値が入っている)場合
        {
            \DB::table('seat_information')     
                ->where('user_id', '=', $idd)
                ->where('class_times', '=', $class_timee)
                ->where('subject_id', '=', $subject)
                ->update([
                    'seat_id' => $seat_id_php    //seat_idを書き換える
                ]);
        }

        /*
        if(\DB::table('seat_information')->where('user_id', '=', $idd) && \DB::table('seat_information')->where('class_times', '=', $class_timee) && \DB::table('seat_information')->where('subject', '=', $subjectt))       //もし登録するユーザid,授業回,科目idが既にあった場合
                {
                    //書き換え(update)処理
                    \DB::table('seat_information')     
                        ->where('user_id', '=', $idd)
                        ->where('class_times', '=', $class_timee)
                        ->where('subject_id', '=', $subject)
                        ->update([
                            'seat_id' => $seat_id_php    //seat_idを書き換える
                        ]);
                        var_dump($idd); //これ動いてる
                }

        else    //初めて座席登録するとき
        {
        
            //ここでデータベースに登録している
            \DB::table('seat_information')
            ->insert([
                'user_id' => $idd,
                'seat_id' => $seat_id_php,  //$seat_idを'7'とか整数値にすると登録される
                'class_times' => $class_timee,
                'subject_id' => $subject
            ]);
            var_dump($idd); //これ動いてない
        /*
        }
        */
        
    }


    
    public function studenthomeseatregist(Request $request)  //座席登録画面で戻るボタンが押されたときに呼び出される
    {
        //if文で座席をクリックせずに戻るボタンを押したときに座席登録前のトップ画面に戻す

        $array = $request->input('array');
        $id = $array['id'];
        $subject = $array['subject'];
        $class_time = $array['class_time'];


        //viewで授業名を表示するために持ってきてる
        $subject_name = DB::table('subject')
            ->select('subject_name')
            ->where('subject_id', '=', $subject)
            ->first();

        $subject_name_php = $subject_name->subject_name;    //データベースから取ってきてまたctdClassに入ってたから取り出した
            
        $seat_id = DB::table('seat_information')    //まずは座席登録したseat_idを持ってくる
            ->select('seat_id')
            ->where('user_id', '=', $id)
            ->where('subject_id', '=', $subject)
            ->where('class_times', '=', $class_time)
            ->first();
        
        $seat_id_php = $seat_id->seat_id;

        $seat_nam = DB::table('seat')
            ->select('seat_name')
            ->where('seat_id', '=', $seat_id_php)
            ->first();
        
        $seat_name = $seat_nam->seat_name;  //最初に定義したseat_namにseat_nameの値がstdClassに入ってた

    
        //var_dump($seat_id_php);     //$seat_id_phpにintで値が入ってることを確認
        
        return view('StudentHomeSeatRegist',compact('array','subject_name_php','seat_name'));
    }


    public function reseatregist(Request $request,$id)  //修正ボタンが押されたら呼び出される
    {

        $subject = Subject::find($id);

        $seat_name1 = $request->seat_name;
        $class_time_set = $request->class_time;

        //ここで座席登録に必要な変数をjson形式に変換する
        $seat_array=array(
            'id'=>\Auth::user()->id,  
            'class_time'=>$class_time_set,
            'subject'=>$subject->subject_id,
            'seat_name'=>$seat_name1
        );

            $json=json_encode($seat_array,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
            
        

        return view('ReSeatRegist',compact('subject','class_time_set','json','seat_array'));
        
    }
    

}
    

