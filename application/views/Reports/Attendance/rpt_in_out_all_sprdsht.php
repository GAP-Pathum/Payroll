<?php

require_once('vendor/autoload.php'); 
use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();

// Retrieve the current active worksheet 
$sheet = $spreadsheet->getActiveSheet();


$sheet->setCellValue('A1', 'EMP NO');
$sheet->setCellValue('B1', 'NAME');
$sheet->setCellValue('C1', 'From DATE');
$sheet->setCellValue('D1', 'FROM TIME');
$sheet->setCellValue('E1', 'TO DATE');
$sheet->setCellValue('F1', 'TO TIME');
$sheet->setCellValue('G1', 'ST');


$row = 2;

foreach ($data_set as $data) {
    $Mint = $data->ApprovedExH;
    $hours = floor($Mint / 60);
    $min = $Mint - ($hours * 60);

    $sheet->setCellValue('A' . $row, $data->EmpNo);
    $sheet->setCellValue('B' . $row, $data->Emp_Full_Name);
    $sheet->setCellValue('C' . $row, $data->FDate);
    $sheet->setCellValue('D' . $row, $data->FTime);
    $sheet->setCellValue('E' . $row, $data->TDate);
    $sheet->setCellValue('F' . $row, $data->TTime);
    $sheet->setCellValue('G' . $row, $data->ShType);

    $row++;
}

// Write an .xlsx file  
$writer = new Xlsx($spreadsheet);

// headers to download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="report_abcd.xlsx"');
header('Cache-Control: max-age=0');

// Output
$writer->save('php://output');
exit;

?>