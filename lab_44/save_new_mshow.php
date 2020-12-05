<html>
<head>
<meta charset = "utf-8">
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
mysqli_select_db($link, "f0474960_movies");
// Строка запроса на добавление записи в таблицу:
$sql_add = "INSERT INTO mshow SET datet='" . $_GET["datet_n"]
."', id_movie='".$_GET["id_movie_n"]."', id_hall='"
.$_GET["id_hall_n"]."', lot='".$_GET["lot_n"]."', lotz='".$_GET["lotz_n"].
"'";
mysqli_query($link, $sql_add); // Выполнение запроса
if (mysqli_affected_rows($link)>0) // если нет ошибок при выполнении запроса
{ print "<p>Спасибо, вы зарегистрировали киносеанс в базе данных.";
print "<p><a href=\"index.php\"> Вернуться к списку
киносеансов </a>"; }
else { print "Ошибка сохранения. <a href=\"index.php\">
Вернуться к списку киносесансов </a>"; }
?>
</body>
</html>