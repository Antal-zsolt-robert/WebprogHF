<?php
echo "Elso feladat!" . "<br>";
$array = [5, '5', '05', 12.3, '16.7', 'five', 0xDECAFBAD, '10e200'];
foreach ($array as $value) {
    echo is_numeric($value) == true ? "Igen" . "<br>" : "Nem" . "<br>";
}
echo "<br>";
?>

<?php
echo "Masodik feladat!" . "<br>";
$orszagok = array( " Magyarország"=>"Budapest", "Románia"=>"Bukarest", "Belgium"=> "Brussels", "Austria" => "Vienna", "Poland"=>"Warsaw");
foreach ($orszagok as $key => $value){
    echo $key . " fővárosa " . $value . "<br>";
}
echo "<br>";
?>

<?php
echo "Harmadik feladat!" . "<br>";
$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
);

$keys = array_keys($napok);
for($i = 0; $i < count($napok); $i++) {
    echo $keys[$i] . ": ";
    foreach($napok[$keys[$i]] as $value) {
        if ($value == end($napok[$keys[$i]])){
            echo $value;
        }
        else{
            echo $value . ", ";
        }
    }
    echo "<br>";
}
echo "<br>";
?>

<?php
echo "Negyedik feladat" . "<br>";
$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');
$atalakitas = function(array $pArray, int $meret){
    if ($meret != 0 && $meret != 1){
        echo "Helytelen méret paraméter!";
    }
    foreach ($pArray as $value){
        if ($meret == 0){
            echo strtolower($value) . " ";
        }
        elseif ($meret == 1){
            echo strtoupper($value) . " ";
        }
    }
    echo "<br>";
};

$atalakitas($szinek, 0);
$atalakitas($szinek, 1);
$atalakitas($szinek, 3);
?>
