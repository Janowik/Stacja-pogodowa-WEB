<?php
    header("Content-Type:application/json; charset=utf-8");
    require_once "connect_database.php";
    $connection = new mysqli($dbhost,$dbuser,$dbpassword,$dbname);

    if($connection->connect_errno!=0) {
        echo 'Upss:( Nie można siępołączyć z bazą danych: '.$connection->connect_errno;
    }else{
        $temperatura = $_GET['temperatura'];
        $wilgotnosc = $_GET['wilgotnosc'];
        $cisnienie = $_GET['cisnienie'];
        $PM10 = $_GET['PM10'];

        $sql = "INSERT INTO stacja (temperatura, wilgotnosc, cisnienie, PM10) 
                VALUES ('$temperatura','$wilgotnosc','$cisnienie','$PM10')";

        $wynik = @$connection->query($sql);

        echo '  Temperatura: '.$temperatura.' Wilgotnosc: '.$wilgotnosc.' Cisnienie: '.$cisnienie.' PM 10: '.$PM10 ;
        $connection->close();
    }
?>