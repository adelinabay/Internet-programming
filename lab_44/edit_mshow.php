<html>
<head>
<meta charset = "utf-8">
<title> Редактирование данных о киносеансах</title>
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
$x=$_GET["mshow_id"];
$saveus = "SELECT datet, id_movie, id_hall, lot, lotz FROM mshow WHERE mshow_id =".$x;
$rows=mysqli_query($link, $saveus);
while ($st=mysqli_fetch_array($rows)){
$id=$x;
$datet_e = $st['datet'];
$id_movie_e = $st['id_movie'];
$id_hall_e = $st['id_hall'];
$lot_e = $st['lot'];$lotz_e = $st['lotz'];
}
print "<form action='save_edit_mshow.php' metod='get'>";
print "<br>Дата и время начала показа фильма: <input name='datet_e' type='datetime'
value='".$datet_e."'>";
print "<br>id фильма: <input name='id_movie_e' size='20' type='text'
value='".$id_movie_e."'>";
print "<br>id кинозала: <input name='id_hall_e' size='30' type='text'
value='".$id_hall_e."'>";
print "<br>Количество мест: <input name='lot_e' size='30' type='text'
value='".$lot_e."'>";
print "<br>Количество занятых мест: <input name='lotz_e' size='30' type='text'
value='".$lotz_e."'>";
print "<input type='hidden' name='mshow_id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку киносеансов </a>";
?>
</body>
</html>


