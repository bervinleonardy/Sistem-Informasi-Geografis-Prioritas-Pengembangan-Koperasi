<?php
include "../../include/lib_inc.php";
include "../../include/Classes/PHPExcel.php";

date_default_timezone_set("Asia/Jakarta");

$excelku = new PHPExcel();

// Set properties
$excelku->getProperties()->setCreator("Admin Dinas Koperasi Usaha Mikro, Kecil dan Menengah Kota Bandung")
                         ->setLastModifiedBy("admin");

// Set lebar kolom
$excelku->getActiveSheet()->getColumnDimension('C')->setWidth(5);
$excelku->getActiveSheet()->getColumnDimension('D')->setWidth(70);

// Mergecell, menyatukan beberapa kolom
$excelku->getActiveSheet()->mergeCells('C1:E1');
$excelku->getActiveSheet()->mergeCells('C2:E2');
$excelku->getActiveSheet()->mergeCells('C3:E3');
$excelku->getActiveSheet()->mergeCells('C4:E4');

// Buat Kolom judul tabel
$SI = $excelku->setActiveSheetIndex(0);
$SI->setCellValue('C1', 'DINAS KOPERASI USAHA MIKRO,KECIL DAN MENENGAH'); //Judul laporan
$SI->setCellValue('C2', 'KOTA BANDUNG'); //Judul laporan
$SI->setCellValue('C3', 'Jalan Kawaluyaan No.2, Jati Sari, Buahbatu, Jatisari, Buahbatu, Kota Bandung, Jawa Barat 40286'); //Judul laporan
$SI->setCellValue('C4', 'Data Sektor Usaha'); //Judul laporan
$excelku->getActiveSheet()->getStyle('C1:E4')->getFont()->setName('Arial');
$excelku->getActiveSheet()->getStyle('C1:E4')->getFont()->setSize(14);
$excelku->getActiveSheet()->getStyle('C3')->getFont()->setSize(10);
$excelku->getActiveSheet()->getStyle('C4')->getFont()->setSize(18);
$excelku->getActiveSheet()->getStyle('C1:E4')->getFont()->setBold(true);
$excelku->getActiveSheet()->getStyle('B1:E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// Set title row bold;
$excelku->getActiveSheet()->getStyle('C6:E6')->getFont()->setBold(true);
// Set fills
$excelku->getActiveSheet()->getStyle('C6:E6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$excelku->getActiveSheet()->getStyle('C6:E6')->getFill()->getStartColor()->setARGB('FFEEEEEE');
 
 
$SI->setCellValue('C6', 'No'); //Kolom No
$SI->setCellValue('D6', 'Nama Sektor Usaha'); //Kolom Nama

// Menambahkan file gambar pada document excel pada kolom B2
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Dinas Koperasi Kota Bandung');
$objDrawing->setDescription('Logo Dinas');
$objDrawing->setPath('../../img/logo/logo.png');
$objDrawing->setCoordinates('B2');
$objDrawing->setHeight(100);
$objDrawing->setWidth(100); 
$objDrawing->setWorksheet($excelku->getActiveSheet());

//Mengeset Syle nya
$headerStylenya = new PHPExcel_Style();
$bodyStylenya   = new PHPExcel_Style();

$headerStylenya->applyFromArray(
	
    array('font' => array(
 		  'bold' => true),
		  'fill'     => array(		  
          'type'    => PHPExcel_Style_Fill::FILL_SOLID,
          'color'   => array('argb'  => 'FFEEEEEE')),
          'borders' => array('bottom'=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                        'right'      => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                        'left'       => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                        'top'        => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
          )
    ));
   
$bodyStylenya->applyFromArray(
    array('fill'     => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID,
          'color'    => array('argb' => 'FFFFFFFF')),
          'borders' => array(
                        'bottom'     => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'right'      => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                        'left'       => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                        'top'        => array('style' => PHPExcel_Style_Border::BORDER_THIN)

          )
    ));

//Menggunakan HeaderStylenya
$excelku->getActiveSheet()->setSharedStyle($headerStylenya, "C6:D6");

// Mengambil data dari tabel
$sql = 'SELECT id_sektor, nama_sektor  
		FROM sektor_usaha';										
$query = mysqli_query($conn, $sql);								
$baris=7;
$no=1;
while ($row = mysqli_fetch_array($query)) {	
  $SI->setCellValue("C".$baris,$no); //mengisi data untuk nomor urut
  $SI->setCellValue("D".$baris,$row['nama_sektor']); //mengisi data untuk nama
  $no++;
  $baris++; //looping untuk barisnya
}
//Membuat garis di body tabel (isi data)
$excelku->getActiveSheet()->setSharedStyle($bodyStylenya, "C7:D$baris");

//Memberi nama sheet
$excelku->getActiveSheet()->setTitle('Sektor_Usaha');

$excelku->setActiveSheetIndex(0);

// untuk excel 2007 atau yang berekstensi .xlsx
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=data-sektor-usaha.xlsx');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($excelku, 'Excel2007');
$objWriter->save('php://output');
exit;

?>