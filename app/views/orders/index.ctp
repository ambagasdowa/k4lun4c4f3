<?php
echo $form->create('Orders', array('action' => 'index','id'=>'formIngresos','class'=>'form-horizontal','role'=>'form'));
#echo  date("Y-m-d");
?>
<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><?php e($ACTION);?></h3>
    </div>
    <div class="panel-body">
        <?php e($form->input('porciento',array('type'=>'hidden','label'=>false,'id'=>'porciento','value'=>'7')));?>
        <div class="progress">
            <div id='barr_customers' class="progress-bar progress-bar-success" style="width: 1%">
                <span class="sr-only"></span>
            </div>
        </div>  
        <div class="row">
            <div class=" col-sm-12 col-md-6">
                <?php 
                    e($form->input('Ingresos.folio',    
                        array('id' => 'folio',
                              'type'=>'text',
                              'label'=>'Comanda [Nota/Mesa]',
                              'class'=>'form-control',
                              'autocomplete' => 'off',
                              'onKeypress'=> 'return alphaNumeric(event);',
                              'placeholder'=>'#####',
                              //'onblur'=>"animatePB('barr_customers',7)"
                             )));
                ?>
            </div>
             
            <div class="col-sm-12 col-md-6">
                <?php e($form->input('Ingresos.fecha',    
                array('id'=>'fecha',
                      'type'=>'text',
                      'label'=>'Fecha del Egreso',
                      'class'=>'form-control',
                      'placeholder'=>'AAAA-MM-DD',
                      'autocomplete' => 'off',
                      'value'=>date('Y-m-d'),
                      'onkeypress'=>"mascara(this,'-',fechas,true);",
                   
                      'maxLength'=>10,
                      //'onblur'=>"animatePB('barr_customers',7)"
                      )));
                ?>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class=" col-sm-12 col-md-4">
            <?php 
                e($form->input('Ingresos.concepto',    
                    array('id' => 'folio',
                          'type'=>'text',
                          'label'=>'Concepto',
                          'class'=>'form-control',
                          'autocomplete' => 'off',
                          'onKeypress'=> 'return alphaNumeric(event);',
                          'placeholder'=>'Concepto',
                          //'onblur'=>"animatePB('barr_customers',7)"
                         )));
            ?>
            </div>
            <div class=" col-sm-12 col-md-4">
            <?php 
                e($form->input('Ingresos.cantidad',    
                    array('id' => 'folio',
                          'type'=>'text',
                          'label'=>'Catidad',
                          'class'=>'form-control',
                          'autocomplete' => 'off',
                          'onKeypress'=> 'return soloNumeros(event);',
                          'placeholder'=>'Cantidad',
                          //'onblur'=>"animatePB('barr_customers',7)"
                         )));
            ?>
            </div>
            <div class=" col-sm-12 col-md-4">
            <?php 
                e($form->input('Ingresos.importe',    
                    array('id' => 'folio',
                          'type'=>'text',
                          'label'=>'Importe',
                          'class'=>'form-control',
                          'autocomplete' => 'off',
                          'onKeypress'=> 'return soloNumeros(event);',
                          'placeholder'=>'Importe',
                          //'onblur'=>"animatePB('barr_customers',7)"
                         )));
            ?>
            </div>
        </div>
        <br/>
        <div class="row-fluid">
            <button id="saveData" type="submit" onclick="animatePB('barr_customers',100)" class="btn btn-info pull-right">
                Registrar
            </button>

        </div>
    </div>   
</div>

<div id="egresosList">
    <?php 
        e($form->end());
        e($this->element('ingresos_list', array('ingresos_mes' => $ingresos_mes)));
    ?>
</div>

<script>
    $(document).ready(function ()
    {
        $('#slogan').hide();
        
        //DateTimePickerInitializate
        $('#fecha').datetimepicker({
            theme:'dark',
            timepicker:false,
            format:'Y-m-d',
            formatDate:'Y-m-d'
        });
        
        
        //AjaxForm
        var options = { 
            target:'#egresosList',
            clearForm: true
        }; 
  
        $('#formEgresos').ajaxForm(options); 
       
    });
    
</script>