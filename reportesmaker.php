<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
<style>
    .wrapp{
        display: grid; grid-template-columns: repeat(7, 1fr); 
    }
</style>
</head>
<body>
<h1>Hacedor de Reporte</h1>
<?php

/*
 *Variables
 *  hoy
 *  1 dia mes
 *  ultimo dia mes
 *  dias mes
 *  dia español semana
 *  dia español mes
 */
$mesposteado = $_POST['mescalendario'];
$currentLocale = setlocale(LC_ALL, 'es_MX.utf8');
$currentLocale."<br>"; //outputs C/en_US.UTF-8/C/C/C/C on my machine
setlocale(LC_ALL, 'es_MX.utf8');

if($mesposteado == 'estemes'){
    $primerdiames = date("w", strtotime("first day of this month"));
    $ultimodiames = date("w", strtotime("last day of month"));
    $diasmes = date("d", strtotime("last day of this month"));
    $diaespanolmes = strftime("%B",strtotime("this month"));
}
if($mesposteado == 'mespasado'){
    $primerdiames = date("w", strtotime("first day of last month"));
    $ultimodiames = date("w", strtotime("last day of last month"));
    $diasmes = date("d", strtotime("last day of last month"));
    $diaespanolmes = strftime("%B",strtotime("last month"));

}
    $diaespanolsemana = strftime("%A");

echo "hoy es ".date("D d F Y", strtotime("today"))."<br>";
#

/*echo "el primer día de la semana del mes fué $primerdiames <br>" ;
echo "el último día de la semana del mes será $ultimodiames<br>" ;
echo "este mes acaba en el día $diasmes <br>";
echo "en español dia  actual>>> $diaespanolsemana <br>";
echo "en español mes >>> $diaespanolmes <br>";

echo "este mes empezó en el día >> " .
    strftime("%A", $primerdiames)."<br><br>";
i*/
$semana = array(1=>'Lunes', 2=>'Martes', 3=>'Miercoles', 4=>'Jueves', 5=>'Viernes', 6=>'Sabado', 0=>'Domingo');
echo'
<h1>Mes de '.$diaespanolmes.'</h1>
x = Ensayo en CCC <br>
y = Concierto en CCC <br>
z = Estudio Personal <br>
z1 = Custom <br><br>


<form action="calendario.php" method="POST">
<div class="wrapp"> ';    


//Postear valores seleccionados

$valores_calendario = array( $primerdiames, $ultimodiames, $diasmes, $diaespanolmes);
//  array [0]= primer dia del mes
//  array[1] = ultimo dia del mes
//  array[2] = cuantos dias tiene el mes
//  array[3] = mes en espanol ej: febrero

//var_dump( $valores_calendario);
/*
foreach ($valores_calendario as $posting_cal){
    echo' <input type="hidden" name="variables_calendario[]" value="'. $posting_cal.'"> ';
}*/
echo' 
<input type="hidden" name="primerdiames" value="'.$primerdiames.'">
<input type="hidden" name="ultimodiames" value="'.$ultimodiames.'">
<input type="hidden" name="diasmes" value="'.$diasmes.'">
<input type="hidden" name="diaespanolmes" value="'.$diaespanolmes.'">
';
// constructor calendario 
$j = 1;
$k = 1;
for($i = 0; $i <= $diasmes + $primerdiames-1; $i++){
    $modulo = $i % 7;
    //si al dividir entre 7 hay residuo en la division, no es multiplo de 7
    //si el modulo es 7 es multiplo de 7 y se reinicia el contador para empezar la semana en lunes
    if($modulo == 0){
        $j = 0;
    }    
    if($i < $primerdiames){
        //el contador k es para cuando empieza el mes en el dia correspondiente
        $k = ' ';
    }
    elseif($i == $primerdiames){
        $k =1;
    }
    echo'
        <div style="border:1px solid gray">   
            '.$semana[$j].'<br>
            '.$k.'<br>
			<input type="text" size="3" name="'.$i.'" id = "'.$i.'" onChange = "cuentaServicios()">
        </div>';
    $j++;
    $k++;
}

echo'</div>';
?>
<h2>Haz Calendario</h2>
<button name="manda">Manda</button>
</form>
    <label for="suma">Conteo de servicios</label><input type="text" id="suma">
<script>
    let y = 0;
    function cuentaServicios () {
        y = y + 1; 
        console.log( { y });
        document.getElementById( 'suma' ).value = y;

    }
</script>
</body>
</html>
