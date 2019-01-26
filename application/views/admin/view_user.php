<?php $this->load->view('admin/partials/admin_header.php'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Use</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar User</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped">
                            <tr>
                                <th>
                                    Id User
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Nomor Hp
                                </th>
                                <th>
                                    Access
                                </th>
                                <th colspan="2">
                                    Actions
                                </th>
                            </tr>
                            <?php $adminlevelstr = array('Pengguna Biasa', 'Pegawai', 'Admin');
                            foreach($emp as $user) : ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['mobile']; ?></td>
                                <td><?php echo $adminlevelstr[$user['adminlevel']]; ?></td>
                                <td>
                                    <a href=" <?php echo site_url('admin/user/edit/' . $user['id']); ?>" class="btn btn-primary btn-xs">Edit</a>
                                    <a onclick="return confirm('Data user ini akan terhapus, lanjutkan?')" href=" <?php echo site_url('admin/user/delete/' . $user['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
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