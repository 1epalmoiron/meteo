<html>
<head>
	<link href="meteo.ccs" rel="stylesheet" />
<meta charset="UTF-8">
<title>Μετέο Μεσσαράς</title>
<style>
 table, th, td, tr{
	border: 1px solid #232323;
	border-collapse: collapse;
	}
	th, td {
		padding: 5px;
		text-align: left;
	}
	body {
		background-image: url('https://i.igmur.com/kXiS1eZ.jpg')
	}
</style>
</head>
<body id="bd">
<h1 align='center'><strong>ΕΠΑΛ Μοιρων</strong></h1>
<h2 align='center'> Δεδομένα Μετεωρολογικού</h2>

<?php
$servername = "localhost";
$username = "meteo17";
$password = "meteo17";
$dbname = "gp_2017_2018";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$kevtherm=0;
$aoureltherm=0;
$xristinatherm=0;
$boutsitherm=0;
$papadaktherm=0;
$nikostherm=0;
$kapsalistherm=0;
$giorgostherm=0;
$charitakhstherm=0;
$doulgetherm=0;
$anastherm=0;
$dionistherm=0;
$xristtherm=0;
$papadtherm=0;
$kapsaltherm=0;
$BR=0;
$sql = "SELECT * FROM meteorologikos ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	$kevtherm=$row["day_night"];
	$aoureltherm=$row["date"];
	$xristinatherm=$row["hour"];
	$boutsitherm=$row["temp"];
	$papadaktherm=$row["humidity"];
	$nikostherm=$row["BARO"];
	$kapsalistherm=$row["wdir"];
	$giorgostherm=$row["wind_speed"];
    $charitakhstherm=$row["kles"];
	$doulgetherm=$row["insects_of_rain"];
    $anastherm=$row["SRAD"];
    $dionistherm=$row["UV"];
    $xristtherm=$row["EVPT"];
    $papadtherm=$row["BATT"];  
    $kapsaltherm=$row["CHILL"];   
    }
} else {
    echo "0 results";
}
$conn->close();
?>

	<table align="center" id="img">
<?php
        $giorgostherm = floatval ($giorgostherm);
        $giorgostherm = $giorgostherm * 1.609344;
        $giorgostherm = round($giorgostherm , 1);
        $charitakhstherm = floatval ($charitakhstherm);
        ?>
