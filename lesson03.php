<?php
$image_path = 'img/torch.png';
function isLeapYear($year) {
    // この関数に判定処理を記述
    return ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);
}

for ($year = 1980; $year <= 2080; $year++) {
    if (isLeapYear($year)) {
        echo '<img src="' . $image_path . '" alt="サンプル画像">';
        echo $year . "年はうるう年です。" ;
        echo '<br>';
    } else {
        echo $year;
        echo '<br>';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>うるう年判定</title>
</head>
<body>
    <!-- ここに表示例の通り表示 -->
    <php echo isLeapYear($year) ?>
</body>
</html>