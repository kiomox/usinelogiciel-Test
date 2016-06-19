<?php

require('DB.php');

$db = new DB();

if ($_POST) {
    $db->add($_POST['name'], $_POST['phone']);
}
if ($_GET['delete']) {
    $db->remove($_GET['delete']);
}

$contacts = $db->all();
?>

<html>
<head>
    <title>PHP-Apache-Mysql-Sample - DaoCloud</title>

    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            color: #666;
            display: table;
        }

        .container {
            display: table-cell;
            text-align: center;
        }

        .content {
            text-align: center;
            display: inline-block;
        }


    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <h1>
            PHP-Apache-Mysql-Sample
        </h1>
        <table class="table">
            <caption>Contacts</caption>
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Phone Number</th>
                <th>Operation</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($contacts as $index => $contact) {
                ?>
                <tr>
                    <th scope="row"> <?php echo $index + 1 ?></th>
                    <td><?php echo $contact['name'] ?></td>
                    <td><?php echo $contact['phone'] ?></td>
                    <td>
                        <a href="index.php?delete=<?php echo $contact['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php
            } ?>
            </tbody>
        </table>

        <div class="text-left">
            <form method="post">
                <div class="form-group">
                    <label for="name">First Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label for="phone">Number</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="06-XX-XX-XX">
                </div>
                <button type="submit" class="btn btn-success">     New     </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
