<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
    <div class="col-xs-12">
        <h3>Update user</h3>
        <form action="/index.php?cmd=update" method="post" class="form">
            <input type="text" name="user_name" class="form-control" placeholder="name" value="<?php echo $user['name'] ?>">
            <input type="text" name="vacation_limit" class="form-control" placeholder="vacation_limit" required
                   value="<?php echo $user['vacation_limit'] ?>">
            <input type="hidden" name="form-submitted">
            <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
            <div class="btn-group">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>

</body>
</html>