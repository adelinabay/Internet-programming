<html>
<head> <meta charset = "utf-8"> </head>
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
mysqli_select_db($link, "f0474960_movies");
$x=$_GET['hall_id'];
$anotherquery = "UPDATE hall SET thall='" . $_GET["thall_e"]
."', class='".$_GET["class_e"]."' WHERE hall_id =".$x;
mysqli_query($link, $anotherquery);
if (mysqli_affected_rows($link)>0) {
echo 'Все сохранено. <a href="index.php"> Вернуться к списку кинозалов </a>'; }
else { echo 'Ошибка сохранения. <a href="index.php">
Вернуться к списку кинозалов</a> '; }
?>
</body>
</html>