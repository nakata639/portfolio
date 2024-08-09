var canvas = document.getElementById('2_101');     //('2_101')の部分はbladeのcanvasタグのidと一致させる
var context = canvas.getContext('2d');             //2Dのグラフィックを作成




class Seat {
    constructor(x1, x2, y1, y2, name) {   //x1左から　x2上から　y1幅　y2高さ

        this.x1 = x1       //超単純にx1,x2,y1,y2を宣言してるだけ。constructorの引数のx1,x2,y1,y2にx1,x2,y1,y2(全く同じもの)を代入してるだけ。
        this.x2 = x2
        this.y1 = y1
        this.y2 = y2
        this.name = name
    }
}

var seat;
var regist;

//var sample = '123';
//context.font = '15pt Arial';
//context.fillText(sample,300,300);

window.onload = function () {       //ウィンドウを表示するときに呼び出される

    //最初に黄色くするためのseat_nameを取得しておく
    var seat_name = document.getElementById( 'seat_name' ).title; //ここでbladeファイルが渡した値を受け取っている
    console.log(seat_name);

    context.font = '15pt Arial';    //教卓
    context.fillText('教卓', 420, 68);
    context.strokeRect(380, 40, 120, 40);

    

    seat = Array(89);

    seat[0] = new Seat(20, 80, 40, 40, 'A1');    //Seatクラスのx1,x2,y1,y2に20,80,40,40を入れて、そのオブジェクトを配列の0番地に入れてる
    seat[1] = new Seat(20, 120, 40, 40, 'A2');   //A2
    seat[2] = new Seat(60, 80, 40, 40, 'A3');
    seat[3] = new Seat(60, 120, 40, 40, 'A4');
    seat[4] = new Seat(100, 80, 40, 40, 'A5');
    seat[5] = new Seat(100, 120, 40, 40, 'A6');   //A6

    seat[6] = new Seat(20, 200, 40, 40, 'B1');    //B1
    seat[7] = new Seat(20, 240, 40, 40, 'B2');
    seat[8] = new Seat(60, 200, 40, 40, 'B3');
    seat[9] = new Seat(60, 240, 40, 40, 'B4');
    seat[10] = new Seat(100, 200, 40, 40, 'B5');
    seat[11] = new Seat(100, 240, 40, 40, 'B6');  //B6

    seat[12] = new Seat(20, 320, 40, 40, 'C1');  //C1
    seat[13] = new Seat(20, 360, 40, 40, 'C2');
    seat[14] = new Seat(60, 320, 40, 40, 'C3');
    seat[15] = new Seat(60, 360, 40, 40, 'C4');
    seat[16] = new Seat(100, 320, 40, 40, 'C5');
    seat[17] = new Seat(100, 360, 40, 40, 'C6'); //C6

    seat[18] = new Seat(180, 40, 40, 40, 'D1');  //D1
    seat[19] = new Seat(180, 80, 40, 40, 'D2');
    seat[20] = new Seat(220, 40, 40, 40, 'D3');
    seat[21] = new Seat(220, 80, 40, 40, 'D4');
    seat[22] = new Seat(260, 40, 40, 40, 'D5');
    seat[23] = new Seat(260, 80, 40, 40, 'D6'); //D6

    seat[24] = new Seat(180, 160, 40, 40, 'E1'); //E1
    seat[25] = new Seat(180, 200, 40, 40, 'E2');
    seat[26] = new Seat(220, 160, 40, 40, 'E3');
    seat[27] = new Seat(220, 200, 40, 40, 'E4');
    seat[28] = new Seat(260, 160, 40, 40, 'E5');
    seat[29] = new Seat(260, 200, 40, 40, 'E6'); //E6

    seat[30] = new Seat(180, 280, 40, 40, 'F1'); //F1
    seat[31] = new Seat(180, 320, 40, 40, 'F2');
    seat[32] = new Seat(180, 360, 40, 40, 'F3');
    seat[33] = new Seat(220, 280, 40, 40, 'F4');
    seat[34] = new Seat(220, 320, 40, 40, 'F5');
    seat[35] = new Seat(220, 360, 40, 40, 'F6'); //F6

    seat[36] = new Seat(300, 280, 40, 40, 'G1'); //G1
    seat[37] = new Seat(300, 320, 40, 40, 'G2');
    seat[38] = new Seat(300, 360, 40, 40, 'G3');
    seat[39] = new Seat(340, 280, 40, 40, 'G4');
    seat[40] = new Seat(340, 320, 40, 40, 'G5');
    seat[41] = new Seat(340, 360, 40, 40, 'G6'); //G6

    seat[42] = new Seat(380, 160, 40, 40, 'H1'); //H1
    seat[43] = new Seat(380, 200, 40, 40, 'H2');
    seat[44] = new Seat(420, 160, 40, 40, 'H3');
    seat[45] = new Seat(420, 200, 40, 40, 'H4');
    seat[46] = new Seat(460, 160, 40, 40, 'H5');
    seat[47] = new Seat(460, 200, 40, 40, 'H6');  //H6

    seat[48] = new Seat(460, 280, 40, 40, 'I1');  //I1
    seat[49] = new Seat(460, 320, 40, 40, 'I2');
    seat[50] = new Seat(460, 360, 40, 40, 'I3');
    seat[51] = new Seat(500, 280, 40, 40, 'I4');
    seat[52] = new Seat(500, 320, 40, 40, 'I5');
    seat[53] = new Seat(500, 360, 40, 40, 'I6'); //I6

    seat[54] = new Seat(540, 40, 40, 40, 'J1'); //J1
    seat[55] = new Seat(540, 80, 40, 40, 'J2');
    seat[56] = new Seat(580, 40, 40, 40, 'J3');
    seat[57] = new Seat(580, 80, 40, 40, 'J4');
    seat[58] = new Seat(620, 40, 40, 40, 'J5');
    seat[59] = new Seat(620, 80, 40, 40, 'J6');  //J6

    seat[60] = new Seat(540, 160, 40, 40, 'K1'); //K1
    seat[61] = new Seat(540, 200, 40, 40, 'K2');
    seat[62] = new Seat(580, 160, 40, 40, 'K3');
    seat[63] = new Seat(580, 200, 40, 40, 'K4');
    seat[64] = new Seat(620, 160, 40, 40, 'K5');
    seat[65] = new Seat(620, 200, 40, 40, 'K6'); //K6

    seat[66] = new Seat(580, 280, 40, 40, 'L1');    //L1
    seat[67] = new Seat(580, 320, 40, 40, 'L2');
    seat[68] = new Seat(580, 360, 40, 40, 'L3');
    seat[69] = new Seat(620, 280, 40, 40, 'L4');
    seat[70] = new Seat(620, 320, 40, 40, 'L5');
    seat[71] = new Seat(620, 360, 40, 40, 'L6'); //L6

    seat[72] = new Seat(700, 80, 40, 40, 'M1');  //M1
    seat[73] = new Seat(700, 120, 40, 40, 'M2');
    seat[74] = new Seat(740, 80, 40, 40, 'M3');
    seat[75] = new Seat(740, 120, 40, 40, 'M4');
    seat[76] = new Seat(780, 80, 40, 40, 'M5');
    seat[77] = new Seat(780, 120, 40, 40, 'M6'); //M6

    seat[78] = new Seat(700, 200, 40, 40, 'N1'); //Q1
    seat[79] = new Seat(700, 240, 40, 40, 'N2');
    seat[80] = new Seat(740, 200, 40, 40, 'N3');
    seat[81] = new Seat(740, 240, 40, 40, 'N4');
    seat[82] = new Seat(780, 200, 40, 40, 'N5');
    seat[83] = new Seat(780, 240, 40, 40, 'N6'); //Q6

    seat[84] = new Seat(700, 320, 40, 40, 'O1'); //O1
    seat[85] = new Seat(700, 360, 40, 40, 'O2');
    seat[86] = new Seat(740, 320, 40, 40, 'O3');
    seat[87] = new Seat(740, 360, 40, 40, 'O4');
    seat[88] = new Seat(780, 320, 40, 40, 'O5');
    seat[89] = new Seat(780, 360, 40, 40, 'O6'); //O6


    for (var i = 0; i < 90; i++) {
        var above = seat[i].x1;     //seat[]のx1の値を代入。x1にはnew Seat()の一番左の値を入れてる。
        var side = seat[i].x2;
        var width = seat[i].y1;
        var height = seat[i].y2;
        var name = seat[i].name;

        //この判定で持ってきた座席名=nameみたいな感じにする
        if (name == seat_name) {
            //色を変えるコード
            context.fillStyle = "yellow";
            context.fillRect(above, side, width, height);
            context.fillStyle = "black";    //これがないと「教卓」の文字が黄色くなる
        
        }

        context.strokeRect(above, side, width, height);
        context.font = '12pt Arial';
        context.fillText(name, above+10, side+25);
    }

    canvas.onclick = draw;




    function draw(event) {     //canvas内をクリックしたときに実行する。引数はeventのdrawメソッド。
        // x座標
        let mousex = event.clientX - this.offsetLeft;    //クリックしたマウスのx座標(canvas内座標)の値をxに代入
        // y座標
        let mousey = event.clientY - this.offsetTop;    //クリックしたマウスのy座標(canvas内座標)の値をy代入
        console.log("x座標 : " + mousex);
        console.log("y座標 : " + mousey);

        context.clearRect(0, 0, 900, 900);  //canvas全体をクリア

        context.font = '15pt Arial';    //教卓
        context.fillText('教卓', 420, 68);
        context.strokeRect(380, 40, 120, 40);

        for (var i = 0; i < 90; i++) {
            var above = seat[i].x1;     //seat[]のx1の値を代入。x1にはnew Seat()の一番左の値を入れてる。
            var side = seat[i].x2;
            var width = seat[i].y1;
            var height = seat[i].y2;
            var name = seat[i].name;

            //色を戻すコード

            if (above < mousex && mousex < above + width && side < mousey && mousey < side + height) {
                //色を変えるコード
                context.fillStyle = "yellow";
                context.fillRect(above, side, width, height);
                context.fillStyle = "black";    //これがないと「教卓」の文字が黄色くなる

            
                var postname = name;    //座席名をコントローラーに渡すためにnameを保持
                console.log(name);

                var id = document.getElementById( 'id' ).title; //ここでbladeファイルが渡した値を受け取っている
                console.log(id);

                var class_time = document.getElementById( 'class_time' ).title;
                console.log(class_time);

                var subject = document.getElementById( 'subject' ).title;
                console.log(subject);

                //var regist;
                //regist = new Array(name,id,class_time,subject); //配列でregistに要素を追加
                regist = {name_json:name, id_json:id, class_time_json:class_time, subject_json:subject};

                fetch('/renewal_url',  //seat_regist/renewal_urlのURLに値を送る http://localhost/SeatRegist/subject_id=4/user_id=1/class_time=3
                {
                    method: 'POST',  //POSTメソッドを指定
                    headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content}, // CSRFトークン対策
                    headers:  { 'Content-Type'  :  'application/json' },    //jsonを指定
                    body:   JSON.stringify(regist)  //postname変数の値をjson形式に変換して添付
                })
            
            }

        context.strokeRect(above, side, width, height);
        context.font = '12pt Arial';
        context.fillText(name, above+10, side+25);

        }
    }

};




