<!DOCTYPE html>
<html lang="en">

        <title><?php echo $title ?></title>
        <!-- Styles -->
        <?php $this->load->view('template/css.php'); ?>
        <!-- Include jQuery and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
<body>
    <?php $this->load->view('template/header.php'); ?>

    <div class="wrapper">
        <div class="layput-static">
        <?php $this->load->view('template/dashboard_side.php'); ?>

        <div class="static-content-wrapper">
            <div class="static-content">
                <div class="page-content">
                    <ol class="breadcrumb">
                        <li class=""><a href="<?php echo base_url(); ?>Dashboard/">HOME</a></li>
                        <li class="active"><a href="<?php echo base_url(); ?>Master/Designation/">DESIGNATION</a></li>
                    </ol>
                    <div class="page-tabs">
                            <ul class="nav nav-tabs">

                                <li class="active"><a data-toggle="tab" href="#tab1">DESIGNATION</a></li>
                                <li><a data-toggle="tab" href="#tab2">VIEW DESIGNATION</a></li>

                            </ul>
                    </div>
                    <div class="container-fluid">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-info">
                                                    <div class="panel-heading"><h2>ADD DESIGNATION</h2></div>
                                                        <div class="panel-body">
                                                            <form action="<?php echo base_url(); ?>Master/Designation_2/create_designation" method="post" >
                                                            
                                                                <div class="form-group col-sm-6">
                                                                    <label for="designation_name">Designation Name</label>
                                                                    
                                                                    <input type="text" name="designation_name" id="designation_name" class="form-control" required>
                                                                </div>

                                                                <div class="form-group col-sm-6">
                                                                    <label for="designation_order">Designation Order</label>
                                                                    <input type="text" name="designation_order" id="designation_order" class="form-control" required>
                                                                </div>

                                                                <?php $this->load->view('template/btn_submit.php'); ?>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                                
                                            </div>
                                        </div>
                                    </div>
                            
                                </div>
                            </div>

                            <div class="tab-pane" id="tab2">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-info">
                                                    <div class="panel-heading"><h2>VIEW DESIGNATION</h2></div>
                                                        <div class="panel-body">
                                                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                                                                            <td><?php echo $r->Des_ID?></td>
                                                                            <td><?php echo $r->Desig_Name; ?></td>
                                                                            <td><?php echo $r->Desig_Order; ?></td>
                                                                            <td>
                                                                                <a href="<?php echo base_url(); ?>Master/Designation_2/get_designation/<?php echo $r->Des_ID; ?>" data-id="<?php echo $r->Des_ID; ?>" class="btn btn-green edit-btn" data-toggle="modal" data-target="#myModal">
                                                                                    <i class="fa fa-edit"></i>
                                                                                </a>
                                                                            </td>
                                                                            <td>
                                                                                <a href="<?php echo base_url(); ?>Master/Designation_2/destroy_designation/<?php echo $r->Des_ID; ?>" class="btn btn-danger">
                                                                                    <i class="fa fa-times-circle"></i>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Designation</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editForm" action="<?php echo base_url(); ?>Master/Designation_2/edit_designation" method="post">
                                                <div class="form-group">
                                                    <label for="edit_designation_id">ID</label>
                                                    <input type="text" name="designation_id" id="" class="form-control" value="<?php echo $data->Des_ID; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_designation_name">Designation Name</label>
                                                    <input type="text" name="designation_name" id="designation_name" class="form-control" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_designation_order">Designation Order</label>
                                                    <input type="text" name="designation_order" id="designation_order" class="form-control" value="">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>
        </div>
    </div>
</body>
</html>