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
mysqli_select_db($link, "f0474960_movies");
$sql_add = "INSERT INTO movie SET title='" . $_GET["title_n"]
."', genre='".$_GET["genre_n"]."', 
producer='".$_GET["producer_n"]."', 
year='".$_GET["year_n"]."', cash='".$_GET["cash_n"]. "'";
mysqli_query($link, $sql_add); 
if (mysqli_affected_rows($link)>0) 
{ print "<p>Спасибо, вы зарегистрировали фильм в базе данных.";
print "<p><a href=\"index.php\"> Вернуться к спискуфильмов </a>"; }
else { print "Ошибка сохранения. <a href=\"index.php\">
Вернуться к списку фильмов </a>"; }
?>
</body>
</html>