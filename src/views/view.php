<?php

use Usuario\NotesWithPhp\models\Note;

if (count($_POST) > 0) {
    $title = isset($_POST['title']) ? $_POST['title'] : 'titulo de prueba';
    $content = isset($_POST['content']) ? $_POST['content'] : 'contenido de prueba';
    $color = isset($_POST['color']) ? $_POST['color'] : 'blue';
    $ref = $_POST['refNote'];

    $note = Note::get($ref);
    $note->setTitle($title);
    $note->setContent($content);
    $note->setColor($color);

    $note->update();
    header("Location: http://localhost/Notes-with-PHP/?view=home");
} else if (isset($_GET['id'])) {
    $note = Note::get($_GET['id']);
} else {
    header("Location: http://localhost/Notes-with-PHP/?view=home");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>View</h1>
    <form action="?view=view&id=<?= $note->getRef() ?>" method="post">
        <select name="color">
            <option value="blue">blue</option>
            <option value="green">green</option>
            <option value="yellow">yellow</option>
            <option value="brown">brown</option>
            <option value="purple">purple</option>
            <option value="orange">orange</option>
        </select>
        <input type="text" name="title" value="<?= $note->getTitle() ?>">
        <input type="hidden" name="refNote" value="<?= $note->getRef() ?>">
        <textarea name="content" id="" cols="30" rows="10"><?= $note->getContent() ?></textarea>
        <button type="submit">Crear nota</button>
    </form>
</body>

</html>