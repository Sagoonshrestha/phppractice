<?php
require_once('../connect.php');
$id=$_GET['id'];
if($conn->connect_errno==0){
	$sql= "select * from downloads where id='$id'";
	$store=$conn->query($sql);
	$detail=[];
	while($row=$store->fetch_assoc()){
		$detail[]=$row;
	}
// print_r($detail);
// echo $detail[0]['document_path'];
}else{
	die("database connection error".$conn->connect_errno);
}
$path=$detail[0]['document_path'];
$arr=explode(".",$path);
 //print_r($arr);
$ext=strtolower(end($arr));
//echo($ext);
if($ext == 'csv'){
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=csvfile.csv');
	$output = fopen('php://output', 'w');
	fputcsv($output, array('id', 'document_name', 'active', 'document_path','document_size'));

	if (count($detail) > 0) {
	    foreach ($detail as $r) {
	        fputcsv($output, $r);
	    }
	}
}
if($ext == 'json'){
	header('Content-Type: application/json; charset=utf-8');
	header('Content-Disposition: attachment; filename=jsonfile.json');
	$output = fopen('php://output', 'w');
	fputcsv($output, array('id', 'document_name', 'active', 'document_path','document_size'));

	if (count($detail) > 0) {
	    foreach ($detail as $r) {
	        fputcsv($output, $r);
	    }
	}
}
if($ext == 'xlsx'){
	header('Content-Type:application/vnd.ms-excel;');
	header('Content-Disposition: attachment; filename=excelfile.xlsx');
	$output = fopen('php://output', 'w');
	fputcsv($output, array('id', 'document_name', 'active', 'document_path','document_size'));

	if (count($detail) > 0) {
	    foreach ($detail as $r) {
	        fputcsv($output, $r);
	    }
	}
}
if($ext == 'pdf'){
	header('Content-Type:application/pdf; charset=utf-8');
	header('Content-Disposition: attachment; filename=pdffile.pdf');
	$output = fopen('php://output', 'w');
	fputcsv($output, array('id', 'document_name', 'active', 'document_path','document_size'));

	if (count($detail) > 0) {
	    foreach ($detail as $r) {
	        fputcsv($output, $r);
	    }
	}
}
if($ext == 'docx'){
	header('Content-Type: application/msword;');
	header('Content-Disposition: attachment; filename=wordfile.docx');
	$output = fopen('php://output', 'w');
	fputcsv($output, array('id', 'document_name', 'active', 'document_path','document_size'));

	if (count($detail) > 0) {
	    foreach ($detail as $r) {
	        fputcsv($output, $r);
	    }
	}
}
?>