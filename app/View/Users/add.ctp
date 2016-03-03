<!-- app/View/Users/add.ctp -->
<?php echo $this->Form->create('User');?>
<div class="col-md-6 voffset2">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Añadir Usuario</h3>
		</div>
	
	<form role="form">
		<div class="box-body">
			<div class="form-group">	
				<?php echo $this->Form->input('username' , array('label' => 'Usuario', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Nombre de usuario' )); ?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('email' , array('label' => 'e-mail','type' => 'text', 'class' => 'form-control', 'placeholder' => 'Correo electrónico' )); ?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('password' , array('label' => 'Contraseña','type' => 'password', 'class' => 'form-control', 'placeholder' => 'Contraseña' )); ?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('password_confirm' , array('label' => 'Confirmar Contraseña*', 'maxLength' => 255,'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Volver a escribir la contraseña' )); ?>
			</div>
			<div class="form-group">
			<?php if(AuthComponent::user() && AuthComponent::user('role') === 'admin'){
					echo $this->Form->input('role', array(
					'class' => 'form-control', 'options' => array('invitado' => 'Invitado', 'visitante' => 'Visitante', 'admin' => 'Admin')));
			}?>
			</div>
		</div>

		<div class="box-footer">
			<?php echo $this->Form->end(array('label' => __('Listo'), 'class' => 'btn btn-primary')); ?>
		</div>
	</form>
</div>
<?php echo $this->Form->end(); ?>
</div>