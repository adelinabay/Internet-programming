<html>
<head>
<meta charset = "utf-8">
<title> Добавление нового киносеанса</title> </head>
<body>
<H2>Регистрация:</H2>
<form action="save_new_mshow.php" metod="get">
Дата и время начала показа фильма: <input name="datet_n" type="datetime">
<br>id фильма: <input name="id_movie_n" size="100" type="text">
<br>id кинозала: <input name="id_hall_n" size="100" type="text">
<br>Количество мест: <input name="lot_n" size="100" type="text">
<br>Количество занятых мест: <input name="lotz_n" size="100" type="text">
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="index.php"> Вернуться к списку киносеансов </a>
</body>
</html>