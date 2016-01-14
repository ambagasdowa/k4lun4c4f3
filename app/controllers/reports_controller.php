 <?php
 class ReportsController extends AppController
 {
	var $uses =  array('Menu',"Egresos","Ingresos");
    var $name = 'Reports';
	
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
        $this->set("ACTION","Reporte General");
        $fields = array("*");
        $start_date = $this->_data_first_month_day();
        $end_date = $this->_data_last_month_day();

        $conditions =  array('Egresos.fecha between ? and ?' => array($start_date, $end_date));
        $this->set("egresos_mes",$this->Egresos->find("all",array("conditions"=>$conditions,"fields"=>$fields)));

        $conditions =  array('Ingresos.fecha between ? and ?' => array($start_date, $end_date));
        $this->set("ingresos_mes",$this->Ingresos->find("all",array("conditions"=>$conditions,"fields"=>$fields)));
	}
    
 }
