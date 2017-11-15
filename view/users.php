<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Users</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="requests.php" class="active">Requests</a></li>
                <li><a href="index.php">Users</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="container" id="users">
    <table class="table table-hover">
        <tr>
            <td class="text-center">id</td>
            <td class="text-center">name</td>
            <td class="text-center">vacation limit</td>
            <td class="text-center">used limit</td>
            <td class="text-center">days left</td>
            <td class="text-center">&nbsp;</td>
            <td class="text-center">&nbsp;</td>
        </tr>

        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['vacation_limit']; ?></td>
                <td><?php echo $user['used_limit']; ?></td>
                <td><?php echo $user['days_left']; ?></td>
                <td>
                    <a href="/index.php?cmd=update&id=<?php echo $user['id']; ?>" class="btn btn-sm btn-info">update</a></td>
                <td class="col-xs-12 col-md-1">
                    <a href="/index.php?cmd=delete&id=<?php echo $user['id']; ?>" class="btn btn-sm btn-danger">delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
    <div id="newUserForm" clas="col-xs-12">
        <h3>Create new user</h3>
        <form action="/index.php?cmd=new" method="post" class="form">
            <input type="text" name="user_name" class="form-control" placeholder="name">
            <input type="text" name="vacation_limit" class="form-control" placeholder="vacation_limit" required>
            <div class="btn-group">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>