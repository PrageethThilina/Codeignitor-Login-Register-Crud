<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


    <style>
    .container {
        margin-top: 30px;
    }

    #user_table {
        width: 1200px;

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

    <?php if(! ($this->session->userdata('logged_in'))){
       redirect('Login');
   } ?>
</head>

<body>



    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="text-center">TMS Dashboard</h3>
                <a style="float:right" class="btn btn-danger"
                    href="<?php echo base_url() ?>index.php/Login/Logout">Logout</a>
                <a style="float:right;" class="btn btn-success"
                    href="<?php echo base_url() ?>index.php/Register/register_controller">New User</a>
                <h4 class="h4">Welcome <span style="color:red;"> <?php echo $this->session->userdata('fname'); ?></span>
                </h4>
                </hr>
            </div>
        </div>
        <div class="row" style="margin-top:30px">
            <table class="table table-striped table-bordered table-hover" id="user_table">
                <thead>
                    <tr>
                        <th class="table-primary">First Name</th>
                        <th class="table-primary">Last Name</th>
                        <th class="table-primary">Email</th>
                        <th class="table-primary">User Group</th>
                        <th class="table-primary">Status</th>
                        <th class="table-primary">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <div id="userModal" class="modal fade">
                    <div class="modal-dialog">
                        <form method="post" id="user_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"></h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <label>Name</label>
                                    <input type="text" name="fname" id="fname" class="form-control" />
                                    <br />
                                    <label>Last Name</label>
                                    <input type="text" name="lname" id="lname" class="form-control" />
                                    <br />
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" class="form-control" />
                                    <br />
                                    <label>User Group</label>
                                    <select name="user_group" id="" class="form-control">
                                        <option selected>Select User Type</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Operator">Operator</option>
                                        <option value="User">User</option>
                                    </select> <br />
                                    <label>Status</label>
                                    <label class="switch">
                                        <input type="checkbox" name="status" checked required>
                                        <span class="slider round"></span>
                                    </label>
                                    <br />
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="user_id" id="user_id" />
                                    <input type="submit" name="action" id="action" class="btn btn-success"
                                        value="Add" />
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>


    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js");?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js");?>"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
    </script>

    <script type="text/javascript" language="javascript">
    $(document).ready(function() {
        var dataTable = $('#user_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "<?php echo base_url() . 'index.php/Dashboard/get_all_users'; ?>",
                type: "POST"
            },
            "columnDefs": [{
                "targets": [0, 3, 4],
                "orderable": false,
            }, ],
        });
        $(document).on('submit', '#user_form', function(event) {
            event.preventDefault();
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var email = $('#email').val();
            var user_group = $('#user_group').val();
            var status = $('#status').val();
            if (fname != '' && lname != '' && email != '' && user_group != '' && status != '') {
                $.ajax({
                    url: "<?php echo base_url() . 'index.php/Dashboard/user_action'?>",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert(data);
                        $('#user_form')[0].reset();
                        $('#userModal').modal('hide');
                        dataTable.ajax.reload();
                    }
                });
            } else {
                alert("Bother Fields are Required");
            }
        });
        $(document).on('click', '.update', function() {
            var user_id = $(this).attr("user_id");
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/Dashboard/fetch_single_user",
                method: "POST",
                data: {
                    user_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    $('#userModal').modal('show');
                    $('#fname').val(data.fname);
                    $('#lname').val(data.lname);
                    $('#email').val(data.email);
                    $('#user_group').val(data.user_group);
                    $('#status').val(data.status);
                    $('.modal-title').text("Edit User");
                    $('#user_id').val(user_id);
                    $('#action').val("Edit");
                }
            })
        });
    });
    </script>

</body>

</html>