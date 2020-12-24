  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Driver
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> GA </a></li>
        <li class="active">driver</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Driver</h3>
              <div class="box-tools">
                <button class="btn btn-primary" data-toggle="modal" data-target="#newCar">Add Driver</button>
              </div>
            </div>            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Driver Name</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                <?php foreach ($driver->result() as $d): ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= ucwords($d->name) ?></td>
                    <td><?= $d->contact ?></td>
                    <td><?= $d->status ?></td>
                    <td>
                      <a href="" class="badge badge-success">Edit</a>
                    </td>
                  </tr>
                <?php $no++ ?>
                <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
        <div class="modal fade" id="newCar">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Driver</h4>
              </div>
              <div class="modal-body">
                <?= form_open('ga/addDriver', 'class="form-horizontal"') ?>
                <div class="box-body">
                  <div class="form-group">
                    <label for="create" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="driver" class="form-control" value="" name="name_driver">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="create" class="col-sm-2 control-label">Contact</label>
                    <div class="col-sm-10">
                      <input type="text" id="contact" class="form-control" value="" name="contact">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="create" class="col-sm-2 control-label">Active</label>
                    <div class="col-sm-10">
                      <input type="checkbox" value="1" name="active" checked>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
              <?= form_close() ?>
            </div>
          </div>
        </div>
      <!-- end modal -->

    </section>

  </div>

