<?php $this->load->view('admin/partials/admin_header.php'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Users</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit User</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <label><?php echo $message; ?></label>
                        <form method="post">
                            <fieldset>
                                <div class="form-group">
                                    Nama Awal : <input class="form-control" placeholder="Nama Awal" name="f_name" type="text" value="<?php echo $userRow['first_name']; ?>" required>
                                </div>
                                <div class="form-group">
                                    Nama Akhir: <input class="form-control" placeholder="Nama Akhir" name="l_name" type="text" value="<?php echo $userRow['last_name']; ?>" required>
                                </div>
                                <div class="form-group">
                                    No Hp/Telpon : <input class="form-control" placeholder="No Hp/Telpon" name="u_mobile" type="text" value="<?php echo $userRow['mobile']; ?>" required>
                                </div>
                                <div class="form-group">
                                    Password : <input class="form-control" placeholder="Password" name="u_pass" type="password" required>
                                </div>
                                <div class="form-group">
                                    Tanggal Lahir :<input type="date"  value="<?php echo $userRow['birthday']; ?>" name="u_bday">
                                </div>
                                
                                <div class="form-group">
                                    Alamat: <textarea rows="3" cols="10" class="form-control"  name="u_address"><?php echo $userRow['address']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if($this->session->userdata('adminlevel') == 2) {
                                        echo 'User Type ';
                                        echo '<input type="radio" name="u_type" value="admin"'. (($userRow['adminlevel'] == 2) ? ' checked' : '') .'> Admin';
                                        echo ' &nbsp<input type="radio" name="u_type" value="employee"'. (($userRow['adminlevel'] == 1) ? ' checked' : '') .'> Pegawai';
                                        echo ' &nbsp<input type="radio" name="u_type" value="user"'. (($userRow['adminlevel'] == 0) ? ' checked' : '') .'> Pengguna Biasa';
                                    
                                    }
                                    ?>
                                </div>
                                <br/>
                                <input type="submit" name="buttonSubmit" value="Save" />
                                <input type="hidden" name="u_id" value="<?php echo $userRow['id'] ?>">
                            </fieldset>
                        </form>
                    </div> <!-- /content --> 
                </div><!-- /x-panel --> 
            </div> <!-- /col --> 
        </div> <!-- /row --> 
    </div>
</div> <!-- /.col-right --> 
<!-- /page content -->

<?php $this->load->view('admin/partials/admin_footer'); ?>

<?php if($this->session->flashdata('message') != NULL) : ?>
<script>
    swal({
      title: "Berhasil",
      text: "<?php echo $this->session->flashdata('message'); ?>",
      type: "success",
      timer: 1500,
      showConfirmButton: false
    });
</script>
<?php endif ?>