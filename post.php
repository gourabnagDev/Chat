<?php
if(isset($_POST['name']) && isset($_POST['message']))
{
    $contents = file_get_contents("log.html");
    $contents .= "<b>{$_POST['name']}:</b>&nbsp; &nbsp; {$_POST['message']} <Br />";
    file_put_contents("log.html", $contents);
}
else
{
    exit;
}