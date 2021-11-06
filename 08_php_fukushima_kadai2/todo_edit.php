<?php
// var_dump($_GET);
// exit();

// 関数ファイル読み込み 
include("functions.php");

$id = $_GET['id'];
$pdo = connect_to_db();

$sql = 'SELECT * FROM users_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

exec_query($stmt);

$record = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump();
// exit();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（編集画面）</title>
</head>

<body>
  <form action="todo_update.php" method="POST" autocomplete=off>
    <fieldset>
      <legend>DB連携型todoリスト（編集画面）</legend>
      <a href="todo_read.php">一覧画面</a>
      <div>
        username: <input type="text" name="username" value="<?= $record["username"] ?>">
      </div>
      <div>
        password: <input type="text" name="password" value="<?= $record["password"] ?>">
      </div>
      <input type="hidden" name="id" value="<?= $record['id'] ?>">
      <div>
        <button>submit</button>
      </div>

    </fieldset>
  </form>

</body>

</html>