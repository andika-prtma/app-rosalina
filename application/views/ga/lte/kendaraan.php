  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Mobil
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> GA </a></li>
        <li class="active">kendaraan</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Mobil</h3>
              <div class="box-tools">
                <button class="btn btn-primary" data-toggle="modal" data-target="#newCar">Tambah Mobil</button>
              </div>
            </div>            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name Mobil</th>
                    <th>Plat Nomor</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                <?php foreach ($mobil->result() as $m): ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= ucwords($m->name_mbl) ?></td>
                    <td><?= strtoupper($m->nmr_plat) ?></td>
                    <td><?= ucwords($m->location) ?></td>
                    <td><?= $m->status ?></td>
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
                <h4 class="modal-title">Tambah Mobil</h4>
              </div>
              <div class="modal-body">
                <?= form_open('ga/addKendaraan', 'class="form-horizontal"') ?>
                <div class="box-body">
                  <div class="form-group">
                    <label for="create" class="col-sm-2 control-label">Nama Mobil</label>
                    <div class="col-sm-10">
                      <input type="text" id="mobil" class="form-control" value="" name="name_mobil">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="create" class="col-sm-2 control-label">Plat Nomor</label>
                    <div class="col-sm-10">
                      <input type="text" id="plat" class="form-control" value="" name="plat">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="create" class="col-sm-2 control-label">Location</label>
                    <div class="col-sm-10">
                      <select id="" class="form-control" name="location">
                        <?php foreach ($location->result() as $loc): ?>
                          <option value="<?= $loc->ID ?>"><?= ucwords($loc->location) ?></option>          
                        <?php endforeach ?>
                      </select>
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

