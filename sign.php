<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="http://bootswatch.com/united/bootstrap.min.css" rel="stylesheet">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>Chat</title>
    <style>
        .well{
            width: 50%;
            margin-left: 25%;
            margin-top: 10%;
        }
        input[value='Go!']
        {
            margin-top: -38px;
            margin-left: 88%;
        }
        input[name='name']
        {
            width: 85%;
        }
    </style>
</head>
<body>
<?php
if(!isset($_COOKIE["name"]))
{
    echo "<div class='well'>
<h2>Sign in</h2>
<br />
<br/>
<form action='sign.php' class='form-group' method='get'>
<input class='form-control' type='text' placeholder='Name' name='name' id='name'>
<input class='btn btn-primary' type='submit' value='Go!'>
</form>
</div>";
    if(isset($_GET['name']))
    {
        setcookie("name", $_GET['name']);
        header("Location: index.php?msg=Signed+in_successfully&msgType=success");
    }
}
else
{
    header("Location: index.php?msg=Already+signed+in&msgType=info");
}
?>
</body>
</html>