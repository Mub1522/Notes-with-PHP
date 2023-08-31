<?php

use Usuario\NotesWithPhp\models\Note;

if (count($_POST) > 0) {
    $title = isset($_POST['title']) && $_POST['title'] != "" ? $_POST['title'] : 'Test Title';
    $content = isset($_POST['content']) ? $_POST['content'] : 'Test content';
    $color = isset($_POST['color']) ? $_POST['color'] : 'blue';

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
    <title>Create</title>

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
            <form action="?view=create" method="post" id="formCreateNote">
                <select class="form-select" name="color" id="colorSelect">
                    <option value="blue">Blue</option>
                    <option value="green">Green</option>
                    <option value="yellow">Yellow</option>
                    <option value="brown">Brown</option>
                    <option value="purple">Purple</option>
                    <option value="orange">Orange</option>
                </select>
                <input class="form-control" type="text" name="title" placeholder="Title">
                <textarea class="form-control" name="content" rows="5" placeholder="Content"></textarea>
                <button class="btn btn-warning" type="submit">Create Note</button>
            </form>
        </div>
    </div>

    <!-- Evento para cambiar el color de la tarjeta mediante el select de colores -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const colorSelect = document.getElementById("colorSelect");
            const noteForm = document.querySelector(".note-form");

            colorSelect.addEventListener("change", function() {
                const selectedColor = colorSelect.value;

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
            });
        });
    </script>

    <!-- Evento para mostrar una alerta de progreso antes de hacer submit del form de creación de la nota -->
    <script>
        const form = document.getElementById("formCreateNote")

        form.addEventListener("submit", function(e) {
            e.preventDefault();


            Swal.fire({
                title: 'Note created successfully!',
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