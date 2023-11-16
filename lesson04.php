<?php
$arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
    ];
    
    // 行ごとの合計
    $row_total = [
        'r1' => array_sum($arr['r1']),
        'r2' => array_sum($arr['r2']),
        'r3' => array_sum($arr['r3']),
    ];
    
    // 列ごとの合計
    $column_total = [
        'c1' => array_sum(array_column($arr, 'c1')),
        'c2' => array_sum(array_column($arr, 'c2')),
        'c3' => array_sum(array_column($arr, 'c3')),
    ];
    
    // 全ての合計
    $all_total = 0;
    foreach ($column_total as $total) {
        $all_total = $all_total + $total;
    }
    
    ?>
    
    <!DOCTYPE html>
    <html lang="ja">
    <head>
    <meta charset="utf-8">
    <title>テーブル表示</title>
    <style>
    table {
        border:1px solid #000;
        border-collapse: collapse;
    }
    th, td {
        border:1px solid #000;
    }
    </style>
    </head>
    <body>
    <!-- ここにテーブル表示 -->
    <table>
        <?php
    echo "<tr><td></td><td>c1</td><td>c2</td><td>c3</td><td>横合計</td></tr>";
    
    // r1~r3の各値を表示
    for ($i = 1; $i <= count($arr); $i++) {
        $row_key = "r{$i}";
        echo "<tr><td>{$row_key}</td>";
    for ($j = 1; $j <= count($arr[$row_key]); $j++) {
        $column_key = "c{$j}";
     // r1~r3の各値を表示
        echo "<td>{$arr[$row_key][$column_key]}</td>";
    }
    // r1~r3の横合計を表示
    echo "<td>{$row_total[$row_key]}</td></tr>";
    }
    
    // c1〜c3の縦合計を表示
    echo "<tr><td>縦合計</td>";
    for ($j = 1; $j <= count($column_total); $j++) {
        $column_key = "c{$j}";
        echo "<td>{$column_total[$column_key]}</td>";
    }
    
    // 総合計を表示
    echo "<td>{$all_total}</td></tr>";
            ?>
        </table>
    </body>
</html>