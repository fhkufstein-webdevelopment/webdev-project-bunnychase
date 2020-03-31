<?php


class AddressDetailController extends Controller
{
    protected $viewFileName = "addressdetail"; //this will be the View that gets the data...
    protected $loginRequired = true;


    public function run()
    {
        $this->view->title = "Adressdetails";
        $this->view->username = $this->user->username;

        if(isset($_GET['id'])) //isset überprüft ob eine Variable gesetzt ist
        {
            $id = $_GET['id'];
            $this->view->address = AddressModel::getAddressById($id);
            if($this->view->address !== null && $this->view->address->userId != $this->user->id)
            {
                $this->view->address = null;
                /*
                 * verhindernNutzer einfach den GET Parameter verändert und so durch Zufall
                 *zugriff auf eine Adresse erhalten würde view,
                 * dass entweder keine Id oder eine ungültige Id übergeben worden ist
                 */
            }
        }
    }

}