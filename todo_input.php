<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（入力画面）</title>
  <link rel="stylesheet" type="text/css" herf="css/main.css">
</head>

<body>
  <form action="todo_create.php" method="POST" autocomplete=off>

    <legend>（予約入力画面）</legend>
    <div>
      <div>
        <h1>人数</h1>
        <input type="text" name="todo">人
      </div>
      <div>
        予約時間: <input type="time" name="deadline">
      </div>
      <div>
        メモ: <input type="textbox" name="memo">
      </div>
      <div>
        <button>予約する</button>
      </div>
    </div>
    <a href="todo_read.php">一覧画面</a>

  </form>

</body>

</html>