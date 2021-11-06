<?php

if (
  !isset($_POST['todo']) || $_POST['todo'] == '' ||
  !isset($_POST['deadline']) || $_POST['deadline'] == '' ||
  !isset($_POST['memo']) || $_POST['memo'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$todo = $_POST['todo'];
$deadline = $_POST['deadline'];
$memo = $_POST['memo'];

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

$sql = 'INSERT INTO todo_table(id, todo, deadline, memo, created_at, updated_at) VALUES(NULL, :todo, :deadline, :memo, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);

exec_query($stmt);
// try {
//   $stmt->execute();
// } catch (PDOException $e) {
//   exit('sql実行エラー：' . $e->getMessage());
// }
header("Location:todo_input.php");
exit();
