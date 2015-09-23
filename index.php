<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="http://bootswatch.com/united/bootstrap.min.css" rel="stylesheet">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
        .alert
        {
            width: 70%;
            margin-left: 15.5%;
            margin-top: 3%;
        }
        #chat
        {
            height: 300px;
            box-shadow: 0 0 5px inset #ddd;
        }
        .item
        {
            background-color: azure;
        }
        input[id="message"]
        {
            width: 90%;
        }
        input[value='Send']
        {
            margin-top: -38px;
            margin-left: 92%;
        }
        .panel
        {
            width: 40%;
            margin-left: 30%;
            margin-top: 7%;
        }
    </style>
    <title>Chat</title>
</head>
<body>
<h1>Chat</h1>
<?php
if(isset($_COOKIE["name"])) {
    if (isset($_GET['msg']) && isset($_GET['msgType'])) {
        echo "<div class='alert alert-dismissible alert-{$_GET['msgType']}'>
<button type='button' class='close' data-dismiss='alert'>×</button>
{$_GET['msg']}
</div>";
    }
}
else
{
    exit("<div class='panel panel-danger'><div class='panel-heading'>Error!</div><div class='panel-body'>You Must <a href='sign.php'>Sign In First.</a> </div></div>");
}
?>
<div class="container well" style="margin-top: 60px;">
    <h1>Welcome <?php echo $_COOKIE['name']; ?></h1>
    <div id="chat">

    </div>
    <input class="form-control" type="text" id="message" placeholder="Type in your message...">
    <input type="button" class="btn btn-primary" value="Send" onclick="send()">
</div>
<a href="logout.php" style="margin-left: 20%;"><button class="btn btn-lg btn-primary">Logout</button></a>
<script>
    var message;
    var username = <?php echo '"' .$_COOKIE['name'] . '"'; ?>;
    function send()
    {
        message = $("#message").val();
        console.log(message);
        $("#message").val("");
        $.post("post.php", {message: message, name: username});
    }
    function putLog()
    {
        $.get("log.html", function(data){$("#chat").html(data);});
    }
    setInterval(function() {$.get("log.html", function(data){$("#chat").html(data);})}, 2500);
</script>
</body>
</html>