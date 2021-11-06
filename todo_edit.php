<?php
// var_dump($_GET);
// exit();

// 関数ファイル読み込み 
include("functions.php");

$id = $_GET['id'];
$pdo = connect_to_db();

$sql = 'SELECT * FROM todo_table WHERE id=:id';
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
  <link rel="stylesheet" type="text/css" herf="css/main.css">
</head>

<body>
  <form action="todo_update.php" method="POST" autocomplete=off>
    <fieldset>
      <legend>DB連携型todoリスト（編集画面）</legend>

      <div>
        人数: <input type="text" name="todo" value="<?= $record["todo"] ?>">人
      </div>
      <div>
        予約時間: <input type="time" name="deadline" value="<?= $record["deadline"] ?>">
      </div>
      <div>
        メモ: <input type="textbox" name="memo" value="<?= $record["memo"] ?>">
      </div>
      <input type="hidden" name="id" value="<?= $record['id'] ?>">
      <div>
        <button>予約する</button>
      </div>

      <a href="todo_read.php">一覧画面</a>
    </fieldset>
  </form>

</body>

</html>