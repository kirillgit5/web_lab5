<?php
require_once 'DataBaseService.php';

$service = new DataBaseService();
$posts = $service->getPosts();
?>

<table>
    <caption>Объявления</caption>
    <?php foreach ($posts as $post): ?>
        <tr>
            <?php foreach ($post as $value): ?>
                <td><?= htmlspecialchars($value) ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
