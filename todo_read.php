<?php
include('functions.php');
$pdo = connect_to_db();

// $dbn = 'mysql:dbname=YOUR_DB_NAME;charset=utf8;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// try {
//   $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//   exit('DB Error：' . $e->getMessage());
// }

$sql = 'SELECT * FROM todo_table';

$stmt = $pdo->prepare($sql);

exec_query($stmt);
// try {
//   $stmt->execute();
// } catch (PDOException $e) {
//   exit('sql error：' . $e->getMessage());
// }

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// データの出力用変数（初期値は空文字）を設定
$output = "";
foreach ($result as $record) {
  $output .= "<tr>";
  $output .= "<td>{$record["todo"]}</td>";
  $output .= "<td>{$record["deadline"]}</td>";
  $output .= "<td>{$record["memo"]}</td>";
  // edit deleteリンクを追加

  $output .= "<td><a href='todo_edit.php?id={$record["id"]}'>edit</a></td>";
  $output .= "<td><a href='todo_delete.php?id={$record["id"]}'>delete</a></td>";
  $output .= "</tr>";
}
// $recordの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
// 今回は以降foreachしないので影響なし
unset($record);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（一覧画面）</title>
  <link rel="stylesheet" type="text/css" herf="css/main.css">
</head>

<body>
  <fieldset>
    <legend>（予約一覧画面）</legend>

    <table>
      <thead>
        <tr>
          <th>人数</th>
          <th>予約時間</th>
          <th>メモ</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>

    <a href="todo_input.php">入力画面</a>
  </fieldset>
</body>

</html>