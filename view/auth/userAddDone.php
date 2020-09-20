<?php
session_start();
if (isset($_SESSION['login']) == false) {
  print '不正アクセス<br>';
  print '<a href = "./login.html">ログイン画面へ</a>';
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset = "UTF-8">
  <title>管理画面</title>
</head>
<body>
<?php
try
{
  require_once('../../common/common.php');

  $post = sanitize($_POST);
  $username = $post['username'];
  $email = $post['email'];
  $pass = $post['pass'];

  $dsn = 'mysql:dbname=blogCMS;host=localhost;charset=utf8';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = 'INSERT INTO users(username,email,pass) VALUES(?,?,?)';
  $stmt = $dbh->prepare($sql);
  $data[] = $username;
  $data[] = $email;
  $data[] = $pass;
  $stmt->execute($data);

  $dbh = null;
}
catch(Exception $e)
{
  print'ただいま障害により大変ご迷惑をおかけしております。';
  exit();
}
?>

管理者メニュー<br>
ユーザー：<?php print $username; ?>を管理者に追加しました。 <br>
<br>
<hr>
<a href = "./login.html"> ログイン画面へ </a><br>
<a href = ""> トップ画面へ </a><br>
</body>
</html>