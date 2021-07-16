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
    //$db = null;
     
     $num = 1; //ログインしたことを過程
    //給料
      require('db.php');   
      $sql = 'SELECT table1.hwork FROM table1 where userid='.$num;
      $prepare =$db->prepare($sql);
      $prepare->execute();
      $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

      $a = 0;
     foreach($result as $row){
         $a=$a+h($row['hwork']);
     }
     
     $sql = 'SELECT*FROM table2 where userid='.$num;
     $prepare =$db->prepare($sql);
     $prepare->execute();
     $result = $prepare->fetchALL(PDO::FETCH_ASSOC);

     foreach($result as $row){
        $salary=h($row['worktime']*$a);
    }
     //
    $sql = 'SELECT*FROM table2 where userid='.$num;
    $prepare =$db->prepare($sql);
    $prepare->execute();
    $result = $prepare->fetchALL(PDO::FETCH_ASSOC);

    foreach($result as $row){
       $inget=h($salary-$row['fixcost']);
   }

   $sql = 'SELECT table1.varcost FROM table1 where userid='.$num;
   $prepare =$db->prepare($sql);
   $prepare->execute();
   $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

   $b = 0;
  foreach($result as $row){
      $b=$b+h($row['varcost']);
  }
   $sql = 'SELECT*FROM table2 where userid='.$num;
   $prepare =$db->prepare($sql);
   $prepare->execute();
   $result = $prepare->fetchALL(PDO::FETCH_ASSOC);

    foreach($result as $row){
      $spen=h($row['fixcost']+$b);
  }
    //残金
    $balance = (int)$salary - (int)$spen;
    //目標まで
    $sql = 'SELECT*FROM table2 where userid='.$num;
    $prepare =$db->prepare($sql);
    $prepare->execute();
    $result = $prepare->fetchALL(PDO::FETCH_ASSOC);

     foreach($result as $row){
     $goal=h($row['target']-$balance);
 }

      
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
　　　　　</table>
        <br/>
        <br/>";

    if ($spen<30000) {
        echo "<table><tbody><th>節約できていますね！えらい！！</th></tbody></table>";
        } elseif ($spen<40000) {
        echo "<table><tbody><th></th>うーんまだ大丈夫！．．．かも！</tbody></table>";
        } else{
        echo "<table><tbody><th>お金の使いすぎだよー！いいの！？</th></tbody></table>";
        }



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