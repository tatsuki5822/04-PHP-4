<?php
// var_dump($_POST)
$post = array_filter($_POST);
// var_dump($post);
// var_dump($cards);
// 手札
function hand(){
    // echo htmlspecialchars($_POST['suit1']);
    // echo htmlspecialchars($_POST['number1']); 
    // print htmlspecialchars($_POST['suit2']);
    // print htmlspecialchars($_POST['number2']); 
    // print htmlspecialchars($_POST['suit3']);
    // print htmlspecialchars($_POST['number3']); 
    // print htmlspecialchars($_POST['suit4']);
    // print htmlspecialchars($_POST['number4']); 
    // print htmlspecialchars($_POST['suit5']);
    // print htmlspecialchars($_POST['number5']); 
    $cards = [
        ['suit' =>($_POST["suit1"]),'number' =>($_POST["number1"])],
        ['suit' =>($_POST["suit2"]),'number' =>($_POST["number2"])],
        ['suit' =>($_POST["suit3"]),'number' =>($_POST["number3"])],
        ['suit' =>($_POST["suit4"]),'number' =>($_POST["number4"])],
        ['suit' =>($_POST["suit5"]),'number' =>($_POST["number5"])],
    ];
    foreach ($cards as $card) {
        echo $card['suit'] . $card['number'] . " ";
    }
}

// 判定
function judge() {
    $cards = [
        ['suit' =>($_POST["suit1"]),'number' =>($_POST["number1"])],
        ['suit' =>($_POST["suit2"]),'number' =>($_POST["number2"])],
        ['suit' =>($_POST["suit3"]),'number' =>($_POST["number3"])],
        ['suit' =>($_POST["suit4"]),'number' =>($_POST["number4"])],
        ['suit' =>($_POST["suit5"]),'number' =>($_POST["number5"])],
    ];

    $cover = array_unique($cards, SORT_REGULAR);
    // 一意な要素の数を $unique に格納
    $unique = count($cover);
        // カードの不正チェック
        foreach ($cards as $card) {
            if ($card['number'] > 13 || $card['number'] < 1) {
                return "手札が不正1";
                break;
            } elseif ($card['suit'] != 'heart' && $card['suit'] != 'spade' && $card['suit'] != 'diamond' && $card['suit'] != 'club') {
                return "手札が不正2";
                break;
            } elseif ($unique < 5) {
                return "手札が不正3";
                break;
            }
        }
    // この関数内に処理を記述
        // $cards から 'number' キーの値（カードの数字）を取り出して、新しい配列 $sortNum に格納しています。
        $sortNum = array_column($cards, 'number');
        // $sortNum 内の数字を昇順にソート（並び替え
        sort($sortNum);
        //  ロイヤルストレートに必要な数字の配列
        $royal = [1, 10, 11, 12, 13];
        // //  $cards から 'suit' キーの値（カードのスート）を取り出して、新しい配列 $suit_array に格納しています。
        $suit_array = array_column($cards, 'suit');
        // //  $sortNum の最小値を取得し、変数 $min に格納
        $min = $sortNum[0];
        // var_dump ($sortNum[0]);
        // echo '<br>';
        // var_dump ($min);
        // //  最小値 $min から始まり、その後の4つの数字を生成するために range 関数を使用してる、連続する配列を生成するために
        $rangeNum = range($min, $min + 4);
        // var_dump ($rangeNum);
        // //  $sortNum 内で各数字がいくつのカードに含まれているかをカウントし、結果を格納する
        $countNum = array_count_values($sortNum);
        $test = array_count_values($countNum);

        if (($sortNum == $royal) && (count(array_unique($suit_array)) == 1)) {
            return "ロイヤルストレートフラッシュ";
          }elseif (($sortNum == $rangeNum) && (count(array_unique($suit_array)) == 1)) {
            return "ストレートフラッシュ";
          }elseif(array_key_exists(4,$test)){
            return "フォーカード";
          }elseif(array_key_exists(3,$test)){
            if(array_key_exists(2,$test)){
                return "フルハウス";
            }else{
                return "スリーカード";
            }
          }elseif(count(array_unique($suit_array)) == 1){
            return "フラッシュ";
          }elseif($sortNum == $rangeNum){
            return "ストレート";
          }elseif(array_key_exists(2, $test)) {
            switch ($test[2]) {
                case 1:
                    return 'ワンペア';
                case 2:
                    return 'ツーペア';
                }
            }
            else{
                return "なし";
            }
        }   
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" style="text/css" href="./css/style.css">
<title>ポーカー役判定</title>
</head>
<body>
    <form action="#" method="POST" name="formtype">
        <section>    
            <div class="flex">
                <?php for($i = 1; $i <= 5; $i++){ ?>
                <div class="card">
                    <p><?php echo $i . ":" ?> 
                    <select name="<?php echo "suit".$i ?>" class="suit">
                        <option value=""></option>
                        <option value="spade">spade</option>
                        <option value="diamond">diamond</option>
                        <option value="heart">heart</option>
                        <option value="club">club</option>
                    </select>
                    <select name="<?php echo "number".$i ?>">
                        <option value=""></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                    </select>
                </div>
                <?php } ?>
                <button type="submit" class="button1" name="submit">判定</button>
            </div>
            <div>
                <!-- 「hand」関数を使用してセレクトボックスで入力した手札を戻り値で取得し、ブラウザー上で表示する。 -->
                <!-- 引数の仕様有無は各自の判断に任せるとする。-->
                <p>手札は<?php echo hand() ?></p>
            </div>
            <div>
                <!-- 「judge」関数を使用してセレクトボックスで入力した手札から役を戻り値で取得し、ブラウザー上で表示する。 -->
                <!-- 引数の仕様有無は各自の判断に任せるとする。-->
                <p>役は<?php if (!empty($post)){
                    //空
                    echo judge();
                }
                ?></p>
            </div>
         </section>
    </form>
</body>
</html>