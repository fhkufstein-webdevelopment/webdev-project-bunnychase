<?php

class HighscoreController extends Controller
{
    protected $viewFileName = "game"; //this will be the View that gets the data...
    protected $loginRequired = true;


    public function run()
    {
        $this->view->title = "Game";
        $this->view->username = $this->user->username;
        $this->view->userid = $this->user->id;

    }


}

