<html>
<head>
<meta charset = "utf-8">
<title> Редактирование данных о фильме </title>
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
$x=$_GET["movie_id"];
$saveus = "SELECT title, genre, producer, year, cash FROM movie WHERE movie_id =".$x;
$rows=mysqli_query($link, $saveus);
while ($st=mysqli_fetch_array($rows)){
$id=$x;
$title_e = $st['title'];
$genre_e = $st['genre'];
$producer_e = $st['producer'];
$year_e = $st['year'];
$cash_e = $st['cash'];
}
print "<form action='save_edit.php' metod='get'>";
print "<br>Название: <input name='title_e' size='30' type='text'
value='".$title_e."'>";
print "<br>Жанр: <input name='genre_e' size='30' type='text'
value='".$genre_e."'>";
print "<br>Режиссёр: <input name='producer_e' size='30' type='text'
value='".$producer_e."'>";
print "<br>год выпуска: <input name='year_e' size='30' type='text'
value='".$year_e."'>";
print "<br>Кассовые сборы: <input name='cash_e' size='30' type='text'
value='".$cash_e."'>";
print "<input type='hidden' name='movie_id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку фильмов </a>";
?>
</body>
</html>


