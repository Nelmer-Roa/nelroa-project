<?php
// Conectar a la base de datos
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "1234";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Error de conexión: " . pg_last_error());
}

// Consulta para obtener los puntajes
$query = "SELECT nom, punt FROM usuarios ORDER BY punt DESC";
$result = pg_query($conn, $query);

if (!$result) {
    die("Error al obtener los puntajes: " . pg_last_error());
}

// Generar la tabla de resultados
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Nombre</th><th>Puntaje</th></tr>";

while ($row = pg_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
    echo "<td>" . htmlspecialchars($row['punt']) . "</td>";
    echo "</tr>";
}

echo "</table>";

// Cerrar la conexión
pg_close($conn);
?>
