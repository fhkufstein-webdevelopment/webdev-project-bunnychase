<?php

class GameModel
{

    public static function saveScore($userid, $score)
    {
        $db = new Database();

        $sql = "INSERT INTO score(score, userId) VALUES('".$db->escapeString($score)."','".$db->escapeString($userid)."')";
        $db->query($sql);

        $data['id'] = $db->insertId();

        //$getId = "SELECT score_id FROM score WHERE score = '".$db->escapeString($score)."' AND userId = '".$db->escapeString($userid)."'";

        return (object) $data['id'];
    }

    public static function getAllScores() {
        $db = new Database();

        $sql = "SELECT u.`id`, u.`name`, s.`score_id`, s.`score`
                        FROM `user` AS u
                        JOIN score AS s
                        ON s.`userId` = u.`id`
                        ORDER BY s.`score` DESC";

        $result = $db->query($sql);

        if ($db->numRows($result) > 0) {
            $scoreArray = array();

            while ($row = $db->fetchObject($result)) {
                $scoreArray[] = $row;
            }
            return $scoreArray;
        }

        return null;
    }

    public static function getLastId() {
        return $lastid;
    }
}