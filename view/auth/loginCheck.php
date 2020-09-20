<?php

try
{
  require_once('../../common/common.php');

  $post = sanitize($_POST);
  $username = $post['username'];
  $pass =  $post['pass'];
  $pass = md5($pass);

  $dsn='mysql:dbname=blogCMS;host=localhost;charset=utf8';
  $user='root';
  $password='';
  $dbh=new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $sql = 'SELECT username, pass FROM users WHERE username = ? AND pass = ?';
  $stmt = $dbh -> prepare($sql);
  $data[] = $username;
  $data[] = $pass;
  $stmt -> execute($data);
  $dbh = null;

  $rec = $stmt -> fetch(PDO::FETCH_ASSOC);

  if($rec == false)
  {
    print 'ユーザー名またはパスワードが間違えています。 <br>';
    print '<a href = "login.html">戻る</a>';
  }
  else
  {
    session_start();
    $_SESSION['login'] = 1;
    $_SESSION['username'] = $rec['username'];
    
    header('Location:../management/managementTop.php');
    exit();
  }
}
catch(Exception $e)
{
  print '只今障害により大変ご迷惑をおかけしております。';
  exit();
}
?>