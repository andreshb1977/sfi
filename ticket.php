<?php

require('./fpdf/fpdf.php');
//conectar bs
$con = mysqli_connect("localhost", "sfi", "123");
$conb = mysqli_select_db($con,"sfi");
if(!$con) {
die("PROBLEMAS AL CONECTAR CON EL SERVIDOR");	
}  

if(!$conb) {
die("ERROR AL TRATAR DE CONECTAR A LA BASE DE DATOS");
}

//Seleccionamos q mostrar


$qr1="SELECT c.codana,codpre,canpre,c.dni,concat (c.nombre ,' ' , c.apellidos) as nombre, aprger FROM clientes c,prestamos p,empleados e where c.dni=p.dni and e.usuario=c.codana and c.dni='".$_POST['dni']. "'";	
$result=mysqli_query($con,$qr1);

//Initialize the 5 columns and the total
$column_codana = "";
$column_cod = "";
$column_can = "";
$column_dni = "";
$column_nombre = "";
$column_aprger = "";

//Agregar el campo a cada columna de la fila
while($row=mysqli_fetch_row($result)){
		$codana=$row[0];
		$cod= $row[1];
		$can=$row[2];
		$dni=$row[3];
		$nombre= $row[4];
		$aprger= $row[5];
		
	$column_codana = $column_codana.$codana."\n";
	$column_cod = $column_cod.$cod."\n";
    $column_can = $column_can.$can."\n";
    $column_dni = $column_dni.$dni."\n";
    $column_nombre = $column_nombre.$nombre."\n";
    $column_aprger = $column_aprger.$aprger."\n";
    }
//mysqli_close($result);

//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();

//Fields Name position
//$Y_Fields_Name_position = 20;
//Table position, under Fields Name
$X_Table_Position = 45;

//ponemos un rectangulo
$pdf->rect(8,14,80,70,'df');
//Now show the 4 columns
$pdf->SetFont('courier','',10);



$pdf->SetX($X_Table_Position);
$pdf->SetY(16);
$pdf->MultiCell(80,6,'Codigo de Analista: '.$column_codana,0);

$pdf->SetX($X_Table_Position);
$pdf->SetY(26);
$pdf->MultiCell(80,6,'Oficina: Vallecas',0);

$pdf->SetX($X_Table_Position);
$pdf->SetY(36);
$pdf->MultiCell(80,6,'Codigo de Prestamo: '.$column_cod,0);

$pdf->SetX($X_Table_Position);
$pdf->SetY(46);
$pdf->MultiCell(80,6,'Cantidad de Prestamo: '.$column_can,0);

$pdf->SetX($X_Table_Position);
$pdf->SetY(56);
$pdf->MultiCell(80,6,'DNI: '.$column_dni,0);

$pdf->SetX($X_Table_Position);
$pdf->SetY(66);
$pdf->MultiCell(80,6,'Nombre: ' .$column_nombre,0);

$pdf->SetX($X_Table_Position);
$pdf->SetY(76);
$pdf->MultiCell(80,6,'Aprobabado por Gerente: ' .$column_aprger,0);

$pdf->Output();

mysqli_free_result($result);
?>





