<?php
use Usuario\NotesWithPhp\models\Note;

if(count($_POST) > 0){
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';

    $note = new Note($title, $content);
    $note->save();
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
        <input type="text" name="title" placeholder="Titulo">
        <textarea name="content" id="" cols="30" rows="10"></textarea>
        <button type="submit">Crear nota</button>
    </form>
</body>
</html>