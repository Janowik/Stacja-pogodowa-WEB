<?php
    header("Content-Type:application/json; charset=utf-8");
    require_once "connect_database.php";
    $connection = new mysqli($dbhost,$dbuser,$dbpassword,$dbname);

    if($connection->connect_errno!=0) {
        echo 'Upss:( Nie można się połączyć z bazą danych: '.$connection->connect_errno;
    }else{
        $sql = "SELECT * FROM stacja ORDER BY id DESC LIMIT 1";

        $wynik = @$connection->query($sql);
        $tablica = $wynik->fetch_array();
            $temperatura = $tablica['temperatura'];
            $wilgotnosc = $tablica['wilgotnosc'];
            $cisnienie = $tablica['cisnienie'];
            $pm10 = $tablica['PM10'];
            $data = $tablica['data'];
        $connection->close();
    }
    $JSONtablica = array("temperatura" =>$temperatura, "wilgotnosc" =>$wilgotnosc, "cisnienie" =>$cisnienie,"pm10" =>$pm10, "data" =>$data);
    echo json_encode($JSONtablica);
?>