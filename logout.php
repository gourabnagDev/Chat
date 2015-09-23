<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="http://bootswatch.com/united/bootstrap.min.css" rel="stylesheet">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style type="text/css">
        .panel
        {
            width: 40%;
            margin-left: 30%;
            margin-top: 7%;
        }
    </style>
</head>
<body>
<?php
if(isset($_COOKIE["name"]))
{
    $contents = file_get_contents("log.html");
    $contents .= "<i>{$_COOKIE["name"]} left the room.</i><Br />";
    file_put_contents("log.html", $contents);
    unset($_COOKIE["name"]);
    setcookie("name", null, time()-3600);
    echo "
    <div class='panel panel-success'>
    <div class='panel-heading'>
    Signed out successfully;
    </div>
    <div class='panel-body'>
    Now you can <a href='sign.php'>Sign</a> with a different name.
    </div>
    </div>
    ";
}
else
{
    echo "
    <div class='panel panel-info'>
    <div class='panel-heading'>
Not signed in
    </div>
    <div class='panel-body'><b>You are already signed out.</b> You must <a href='sign.php'>Sign in</a>.
    </div>
    </div>
    ";
}
?>
</body>
</html>