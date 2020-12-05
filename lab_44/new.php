<html>
<head>
<meta charset = "utf-8">
<title> Добавление нового фильма </title> </head>
<body>
<H2>Регистрация:</H2>
<form action="save_new.php" metod="get">
Название: <input name="title_n" size="100" type="text">
<br>Жанр: <input name="genre_n" size="100" type="text">
<br>Режиссёр: <input name="producer_n" size="100" type="text">
<br>Год выпуска: <input name="year_n" size="100" type="text">
<br>Кассовые сборы: <input name="cash_n" size="100" type="text">
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="index.php"> Вернуться к списку фильмов </a>
</body>
</html>