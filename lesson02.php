<?php
function numberLoop() {
    // この関数に判定処理を記述
    for($a = 1 ; $a <= 9 ; $a ++){
        if($a <= 5){
          for($b = 4 ; $b >= $a ; $b --){
            echo "*";
          }
          for($c = 1 ; $c <=$a ; $c++){
            if($c % 2 == 0){
            echo "<b>{$c}</b>";
            }else{
            echo $c;
            }
        }
          for($d =$c -2 ; $d >= 1 ; $d--){
            if($d % 2 == 0){
            echo "<b>{$d}</b>";
            }else{
                echo $d;
            }
          }
          echo '<br>';
        }
        elseif($a >=6){
            for($e = 6 ; $e <= $a ; $e++){
            echo "*";
            }
            for($f = 1 ; $f <= 10-$a; $f++){
            if($f % 2 == 0){
            echo "<b>{$f}</b>";
            }else{
            echo $f;
            }
        }
          for($g = $f-2 ; $g >=1  ; $g --){
            if($g % 2 == 0){
            echo "<b>{$g}</b>";
          }else{
            echo $g;
          }
        }
          echo '<br>';
        }
      }
}
// echo numberLoop();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ループ表示</title>
</head>
<body>
    <!-- ここに表示例の通り表示 -->
    <?php echo numberLoop() ?>
</body>
</html>