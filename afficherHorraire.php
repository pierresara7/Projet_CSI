<pre>
<pre>
<?php //début du programme
$dateDuJour=date('Y-m-d');
$semaine = array('8h - 9h ','9h - 10h','10h - 11h','11h - 12h','12h - 13h','15h - 16h','16h - 17h','17h - 18h','18h - 19','19h - 20h');
echo "<b>Quels Heures preferez-vous ?";
echo "<form action=# method=post>
 ".$dateDuJour."
       <SELECT NAME=myChoice>";
for ($count=0;$count<=10;$count++)
    {
         echo "<OPTION value=$semaine[$count]>$semaine[$count]</OPTION>";
    }
echo "</select><p></p><input type='submit' value='valider'></form>";
$jour1=date("d")+01;
$date1=date('Y-m-'.$jour1);
$semaine = array('8h - 9h ','9h - 10h','10h - 11h','11h - 12h','12h - 13h','15h - 16h','16h - 17h','17h - 18h','18h - 19','19h - 20h');
echo "<b>Quels Heures preferez-vous ?";
echo "<form action=# method=post>
 ".$date1."

       <SELECT NAME=myChoice>";
for ($count=0;$count<=10;$count++)
    {
         echo "<OPTION value=$semaine[$count]>$semaine[$count]</OPTION>";
    }
echo "</select><p></p><input type='submit' value='valider'></form>";

$jour2=date("d")+02;
$date2=date('Y-m-'.$jour2);
$semaine = array('8h - 9h ','9h - 10h','10h - 11h','11h - 12h','12h - 13h','15h - 16h','16h - 17h','17h - 18h','18h - 19','19h - 20h');
echo "<b>Quels Heures preferez-vous ?";
echo "<form action=# method=post>
 ".$date2."

       <SELECT NAME=myChoice>";
for ($count=0;$count<=10;$count++)
    {
         echo "<OPTION value=$semaine[$count]>$semaine[$count]</OPTION>";
    }
echo "</select><p></p><input type='submit' value='valider'></form>";

$jour3=date("d")+03;
$date3=date('Y-m-'.$jour3);
$semaine = array('8h - 9h ','9h - 10h','10h - 11h','11h - 12h','12h - 13h','15h - 16h','16h - 17h','17h - 18h','18h - 19','19h - 20h');
echo "<b>Quels Heures preferez-vous ?";
echo "<form action=# method=post>
 ".$date3."

       <SELECT NAME=myChoice>";
for ($count=0;$count<=10;$count++)
    {
         echo "<OPTION value=$semaine[$count]>$semaine[$count]</OPTION>";
    }
echo "</select><p></p><input type='submit' value='valider'></form>";

$jour4=date("d")+04;
$date4=date('Y-m-'.$jour4);
$semaine = array('8h - 9h ','9h - 10h','10h - 11h','11h - 12h','12h - 13h','15h - 16h','16h - 17h','17h - 18h','18h - 19','19h - 20h');
echo "<b>Quels Heures preferez-vous ?";
echo "<form action=# method=post>
 ".$date4."

       <SELECT NAME=myChoice>";
for ($count=0;$count<=10;$count++)
    {
         echo "<OPTION value=$semaine[$count]>$semaine[$count]</OPTION>";
    }
echo "</select><p></p><input type='submit' value='valider'></form>";

$jour5=date("d")+05;
$date5=date('Y-m-'.$jour5);
$semaine = array('8h - 9h ','9h - 10h','10h - 11h','11h - 12h','12h - 13h','15h - 16h','16h - 17h','17h - 18h','18h - 19','19h - 20h');
echo "<b>Quels Heures preferez-vous ?";
echo "<form action=# method=post>
 ".$date5."

       <SELECT NAME=myChoice>";
for ($count=0;$count<=10;$count++)
    {
         echo "<OPTION value=$semaine[$count]>$semaine[$count]</OPTION>";
    }
echo "</select><p></p><input type='submit' value='valider'></form>";
?>
</pre>