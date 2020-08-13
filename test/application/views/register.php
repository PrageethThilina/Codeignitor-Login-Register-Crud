<html>

<head>
    <title>User Register</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


    <style>
    .container {
        margin-top: 30px;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="row align-items-center">
            <div style="color: green">
                <?php if ($this->session->flashdata('msg')){
                    echo "<h3>".$this->session->flashdata('msg')."</h3>";
                }
                
                ?>
            </div>
            <hr>
        </div>
    </div>
    <div class="container">

        <?php echo validation_errors() ?>

        <?php echo form_open('Register/user_register'); ?>

        <div class="row">

            <div class="col-md-6">
                <h5 class="h4 text-center">User Creation</h5>
                <hr>
                <div class="form-group">
                    <label class="label control-label">First Name</label>
                    <input type="text" name="fname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="label control-label">Last Name</label>
                    <input type="text" name="lname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="label control-label">Gender</label>
                    <select name="gender" id="" class="selectpicker form-control" required>
                        <option selected>Please choose a option</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <h5 class="h4 text-center">Contact Information</h5>
                <div class="form-group">
                    <label class="label control-label">Phone</label>
                    <input type="tel" name="phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="label control-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="h4 text-center">User Information</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label control-label">Package</label>
                            <select name="package" id="" class="selectpicker form-control" required>
                                <option selected>Select Package</option>
                                <option value="TMS">TMS</option>
                                <option value="CUS">CUS</option>
                                <option value="CUS">SUP</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label control-label">Company</label>
                            <select name="company" class="selectpicker form-control" required>
                                <option selected>Select Company</option>
                                <option value="HIDRAMANI">HIDRAMANI</option>
                                <option value="BRANDIX">BRANDIX</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label control-label">Customer</label>
                            <select name="customer" id="" class="selectpicker form-control" required>
                                <option selected>Select Customer</option>
                                <option value="SPEEDMARK">SPEEDMARK</option>
                                <option value="LOGINWIN">LOGINWIN</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label control-label">Branch</label>
                            <select name="branch" id="" class="selectpicker form-control" required>
                                <option selected>Select Branch</option>
                                <option value="TCL">TCL</option>
                                <option value="MALIBAN TEXTTILES">MALIBAN TEXTTILES</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="label control-label">User name</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="label control-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="label control-label">Confirm Password</label>
                    <input type="password" name="c_password" class="form-control" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <label class="label control-label" style="margin-right: 20px">Status</label>
                            <label class="switch">
                                <input type="checkbox" name="status" checked required>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label control-label">User Group</label>
                            <select name="user_group" id="" class="selectpicker form-control" required>
                                <option selected>Select User Type</option>
                                <option value="Admin">Admin</option>
                                <option value="Operator">Operator</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <button type="submit" class="btn btn-primary" style="margin-right: 10px">Submit</button>
                    <button type="reset" class="btn btn-danger" style="margin-right: 10px">Reset</button><br><br>
                    <p style="margin-right:20px">Already have an Account </p><a
                        href="<?php echo base_url() ?>index.php">Login Here</a>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>


</body>

</html>