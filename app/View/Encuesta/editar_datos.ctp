<?php if(AuthComponent::user() && AuthComponent::user('role') === 'admin'){ ?>
<iframe class="embed-responsive-item" src="https://docs.google.com/spreadsheets/d/1TMTWGNX-04tBIJ7cogGMuNug_0tXrxAyQBMukb8ga48" width="100%" height="1000"></iframe>
<?php 	}else{
			echo 'ACCESO DENEGADO';
		}
?>



