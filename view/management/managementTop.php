<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) == false)
{
  print 'ログインされていません。<br>';
  print '<a href = "../auth/login.html">ログイン画面へ</a>';
  exit();
}
else
{
  print 'ログインユーザー：' . $_SESSION['username'];
  print '<br/>';
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<title>管理画面</title>
</head>

<body>
メニュー<br>
<br>
<a href = "../staff/staff_list.php"> ユーザー管理 </a><br>
<a href = "article.php"> 記事一覧 </a><br>
<a href = "contact.php">お問い合わせ</a><br>
<a href = "../auth/userLogout.php"> ログアウト </a><br>
<hr>
<?php
try
{
  $dsn = 'mysql:dbname=blogCMS;host=localhost;charset=utf8';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = 'SELECT no, username, email FROM users WHERE 1';
  $stmt = $dbh -> prepare($sql);
  $stmt -> execute();
  
  $dbh = null;

  print '管理者一覧<br>';
  print '<form method = "post" action = "../auth/userBranch.php">';
  while (true)
  {
    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
    if ($rec == false)
    {
      break;
    }
    print '<input type = "radio" name = "no" value = "'.$rec['no']. '">';
    print $rec['username'];
    print '　';
    print $rec['email'];
  }
  print '<input type = "submit" name = "edit" value = "修正">';
  print '<input type = "submit" name = "delete" value = "削除">';
  print '</form>';
}
catch(Exception $e)
{
  print '只今障害により大変ご迷惑をおかけしております。';
  exit();
}

?>
</body>
</html>