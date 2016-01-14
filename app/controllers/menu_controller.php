 <?php
 class MenuController extends AppController
 {
	var $uses =  array('Menu');
    var $name = 'Menu';
	
    public function index()
    {
        //$this->layout='default';
        //$fields = array("transfer_id_formed","resort_name","original_price");
        $fields = array("*");
        $conditions = array("Transfers.transfer_id_formed"=>"ETI-070-017-0774");
        $this->set("transfers",$this->Transfers->find("all",array("conditions"=>$conditions,"fields"=>$fields)));
	}
    
    function show() {
        $fields = array("*");
        $this->set("menu",$this->Menu->find("all",array("fields"=>$fields)));
	}
    
    function app() {
	}
 }
