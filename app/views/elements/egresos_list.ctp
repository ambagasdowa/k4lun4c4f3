<?php
?>
<div class="row-fluid">
    <div id="divEgreso"></div>
</div>
<div class="row-fluid">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">Egresos del Mes</div>
      <div class="panel-body">
        <div class="table-responsive">
            <table id="menu_info"  class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                    <tr />
                      <th />Fecha
                      <th />Folio
                      <th />Concepto
                      <th />Cantidad
                      <th />Importe
                      <th />Subtotal
                      <th style="text-align: center;"/>Acción
                </thead>
                <tbody>
                    <?php 
                    $x=1;
                    $subtotal = 0; $total = 0;
                    foreach($egresos_mes as $em)
                    {
                        $subtotal = $em['Egresos']['importe'] * $em['Egresos']['cantidad'];
                    ?>
                    <tr />
                        <td /><?php e($em['Egresos']['fecha']);?>
                        <td /><?php e($em['Egresos']['folio']);?>
                        <td /><?php e($em['Egresos']['concepto']);?>
                        <td align="right" /><?php e($em['Egresos']['cantidad']);?>
                        <td align="right" />$<?php e(number_format($em['Egresos']['importe'],2));?>
                        <td align="right" />$<?php e(number_format($subtotal,2));?>
                        <td align="center" /><a href="<?php e($this->webroot.'orders/deleteEgreso/' . $em['Egresos']['egreso_id'])?>"><?php echo $html->image('delete.png',array('title' => 'Eliminar Egreso','alt' => 'Eliminar Egreso'));

                        $total += $subtotal; 
                    }
                    ?>
                        <tr/>
                        <td colspan="5" style="text-align: right;" /><strong>Gran Total</strong>
                        <td align="right" /><strong>$<?php e(number_format($total,2));?></strong>
                </tbody>
            </table>
        </div>
    </div>
</div>