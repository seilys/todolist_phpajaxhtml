<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de tareas</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="index.js"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Gestor de tareas</h1>
    <hr>

        <form id="formsection">
            <input type="text" id="title" placeholder="Nueva tarea...">

            <input type="checkbox" name="tag" id="PHP" value="PHP">
            <label for="php">PHP</label>

            <input type="checkbox" name="tag" id="Javascript" value="Javascript">
            <label for="js" >Javascript</label>

            <input type="checkbox" name="tag" id="CSS" value="CSS">
            <label for="css">CSS</label>

            <button type="submit" name="submit" id="submit">Añadir</button>
        </form>

    <section id="listsection">
        <table id="tasklist">
            <tr>
                <th class="col0">Tarea</th>
                <th class="col1">Categorías</th>
                <th class="col2">Acciones</th>
            </tr>
        </table>
    </section>
</body>
</html>