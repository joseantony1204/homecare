<?php
use yii\helpers\Html;

$this->title = 'Informes';
?>		
<div class="reportes-view">
    
	<ul class="nav nav-tabs customtab2" role="tablist">
		<li class="nav-item"> 
			<a class="nav-link active" data-toggle="tab" href="#pagos" role="tab">
				<span class="hidden-sm-up">
					<i class="ti-user"></i>
				</span> 
				<span class="hidden-xs-down">Pagos</span>
			</a> 
		</li>
		
		<li class="nav-item"> 
			<a class="nav-link" data-toggle="tab" href="#proximosvencer" role="tab">
				<span class="hidden-sm-up">
					<i class="ti-user"></i>
				</span> 
				<span class="hidden-xs-down">Pagos a vencer</span>
			</a> 
		</li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content">
	
		<div class="tab-pane active p-20" id="pagos" role="tabpanel">
			<div class="p-20">
				<?php echo $this->render('_pagos',[
													'model' => $Informes,
												 ]); 
				?>
			</div>
		</div>
		
		<div class="tab-pane active p-20" id="proximosvencer" role="tabpanel">
			<div class="p-20">
				<?php echo $this->render('_proxvencer',[
													'model' => $Informes,
												 ]); 
				?>
			</div>
		</div>
		
	</div>
	
</div>

		
 
