<?php 

	$api = file_get_contents("MercadoTECH/api/?d=productos");
	$productos = json_decode($api);

	$api = file_get_contents("MercadoTECH/api/?d=ultimos");
	$ultimos = json_decode($api);


	// print_r($productos);
	// print_r($ultimos);

	// die();


 ?>
	<section id="page">
				<!-- PRODUCTOS DESTACADOS -->
<div class="shoes-grid">
	<div class="products">
		<h5 class="latest-product">PRODUCTOS DESTACADOS</h5>
	</div>
	<div class="product-left">
		<!-- Producto #1 -->
		<?php 
		
		for ( $i = 0; $i < count($productos); $i++ ) {
			
		// 	if ( ($i+1) %3 == 0){//Si es múltiplo de 3
		// 		$class = "grid-top-chain";
		// 	} else {
		// 		$class = null;

		// ▼ Operador Ternario ▼
		//$variable = (CONDICION) ? VALOR_VERDADERO : VALOR_FALSO;

		$class = (($i+1) % 3 == 0) ? "grid-top-chain" : null;
	

		 ?>
		<div class="col-sm-4 col-md-4 chain-grid <?php echo $class ?>">
			<a href="?p=producto&id=<?php echo $productos[$i]->idProducto ?>"><img class="img-responsive chain" src="<?php echo $productos[$i]->Imagen ?>" alt=" " /></a>
			<div class="grid-chain-bottom">
				<h6><a href="?p=producto&id=<?php echo $productos[$i]->idProducto ?>"> <?php echo $productos[$i]->Nombre ?></a></h6>
				<div class="star-price">
					<div class="dolor-grid"> 
						<span class="actual"> $<?php echo $productos[$i]->Precio ?></span>
					</div>
					<a class="now-get get-cart" href="?p=producto&id=<?php echo $productos[$i]->idProducto ?>">VER MÁS</a> 
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<?php 


		} ?>
		<!-- Producto #2 -->
		<div class="col-sm-4 col-md-4 chain-grid">
		
		<div class="clearfix"></div>
		</div>
		<!-- Producto #3 -->
		<div class="col-sm-4 col-md-4 chain-grid grid-top-chain">
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"> </div>
</div>

<!-- ULTIMOS PRODUCTOS -->
<div class="shoes-grid">
	<div class="products">
		<h5 class="latest-product">ULTIMOS PRODUCTOS</h5>	
		<a class="view-all" href="productos.php">VER TODOS<span></span></a>
	</div>
	<div class="product-left">

		<?php 

		foreach ($ultimos as $ultimo) {
			
		}

		 ?>
		<!-- Producto #1 -->
		<div class="col-sm-4 col-md-4 chain-grid">
			<a href="producto.php"><img class="img-responsive chain" src="<?php echo $ultimo->Imagen ?>" alt=" " /></a>
			<span class="star"></span>
			<div class="grid-chain-bottom">
				<h6><a href="producto.php"><?php echo $ultimo->Nombre ?></a></h6>
				<div class="star-price">
					<div class="dolor-grid"> 
						<span class="actual">$<?php echo $ultimo->Precio ?></span>
						<span><?php echo $ultimo->Stock ?> unid.</span>
					</div>
					<a class="now-get get-cart" href="producto.php">VER MÁS</a> 
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

			</section>