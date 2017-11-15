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
    <div class="col-xs-12">
        <h3>Update request</h3>
        <form action="/requests.php?cmd=update" method="post" class="form">
            <input type="text" name="user_id" class="form-control" placeholder="user_id" value="<?php echo $request['user_id'] ?>">
            <input type="text" name="vacation_request" class="form-control" placeholder="vacation_request" required
                   value="<?php echo $request['vacation_request'] ?>">
            <div class="form-check">
                <label class="form-check-label">
                    <input value="<?php echo $request['approved'] ?>" type="checkbox" name="approved" class="form-check-input">
                    approved
                </label>
            </div>

            <input type="hidden" name="form-submitted">
            <input type="hidden" name="id" value="<?php echo $request['id'] ?>">
            <div class="btn-group">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>

</body>
</html>