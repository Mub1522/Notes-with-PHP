<?php

use Usuario\NotesWithPhp\models\Note;

$notes = Note::getAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="src/views/resources/main.css">

</head>

<body>
    <?php require("resources/navbar.php") ?>
    <div class="container bootstrap snippets bootdeys">
        <div class="row">
            <?php
            foreach ($notes as $note) {
            ?>
                <div class="col-md-4 col-sm-6 content-card">

                    <div class="card-big-shadow">
                        <div class="card card-just-text" data-background="color" data-color="<?= $note->getColor() ?>" data-radius="none">
                            <div class="content">
                                <h6 class="category"><?= $note->getRef() ?></h6>
                                <h4 class="title"><a href="?view=view&id=<?= $note->getRef() ?>"><?= $note->getTitle() ?></a></h4>
                                <p class="description"><?= $note->getContent() ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>