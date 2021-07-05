<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <link rel='stylesheet' href='style.css' />
    <title>全データ表示（その1）</title>
  </head>
  <body>
<?php
require 'db.php';                               # 接続
$sql = 'SELECT * FROM testtable';               # SQL文
$prepare = $db->prepare($sql);                  # 準備
$prepare->execute();                            # 実行
$result = $prepare->fetchAll(PDO::FETCH_ASSOC); # 結果の取得

foreach ($result as $row) {
  $id       = h($row['id']);
  $userid   = h($row['userid']);
  $varcharA = h($row['varcharA']);
  $hwork     = h($row['hwork']);
  $worktime     = h($row['worktime']);
  $target     = h($row['target']);
  $remonth     = h($row['remonth']);
  $inget     = h($row['inget']);
  $fixcost     = h($row['fixcost']);
  $varcost     = h($row['varcost']);


  echo "{$id},{$userid}, {$varcharA}, {$hwor}, {$worktime}, {$target}, {$remonth}, {$inget}, {$fixcost},{$varcost}<br/>";
}
?>
  </body>
</html>