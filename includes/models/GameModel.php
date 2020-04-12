<?php

class GameModel
{



    public static function saveScore($userid, $score)
    {
        $db = new Database();

        $sql = "INSERT INTO score(user_id,score) VALUES('".$db->escapeString($userid['user_id'])."','".$db->escapeString($score['score'])."')";
        $db->query($sql);

        $data['id'] = $db->insertId();

        return (object) $data;
    }

}