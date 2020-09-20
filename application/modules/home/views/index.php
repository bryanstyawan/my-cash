<a href="<?=base_url().'auth';?>">
	<?php
		if ($this->session->userdata('login')) {
			// code...
			echo "<b>Masuk Aplikasi Sikerja</b>";
		}
		else {
			// code...
			echo "Masuk";
		}
	?>
</a>
