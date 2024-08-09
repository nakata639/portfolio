var canvas = document.getElementById('2_101');     //('2_101')の部分はbladeのcanvasタグのidと一致させる
var context = canvas.getContext('2d');             //2Dのグラフィックを作成




class Seat {
    constructor(x1, x2, y1, y2, name, seat_id_js, dec){      //x1左から　x2上から　y1幅　y2高さ

        this.x1 = x1       //超単純にx1,x2,y1,y2を宣言してるだけ。constructorの引数のx1,x2,y1,y2にx1,x2,y1,y2(全く同じもの)を代入してるだけ。
        this.x2 = x2
        this.y1 = y1
        this.y2 = y2
        this.name = name
        this.seat_id_js = seat_id_js
        this.dec = dec

    }
}

var seat;
var regist;

//var sample = '123';
//context.font = '15pt Arial';
//context.fillText(sample,300,300);

window.onload = function () {       //ウィンドウを表示するときに呼び出される

    /*
    var id = document.getElementById( 'id' ).title; //stdClass
    console.log(id);
    */

    var json = document.getElementById( 'ia' ).title; //json
    console.log(json);

    let objSeatData = JSON.parse(json);       //json形式をオブジェクト型に変換
    console.log(objSeatData);               //オブジェクトになってることを確認

    let aaaaa = objSeatData[0];     //aaaaaにobjSeatDataの[0]番地の値を代入(seat_id、user_id、numberが入ってる)
    console.log(aaaaa.number);      //numberの000002が取り出せてる

    console.log(objSeatData.length);    //オブジェクトの長さ


    context.font = '15pt Arial';    //教卓
    context.fillText('教卓', 420, 68);
    context.strokeRect(380, 40, 120, 40);

    

    seat = Array(89);

    seat[0] = new Seat(20, 80, 40, 40, 'A1', 1, 0);    //Seatクラスのx1,x2,y1,y2に20,80,40,40を入れて、そのオブジェクトを配列の0番地に入れてる
    seat[1] = new Seat(20, 120, 40, 40, 'A2', 2, 0);   //A2
    seat[2] = new Seat(60, 80, 40, 40, 'A3', 3, 0);
    seat[3] = new Seat(60, 120, 40, 40, 'A4', 4, 0);
    seat[4] = new Seat(100, 80, 40, 40, 'A5', 5, 0);
    seat[5] = new Seat(100, 120, 40, 40, 'A6', 6, 0);   //A6

    seat[6] = new Seat(20, 200, 40, 40, 'B1', 7, 0);    //B1
    seat[7] = new Seat(20, 240, 40, 40, 'B2', 8, 0);
    seat[8] = new Seat(60, 200, 40, 40, 'B3', 9, 0);
    seat[9] = new Seat(60, 240, 40, 40, 'B4', 10, 0);
    seat[10] = new Seat(100, 200, 40, 40, 'B5', 11, 0);
    seat[11] = new Seat(100, 240, 40, 40, 'B6', 12, 0);  //B6

    seat[12] = new Seat(20, 320, 40, 40, 'C1', 13, 0);  //C1
    seat[13] = new Seat(20, 360, 40, 40, 'C2', 14, 0);
    seat[14] = new Seat(60, 320, 40, 40, 'C3', 15, 0);
    seat[15] = new Seat(60, 360, 40, 40, 'C4', 16, 0);
    seat[16] = new Seat(100, 320, 40, 40, 'C5', 17, 0);
    seat[17] = new Seat(100, 360, 40, 40, 'C6', 18, 0); //C6

    seat[18] = new Seat(180, 40, 40, 40, 'D1', 19, 0);  //D1
    seat[19] = new Seat(180, 80, 40, 40, 'D2', 20, 0);
    seat[20] = new Seat(220, 40, 40, 40, 'D3', 21, 0);
    seat[21] = new Seat(220, 80, 40, 40, 'D4', 22, 0);
    seat[22] = new Seat(260, 40, 40, 40, 'D5', 23, 0);
    seat[23] = new Seat(260, 80, 40, 40, 'D6', 24, 0); //D6

    seat[24] = new Seat(180, 160, 40, 40, 'E1', 25, 0); //E1
    seat[25] = new Seat(180, 200, 40, 40, 'E2', 26, 0);
    seat[26] = new Seat(220, 160, 40, 40, 'E3', 27, 0);
    seat[27] = new Seat(220, 200, 40, 40, 'E4', 28, 0);
    seat[28] = new Seat(260, 160, 40, 40, 'E5', 29, 0);
    seat[29] = new Seat(260, 200, 40, 40, 'E6', 30, 0); //E6

    seat[30] = new Seat(180, 280, 40, 40, 'F1', 31, 0); //F1
    seat[31] = new Seat(180, 320, 40, 40, 'F2', 32, 0);
    seat[32] = new Seat(180, 360, 40, 40, 'F3', 33, 0);
    seat[33] = new Seat(220, 280, 40, 40, 'F4', 34, 0);
    seat[34] = new Seat(220, 320, 40, 40, 'F5', 35, 0);
    seat[35] = new Seat(220, 360, 40, 40, 'F6', 36, 0); //F6

    seat[36] = new Seat(300, 280, 40, 40, 'G1', 37, 0); //G1
    seat[37] = new Seat(300, 320, 40, 40, 'G2', 38, 0);
    seat[38] = new Seat(300, 360, 40, 40, 'G3', 39, 0);
    seat[39] = new Seat(340, 280, 40, 40, 'G4', 40, 0);
    seat[40] = new Seat(340, 320, 40, 40, 'G5', 41, 0);
    seat[41] = new Seat(340, 360, 40, 40, 'G6', 42, 0); //G6

    seat[42] = new Seat(380, 160, 40, 40, 'H1', 43, 0); //H1
    seat[43] = new Seat(380, 200, 40, 40, 'H2', 44, 0);
    seat[44] = new Seat(420, 160, 40, 40, 'H3', 45, 0);
    seat[45] = new Seat(420, 200, 40, 40, 'H4', 46, 0);
    seat[46] = new Seat(460, 160, 40, 40, 'H5', 47, 0);
    seat[47] = new Seat(460, 200, 40, 40, 'H6', 48, 0);  //H6

    seat[48] = new Seat(460, 280, 40, 40, 'I1', 49, 0);  //I1
    seat[49] = new Seat(460, 320, 40, 40, 'I2', 50, 0);
    seat[50] = new Seat(460, 360, 40, 40, 'I3', 51, 0);
    seat[51] = new Seat(500, 280, 40, 40, 'I4', 52, 0);
    seat[52] = new Seat(500, 320, 40, 40, 'I5', 53, 0);
    seat[53] = new Seat(500, 360, 40, 40, 'I6', 54, 0); //I6

    seat[54] = new Seat(540, 40, 40, 40, 'J1', 55, 0); //J1
    seat[55] = new Seat(540, 80, 40, 40, 'J2', 56, 0);
    seat[56] = new Seat(580, 40, 40, 40, 'J3', 57, 0);
    seat[57] = new Seat(580, 80, 40, 40, 'J4', 58, 0);
    seat[58] = new Seat(620, 40, 40, 40, 'J5', 59, 0);
    seat[59] = new Seat(620, 80, 40, 40, 'J6', 60, 0);  //J6

    seat[60] = new Seat(540, 160, 40, 40, 'K1', 61, 0); //K1
    seat[61] = new Seat(540, 200, 40, 40, 'K2', 62, 0);
    seat[62] = new Seat(580, 160, 40, 40, 'K3', 63, 0);
    seat[63] = new Seat(580, 200, 40, 40, 'K4', 64, 0);
    seat[64] = new Seat(620, 160, 40, 40, 'K5', 65, 0);
    seat[65] = new Seat(620, 200, 40, 40, 'K6', 66, 0); //K6

    seat[66] = new Seat(580, 280, 40, 40, 'L1', 67, 0);    //L1
    seat[67] = new Seat(580, 320, 40, 40, 'L2', 68, 0);
    seat[68] = new Seat(580, 360, 40, 40, 'L3', 69, 0);
    seat[69] = new Seat(620, 280, 40, 40, 'L4', 70, 0);
    seat[70] = new Seat(620, 320, 40, 40, 'L5', 71, 0);
    seat[71] = new Seat(620, 360, 40, 40, 'L6', 72, 0); //L6

    seat[72] = new Seat(700, 80, 40, 40, 'M1', 73, 0);  //M1
    seat[73] = new Seat(700, 120, 40, 40, 'M2', 74, 0);
    seat[74] = new Seat(740, 80, 40, 40, 'M3', 75, 0);
    seat[75] = new Seat(740, 120, 40, 40, 'M4', 76, 0);
    seat[76] = new Seat(780, 80, 40, 40, 'M5', 77, 0);
    seat[77] = new Seat(780, 120, 40, 40, 'M6', 78, 0); //M6

    seat[78] = new Seat(700, 200, 40, 40, 'N1', 79, 0); //Q1
    seat[79] = new Seat(700, 240, 40, 40, 'N2', 80, 0);
    seat[80] = new Seat(740, 200, 40, 40, 'N3', 81, 0);
    seat[81] = new Seat(740, 240, 40, 40, 'N4', 82, 0);
    seat[82] = new Seat(780, 200, 40, 40, 'N5', 83, 0);
    seat[83] = new Seat(780, 240, 40, 40, 'N6', 84, 0); //Q6

    seat[84] = new Seat(700, 320, 40, 40, 'O1', 85, 0); //O1
    seat[85] = new Seat(700, 360, 40, 40, 'O2', 86, 0);
    seat[86] = new Seat(740, 320, 40, 40, 'O3', 87, 0);
    seat[87] = new Seat(740, 360, 40, 40, 'O4', 88, 0);
    seat[88] = new Seat(780, 320, 40, 40, 'O5', 89, 0);
    seat[89] = new Seat(780, 360, 40, 40, 'O6', 90, 0); //O6

    

    for (var i = 0; i < 90; i++) {
        var above = seat[i].x1;     //seat[]のx1の値を代入。x1にはnew Seat()の一番左の値を入れてる。
        var side = seat[i].x2;
        var width = seat[i].y1;
        var height = seat[i].y2;
        var name = seat[i].name;
        var seat_id_js = seat[i].seat_id_js;
        var dec = seat[i].dec;


        
        for(var s = 0; s < objSeatData.length; s++){

            var seat_id1 = objSeatData[s].seat_id;      //objSeatDataのs番目のseat_idを取り出してる
            var user_number = objSeatData[s].number;

            if(seat_id_js == seat_id1){
                context.font = '10pt Arial';        //学籍番号桁によって色を変える？
                context.fillText(user_number.substr(0,3), above+10, side+18);   //学籍番号の上3桁を表示
                context.fillText(user_number.substr(3), above+10, side+28);   //学籍番号の下3桁を表示
                seat[i].dec++;       //←seat[i].dec = +1;だとなぜか無理　このseat[i]のdecを+1するのは重要で、重複した学生を表示するときの重複判定にも使用する
                
            }

            if(seat[i].dec >= 2){
                context.fillStyle = "yellow";
                context.fillRect(above, side, width, height);
                context.fillStyle = "black";
                context.font = '12pt Arial';
                context.fillText('重複', above+4, side+25);
                
            }

        
        }
        
        
        /*この判定で持ってきた座席名=nameみたいな感じにする(読み込み時に黄色くする)
        if (name == seat_name) {
            //色を変えるコード
            context.fillStyle = "yellow";
            context.fillRect(above, side, width, height);
            context.fillStyle = "black";    //これがないと「教卓」の文字が黄色くなる
        
        }
        */

        context.strokeRect(above, side, width, height);
        context.font = '8pt Arial';
        context.fillText(name, above+4, side+38);
    }

    //canvas.onclick = draw;
};
