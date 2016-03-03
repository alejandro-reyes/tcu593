<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
<div class="col-md-6 voffset2">
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Iniciar Sesión</h3>
	</div>
	
	<!-- /.box-header -->
	<!-- form start -->
	<form role="form">
		<div class="box-body">
	
			<div class="form-group">	
				<?php echo $this->Form->input('username' , array('label' => 'Usuario', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Nombre de usuario' )); ?>
			</div>
        	<div class="form-group">
				<?php echo $this->Form->input('password' , array('label' => 'Contraseña','type' => 'password', 'class' => 'form-control', 'placeholder' => 'Contraseña' )); ?>
			</div>
		</div>
		<!-- /.box-body -->

		<div class="box-footer">
			<?php echo $this->Form->end(array('label' => __('Iniciar Sesión'), 'class' => 'btn btn-primary')); ?>
			<br>
			<?php echo $this->Html->link( "Registrarse",   array('action'=>'add') ); ?>
		</div>
	</form>
</div>
</div>