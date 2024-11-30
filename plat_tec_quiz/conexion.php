<?php
$preguntas_json = file_get_contents("estructura_preguntas.json");
$preguntas = json_decode($preguntas_json);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['NOM'];
    $puntaje = $_POST['PUNT'];

    $servername = "localhost";
    $username = "postgres";
    $password = "123456";
    $dbname = "plat_tec_quiz";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "INSERT INTO usuarios (nom, puntaje) VALUES ('$usuario', $puntaje)";
    if ($conn->query($sql) === TRUE) {
        echo "Score saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>