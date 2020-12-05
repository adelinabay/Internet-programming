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
$x=$_GET['movie_id'];
$anotherquery = "UPDATE movie SET title='" . $_GET["title_e"]
."', genre='".$_GET["genre_e"]."', producer='".$_GET["producer_e"]."', 
year='".$_GET["year_e"]."', 
cash='".$_GET["cash_e"]. "' WHERE movie_id =".$x;
mysqli_query($link, $anotherquery);
if (mysqli_affected_rows($link)>0) {
echo 'Все сохранено. <a href="index.php"> Вернуться к списку фильмов </a>'; }
else { echo 'Ошибка сохранения. <a href="index.php">
Вернуться к списку фильмов</a> '; }
?>
</body>
</html>