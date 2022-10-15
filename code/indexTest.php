
<?php
$mysqli = new mysqli('db', 'root', 'secret', 'web');

if (mysqli_connect_errno()) {
    printf("Подключение невозможно. Код ошибки: %s\n", mysqli_connect_error());
    exit;
}

if ($result = $mysqli->query('SELECT * FROM test')) {
    while ($row = $result->fetch_assoc()) {
        printf("%s %s", $row['email'], $row['title']);
        echo nl2br("\n");
    }

    $result->close();
}
?>