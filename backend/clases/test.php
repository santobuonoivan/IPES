<?php
require_once "./cuotas.php";
require_once "./pagos.php";




//(nombre:string, apellido:string, dni:number, sexo:string, legajo:number, sueldo:number,turno:string )
$cuota1 = new Cuotas(1,"matricula","19/02/1992",1900,1);
$cuota2 = new Cuotas(1,"cuota1","19/02/1992",1900,1);
$cuota3 = new Cuotas(1,"cuota2","19/02/1992",1900,1);
$cuota4 = new Cuotas(1,"cuota3","19/02/1992",1900,1);
$cuota5 = new Cuotas(1,"cuota4","19/02/1992",1900,1);
$cuota6 = new Cuotas(1,"cuota5","19/02/1992",1900,1);

$pagos1 = new Pagos(1,"matricula","19/02/1992",1900,1);
$pagos2 = new Pagos(1,"cuota1","19/02/1992",1900,1);
$pagos3 = new Pagos(1,"cuota2","19/02/1992",1900,1);
$pagos4 = new Pagos(1,"cuota3","19/02/1992",1900,1);
$pagos5 = new Pagos(1,"cuota4","19/02/1992",1900,1);
$pagos6 = new Pagos(1,"cuota5","19/02/1992",1900,1);



$arrayCuotas= array($cuota1,$cuota2,$cuota3,$cuota4,$cuota5,$cuota6);
$arrayPagos= array($pagos1,$pagos2,$pagos3,$pagos4,$pagos5,$pagos6);

$a= fopen("divCuotas.txt","a");
$b= fopen("divPagos.txt","a");
fwrite($a,Cuotas::generarDivCuotasDeUnAlumno($arrayCuotas));
fwrite($b,Pagos::generarDivPagosDeUnAlumno($arrayPagos));
fclose($a);
fclose($b);
echo "listo";

