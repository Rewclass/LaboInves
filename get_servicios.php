 
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "InvesLab";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta a la base de datos
$sql = "SELECT servicio_nombre, analisis, costo, descripcion, indicaciones FROM servicios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Servicio</th><th>Análisis</th><th>Costo</th><th>Descripción</th><th>Indicaciones</th></tr>";
    
    // Salida de los datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["servicio_nombre"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["analisis"]) . "</td>";
        echo "<td>$" . htmlspecialchars($row["costo"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["descripcion"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["indicaciones"]) . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>
