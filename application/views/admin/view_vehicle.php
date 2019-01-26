<?php $this->load->view('admin/partials/admin_header.php'); ?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Mobil</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <hr>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Tambah Mobil Baru</a>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <div class="collapse" id="collapseExample">
            <?php echo validation_errors(); ?> 
			<?php echo form_open_multipart('admin/vehicles/add'); ?>
                <fieldset>
                    <div class="row">
                        <div class="col-xs-6">
                            <label>Merek Mobil</label>                            
                                <select class="form-control" name="manufacturer_id" id="parent_cat">
                                    {manufacturers}
                                        <option value="{id}">{manufacturer_name}</option>
                                    {/manufacturers}
                                </select>
                        </div>
                        <div class="col-xs-6">
                            <label>Model</label>
                            <select class="form-control" name="model_id" >
                                {models}
                                    <option value="{id}">{model_name}</option>
                                {/models}
                            </select>
                        </div>
                    </div>
                            
                    <br>
                        
                    <div class="row">
                        <div class="col-xs-6">
                        <label>Kategori</label>
                            <select class="form-control" name="category" >
                                <option value="Subcompact">Subcompact</option>
                                <option value="Compact">Compact</option>
                                <option value="Mid-size">Mid-size</option>
                                <option value="Full-size">Full-size</option>
                                <option value="Mini-Van">Mini-Van</option>
                            </select>
                        </div>
                        <div class="col-xs-6">
                            <br>
                            <input type="number" step="any" class="form-control" name="price" placeholder="Harga" required>
                        </div>
                    </div>
                            
                    <br>
                    <div class="row">
                        <div class="col-xs-6">
                            <br>
                            <label for="gear">Transmisi:</label>
                            <select name="gear" id="gear" class="form-control">
                                <option value="auto">Auto</option>
                                <option value="manual">Manual</option>
                            </select>
                        </div>
                        <div class="col-xs-6">
                        <br>
                            <label for="mileage">Jarak Tempuh:</label>
                            <input type="text" step="any" class="form-control" name="mileage" placeholder="Mileage(km)" required>
                        </div>
                    </div>
                            
                    <br>
                    <div class="row">
                        <div class="col-xs-6">
                            <br>
                            <input class="form-control" name="e_no" placeholder="Nomor Mesin" required>
                        </div>
                        <div class="col-xs-6">
                            <br>
                            <input class="form-control" name="c_no" placeholder="Nomor Rangka" required>
                        </div>
                    </div>
                            
                    <br>

                    <div class="row">
                        <div class="col-xs-6">
                            <br>
                            <input type="number" class="form-control" name="doors" placeholder="Jumlah Pintu" required>
                        </div>
                        <div class="col-xs-6">
                            <br>
                            <input type="number"class="form-control" name="registration_year" placeholder="Tahun Registrasi (YYYY)" required>
                        </div>
                    </div>
                            
                    <br>

                    <div class="row">
                        <div class="col-xs-6">
                            <input type="number"class="form-control" name="seats" placeholder="Jumlah kursi" required>
                        </div>
                        <div class="col-xs-6">
                            <input type="number" step="any" class="form-control" name="tank" placeholder="Kapasitas Bahan Bakar (Liter)" required>
                        </div>
                    </div>
                    <br>
                            
                    <div class="row">
                        <div class="col-xs-6">
                         <input type="text"class="form-control" name="v_color" placeholder="Warna" required>
                        </div>
                        <div class="col-xs-6">
                            <input type="file" class="form-control" name="image" >
                        </div>
                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" name="buttonSubmit" value="Add New Vehicle" />
                                                            
                </fieldset>         
            </form>
            <br>
            </div>
        </div> <!-- /row --> 

        <!-- all models --> 
        <div class="row">
            <div class="col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Mobil</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                 <tr>
                                    <th>Id</th>
                                    <th>Merek</th>
                                    <th>Model</th>
                                    <th>Kategori</th>
                                    <th>Tanggal Tambah</th>
                                    <th>Status</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                    <th>Tanggal Terjual</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Merek</th>
                                    <th>Model</th>
                                    <th>Kategori</th>
                                    <th>Tanggal Tambah</th>
                                    <th>Status</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                    <th>Tanggal Terjual</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach($vehicles as $vehicle) : ?>
                                    
                                    <tr class="<?php echo ($vehicle['status'] == 'available' ? '' : ($vehicle['status'] == "pending" ? 'warning' : ($vehicle['status'] == "sold" ? 'success' : 'danger'))); ?>">
                                    
                                        <td><?php echo $vehicle['vehicle_id']; ?></td>
                                        <td><?php echo $vehicle['manufacturer_name']; ?></td>
                                        <td><?php echo $vehicle['model_name']; ?></td>
                                        <td><?php echo $vehicle['category']; ?></td>
                                        <td><?php $date = new DateTime($vehicle['add_date']); echo $date->format('m/d/Y'); ?></td>
                                        
                                        <td><?php echo $vehicle['status']; ?></td>
                                        <td>Rp<?php echo $vehicle['price']; ?></td>
                                        <td width="100">
                                            <img class="img-responsive" src="<?php echo base_url()."uploads/".$vehicle['image']; ?>"></td>
                                        <td>
                                            <?php if($vehicle['status']=="available") : ?>
                                                <?php echo form_open('admin/vehicles/sell/'); ?>
                                                    <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicle_id']; ?>">
                                                    <button onclick="return confirm('Konfirmasi Penjualan Mobil?')" class="btn btn-xs btn-success" type="submit" name="btn-sell">Jual</button>
                                                </form> 
                                            <?php endif ?>

                                            <?php if ($this->session->userdata('adminlevel') > 0) : ?>
                                                <?php if($vehicle['status']=="pending") : ?>
                                                    <?php echo form_open('admin/vehicles/grant/'); ?>
                                                        <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicle_id']; ?>">
                                                        <button onclick="return confirm('Konfirmasi Penerbitan Iklan Mobil?')" class="btn btn-xs btn-success" type="submit" name="btn-grant">Terima</button>
                                                    </form> 
                                                    <?php echo form_open('admin/vehicles/deny/'); ?>
                                                        <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicle_id']; ?>">
                                                        <button onclick="return confirm('Tolak Penerbitan Iklan Mobil?')" class="btn btn-xs btn-danger" type="submit" name="btn-deny">Tolak</button>
                                                    </form>
                                                <?php endif ?>
                                                <?php if($vehicle['status']=="available") : ?>
                                                    <?php echo form_open('admin/vehicles/togglefeatured/'); ?>
                                                        <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicle_id']; ?>">
                                                        <input type="hidden" name="isfeatured" value="<?php echo $vehicle['featured']; ?>">
                                                        <button onclick="return confirm('Ganti status pengunggulan Mobil?')" class="btn btn-xs btn-default" type="submit" name="btn-togglefeatured"><?php echo $vehicle['featured'] == 0 ? "Unggulkan" : "Turunkan dari Unggulan" ?> </button>
                                                    </form>
                                                <?php endif ?>
                                            <?php endif ?>
                                                    
                                            <?php if ($this->session->userdata('adminlevel') == 2) : ?>
                                                
                                                <?php echo form_open('admin/Vehicles/DeleteVehicle/'); ?>
                                                    <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicle_id']; ?>">
                                                    <button onclick="return confirm('Data Mobil ini Akan Di Hapus, Lanjutkan?')" class="btn btn-xs btn-danger" type="submit" name="btn-delete">Hapus</button>
                                                </form>             
                                            <?php endif; ?>
                                        </td>
                                        <td><?php if($vehicle['sold_date']=== NULL){ echo 'Belum Terjual'; }else{ $date = new DateTime($vehicle['sold_date']); echo $date->format('m/d/Y'); }?></td>
                                                    
                                    </tr>
                                <?php endforeach; ?>     
                            </tbody>
                        </table>
                    </div> <!-- /content --> 
                </div><!-- /x-panel --> 
            </div> <!-- /col -->
        </div> <!-- /row --> 


    </div>
