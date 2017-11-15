<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Requests</title>
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
<div class="container" id="requests">
    <table class="table table-hover">
        <tr>
            <td class="text-center">user id</td>
            <td class="text-center">vacation request</td>
            <td class="text-center">approved</td>
            <td class="text-center">&nbsp;</td>
            <td class="text-center">&nbsp;</td>
        </tr>

        <?php foreach ($requests as $request): ?>
            <tr>
                <td><?php echo $request['user_id']; ?></td>
                <td><?php echo $request['vacation_request']; ?></td>
                <td><?php echo $request['approved']; ?></td>
                <td>
                    <a href="/requests.php?cmd=update&id=<?php echo $request['id']; ?>" class="btn btn-sm btn-info">update</a></td>
                <td class="col-xs-12 col-md-1">
                    <a href="/requests.php?cmd=delete&id=<?php echo $request['id']; ?>" class="btn btn-sm btn-danger">delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
    <div class="col-xs-12">
        <h3>Create new request</h3>
        <form action="/requests.php?cmd=new" method="post" class="form">
            <input type="text" name="user_id" class="form-control" placeholder="user id">
            <input type="text" name="vacation_request" class="form-control" placeholder="vacation request" required>
            <div class="btn-group">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>