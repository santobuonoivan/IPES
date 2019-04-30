<?php
$arch=fopen("cuotas.txt",'a');
$texto="INSERT INTO documentacion( id_alumno,titulo,dni,fotos,cert_salud,carrera)VALUES";
$fecha=array(   "'2018/01/10'",
                "'2018/01/10'",
                "'2018/02/10'",
                "'2018/03/10'",
                "'2018/04/10'",
                "'2018/05/10'",
                "'2018/06/10'",
                "'2018/07/10'",
                "'2018/08/10'",
                "'2018/09/10'",
                "'2018/10/10'",
                "'2018/11/10'",
                "'2018/12/10'");
$concepto=array("'Matricula'",
                "'cuota1'",
                "'cuota2'",
                "'cuota3'",
                "'cuota4'",
                "'cuota5'",
                "'cuota6'",
                "'cuota7'",
                "'cuota8'",
                "'cuota9'",
                "'cuota10'",
                "'cuota11'",
                "'cuota12'");
for ($i=1; $i <=100; $i++) {
    for ($j=1; $j <= 13; $j++) {
        if($i==100 && $j==13){
            $texto.= "({$i},{$concepto[$j-1]},{$fecha[$j-1]},1900);";
        }else {
            $texto.= "({$i},{$concepto[$j-1]},{$fecha[$j-1]},1900),";    
        }       
        
    } 
}
fwrite($arch,$texto);
fclose($arch);

 
