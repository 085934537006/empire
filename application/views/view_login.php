<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/build/css/login.css'); ?>">
    <?php if($this->session->flashdata('message') != NULL) : ?>
    <!-- sweet-alert --> 
    <link href="<?php echo base_url("assets/vendors/sweetalert/sweetalert.css"); ?>" rel="stylesheet">
    <?php endif ?>
</head>

<body>
    <div class="loginPage">    
        <header>
            <h2>Empire Login</h2>
        </header>
        <?php echo validation_errors(); ?>
        
        <?php echo form_open('login/checklogin'); ?>
            <input placeholder="Email" type="email" name="email">
            <input placeholder="Password" type="password" name="password">
            <section class="links">
                <button class="button"><span>LOGIN</span></button>
                <br><br>
                <span style="font-size: 14px; float: right;">
                    Don't have an account?
                    <a href="<?php echo site_url('register'); ?>">Register</a>
                </span>
            </section>
        </form>
    </div>
</body>
<?php if($this->session->flashdata('message') != NULL) : ?>
<!-- sweetalert --> 
<script src="<?php echo base_url('assets/vendors/sweetalert/sweetalert.min.js'); ?>"></script>
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
</html>