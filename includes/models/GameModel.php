<?php

class GameModel
{
    public static function saveScore($userid, $score)
    {
        $db = new Database();

        //prevent SQL Injection:
        $userid = $db->escapeString($userid);
        $score = $db->escapeString($score);

        $sql = "INSERT INTO game(`userid`,`score`) VALUES('".$userid."','".$score."')";
        $db->query($sql);
    }
}