<?php

$data = array('menu_id'=>$_POST['id_menu'],
              'precio'=>$_POST['precio'],
              'description' =>$_POST['description'],
              'mesa' => $_POST['mesa'],
              'action' => $_POST['action'],
              'save' => $_POST['save']
             );

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$database = "kaluna_cafe";

// connect to the database
$db = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Connection Error: " . mysql_error());

mysql_select_db($database) or die("Error conecting to db.");


switch($data['save'])
        {
            case 'yes':
                try
                {
                    if($data['action'] == 'add')
                    {
                        /*$result = mysql_query(" SELECT komanda_id FROM komanda WHERE menu_id = ".$data['menu_id']." AND mesa = ".$data['mesa']);
                        $row = mysql_fetch_array($result,MYSQL_ASSOC);
                        $idx = $row['komanda_id'];

                        if(!$idx )
                        {*/
                                $QUERY = "INSERT INTO komanda(menu_id, observaciones, precio, mesa, fecha) VALUES (".$data['menu_id'].",'".$data['observaciones']."',".$data['precio'].",".$data['mesa'].",now())";
                                $result = mysql_query( $QUERY ) or die("Couldn t execute query.".mysql_error().$QUERY);
                                $message = 'Comanda actualizada';


                       /* }else
                            {
                            $QUERY = "UPDATE komanda SET observaciones='".$data['description']."' WHERE komanda_id = $idx";
                            $result = mysql_query( $QUERY ) or die("Couldn t execute query.".mysql_error());
                            $message = 'Comanda actualizada';
                            }
                        */
                    }
                    else{
                
                        $QUERY = "DELETE FROM komanda WHERE  menu_id = ".$data['menu_id']." AND mesa = ".$data['mesa'];
                        $result = mysql_query( $QUERY ) or die("Couldn t execute query.".mysql_error());
                        $message = 'Eliminado de comanda';
                    }
                }
                catch(Exception $e)
                {
                    $result = $e->getMessage();
                }
                break;
            case 'no':
                 try
                {
                    $QUERY = "DELETE FROM komanda WHERE  menu_id = ".$data['menu_id']." AND mesa = ".$data['mesa'];
                    $result = mysql_query( $QUERY ) or die("Couldn t execute query.".mysql_error());
                    $message = 'Eliminado de comanda';
                }
                catch(Exception $e)
                {
                    $result = $e->getMessage();
                }
                break;
        }
     
$response_data 	= array('result' => $result, 'message' => $message);
header("Content-type: application/json");
echo json_encode($response_data);
