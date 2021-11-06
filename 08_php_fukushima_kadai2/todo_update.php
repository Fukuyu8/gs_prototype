<?php
// var_dump($_POST);
// exit();

include('functions.php'); // 関数を記述したファイルの読み込み

if (
    !isset($_POST['username']) || $_POST['username'] == '' ||
    !isset($_POST['password']) || $_POST['password'] == '' ||
    !isset($_POST['id']) || $_POST['id'] == ''
) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}


$username = $_POST['username'];
$password = $_POST['password'];
$id = $_POST['id'];

// var_dump('<pre>');
// var_dump($username);
// var_dump('<pre>');
// var_dump($password);
// var_dump('<pre>');
// var_dump($id);

$pdo = connect_to_db(); // DB接続

$sql = "UPDATE users_table SET username=:username, password=:password,
           updated_at=sysdate() WHERE id=:id";
//SQL組み立て
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

exec_query($stmt);

header("Location:todo_read.php"); //editをしてsubmitをクリックしたら戻ってくる場所
exit();