</div> <!-- /.col-right --> 
<!-- /page content -->

<?php $this->load->view('admin/partials/admin_footer.php'); ?>

    <script src="<?php echo base_url("assets/vendors/datatables.net/js/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.print.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-scroller/js/datatables.scroller.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/jszip/dist/jszip.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/pdfmake/build/pdfmake.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/pdfmake/build/vfs_fonts.js"); ?>"></script>
    
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-responsive").length) {
            $("#datatable-responsive").DataTable({
            aaSorting: [[0, 'desc']],
            
              dom: "Blfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm",
				  exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
                },
                {
                  extend: "csv",
                  className: "btn-sm",
				  exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
                },
                {
                  extend: "excel",
                  className: "btn-sm",
				  exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
                },
                {
                  extend: "pdf",
                  className: "btn-sm",
				  exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
                },
                {
                  extend: "print",
                  className: "btn-sm",
				  exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
                },
              ],
              responsive: true,
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
          
            init: function() {
              handleDataTableButtons();
            }
          };
        }();    
                    
        TableManageButtons.init();
      });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
    
    $("#parent_cat").change(function() {
        $(this).after();
        $.get('<?php echo site_url('controller_vehicle/getsub/'); ?>' + $(this).val(), function(data) {
            $("#sub_cat").html(data);
            $('#loader').slideUp(200, function() {
                $(this).remove();
            });
        }); 
    });

});
</script>

<?php if($this->session->flashdata('message') != NULL) : ?>
<script>
    swal({
      title: "Success",
      text: "<?php echo $this->session->flashdata('message'); ?>",
      type: "success",
      timer: 1500,
      showConfirmButton: false
    });
</script>
<?php endif ?>