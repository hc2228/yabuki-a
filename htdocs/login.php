<?php
session_start(); // セッションを開始する．
$message = 'ログインしてください．'; // デフォルトメッセージ

if (isset($_POST['id'], $_POST['pass'])) {
  $username = $_POST['id']; // フォームから送信されたユーザ名
  $password = $_POST['pass']; // フォームから送信されたパスワード

  $dbServer = '127.0.0.1';
  $dbName = 'mydb';
  $dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";
  $dbUser = 'id';
  $dbPass = 'pass';
  //データベースへの接続
  $db = new PDO($dsn, $dbUser, $dbPass);
  //検索実行
  $sql = 'select * from table1 where id ="'.$id.'" && pass = "'.$pass.'" ';
  $prepare = $db->prepare($sql);
  $prepare->execute();
  $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
  if ( $result != null ) {
    session_regenerate_id();//セッションを作り直す．
    $_SESSION['id'] = $id; // ユーザ名を記憶する．
  
    if ($username == 'GFAGA') {       // 管理者なら，
      $_SESSION['GFAGA'] = true;      // 管理者フラグを立て，
      header('Location: index.php');  // 管理者ページへ転送する．
    } else {                          // 管理者でないなら，
      header('Location: member.php'); // メンバページへ転送する．
    }
  }
  $message = 'ユーザ名またはパスワードが違います．';
} // ユーザ名とパスワードが送信されていないなら以下のフォームを表示する．
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset='utf-8' />
  <link rel='stylesheet' href='style.css' />
  <title>ログイン</title>
</head>
<body>
  <?php echo $message;?>
  <form action="login.php" method="post">
    <ul style="list-style-type: none;">
      <li><input type="text" name="id" placeholder="ユーザ名" /></li>
      <li><input type="pass" name="pass" placeholder="パスワード" /></li>
      <li><input type="submit" value="ログイン" /></li>
    </ul>
  </form>
</body>
</html>