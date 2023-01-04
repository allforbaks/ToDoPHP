<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/style.css">
    <title>ToDoPHP</title>
</head>

<body>
    <?php
    require_once 'src/db_config.php';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }

    $request = $pdo->query('SELECT * FROM todophp')->fetchAll();
    ?>
    <header class="header">
        <h1 class='title'>List of tasks</h1>
    </header>
    <main>
        <section class="button">
            <a href='#' class='new-btn'>Create new task</a>
        </section>
        <table class="main-table">
            <thead>
                <tr class="header-row">
                    <td>Date</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?
                foreach ($request as $req)
                    echo ('<tr><td>' . $req['Date'] . '</td><td>' . $req['Name'] . '</td><td>' . $req['Description'] . '</td><td><a href="#">edit  </a><a href="#">delete</a></td></tr>');
                ?>

            </tbody>
        </table>
    </main>
</body>

</html>