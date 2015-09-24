<html>
<head>
    <meta charset="utf-8">
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
            overflow-y: scroll;
            overflow-x: hidden;
        }
        .item
        {
            background-color: azure;
        }
        input[id="message"]
        {
            width: 80%;
        }
        input[value='Send']
        {
            margin-top: -38px;
            margin-left: 82%;
        }
        .panel
        {
            width: 40%;
            margin-left: 30%;
            margin-top: 7%;
        }
        #emoctions
        {
            margin-top: -38px;
            margin-left: 90%;
        }
        .emoction
        {
            font-size: 30px;
            margin-left: 5px;
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
<button type='button' class='close' data-dismiss='alert'>&times;</button>
{$_GET['msg']}
</div>";
    }
}
else
{
    exit("<div class='panel panel-danger'><div class='panel-heading'>Error!</div><div class='panel-body'>You Must <a href='sign.php'>Sign In First.</a> </div></div>");
}
?>
<h1>Welcome, <?php echo $_COOKIE['name']; ?></h1>
<div id="chat" class="well container">

</div>
<br >
<br/>
<br/>
<div class="well container">
    <input class="form-control" type="text" id="message" placeholder="Type in your message...">
    <input type="button" class="btn btn-primary" value="Send" onclick="send()">
    <button id="emoctions" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Emoctions</button>

</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Emoctions</h4>
            </div>
            <div class="modal-body">
                <p>
                    <a href="#" class="emoction" onclick="putEmoction('😀')">😀</a><a href="#" class="emoction" onclick="putEmoction('☹')">☹</a>
                    <a href="#" class="emoction" onclick="putEmoction('😂')">😂</a>
                    <a href="#" class="emoction" onclick="putEmoction('😃')">😃</a>
                    <a href="#" class="emoction" onclick="putEmoction('😅')">😅</a>
                    <a href="#" class="emoction" onclick="putEmoction('😆')">😆</a>
                    <a href="#" class="emoction" onclick="putEmoction('😇')">😇</a>
                    <a href="#" class="emoction" onclick="putEmoction('😈')">😈</a>
                    <a href="#" class="emoction" onclick="putEmoction('😊')">😊</a>
                    <a href="#" class="emoction" onclick="putEmoction('😎')">😎</a>
                    <a href="#" class="emoction" onclick="putEmoction('😘')">😘</a>
                    <a href="#" class="emoction" onclick="putEmoction('😛')">😛</a>
                    <a href="#" class="emoction" onclick="putEmoction('😟')">😟</a>
                    <a href="#" class="emoction" onclick="putEmoction('😤')">😤</a>
                    <a href="#" class="emoction" onclick="putEmoction('😮')">😮</a>
                    <a href="#" class="emoction" onclick="putEmoction('😩')">😩</a>
                    <a href="#" class="emoction" onclick="putEmoction('😪')">😪</a>
                    <a href="#" class="emoction" onclick="putEmoction('😫')">😫</a>
                    <a href="#" class="emoction" onclick="putEmoction('🙋')">🙋</a>
                    <a href="#" class="emoction" onclick="putEmoction('🙍')">🙍</a>
                    <a href="#" class="emoction" onclick="putEmoction('🙏')">🙏</a>
                    <a href="#" class="emoction" onclick="putEmoction('😤')">😤</a>
                    <a href="#" class="emoction" onclick="putEmoction('😴')">😴</a>
                    <a href="#" class="emoction" onclick="putEmoction('🙀')">🙀</a>
                    <a href="#" class="emoction" onclick="putEmoction('😳')">😳</a>
                    <a href="#" class="emoction" onclick="putEmoction('😱')">😱</a>
                    <a href="#" class="emoction" onclick="putEmoction('😷')">😷</a>
                    <a href="#" class="emoction" onclick="putEmoction('😭')">😭</a>
                    <a href="#" class="emoction" onclick="putEmoction('😼')">😼</a>
                    <a href="#" class="emoction" onclick="putEmoction('🎔')">🎔</a>
                    <a href="#" class="emoction" onclick="putEmoction('🎈')">🎈</a>
                    <a href="#" class="emoction" onclick="putEmoction('🍩')">🍩</a>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

</div>
<a href="logout.php" style="margin-left: 45%;"><button class="btn btn-lg btn-primary">Logout</button></a>
<div id="sound">

</div>
<script>
    function putEmoction(emoction)
    {
        var msg = $("#message").val();
        msg = msg + " " + emoction + " ";
        $("#message").val(msg);
    }
    var prevMessage = "";
    var filename = "noti";
    var username = <?php echo '"' .$_COOKIE['name'] . '"'; ?>;
    function send()
    {
        message = $("#message").val();
        $("#message").val("");
        $.post("post.php", {message: message, name: username});
    }
    function putLog()
    {
        $.get("log.html", function(data){$("#chat").html(data);});
    }
    setInterval(function() {$.get("log.html", function(data){
        if(data != prevMessage)
        {
            prevMessage = data;
            $("#sound").html('<audio autoplay="autoplay"><source src="' + filename + '.mp3" type="audio/mpeg" /><source src="' + filename + '.ogg" type="audio/ogg" /><embed hidden="true" autostart="true" loop="false" src="' + filename +'.mp3" /></audio>');
        }
        $("#chat").html(data);
    })}, 2500);
    setInterval(function() { $("#chat").scrollTop(1E10) }, 2500);

</script>
<div style="text-align: center; margin-top: 50px;" class="container well">
    <a href="about.html">About This</a>
</div>
</body>
</html>