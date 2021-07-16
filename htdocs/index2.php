<?php
include_once('db.php');

$SQL ="SELECT* FROM table1,table2";

$stmt=$db->prepare($sql);

$stmt->execute();

$records = $stmt->fetchAll();
var_dump($records);

?>
<!doctype html>
<html lang = "ja">
    <head>
        <metacharset = "utf-8">
        <title>ホーム画面</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel='stylesheet' href='home.css' />
</head>
<body>
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
    <table>
    <tbody>
        <tr>
            <th>給料</th>
            <td> 
            </td>
        </tr>
         <tr>
            <th>出費</th>
            <td>;
            
            </td>
        </tr>
        <tr>
            <th>残金</th>
            <td> 
        
            </td>
        </tr>
        <tr>
            <th>目標まで</th>
            <td>
                </td>
        </tr>
        <br/>
    </tbody>    
         </table>;


    <br>
    <table>
        <th><?php
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