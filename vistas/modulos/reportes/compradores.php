<?php

$item = null;
$valor = null;

$prestamos = ControladorVentas::ctrMostrarVentas($item, $valor);
$clientes = ControladorBeneficiarios::ctrMostrarBeneficiarios($item, $valor);

$arrayBeneficiarios = array();
$arraylistaBeneficiarios = array();

foreach ($prestamos as $key => $valueVentas) {
  
  foreach ($clientes as $key => $valueBeneficiarios) {
    
      if($valueBeneficiarios["id"] == $valueVentas["id_cliente"]){

        #Capturamos los Beneficiarios en un array
        array_push($arrayBeneficiarios, $valueBeneficiarios["nombre"]);

        #Capturamos las nombres y los valores netos en un mismo array
        $arraylistaBeneficiarios = array($valueBeneficiarios["nombre"] => $valueVentas["neto"]);

        #Sumamos los netos de cada cliente
        foreach ($arraylistaBeneficiarios as $key => $value) {
          
          $sumaTotalBeneficiarios[$key] += $value;
        
        }

      }   
  }

}

#Evitamos repetir nombre
$noRepetirNombres = array_unique($arrayBeneficiarios);

?>

<!--=====================================
VENDEDORES
======================================-->

<div class="box box-primary">
	
	<div class="box-header with-border">
    
    	<h3 class="box-title">Compradores</h3>
  
  	</div>

  	<div class="box-body">
  		
		<div class="chart-responsive">
			
			<div class="chart" id="bar-chart2" style="height: 300px;"></div>

		</div>

  	</div>

</div>

<script>
	
//BAR CHART
var bar = new Morris.Bar({
  element: 'bar-chart2',
  resize: true,
  data: [
     <?php
    
    foreach($noRepetirNombres as $value){

      echo "{y: '".$value."', a: '".$sumaTotalBeneficiarios[$value]."'},";

    }

  ?>
  ],
  barColors: ['#f6a'],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['prestamos'],
  preUnits: '$',
  hideHover: 'auto'
});


</script>