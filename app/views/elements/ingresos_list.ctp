<?php
?>
<div class="row-fluid">
    <div id="divEgreso"></div>
</div>
<div class="row-fluid">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">Ingresos del Día</div>
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
                    foreach($ingresos_mes as $em)
                    {
                        $subtotal = $em['Ingresos']['importe'] * $em['Ingresos']['cantidad'];
                    ?>
                    <tr />
                        <td /><?php e($em['Ingresos']['fecha']);?>
                        <td /><?php e($em['Ingresos']['folio']);?>
                        <td /><?php e($em['Ingresos']['concepto']);?>
                        <td align="right" /><?php e($em['Ingresos']['cantidad']);?>
                        <td align="right" />$<?php e(number_format($em['Ingresos']['importe'],2));?>
                        <td align="right" />$<?php e(number_format($subtotal,2));?>
                        <td align="center" /><a href="<?php e($this->webroot.'orders/deleteIngreso/' . $em['Ingresos']['ingreso_id'])?>"><?php echo $html->image('delete.png',array('title' => 'Eliminar Ingreso','alt' => 'Eliminar Ingreso'));
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