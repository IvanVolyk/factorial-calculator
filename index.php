<!DOCTYPE html>
<html lang="uk-UA" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Онлайн калькулятор: Факторіал</title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
  <form action="work.php" method="post" autocomplete="off">
    Введіть число: <input type="text" name="number" id="number">
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
    <button type="submit">Відправити</button>
  </form>

</body>
</html>