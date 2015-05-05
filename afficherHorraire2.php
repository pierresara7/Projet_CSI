<?php //début du programme
$dateDuJour=date('Y-m-d');
for($i=1;$i<=6;$i++){
$semaine = array('08-09 ','09-10','10-11','11-12','12-13','15-16','16-17','17-18','18-19','19-20');
echo "<b>Quels Heures preferez-vous ?";
echo "<form action=\"horaire.php\" method=\"POST\">
 ".$dateDuJour."
       <SELECT NAME=myChoice>";
for ($count=0;$count<=10;$count++)
    {
         echo "<OPTION value=$semaine[$count]>$semaine[$count]</OPTION>";
    }
    $jour1=date("d")+$i;
$dateDuJour=date('Y-m-'.$jour1);
echo "</select><p></p>";?>
<input type="hidden" name="date" value=<?php echo $dateDuJour?>>
<input type='submit' value='valider'></form>
<?php
}
?>