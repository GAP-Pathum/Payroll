<!DOCTYPE html>


<!--Description of dashboard page

@author Ashan Rathsara-->


<html lang="en">

<title>
    <?php echo $title ?>
</title>

<head>
    <!-- Styles -->
    <?php $this->load->view('template/css.php'); ?>
</head>

<body class="infobar-offcanvas">

    <!--header-->

    <?php $this->load->view('template/header.php'); ?>

    <!--end header-->

    <div id="wrapper">
        <div id="layout-static">

            <!--dashboard side-->

            <?php $this->load->view('template/dashboard_side.php'); ?>

            <!--dashboard side end-->

            <div class="static-content-wrapper">
                <div class="static-content">
                    <div class="page-content">
                        <ol class="breadcrumb">

                            <li class=""><a href="<?php echo base_url(); ?>Dashboard/">HOME</a></li>
                            <li class="active"><a href="<?php echo base_url(); ?>Master/Designation/">DESIGNATION</a>
                            </li>

                        </ol>


                        <div class="page-tabs">
                            <ul class="nav nav-tabs">

                                <li class="active"><a data-toggle="tab" href="#tab1">DESIGNATION</a></li>
                                <li><a data-toggle="tab" href="#tab2">VIEW DESIGNATION</a></li>
                            </ul>
                        </div>
                        <div class="container-fluid">

                            <div class="tab-content">
                                <div class="tab-pane" id="tab1">

                                    <div class="row">
                                        <div class="col-xs-12">


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <h2>ADD DESIGNATION</h2>
                                                        </div>
                                                        <div class="panel-body">
                                                            <form
                                                                action="<?php echo base_url(); ?>Master/Designation_2/create_designation"
                                                                method="post">
                                                                <div class="form-group col-sm-6">
                                                                    <label for="designation_name">Designation
                                                                        Name</label>
                                                                    <input type="text" name="designation_name"
                                                                        id="designation_name" class="form-control"
                                                                        required>
                                                                </div>
                                                                <div class="form-group col-sm-6">
                                                                    <label for="designation_order">Designation
                                                                        Order</label>
                                                                    <input type="text" name="designation_order"
                                                                        id="designation_order" class="form-control"
                                                                        required>
                                                                </div>
                                                                <?php $this->load->view('template/btn_submit.php'); ?>
                                                            </form>

                                                            <hr>

                                                            <div id="divmessage" class="">

                                                                <div id="spnmessage"> </div>
                                                            </div>


                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane active" id="tab2">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <h2>DESIGNATION DETAILS</h2>
                                                            <div class="panel-ctrls">
                                                            </div>
                                                        </div>
                                                        <div class="panel-body panel-no-padding">
                                                            <table id="example"
                                                                class="table table-striped table-bordered"
                                                                cellspacing="0" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Id</th>
                                                                        <th>Designation Name</th>
                                                                        <th>Designation Order</th>
                                                                        <th>Edit</th>
                                                                        <th>Delete</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($data_set as $r) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $r->Des_ID ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $r->Desig_Name; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $r->Desig_Order; ?>
                                                                        </td>
                                                                        <td>
                                                                            <button class="btn btn-success"
                                                                                onclick="get(<?php echo $r->Des_ID ?>);"
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModal">Edit</button>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo base_url(); ?>Master/Designation_2/destroy_designation/<?php echo $r->Des_ID; ?>"
                                                                                class="btn btn-danger">
                                                                                <i class="fa fa-times-circle"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            <div class="panel-footer"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                            <h2 class="modal-title">DESIGNATION</h2>
                                        </div>

                                        <div class="modal-body">
                                            <form class="form-horizontal"
                                                action="<?php echo base_url(); ?>Master/Designation_2/update_designation"
                                                method="post">
                                                <div class="form-group col-sm-12">
                                                    <label>ID</label>
                                                    <input type="text" class="form-control" readonly id="id" 
                                                        name="Des_ID">
                                                </div>

                                                <div class="form-group col-sm-12">
                                                    <label>Designation Name</label>
                                                    <input type="text" name="Desig_Name" id="Desig_Name"
                                                        class="form-control m-wrap span6">
                                                </div>

                                                <div class="form-group col-sm-12">
                                                    <label>Order</label>
                                                    <input type="text" name="Desig_Order" id="Desig_Order"
                                                        class="form-control m-wrap span6">
                                                </div>

                                                <button class="btn btn-primary" type="submit">Save</button>
                                                <button class="btn btn-danger" type="reset">Reset</button>
                                            </form>

                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php $this->load->view('template/footer.php'); ?>

                </div>
            </div>
        </div>
    </div>
    <input value="" type="text" class="form-control" readonly="readonly" id="id1">

    <!-- Load site level scripts -->

    <?php $this->load->view('template/js.php'); ?> <!-- Initialize scripts for this page-->

    <!-- End loading page level scripts-->

    <!--Ajax-->
    <!-- <script src="<?php echo base_url(); ?>system_js/Master/Designation.js"></script> -->


    <script>
        function get(id) {
            // Prepare the data as a JSON object directly
            const data = {
                idData: id
            };

            // Sending data using AJAX (POST request)
            $.ajax({
                url: '<?php echo base_url(); ?>Master/Designation_2/get_designation',
                type: 'POST',
                contentType: 'application/json', // Sending JSON format
                data: JSON.stringify(data), // Convert the data to JSON string
                success: function (response) {
                    console.log('Success:', response);// Handle success

                    // Parse the JSON string to JavaScript object
                     const parsedResponse = JSON.parse(response);
                        $('#id').val(parsedResponse[0].Des_ID);
                        $('#Desig_Name').val(parsedResponse[0].Desig_Name);
                        $('#Desig_Order').val(parsedResponse[0].Desig_Order);
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error); // Handle error
                    alert("An error occurred.");
                }
            });
        }
    </script>

</body>


</html>