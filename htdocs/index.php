<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel='stylesheet' href='home.css' />
    <title>ホーム画面</title>
  </head>

  <body>
  <div id="header">
		  <h1 style="text-align:center;">お財布管理ツール</h1>
		  <h2>※千葉工業大学PM学科3年の実験サイトです</h2>
	  </div>
      <div id="daily">
        
        <?php
            echo date('Y年m月d日');
        ?>
        <br>
    </div>
      <?php
      $dsn = 'mysql:dbname=mydb;host=localhost';
      $user = 'testuser';
      $password = 'password';
      
      try{
          $dbh = new PDO($dsn, $user, $password);
      
          print('<br>');
      
          if ($dbh == null){
              print('接続に失敗しました。<br>');
          }else{
              print('接続に成功しました。<br>');
          }
      }catch (PDOException $e){
          print('Error:'.$e->getMessage());
          die();
      }
      $dbh = null;

      require'db.php'; 

      $num = 1; //ログインしたことを過程

      $sql = "SELECT table1.hwork * table2.worktime as foo from table1,table2 where table1.id=table2.id=$num";
      $salary = $db->querySingle($sql);
      $sql = "SELECT $salary - table1.fixcost as foo from table1,table2 where table1.id=table2.id";
      $inget = $db->querySingle($sql);
      $sql = "SELECT table1.fixcost * table2.varcost as foo from table1,table2 where table1.id=table2.id";
      $spen = $db->querySingle($sql);
      $balance = (int)$salary * (int)$spen;
      $sql = "SELECT table1.target * $balance as foo from table1,table2 where table1.id=table2.id";
      $goal = $db->querySingle($sql);

        echo 
        "<table>
    <tbody>
        <tr>
            <th>給料</th>
            <td>{$salary}</td>
        </tr>
         <tr>
            <th>出費</th>
            <td>{$spen}</td>
        </tr>
        <tr>
            <th>残金</th>
            <td>{$balance}</td>
        </tr>
        <tr>
            <th>目標まで</th>
            <td>{$goal}</td>
        </tr>
        <br/>
    </tbody>    
　　　　　</table>";


    ?>
    <br>
    <table>
        <th><?
         if ($spen<30000) {
            print("節約できていますね！えらい！！");
            } elseif ($spen<40000) {
            print("うーんまだ大丈夫！．．．かも！");
            } else{
            print("お金の使いすぎだよー！いいの！？");
            }
        ?></th>
    </table>
<p style="text-align: center;">
    <a href="input1.php" class="btn btn-flat"><span>月毎の入力はこちら</span></a>
    <a href="input2.php" class="btn btn-flat"><span>今日の給料などはこちら</span></a>
</p>

</body>
</html>