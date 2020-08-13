<html>

<head>
    <title>User Login</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
</head>

<style>
.container {
    margin-top: 30px;
}
</style>

<body>

    <div class="container">
        <div>
            <div style="color: red">
                <?php if ($this->session->flashdata('errmsg')){
                    echo "<h3 class='text-center'>".$this->session->flashdata('errmsg')."</h3>";
                }
                
                ?>
            </div>
            <hr>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto card">
                <h4 class="h4 text-center">TMS</h4>
                <hr>
                <?php echo validation_errors() ?>

                <?php echo form_open('Login/user_login'); ?>
            
                <div class="form-group">
                    <label class="label control-label">username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="label control-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>

                <?php echo form_close(); ?>

                <p style="margin-right:20px">Dont have an Account <a
                        href="<?php echo base_url() ?>index.php/Register/register_controller">Register Here</a>
                

            </div>
        </div>
    </div>


<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js");?>"></script>

</body>

</html>