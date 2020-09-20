<!DOCTYPE html>
<html>
<head>
  <meta charset = "UTF-8">
  <title>管理者登録画面</title>
</head>
<body>
  ユーザ新規登録<br>
  <form method="post" action="userAddCheck.php">
  名前を入力してください。<br>
  <input type="text" name="username" style="width:200px"><br>
  メールアドレスを入力してください。<br>
  <input type="text" name="email" style="width:200px"><br>
  パスワードを入力してください。<br>
  <input type="password" name="pass" style="width:100px"><br>
  パスワードをもう一度入力してください。<br>
  <input type="password" name="pass2" style="width:100px"><br>
  <input type="button" onclick="history.back()" value="戻る">
  <br>
  <input type="submit" value="OK">
  </form>
</body>
</html>