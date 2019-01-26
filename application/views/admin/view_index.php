<?php $this->load->view('admin/partials/admin_header.php'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
				  <div class="row tile_count"> 
					<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
						  <span class="count_top"><i class="fa fa-car"></i> Total Mobil</span>
						  <div class="count"><?php echo count($vehicles); ?></div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
						  <span class="count_top"><i class="glyphicon glyphicon-user"></i> Total Pengguna </span>
						  <div class="count"><?php echo count($users); ?></div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
						  <span class="count_top"><i class="glyphicon glyphicon-thumbs-up"></i> Total Pembeli </span>
						  <div class="count">0</div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
					  	<span class="count_top"><i class="glyphicon glyphicon-usd"></i> Total Penjualan</span>
					  	<div class="count">
					  		<?php $price = 0; ?>
					  		<?php foreach($vehicles as $vehicle) : ?>
					  			<?php $price += $vehicle['price']; ?>
					  		<?php endforeach; ?>
					  		<?= 'Rp ' . $price ?>
					  	</div>
					</div>
				  </div>
            </div> <!-- /col --> 
        </div> <!-- /row -->

        <div class="row">
        	<div class="col-md-6 col-xs-12">
              	<div class="x_panel tile fixed_height_320">
                	<div class="x_title">
                  		<h2>Jumlah Mobil Tiap Merek</h2>
	                  		<ul class="nav navbar-right panel_toolbox">
	                    	<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                  		</ul>
                  		<div class="clearfix"></div>
                	</div>
	                <div class="x_content">
						<?php $subtotal = 0; ?>
						<?php foreach ($manufacturers_group as $manufacturer) : ?>
							<?php $subtotal += $manufacturer['total']; ?>
						<?php endforeach; ?>

	                  	<?php foreach ($manufacturers_group as $manufacturer) : ?>
		                  	<div class="widget_summary">
			                    <div class="w_left w_25">
			                      <span><?= $manufacturer['manufacturer_name']; ?></span>
			                    </div>
			                    <div class="w_center w_55">
			                      	<div class="progress">
			                        	<div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($manufacturer['total'] / $subtotal) * 100;?>%">
			                        </div>
			                      </div>
			                    </div>
			                    <div class="w_right w_20">
			                      	<span><?= $manufacturer['total']; ?></span>
			                    </div>
			                    <div class="clearfix"></div>
		                  	</div>
	                  	<?php endforeach; ?>

	                </div> <!-- /content --> 
              	</div> <!-- /panel --> 
            </div> <!-- /col -->

            <div class="col-md-6 col-xs-12">
              	<div class="x_panel tile fixed_height_320">
                	<div class="x_title">
                  		<h2>Mobil Terjual Tiap Merek</h2>
	                  		<ul class="nav navbar-right panel_toolbox">
	                    	<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                  		</ul>
                  		<div class="clearfix"></div>
                	</div>
	                <div class="x_content">
						<?php $subtotal = 0; ?>
						<?php foreach ($manufacturers_group_sold as $manufacturer) : ?>
							<?php $subtotal += $manufacturer['total']; ?>
						<?php endforeach; ?>

	                  	<?php foreach ($manufacturers_group_sold as $manufacturer) : ?>
		                  	<div class="widget_summary">
			                    <div class="w_left w_25">
			                      <span><?= $manufacturer['manufacturer_name']; ?></span>
			                    </div>
			                    <div class="w_center w_55">
			                      	<div class="progress">
			                        	<div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($manufacturer['total'] / $subtotal) * 100;?>%">
			                        </div>
			                      </div>
			                    </div>
			                    <div class="w_right w_20">
			                      	<span><?= $manufacturer['total']; ?></span>
			                    </div>
			                    <div class="clearfix"></div>
		                  	</div>
	                  	<?php endforeach; ?>

	                </div> <!-- /content --> 
              	</div> <!-- /panel --> 
            </div> <!-- /col --> 
        </div><!-- /row -->

    </div>
</div> <!-- /.col-right --> 
<!-- /page content -->

<?php $this->load->view('admin/partials/admin_footer'); ?>