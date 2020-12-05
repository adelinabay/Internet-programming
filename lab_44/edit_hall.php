<html>
<head>
<meta charset = "utf-8">
<title> Редактирование данных о rbyjpfkf[ </title>
</head>
<body>
<?php
$link = mysqli_connect("127.0.0.1", "f0474960_Adelina", "123", "f0474960_movies");
mysqli_query($link, 'SET NAMES utf-8');
if (!$link) {
echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
exit;
}
// подключение к базе данных:
mysqli_select_db($link, "f0474960_f0474960_movies");
$x=$_GET["hall_id"];
$saveus = "SELECT thall, class FROM hall WHERE hall_id =".$x;
$rows=mysqli_query($link, $saveus);
while ($st=mysqli_fetch_array($rows)){
$id=$x;
$thall_e = $st['thall'];
$class_e = $st['class'];
}
print "<form action='save_edit_hall.php' metod='get'>";
print "<br>Название зала: <input name='thall_e' size='20' type='text'
value='".$thall_e."'>";
print "<br>Категория: <input name='class_e' size='20' type='text'
value='".$class_e."'>";
print "<input type='hidden' name='hall_id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку кинозалов </a>";
?>
</body>
</html>