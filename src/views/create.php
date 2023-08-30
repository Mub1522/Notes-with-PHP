<?php
use Usuario\NotesWithPhp\models\Note;

if(count($_POST) > 0){
    $title = isset($_POST['title']) ? $_POST['title'] : 'titulo de prueba';
    $content = isset($_POST['content']) ? $_POST['content'] : 'contenido de prueba';
    $color = isset($_POST['color']) ? $_POST['color'] : 'blue';

    $note = new Note($title, $content, $color);
    $note->save();

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
    <h1>Create</h1>
    <form action="?view=create" method="post">
        <select name="color">
            <option value="blue">blue</option>
            <option value="green">green</option>
            <option value="yellow">yellow</option>
            <option value="brown">brown</option>
            <option value="purple">purple</option>
            <option value="orange">orange</option>
        </select>
        <input type="text" name="title" placeholder="Titulo">
        <textarea name="content" id="" cols="30" rows="10"></textarea>
        <button type="submit">Crear nota</button>
    </form>
</body>
</html>