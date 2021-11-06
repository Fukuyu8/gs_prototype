<?php
// var_dump($_POST);
// exit();

include('functions.php'); // 関数を記述したファイルの読み込み

if (
    !isset($_POST['todo']) || $_POST['todo'] == '' ||
    !isset($_POST['deadline']) || $_POST['deadline'] == '' ||
    !isset($_POST['memo']) || $_POST['memo'] == '' ||
    !isset($_POST['id']) || $_POST['id'] == ''
) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}


$todo = $_POST['todo'];
$deadline = $_POST['deadline'];
$memo = $_POST['memo'];
$id = $_POST['id'];

// var_dump('<pre>');
// var_dump($username);
// var_dump('<pre>');
// var_dump($password);
// var_dump('<pre>');
// var_dump($id);

$pdo = connect_to_db(); // DB接続

$sql = "UPDATE todo_table SET todo=:todo, deadline=:deadline, memo=:memo,
           updated_at=sysdate() WHERE id=:id";
//SQL組み立て
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

exec_query($stmt);

header("Location:todo_read.php"); //editをしてsubmitをクリックしたら戻ってくる場所
exit();
