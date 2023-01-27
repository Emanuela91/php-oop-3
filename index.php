<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phh-oop-3</title>
</head>

<body>
    <?php
    include __DIR__ . '/models/salary.php';
    include __DIR__ . '/models/person.php';
    include __DIR__ . '/models/employee.php';
    include __DIR__ . '/models/chief.php';
    include 'db.php';

    echo $stipendio1->getHtml();
    ?>

</body>

</html>