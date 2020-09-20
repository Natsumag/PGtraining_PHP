<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<title> 修正確認 </title>
</head>
<body>

<?php

$post = sanitize($_POST);
$no=$post['no'];
$username=$post['username'];
$email=$post['email'];
$pass=$pass['pass'];
$pass2=$pass['pass2'];

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
	print '<form method = "post" action = "userEditDone.php">';
	print '<input type = "hidden" name = "no" value = "'.$no.'">';
	print '<input type = "hidden" name = "username" value = "'.$username.'">';
	print '<input type = "hidden" name = "pass" value = "'.$pass.'">';
	print '<br />';
	print '<input type = "button" onclick = "history.back()" value = "戻る">';
	print '<input type = "submit" value = "修正">';
	print '</form>';
}
?>

</body>
</html>