<?php

use Usuario\NotesWithPhp\models\Note;

if (count($_POST) > 0) {
    $title = isset($_POST['title']) && $_POST['title'] != "" ? $_POST['title'] : 'Test Title';
    $content = isset($_POST['content']) ? $_POST['content'] : 'Test content';
    $color = isset($_POST['color']) ? $_POST['color'] : 'blue';
    $ref = $_POST['refNote'];

    //Validar colores
    switch ($color) {
        case "blue":
            $color = "blue";
            break;
        case "green":
            $color = "green";
            break;
        case "yellow":
            $color = "yellow";
            break;
        case "brown":
            $color = "brown";
            break;
        case "purple":
            $color = "purple";
            break;
        case "orange":
            $color = "orange";
            break;
        default:
            $color = "blue";
            break;
    }

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
    <title>View</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="src/views/resources/create.css">

</head>

<body>
    <?php require("resources/navbar.php") ?>
    <div class="container mt-5">
        <div class="note-form">
            <form action="?view=view&id=<?= $_GET['id'] ?>" method="post" id="formCreateNote">
                <select class="form-select" name="color" id="colorSelect">
                    <option value="blue" <?php if ($note->getColor() == "blue") {
                                                echo "selected";
                                            } ?>>Blue</option>
                    <option value="green" <?php if ($note->getColor() == "green") {
                                                echo "selected";
                                            } ?>>Green</option>
                    <option value="yellow" <?php if ($note->getColor() == "yellow") {
                                                echo "selected";
                                            } ?>>Yellow</option>
                    <option value="brown" <?php if ($note->getColor() == "brown") {
                                                echo "selected";
                                            } ?>>Brown</option>
                    <option value="purple" <?php if ($note->getColor() == "purple") {
                                                echo "selected";
                                            } ?>>Purple</option>
                    <option value="orange" <?php if ($note->getColor() == "orange") {
                                                echo "selected";
                                            } ?>>Orange</option>
                </select>
                <input class="form-control" type="text" name="title" placeholder="Title" required value="<?= $note->getTitle() ?>">
                <input type="hidden" name="refNote" value="<?= $note->getRef() ?>">
                <textarea class="form-control" name="content" rows="5" placeholder="Content"><?= $note->getContent() ?></textarea>
                <button class="btn btn-warning" type="submit">Edit Note</button>
            </form>
        </div>
    </div>

    <!-- Evento para cambiar el color de la tarjeta mediante el select de colores -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const colorSelect = document.getElementById("colorSelect");
            const noteForm = document.querySelector(".note-form");

            function changeFormColor(selectedColor) {
                switch (selectedColor) {
                    case "blue":
                        noteForm.style.backgroundColor = "#b8d8d8";
                        break;
                    case "green":
                        noteForm.style.backgroundColor = "#d5e5a3";
                        break;
                    case "yellow":
                        noteForm.style.backgroundColor = "#ffe28c";
                        break;
                    case "brown":
                        noteForm.style.backgroundColor = "#d6c1ab";
                        break;
                    case "purple":
                        noteForm.style.backgroundColor = "#baa9ba";
                        break;
                    case "orange":
                        noteForm.style.backgroundColor = "#ff8f5e";
                        break;
                    default:
                        noteForm.style.backgroundColor = "#b8d8d8";
                }
            }

            colorSelect.addEventListener("change", function() {
                const selectedColor = colorSelect.value;
                changeFormColor(selectedColor);
            });

            const initialColor = colorSelect.value;
            changeFormColor(initialColor);
        });
    </script>

    <!-- Evento para mostrar una alerta de progreso antes de hacer submit del form de edicion de la nota -->
    <script>
        const form = document.getElementById("formCreateNote")

        form.addEventListener("submit", function(e) {
            e.preventDefault();


            Swal.fire({
                title: 'Note edited successfully',
                text: 'You will be redirected to home... Bye!! 👋',
                allowOutsideClick: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    setTimeout(() => {
                        Swal.close();
                    }, 5000);
                },
                willClose: () => {
                    form.submit();
                }
            });
        })
    </script>
</body>

</html>