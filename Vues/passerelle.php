<?php
$equipe="G10C";

$ch = curl_init();
curl_setopt(
    $ch,
    CURLOPT_URL,
    "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=".$equipe);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);


$data_tab = str_split($data,33);
for($i=0, $size=count($data_tab); $i<$size; $i++){
    list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
        sscanf($data_tab[$i],"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    $data_tab[$i]= [$t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec];

}

echo var_dump($data_tab);
echo "\n";
echo count($data_tab);