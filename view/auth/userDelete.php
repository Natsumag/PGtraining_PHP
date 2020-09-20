<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<title> 管理者削除 </title>
</head>
<body>

<?php

try
{

$no = $_GET['no'];

$dsn = 'mysql:dbname=blogCMS;host=localhost;charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT username,email FROM users WHERE no = ?';
$stmt = $dbh->prepare($sql);
$data[] = $no;
$stmt->execute($data);
$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$username = $rec['username'];
$email = $rec['email'];

$dbh = null;

}
catch(Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

管理者削除<br>
<hr>
No:<br>
<?php print $no; ?><br>
名前：<?php print $username ?>を削除します<br>
<form method = "post" action = "userDeleteCheck.php">
<input type = "hidden"name = "no" value = "<?php print $no; ?>">

<input type = "button" onclick = "history.back()" value = "戻る">
<input type = "submit" value = "OK">
</form>

</body>
</html>