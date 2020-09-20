<!DOCTYPE html>
<html>
<head>
  <meta charset = "UTF-8">
  <title>管理者新規登録画面</title>
</head>
<body>
<?php

require_once('../../common/common.php');

$post = sanitize($_POST);
$username = $post['username'];
$email = $post['email'];
$pass = $post['pass'];
$pass2 = $post['pass2'];

if($username == '')
{
  print'名前が入力されていません。<br>';
} else 
{
  print'名前：';
  print $username;
  print '<br>';
}

if($email == '')
{
  print'メールアドレスが入力されていません。<br>';
} else 
{
  print'メールアドレス：';
  print $email;
  print '<br>';
}

if($pass == '')
{
  print'パスワードが入力されていません。<br>';
} 
if($pass !== $pass2)
{
  print'パスワードが一致しません。<br>';
}
if($username == '' || $pass == '' || $pass !== $pass2)
{
  print'<form>';
  print'<input type="button" onclick="history.back()" value="戻る">';
  print'</form>';
}
else
{
  $pass = md5($pass);
  print'<form method="post" action="userAddDone.php">';
  print'<input type="hidden" name="username" value="'.$username.'">';
  print'<input type="hidden" name="email" value="'.$email.'">';
  print'<input type="hidden" name="pass" value="'.$pass.'">';
  print'<br>';
  print'<input type="button" onclick="history.back()" value="戻る">';
  print'<input type="submit" value="OK">';
  print'</form>';
}

?>
</body>
</html>