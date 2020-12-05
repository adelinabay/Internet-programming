<?php
$mysqli = new mysqli("localhost", "f0474960_Adelina", "123", "f0474960_movies");
    if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
    }
require('tfpdf/tfpdf.php');
$pdf = new tFPDF();
$pdf->AddPage();
$pdf->SetMargins(5, 5, 5); 
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',12);
$pdf->Cell(190,10,'Фильмы',0,1,'C');
$pdf->SetFillColor(255,255,255);
$pdf->SetFontSize(6);
$header = array("№ п/п","Название фильма","Жанр","Год выпуска","Название зала","Категория","Дата и время начала показа","Количество свободных мест");
$w = array(8,40,40,14,20,15,35,30);
$h = 6;
for ($c = 0; $c < 8; $c++){
    $pdf->Cell($w[$c],$h,$header[$c],'LRTB','0','',true);
}
$pdf->Ln();
$result = $mysqli->query("SELECT title, genre, year, thall, class, datet, lot-lotz FROM mshow LEFT JOIN movie ON movie.movie_id=mshow.id_movie 
LEFT JOIN hall ON hall.hall_id=mshow.id_hall");
if ($result){
$counter = 1;
    while ($row = $result->fetch_row()){
    $pdf->Cell($w[0],$h,$counter,'LRBT','0','C',true);
    $pdf->Cell($w[1],$h,$row[0],'LRB');
    for ($c = 2; $c < 8; $c++){
		if ($c==6){
      $row[$c-1] = date('d-m-Y H:i:s', strtotime($row[$c-1]));
      }
      $pdf->Cell($w[$c],$h,$row[$c-1],'RB');
     }
    $pdf->Ln();
    $counter++;
    }
}
$pdf->Output('Movies.pdf','D');
exit();
?>
