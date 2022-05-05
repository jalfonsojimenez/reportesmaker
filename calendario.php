<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title></title>
<style>
body{
		font-size: 14px;	
}
		.wrapp{
				display: grid;
				grid-template-columns: repeat(7,1fr);		
		}
		.cal{
				border: 1px solid gray;		
				font-size: 0.8em;
}
        @media print{
            .break{page-break-after: always;}
        }
</style>
</head>
<body>

<?php
setlocale(LC_ALL, 'es_ES');
$cuenta = array_count_values($_POST);
$sumx = $cuenta['x']; 
$sumy = $cuenta['y'];
$sumz = $cuenta['z'];
$sumz1 = $cuenta['z1'];
$servicios = $sumx + $sumy + $sumz + $sumz1;
$primerdiames = $_POST['primerdiames'];
$ultimodiames = $_POST['ultimodiames'];
$diasmes = $_POST['diasmes'];
$diaespanolmes = $_POST['diaespanolmes'];


$diaespanolsemana = strftime("%A");
//$diaespanolmes = strftime("%B");
$hoy = strftime("%d");
$anio = strftime("%G");

    $musicos = array(
    'Robert Carl Nelson' => 'viola',
    'René Eduardo Nuño Guzmán' => 'viola',
    'Yalissa Cruz Espino' => 'violoncello',
    'Jorge Alfonso González Jiménez' => 'violoncello',
    'Deni González Miniashkin' => 'contrabajo',
    'Diana Carolina Laguna Rivas' => 'violín',
    'Francisco Vidal Rivera González' => 'violín',
    'Paris Ayala Buenrostro' => 'violín',
    'Sergio Rodríguez Barrón' => 'violín',
    'Ramón Lemus Bravo' => 'violín',
    'Eva Alexandra Nogueira Rodrigues' => 'flauta',
    'Alfonso Chen Arellano' => 'clarinete',
    'María Monserrat Velázquez Gómez' => 'fagot',
    'David Alejandro Padilla Guerrero' => 'oboe', 
    'Ana Silvia Guerrero González' => 'piano',
    'Jorge Eduardo Aceves Cisneros' => 'percusiones',
    'Allen Vladimir Gómez' => 'dirección',
    'Roberto Carlos Hernández Estrada' => 'bibliotecario y administrativo'
    );

function imprimecal(){

/*
$primerdiames = $_POST[variables_calendario][0];
$ultimodiames = $_POST[variables_calendario][1];
$diasmes = $_POST[variables_calendario][2];
$diaespanolmes = $_POST[variables_calendario][3];
*/
$primerdiames = $_POST['primerdiames'];
$ultimodiames = $_POST['ultimodiames'];
$diasmes = $_POST['diasmes'];
$diaespanolmes = $_POST['diaespanolmes'];

$diaespanolsemana = strftime("%A");
//$diaespanolmes = strftime("%B");
$diastotales = date('d',strtotime("last day of this month"));
$r = date('t');

$semana = array(1=>'Lunes', 2=>'Martes', 3=>'Miercoles', 4=>'Jueves', 5=>'Viernes', 6=>'Sabado', 0=>'Domingo');
echo'
<div class="wrapp">
';
$evento = array('x'=>'Ensayo en Centro Cultural Constitución','y' => 'Concierto de temporada', 
    'z'=>'Periodo vacacional, estudio personal', 'z1'=> 'Concierto en Preparatoria no 3');

$j = 1;
$k = 1;
for($i = 0; $i <= $diasmes + $primerdiames -1; $i++){
    $modulo = $i % 7;
	$caca = $_POST[$i];
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
        <div style="border:1px solid gray" class="cal">   
            '.$semana[$j].'<br>
				
            '.$k.'<br>
			'.$evento[$caca].'<br>
        </div>';
    $j++;
    $k++;
}
echo'
</div>
';		

}
$primerdiames = $_POST['primerdiames'];
$ultimodiames = $_POST['ultimodiames'];
$diasmes = $_POST['diasmes'];
$diaespanolmes = $_POST['diaespanolmes'];
$diastotales = date('d', strtotime("last day of this month"));
/*
$primerdiames = $_POST[variables_calendario][0];
$ultimodiames = $_POST[variables_calendario][1];
$diasmes = $_POST[variables_calendario][2];
$diaespanolmes = $_POST[variables_calendario][3];
*/


$anio = date("Y", strtotime("now")); 
foreach($musicos as $k=>$v){

        echo '<br>
           
           
        Lic. CRISTOPHER DE ALBA ANGUIANO  <br>
        Director de Cultura Zapopan <br>

         PRESENTE <br>
         '.$diasmes.' de '.$diaespanolmes.' de '.$anio.'

        <br><br>
        <p>
		Por este conducto me permito informar que al final del mes de '.$diaespanolmes.' del año '.$anio.' ,
		he cumplido con las actividades laborales correspondientes a '.$servicios.' servicios, comprendidos
		entre conciertos,
        ensayos presenciales y estudio personal, con el objetivo de preparar los conciertos de temporada
        próximos a presentarse en el Centro Cultural Constitución y su transmisión en medios digitales
        para alimentar la página de cultura 
		</p>
		<p>
		Sin más por el momento y adjuntando fotografías le agradezco  y estoy a sus ordenes para cualquier comentario acerca del mismo.</p>
			<br><br>
		Atentamente <br><br><br>
		'.$k.' <br><br><br><br>
		'.$v.' Orquesta de Cámara de Zapopan
        </p>   
		<h2>'.$diaespanolmes.' de '.$anio.'</h2>
		';
		imprimecal();		
		echo'
			<h3>Servicios totales : '.$servicios.'</h3>
            <div class="break">&nbsp;</div>
		';
		}
?>
</body>
</html>
