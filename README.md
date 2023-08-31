# Página de Creación de Notas con PHP, MySQL, Composer 🐘

![php (2)](https://github.com/Mub1522/Advanced-PHP-practices/assets/105318645/6daef348-e1e2-4bc9-a7d7-f688ef82133d)
![notas-adhesivas (1)](https://github.com/Mub1522/Notes-with-PHP/assets/105318645/30e895dc-b879-44f2-899c-46236c813964)

¡Bienvenido a mi repositorio de la Página de Creación de Notas con PHP, MySQL, Composer y el patron MVC! En este proyecto, he desarrollado una Página de Creación de Notas completamente funcional utilizando las tecnologías PHP 8, MySQL 8, Composer y el patron MVC. Además, he mejorado la experiencia del usuario implementando la librería SweetAlert2 para mostrar mensajes y alertas atractivas.

## Características Principales 🌟

- **Almacenamiento en BD**: Los datos de las notas creadas por los usuarios se almacenan en una base de datos MySQL 8. Se utiliza un id auto incrementable, y una columna llamada ref, para que las notas ademas del id, tengan una referencia unica.

- **Integración de SweetAlert2**: En lugar de mostrar las alertas tradicionales del navegador, se ha implementado SweetAlert2 para mostrar mensajes atractivos y personalizados cuando los usuarios crear o editan sus notas exitosamente.

- **Interfaz de Usuario Agradable**: Se ha diseñado una interfaz de usuario intuitiva y atractiva utilizando HTML, CSS y componentes de Bootstrap 5.3.1 para lograr una experiencia de inicio de sesión agradable.

## Tecnologías Utilizadas 🛠️

- **PHP 8**: Utilizado para manejar la lógica que sigue el patron MVC y la comunicación con la base de datos MySQL.

- **MySQL 8**: Base de datos utilizada para almacenar y gestionar la información de las notas creadas por los usuarios.

- **SweetAlert2**: Librería JavaScript utilizada para mostrar alertas y mensajes personalizados con un aspecto atractivo y moderno.

- **HTML y CSS**: Utilizados para construir la estructura y el diseño de la página de inicio de sesión.

- **Bootstrap 5.3.1**: Framework CSS utilizado para estilizar y dar formato a la interfaz de usuario de manera eficiente.

## Cómo Usar Este Repositorio 🐸

1. Clona este repositorio en tu máquina local.

2. Asegúrate de tener un servidor web local (como XAMPP o Laragon) configurado para ejecutar archivos PHP 8.

3. Importa la tabla de notas en tu base de datos (MYSQL 8) proporcionada en el archivo `schema.sql`, y ajusta los parametros de conexion en el archivo `lib/database.php`.

4. Abre la página en tu navegador para acceder a la Página de Home, donde saldran tus notas creadas.

5. Ten en cuenta que para editar la informacion de una nota, debes darle en el titulo de esta y seras redirigido a la vista view, ya que esta vista no aparece en la navbar por la logica y el envio de datos que se manejo.

¡Espero que encuentres útil este proyecto y que te ayude a comprender cómo construir una Página de Creación de Notas atractiva utilizando PHP, MySQL, Composer(MVC) y SweetAlert2! Siéntete libre de utilizar este código como referencia para tus propios proyectos. Frey 💗
