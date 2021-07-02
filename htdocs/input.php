<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel='stylesheet' href='home.css' />
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
  <table border="1" width="300" >
    <tr>
      <td rowspan="2">今月の給料</td>
      <!-- セルを縦に2つ結合する -->
      <th>時給<br>＜円＞</th>
          <td><input name="hwork" type="text" /></td>
    </tr>
    <tr>
    <th>労働時間<br>＜時＞</th>
          <td><input name="worktime" type="text" /></td>
    </tr>
   <tr>
   <td rowspan="2">貯金目標</td>
   <th>目標金額<br>＜円＞</th>
          <td><input name="target" type="text" /></td>
    </tr>   
    <th>予定日</th>
          <td><input name="remonth" type="text" /></td>
</tr>
    <tr>
      <td rowspan="1">今月の予算</td>
      <th>予算<br>＜円＞</th>
          <td><input name="inget" type="text" /></td>
     </tr>
   <tr>
   <td rowspan="2">今月の出費</td>
   <th>固定費<br>＜円＞</th>
          <td><input name="fixcost" type="text" /></td>
    </tr>   
    <th>変動費<br>＜円＞</th>
          <td><input name="varcost" type="text" /></td>
</tr>
      </table>

<p style="text-align: center;">   
    <input type="submit" class="btn btn-flat" value="送信" />
    <input type="reset" class="btn btn-flat" value="リセット" />
</p>
    
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