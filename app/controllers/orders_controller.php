 <?php
 class OrdersController extends AppController
 {
	var $uses =  array('Menu',"Ingresos");
    var $name = 'Orders';
	
    function _data_last_month_day()
    { 
      $month = date('m');
      $year = date('Y');
      $day = date("d", mktime(0,0,0, $month+1, 0, $year));
 
      return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
    }
 
    function _data_first_month_day()
    {
      $month = date('m');
      $year = date('Y');
      return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
    }
    
    
    function index()
    {
        if(!empty($this->data))
        {
            if ($this->Ingresos->save($this->data['Ingresos']))
            {
                $this->flash('Ingreso Registrado',false);
                
                $this->set("ACTION","Registro de Ingresos");
                $fields = array("*");
                $fecha = date("Y-m-d");
                
                $conditions =  array('Ingresos.fecha' => $fecha);
                $this->set("ingresos_mes",$this->Ingresos->find("all",array("conditions"=>$conditions,"fields"=>$fields)));
                $this->render('index');
            }
        }
        
        $this->set("ACTION","Registro de Ingresos");
        $fields = array("*");
        $fecha = date("Y-m-d");
        
        $conditions =  array('Ingresos.fecha' => $fecha);
        $this->set("ingresos_mes",$this->Ingresos->find("all",array("conditions"=>$conditions,"fields"=>$fields)));
	}
    
    
    function deleteIngreso($id)
    {
        if($this->Ingresos->delete($id))
        {
            $this->index();
            $this->render('index');
        }
    }
}
