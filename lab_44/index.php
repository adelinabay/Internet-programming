<html>
<head>
<meta charset = "utf-8">
<title> Сведения о фильмах </title> </head>
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

?>

<h2>Фильмы:</h2>
<table border="1">
<tr>
<th> № </th> <th> Название </th> <th> Жанр </th> <th> Режиссёр </th> <th> Год выпуска </th> <th> Кассовые сборы </th>
<th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result=mysqli_query($link, "SELECT movie_id, title, genre, producer, year, cash FROM movie"); // запрос на выборку сведений о пользователях
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
echo "<tr>";
echo "<td>" . $row['movie_id'] . "</td>";
echo "<td>" . $row['title'] . "</td>";
echo "<td>" . $row['genre'] . "</td>";
echo "<td>" . $row['producer'] . "</td>";
echo "<td>" . $row['year'] . "</td>";
echo "<td>" . $row['cash'] . "</td>";
echo "<td><a href='edit.php?movie_id=" . $row['movie_id']
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
echo "<td><a href='delete.php?movie_id=" . $row['movie_id']
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего фильмов: $num_rows </p>");
?>
<p> <a href="new.php"> Добавить фильм </a>


<h2>Кинозалы:</h2>
<table border="1">
<tr>
<th> id </th> <th> Название зала </th> <th> Категория </th> 
<th> Редактировать </th> <th> Удалить </th> </tr>
<?php
$result=mysqli_query($link, "SELECT hall_id, thall, class FROM hall"); 
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['hall_id'] . "</td>";
echo "<td>" . $row['thall'] . "</td>";
echo "<td>" . $row['class'] . "</td>";
echo "<td><a href='edit_hall.php?hall_id=" . $row['hall_id']
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
echo "<td><a href='delete_hall.php?hall_id=" . $row['hall_id']
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего кинозалов: $num_rows </p>");
?>
<p> <a href="new_hall.php"> Добавить кинозал </a>


<h2>Киносеансы:</h2>
<table border="1">
<tr>
<th> id </th> <th> Дата и время начала показа фильма </th> <th> id фильма </th> 
<th>  id кинозала </th> <th>  Количество мест </th> <th>  Количество занятых мест </th> <th>  Редактировать </th> <th> Удалить </th> </tr>
<?php
$result=mysqli_query($link, "SELECT mshow_id, datet, id_movie, id_hall, lot, lotz FROM mshow"); 
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['mshow_id'] . "</td>";
echo "<td>" . date('d-m-Y H:i:s', strtotime($row['datet'])) . "</td>";
echo "<td>" . $row['id_movie'] . "</td>";
echo "<td>" . $row['id_hall'] . "</td>";
echo "<td>" . $row['lot'] . "</td>";echo "<td>" . $row['lotz'] . "</td>";
echo "<td><a href='edit_mshow.php?mshow_id=" . $row['mshow_id']
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
echo "<td><a href='delete_mshow.php?mshow_id=" . $row['mshow_id']
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего киносеансов: $num_rows </p>");
?>
<p> <a href="new_mshow.php"> Добавить киносеанс </a>

<p> <a href="gen_pdf.php"> Сгенерировать PDF файл </a>

<p> <a href="gen_xls.php"> Сгенерировать XLS файл </a>
</body>
</html>