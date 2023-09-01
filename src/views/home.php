<?php

use Usuario\NotesWithPhp\models\Note;

$notes = Note::getAll();

if (count($_POST) > 0) {

    $ref = isset($_POST["ref"]) ? $_POST["ref"] : "";

    if ($ref != "") {
        Note::delete($ref);
        header("Location: http://localhost/Notes-with-PHP/?view=home");
    }
}

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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    <?php require("resources/navbar.php") ?>
    <div class="container bootstrap snippets bootdeys">
        <div class="row">
            <?php
            foreach ($notes as $note) {
                $formId = 'formDeleteNote_' . $note->getRef();
                $buttonId = 'btnDeleteNote_' . $note->getRef();
            ?>
                <div class="col-md-4 col-sm-6 content-card">

                    <div class="card-big-shadow">
                        <div class="card card-just-text" data-background="color" data-color="<?= $note->getColor() ?>" data-radius="none">
                            <div class="content">
                                <h6 class="category"><?= $note->getRef() ?></h6>
                                <h4 class="title"><a href="?view=view&id=<?= $note->getRef() ?>"><?= $note->getTitle() ?></a></h4>
                                <p class="description"><?= $note->getContent() ?></p>
                            </div>
                            <div class="card-footer text-right">
                                <form action="?view=home" method="POST" id="<?= $formId ?>">
                                    <input type="hidden" name="ref" value="<?= $note->getRef() ?>">
                                    <button type="button" class="btn btn-danger btn-xs pt-2" data-form="<?= $formId ?>">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll("[data-form]");

            buttons.forEach(function(button) {
                button.addEventListener("click", function() {
                    const formId = this.getAttribute("data-form");
                    const form = document.getElementById(formId);

                    Swal.fire({
                        title: 'Are you sure you want to delete this note?',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonText: 'Yes ☹',
                        confirmButtonColor: '#E82252',
                        cancelButtonText: 'No 😄',
                        cancelButtonColor: '#2DC0D4'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

</body>

</html>