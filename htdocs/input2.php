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
    <h1 style="text-align:center;">今日の給料と使った金額を入れてください</h1>
    <h2>※千葉工業大学PM学科3年の実験サイトです</h2>
   </div>
      <?php
            echo date('Y年m月d日');
        ?>
  <form method="post" action="index.php">
  <table border="1" width="300" >
    <tr>
      <td rowspan="2">今月の給料</td>
      <!-- セルを縦に2つ結合する -->
      
    <tr>
    <th>労働時間<br>＜時＞</th>
          <td><input name="worktime" type="text" /></td>  <!--↑のはページ別なら関係なし-->
    </tr>
  
   <tr>
   <td rowspan="2">今月の出費</td>
  
    <th>変動費<br>＜円＞</th>
          <td><input name="varcost" type="text" /></td>
</tr>
      </table>

<p style="text-align: center;">   
    <input type="submit" class="btn btn-flat" value="送信" />
    <input type="reset" class="btn btn-flat" value="リセット" />
</p>
    
  </form>
  </body>
</html>