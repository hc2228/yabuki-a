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
      require'db.php';
      $sql = 'SELECT*FROM testtable';
      $prepare =$db->prepare($sql);
      $prepare->execute();
      $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
      
    foreach($result as $row){
        $hwork = $_POST['hwork'];
        $worktime = $_POST['worktime'];
        $target = $_POST['target'];
        $remonth = $_POST['remonth'];
        $inget = $_POST['inget'];
        $fixcost = $_POST['fixcost'];
        $varcost = $_POST['varcost'];
        
        $z = h($row['salaary']);
        $p = h($row['spen']);
        $s = h($row['remai']);
        $r = h($row['balance']);
        $w = h($row['goal']);
        echo 
        "<table>
    <tbody>
        <tr>
            <th>給料</th>
            <td>$z</td>
        </tr>
         <tr>
            <th>出費</th>
            <td>$p</td>
        </tr>
         <tr>
            <th>残り予算</th>
            <td>$s</td>
        </tr>
        <tr>
            <th>残金</th>
            <td>$r</td>
        </tr>
        <tr>
            <th>目標まで</th>
            <td>$w</td>
        </tr>
    </tbody>    
　　　　　</table>";
    }
    ?>
    <br>
    <table>
        <th>コメントが入ります</th>
    </table>
<p style="text-align: center;">
    <a href="input.php" class="btn btn-flat"><span>入力画面</span></a>
</p>

</body>
</html>