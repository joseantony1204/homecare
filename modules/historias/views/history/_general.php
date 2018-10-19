<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Consulta</div>
		</div>			
		<div class="card card-body">	
			<section>					
					<?php echo $this->render('_hstgeneralidades',['model'=>$Generalidades]); ?>				
			</section>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Antecedentes Familiares</div>
		</div>
		<div class="card card-body">	
			<section>					
					<?php echo $this->render('_hstantfamiliares',['model'=>$Antfamiliares]); ?>			
			</section>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Antecedentes Personales</div>
		</div>
		<div class="card card-body">	
			<section>					
					<?php echo $this->render('_hstantpersonales',['model'=>$Antpersonales]); ?>			
			</section>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Antecedentes Ginecológicos</div>
		</div>
		<div class="card card-body">	
			<section>					
					<?php echo $this->render('_hstantginecologicos',['model'=>$Antginecologicos]); ?>			
			</section>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Hábitos</div>
		</div>
		<div class="card card-body">	
			<section>					
					<?php echo $this->render('_hsthabitos',['model'=>$Habitos]); ?>			
			</section>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Revisión Sistemas</div>
		</div>
		<div class="card card-body">	
			<section>					
					<?php echo $this->render('_hstrevsistemas',['model'=>$Revsistemas]); ?>			
			</section>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Signos Vitales</div>
		</div>
		<div class="card card-body">	
			<section>					
					<?php echo $this->render('_hstsignosvitales',['model'=>$Signosvitales]); ?>			
			</section>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Examen Físico</div>
		</div>
		<div class="card card-body">	
			<section>					
					<?php echo $this->render('_hstexafisicos',['model'=>$Exafisicos]); ?>			
			</section>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Plan</div>
		</div>
		<div class="card card-body">	
			<section>					
					<?php echo $this->render('_hstplan',['model'=>$Plan]); ?>			
			</section>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card-header">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i></span> Test Findrisk</div>
		</div>
		<div class="card card-body">	
			<section>					
					<?php echo $this->render('_hsttestfindrisk',['model'=>$Testfindrisk]); ?>			
			</section>
		</div>
	</div>
</div>