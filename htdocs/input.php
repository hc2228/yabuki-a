<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel='stylesheet' href='input.css' />
    <title>データの入力</title>
  </head>
  <body>
  <div id="header">
    <h1 style="text-align:center;">情報を入力してください</h1>
    <h2>※千葉工業大学PM学科3年の実験サイトです</h2>
   </div>
      <?php
            echo date('Y年m月d日');
        ?>
  <form method="post" action="index.html">
      <table>
        <tr>今月の給料
          <th>時給＜円＞</th>
          <td><input name="hwork" type="text" /></td>
          <th>労働時間＜時＞</th>
          <td><input name="worktime" type="text" /></td>
        </tr>
        <tr>貯金目標
          <th>目標金額＜円＞</th>
          <td><input name="target" type="text" /></td>
          <th>予定日</th>
          <td><input name="remonth" type="text" /></td>
        </tr>
        <tr>今月の予算
          <th>予算</th>
          <td><input name="inget" type="text" /></td>
        </tr>
        <tr>今月の出費
          <th>固定費</th>
          <td><input name="fixcost" type="text" /></td>
          <th>変動費</th>
          <td><input name="varcost" type="text" /></td>
        </tr>
      </table>

      <input type="submit" value="送信" />
      <input type="reset" value="リセット" />

  <?php
    $hwork = $_POST['hwork'];
    $worktime = $_POST['worktime'];
    $target = $_POST['target'];
    $remonth = $_POST['remonth'];
    $inget = $_POST['inget'];
    $fixcost = $_POST['fixcost'];
    $varcost = $_POST['varcost'];
    
    require 'db.php'; # 接続
    $sql = 'insert into ?productinfo (hwork, worktime, target, remonth, inget, fixcost, vercost) values (:hwork, :worktime, :target, :remonth, :inget, :fixcost, :vercost)';
    $prepare = $db->prepare($sql); # 準備
    
    $prepare->bindValue(':hwork', $hwork, PDO::PARAM_STR);
    $prepare->bindValue(':worktime', $worktime, PDO::PARAM_STR);
    $prepare->bindValue(':target', $target, PDO::PARAM_STR);
    $prepare->bindValue(':remonth', $remonth, PDO::PARAM_STR);
    $prepare->bindValue(':inget', $inget, PDO::PARAM_STR);
    $prepare->bindValue(':fixcost', $fixcost, PDO::PARAM_STR);
    $prepare->bindValue(':varcost', $varcost, PDO::PARAM_STR);

    $prepare->execute(); # 実行
  ?>
    
  </form>
  </body>
</html>