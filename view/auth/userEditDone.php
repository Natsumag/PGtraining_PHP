<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<title> 管理者修正</title>
</head>
<body>

<?php

try
{
  $post = sanitize($_POST);
  $no=$post['no'];
  $username=$post['username'];
  $email=$post['email'];
  $pass=$pass['pass'];

$dsn = 'mysql:dbname = blogCMS; host = localhost; charset = utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'UPDATE users SET username = ?,email = ?, pass = ? WHERE no = ?';
$stmt = $dbh->prepare($sql);
$data[] = $username;
$data[] = $email;
$data[] = $pass;
$data[] = $no;
$stmt->execute($data);

$dbh=null;

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

修正が完了しました。<br />
<br />
<a href="../management/managementTop.php"> 戻る</a>

</body>
</html>