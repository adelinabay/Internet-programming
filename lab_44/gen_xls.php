<?php
require_once('Classes/PHPExcel.php');
require_once('Classes/PHPExcel/Writer/Excel2007.php');
$mysqli = new mysqli("localhost", "f0474960_Adelina", "123", "f0474960_movies");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
}
    $result = $mysqli->query("SELECT title, genre, year, thall, class, datet, lot-lotz FROM mshow LEFT JOIN movie ON movie.movie_id=mshow.id_movie LEFT JOIN hall ON hall.hall_id=mshow.id_hall");
$xls = new PHPExcel();
$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$sheet->setTitle('Фильмы');
$sheet->setCellValue("A1", 'Фильмы');
$sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('#F0F8FF');
$sheet->mergeCells('A1:H1');
$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$c = 0;
$header = array("№ п/п","Название фильма","Жанр","Год выпуска","Название зала","Категория","Дата и время начала показа","Количество свободных мест");
foreach ($header as $h){
    $sheet->setCellValueByColumnAndRow($c,2,$h);
    $sheet->getColumnDimensionByColumn($c)->setAutoSize(true);
    $c++;
    }
if ($result){
    $r = 3;
    while ($row = $result->fetch_row()){
    $c = 0;
    $sheet->setCellValueByColumnAndRow($c,$r,$r-2);
    $c++;
    foreach ($row as $cell){
    if ($c==6){
    $cell = date('d-m-Y H:i:s', strtotime($cell));
    }
    $sheet->setCellValueByColumnAndRow($c,$r,$cell);
    $c++;
    }
    $r++;
    }
}
header('Content-Type: application/xls');
header('Content-Disposition: inline; filename=Movies.xls');
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');
$objWriter = new PHPExcel_Writer_Excel5($xls);
$objWriter->save('php://output');
?>