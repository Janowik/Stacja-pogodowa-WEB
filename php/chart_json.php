<?php
header("Content-Type:application/json; charset=utf-8");
require_once "connect_database.php";
$connection = new mysqli($dbhost,$dbuser,$dbpassword,$dbname);

//pobieramy argument przekazywany do funkcji ktory odpowiada rodzajowi wykresu
$argument = $_GET['argument'];

if($connection->connect_errno!=0) {
    echo 'Upss:( Nie można się połączyć z bazą danych: '.$connection->connect_errno;
}else{
        getDataJson($connection, $argument);
}
function getDataJson($connection, $argument){
    $sql = "select $argument, data from stacja where data between date_sub(now(),INTERVAL 10 WEEK) and now()";
    $tablica_arr = array();
    $wynik = @$connection->query($sql);

    while($tablica = $wynik->fetch_array()){
        $JSONtablica[] = [strtotime($tablica['data'])*1000 + 3600000,$tablica[$argument]];
    }
    $connection->close();
    echo json_encode($JSONtablica,JSON_NUMERIC_CHECK);
}
?>