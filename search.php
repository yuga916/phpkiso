<!DOCTYPE html>
<html lang="ja">
<head>
  <title>検索ページ</title>
  <meta charset="utf-8">
</head>
<body>
  <form action="" method="post">
    <p>検索したいcodeを入力してください。</p>
    <input type="text" name="code">
    <input type="submit" value="検索">
  </form>

<?php
  
  $dsn = 'mysql:dbname=phpkiso;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');

  if (!empty($_POST)) {
    
    $sql = 'SELECT * FROM `survey` WHERE `code` = ?';
    $data[] =  $_POST['code'];
    
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    while (1) {
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($rec == false) {
        break;
      }
      echo $rec['code'] . '<br>';
      echo $rec['nickname'] . '<br>';
      echo $rec['email'] . '<br>';
      echo $rec['content'] . '<br>';
      echo '<hr>';
    }
  }

  $dbh = null;
?>
</body>
</html>