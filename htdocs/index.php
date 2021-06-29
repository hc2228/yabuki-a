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
        $z =h($row['intA']);
        $p = h($row['intB']);
        $s = h($row['intC']);
        $r = h($row['intD']);
        $w = h($row['intE']);
        echo 
        "<table>
    <tbody>
        <tr>
            <th>給料</th>
            <td>$z　'円'</td>
        </tr>
         <tr>
            <th>出費</th>
            <td>$p　'円'</td>
        </tr>
         <tr>
            <th>残り予算</th>
            <td>$s　'円'</td>
        </tr>
        <tr>
            <th>残金</th>
            <td>$r　'円'</td>
        </tr>
        <tr>
            <th>目標まで</th>
            <td>$w　'円'</td>
        </tr>
        <tr>
            コメントが入ります
        </tr>
    </tbody>    
　　　　　</table>";
    }
    ?>
<p style="text-align: center;">
    <a href="input.php" class="btn btn-flat"><span>入力画面</span></a>
</p>

</body>
</html>