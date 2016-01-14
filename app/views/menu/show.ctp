<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//pr($menu);
?>
<div class="row">
            <div class="col-md-6" style="width: 30%;float: left;display: inline-block;">
                <h2>MENÚ KALUNA CAFÉ </h2>
                <br/>
                <label>MESA #</label><input id="mesa"type="text" class="form-control service_to_save" style="width:35px;"></label>


                <div id="current_specials" style="background-color: #DDDDDD;height: 600px">
                    <?php
                        $drag = 1;
                        foreach($menu as $m)
                        {
                    ?>
                        
                           
                            <div id="drag<?php e($drag);?>" class="draggable js-drag">
                                <label><?php e($m['Menu']['nombre_producto'].' - $'.number_format($m['Menu']['precio_producto'],2,'.',','));?></label>
                                    <input id="add-txt_<?php e($drag);?>"type="text" class="form-control service_to_save" 
                                             ini_val="<?php e($m['Menu']['nombre_producto'])?>"
                                             placeholder="<?php e($m['Menu']['nombre_producto'])?>"
                                             id_menu ="<?php e($m['Menu']['menu_id']);?>"
                                             precio = "<?php e($m['Menu']['precio_producto']);?>"
                                             style='font-size: 12px;margin: 10px;padding-left:40px;
                                             background:url(<?php e($this->webroot.'app/webroot/img/'.$m['Menu']['icono_png']);?>) no-repeat;
                                             -ms-touch-action: none; touch-action: none;cursor:pointer'
                                    >
                                    
                            </div>
                        
                            <?php
                            $drag++;
                        } 
                        ?>
                 </div>
                 
            </div>
            
            <div class="col-md-4" style="width: 70%;float: left;display: inline-block;">
                <label><h5>Comanda Interactiva</h5></label>
                <div class="dropzone-wrapper">
                    <div id="drop1" class="dropzone js-drop" style="height: 700px">Arrastra aquí tus productos</div>

                    </div>
            </div>
        </div>