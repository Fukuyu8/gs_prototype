<?php

if (
  !isset($_POST['username']) || $_POST['username'] == '' ||
  !isset($_POST['password']) || $_POST['password'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$username = $_POST['username'];
$password = $_POST['password'];

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

$sql = 'INSERT INTO users_table(id, username, password, is_admin, is_deleted, created_at, updated_at) VALUES(NULL, :username, :password, "1", "1", sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

exec_query($stmt);
// try {
//   $stmt->execute();
// } catch (PDOException $e) {
//   exit('sql実行エラー：' . $e->getMessage());
// }
header("Location:todo_input.php");
exit();
