<?php
require_once 'DataBaseService.php';

    if (!empty($_POST["email"]) && !empty($_POST["title"]) && !empty($_POST["description"])) {
        $service = new DataBaseService();
        $service->addPost($_POST["email"], $_POST["title"], $_POST["description"], $_POST["category"]);
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