<?php
    if (!empty($_POST["email"]) && !empty($_POST["title"]) && !empty($_POST["description"])) {
        $mysqli = new mysqli('db', 'root', 'secret', 'web');

        if (mysqli_connect_errno()) {
            printf("Подключение невозможно. Код ошибки: %s\n", mysqli_connect_error());
            exit;
        }
        $emailVal = strval($_POST["email"]);
        $titleVal = strval($_POST["title"]);
        $descriptionVal = strval($_POST["description"]);
        $categoryVal = strval($_POST["category"]);

        $query = "
	INSERT INTO web.test (email, title, description, category)
	VALUES (?, ?, ?, ?)
	";

        $preparedStatement = mysqli_prepare($mysqli, $query);
        $preparedStatement->bind_param("ssss", $emailVal,$titleVal, $descriptionVal , $categoryVal) ;
        mysqli_stmt_execute($preparedStatement);
        $mysqli->close();
    }
?>
<a href="/indexTest.php">Go</a>
<form method="post">
    <textarea name="email" cols="100" rows="1"></textarea>
    <textarea name="title" cols="100" rows="1"></textarea>
    <textarea name="description" cols="100" rows="1"></textarea>
    <label>
        category
        <select name="category">
            <option value="phones">phones</option>
            <option value="computers">computers</option>
            <option value="other">other</option>
        </select>
    </label>
    <br>
    <input type="submit" value="Submit"/>
</form>