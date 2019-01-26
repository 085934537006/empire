<?php $this->load->view('public/partials/view_public_header.php'); ?>
	
	{vehicle}
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>{model_name}</h2>
		</div>
	</div>
	<!-- grow -->
	<div class="product">
		<div class="container">
			
			<div class="product-price1">
				<div class="top-sing">
					<div class="col-md-7 single-top">
						<div class="flexslider">
							<ul class="slides list-unstyled">
								<li data-thumb="<?= base_url(); ?>uploads/{image}">
									<div class="thumb-image"> <img src="<?= base_url(); ?>uploads/{image}" data-imagezoom="true" class="img-responsive"> </div>
								</li>
							</ul>
						</div>
						<div class="clearfix"> </div>
						<!-- slide -->
					</div>
					<div class="col-md-5 single-top-in simpleCart_shelfItem">
						<div class="single-para ">
							<h4>{model_name}</h4>
							<hr>
							<h3>{mobile}</h3>
							<p> Dijual Oleh : {first_name} {last_name} </p>
							<p> Lokasi : {address} </p>
							<hr>
							<p>{model_description}</p>
							</div>
						</div>
						<div class="clearfix"> </div>
						<hr>
						<div class="available">
							<ul>
								<li>
									Merek: 
									<span>{manufacturer_name}</span>
								</li>
								<li>
									Warna:
									<span>{color}</span>
								</li>
								<li>
									Kategori:
									<span>{category}</span>
								</li>
								<li class="size-in">
									Kilometer:
									<span>{mileage}</span>
								</li>
								<li class="size-in">
									Transmisi:
									<span>{gear}</span>
								</li>
								<li class="size-in">
									Pintu:
									<span>{doors}</span>
								</li>
								<li class="size-in">
									Kursi:
									<span>{seats}</span>
								</li>
								<li class="size-in">
									Kapasitas Bahan Bakar:
									<span>{tank} Liter</span>
								</li>
								<li class="size-in">
									Tahun Pendaftaran:
									<span>{registration_year}</span>
								</li>
								<div class="clearfix"> </div>
							</ul>
						</div>
					</div>
					
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
{/vehicle}
<?php $this->load->view('public/partials/view_public_footer.php'); ?>