<?php
session_start(); // セッションを開始する．
$message = 'ログインしてください．'; // デフォルトメッセージ

if (isset($_POST['password'])) {
  $password = $_POST['password']; // フォームから送信されたパスワード
  require 'db.php';
  $sql='select * from table1 where password="'.$password.'"';
  $prepare=$db->prepare($sql);
  $prepare->execute();
  $result=$prepare->fetchAll(PDO::FETCH_ASSOC);

  if ($result != null) {

    session_regenerate_id();
    $_SESSION['password'] = $password;

    if ($password == 'aaa') {
      $_SESSION['aaa']=true;
      header('Location: index.php');
    } 
  }
  $message = 'ユーザ名またはパスワードが違います．';
} // ユーザ名とパスワードが送信されていないなら以下のフォームを表示する．
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset='utf-8' />
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
  <link rel='stylesheet' href='home.css' />
  <title>ログイン</title>
</head>
<body>
  <?php echo $message;?>
  <form action="login.php" method="post">
    <ul style="list-style-type: none;">
      <li><input type="password" name="password" placeholder="パスワード" /></li>
      <li><input type="submit" value="ログイン" /></li>
    </ul>
  </form>
</body>
</html>