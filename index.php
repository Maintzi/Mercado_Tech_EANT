	<!--HEADER-->

	<?php

	if ( isset($_GET["p"]) ) {
		
		$pagina = $_GET["p"];

	} else {
		
		$pagina = "inicio";

	}

	include "header.php";
	
	?>

	<!--INICIO-->
		<div class="container">
		
			<?php

			if ( file_exists("{$pagina}.php") ) {
				
				include "{$pagina}.php";

			} else {

				include "404.php";
			}

			?>

		</div>

	
	<!--FOOTER-->
	<?php

	include "footer.php";
	?>