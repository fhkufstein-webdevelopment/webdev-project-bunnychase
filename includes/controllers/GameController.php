<?php

class GameController extends Controller
{
    protected $viewFileName = "game"; //this will be the View that gets the data...
    protected $loginRequired = true;


    public function run()
    {
        $this->view->title = "game";
        $this->view->username = $this->user->username;
        $this->view->userid = $this->user->id;


        $this->checkForSaveScorePost();
        $this->view->scores = GameModel::getAllScores();

    }

    private function checkForSaveScorePost()
    {
        if(isset($_POST['action']) && $_POST['action'] == 'saveScore')
        {
            $score = $_POST['score'];
            $userid = $this->user->id;

            //now we need our Model to save the values
            GameModel::saveScore($userid, $score); //:: ist only working when we define a Method as static. That means one can use the method without instanciating an object
            //normally we would first make a new object like so:
            //$gameObj = new GameModel();
            //$gameObj->saveScoreAndAttempts($userid, $score, $attempts);
            //but if a method is defined as static - it can be used directly like a function


            //finally send a JSON message that we saved the values...
            $jsonResponse = new JSON();
            $jsonResponse->result = true; //this is important, as the frontend expects result true if everything was ok
            $jsonResponse->setMessage("Werte gespeichert!"); //(optional)
            $jsonResponse->send();
        }
    }
}