<?php
            $boutsitherm = floatval ($boutsitherm);
            $boutsitherm = ($boutsitherm - 32) * 5/9;
            $boutsitherm = intval ($boutsitherm);
        ?>
    <?php
        /*
        if ($charitakhstherm == 0){
            BR=0;
        }
        ?>
        <?php
        elseif ($charitakhstherm <= 5){
            BR=1;
        }
        ?>
        <?php
        elseif ($charitakhstherm <=11){
            BR=2;
        }
        ?>
        <?php
        elseif ($charitakhstherm <=19){
            BR=3;
        }
        ?>
        <?php
        elseif ($charitakhstherm <=28){
            BR=4;
        }
        ?>
        <?php
        elseif ($charitakhstherm <=38){
            BR=5;
        }
        ?>
        <?php
        elseif ($charitakhstherm <=49){
            BR=6;
        }
        ?>
        <?php
        elseif ($charitakhstherm <=61){
            BR=7;
        }
        ?>
        <?php
        elseif ($charitakhstherm <=74){
            BR=8;
        }
        ?>
        <?php
        elseif ($charitakhstherm <=88){
            BR=9;
        }
        ?>
        <?php
        elseif ($charitakhstherm <=102){
            BR=10;
        }f
        ?>
        <?php
        elseif ($charitakhstherm <=117){
            BR=11;
        }
        ?>
        <?php
        elseif ($charitakhstherm <118){
            BR=12;
        }*/
        ?>
    <tr>        
        <?php
            if ($boutsitherm > 18 ){
                echo '<th><img src="https://i.imgur.com/o121blp.png" style="width:50px; height:50"></th>';
            }
        ?>
        <?php
        /*
        <th><img src="https://i.imgur.com/0yGO1EZ.png" style="width:50px; height:50"></th>
 		
        <th><img src="https://i.imgur.com/pcRwVTJ.png" style="width:50px; height:50"></th>
                
        <th><img src="https://i.imgur.com/s5NCaj9.png" style="width:50px; height:50"></th>
		          */?>
        <?php
            if ($boutsitherm <= 18 and $boutsitherm >=13 ){
        echo    '<th><img src="https://i.imgur.com/81guYEI.png" style="width:50px; height:50"></th>';
            }
		?>
         <?php
            if ($boutsitherm < 0){
        echo    '<th><img src="https://i.imgur.com/YPvFopV.png" style="width:50px; height:50"></th>';
            }
        ?>
        <?php
            if ($boutsitherm <= 12 and $boutsitherm >=1 ){
        echo '<th><img src="https://i.imgur.com/PaSe2ba.png" style="width:50px; height:50"></th>';
            }
		?>
        <th><img src = "https://www.imageupload.co.uk/images/2018/03/16/stopwatch.png" style="width:50px; height:50"></th>
        <th><img src="https://i.imgur.com/o121blp.png" style="width:50px; height:50"></th>
        <th><img src="https://i.imgur.com/SXMRDm9.png" style="width:50px; height:50"></th>
        <th><img src="https://preview.ibb.co/dStL4c/humidity.png"
                 style="width:50px; height:50"></th>
        <th><img src="https://image.ibb.co/jku6Sx/8762_200.png" style="width:50px; height:50"></th>
        <th><img src="https://image.ibb.co/bQZ7Hx/519580_076_Location_Arrow_512.png"
                 style="width:50px; height:50"></th>
        <th><img src="https://i.imgur.com/WRJywFJ.png" style="width:50px; height:50"></th>
        

       
	</tr> 
        
        
        
	<tr id="names">
        <?php
            if ($boutsitherm > 18 ){
        echo    '<td>Ηλιοφάνεια</td>';
            }
        ?>
        
        <?php
            if ($boutsitherm <= 18 and $boutsitherm >=13 ){
        echo '<td>Ασθενής Βροχή</td>';
            }
        ?>
        
		<?php
            if ($boutsitherm <= 12 and $boutsitherm >=1 ){
        echo '<td>Βροχερός</td>';
        }
        ?>
        
		<?php
            if ($boutsitherm < 0){
        echo '<td>Χιονώδης</td>';
        }
        ?>
		<td>Ώρες λειτουργίας</td>
        <td>Ημερα/Νυχτα</td>
        <td>Θερμοκρασία</td>
        <td>Υγρασία</td>
        <td>Βαρομετρική Πίεση</td>
        <td>Κατεύθηνση Ανέμου</td>
        <td>Ταχτητα Ανεμου</td>
    
	</tr>
        
        
        
        
    <tr>
    <td><?php    echo $aoureltherm; ?>   </td>
    <td>  <?php    echo $xristinatherm; ?></td>
    <td><?php   echo $kevtherm;     ?></td>
    <td>    <?php   echo $boutsitherm;	?></td>
    <td><?php	echo $papadaktherm;   ?> %</td>
	<td><?php	 echo $nikostherm;	?></td>
    <td><?php	echo $kapsalistherm;?></td>
    <td>  <?php echo $giorgostherm;  ?></td>
        </tr>   
        
        
        <table align="center" id='img'>
            <a href="meteohistory.php"><br><font size="5"> <center>History</center></font><br></a>
        
        <tr id='names'>
        
        <th><img src="https://preview.ibb.co/hxMs0H/rain_gauge_filled1600.png" style="width:50px; height:50px"></th>
        <th><img src="https://image.ibb.co/dj9UVH/radioactive_png_image_64850.png" style="width:50px; height:50"></th>
        <th><img src="https://image.ibb.co/euyY7x/HAZMAT_Class_7_Radioactive.png"
        style="width:50px; height:50"></th>
        <th><img src="https://image.ibb.co/eoCnZc/Anonymous_logo.png" 
        style="width:50px; height:50"></th>
        <th><img src="https://preview.ibb.co/ns1wuc/main_800png7.png" style="width:50px; height:50"></th>
        <th><img src="https://image.ibb.co/bucKEc/thermometer_cold_512.png" style="width:50px; height:50"></th>
            
        </tr>
        <tr>
        <td>Ιντσες Βροχής</td>
        <td>Ραδιενέργεια</td>
        <td>Ακτινοβολία</td>
        <td>Άγνωστο</td>
        <td>Μπαταρια</td>
        <td>(Chill)καφεδακι κ ετσι</td>
        </tr>
        
        <tr>
        <td>
            <?php
                    echo $doulgetherm;
            ?>
        </td>    
        <td>
            <?php
                    echo $anastherm;
            ?>    
        </td>
        <td>
            <?php
                    echo $dionistherm;
            ?>
        </td>
        <td>
            <?php
                    echo $xristtherm;
            ?>
        </td>
        <td>
            <?php
                    echo $papadtherm;
            ?>        
        </td>
        <td>
            <?php
                    echo $kapsaltherm;
            ?>        
        </td>
        

        </tr>
        </table>
        
	<a href="index.html"><font size="5"> <br><center>BACK</center></font></a>
</tr>
</table>
</body>
</html>

