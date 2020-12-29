  <div class="content-wrapper">    
    <section class="content-header">
      <h1>
        Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $submitSPD ?></h3>

              <p>Submit SPD</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $draftSPD ?></h3>

              <p>Draft SPD</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
            <div class="box col-sm-6">
              
              <div class="box-body">
                <?= form_open('ga/report', 'class="form-horizontal"') ?>
                <div class="form-group">
                  <label for="create" class="col-sm-2 control-label">Site</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="site">
                      <option selected>-- Pilih Site--</option>
                      <option value="A001">Head Office</option>
                      <option value="A002">Cilegon</option>
                    </select>
                  </div>
                </div>
              
                <div class="form-group">
                  <label for="create" class="col-sm-2 control-label">Periode</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservation" name="periode"> 
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="create" class="col-sm-2 control-label">Pilih Driver/Mobil</label>
                  <div class="col-sm-5">
                    <select class="form-control" name="driver">
                      <option selected>Pilih Driver</option>
                      <?php foreach ($driver->result() as $dr): ?>
                        <option value="<?= $dr->ID ?>"><?= $dr->name ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-sm-5">
                    <select class="form-control" name="mobil">
                      <option selected>Pilih Mobil</option>
                      <?php foreach ($mobil->result() as $mb): ?>
                        <option value="<?= $mb->ID ?>"><?= $mb->location.' | '.$mb->name_mbl.' | '.$mb->nmr_plat ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="create" class="col-sm-2 control-label">Report To</label>
                  <div class="col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary" value="1"><i class="fa fa-search"></i> Cari</button>
                    <button class="btn btn-primary" onclick="printDiv()">Print</button>
                    <button class="btn btn-success" onclick="printDiv2('printArea')">Export Excel</button>
                  </div>
                </div>

                <?= form_close() ?>
              </div>
            </div>
        </div>
      </div>

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">My List SPD</h3>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="5%">SITE</th>
                <th width="7%">SPD No</th>
                <th width="15%">Date, created by & jobcc</th>
                <th>Description & for name</th>
                <th>Departure</th>
                <th>Destination</th>
                <th>Status & Attachment</th>
                <th>No Kendaraan</th>
                <th>Uang SPD</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; ?>
              <?php foreach ($spd as $s): ?>
                <tr>
                  <td></td>
                  <td><?= $s->nomor_spd ?></td>
                  <td>
                    <?= date('d-m-Y', $s->created_at) ?><br>
                    <?= $s->by_name ?><br>
                    <?= $s->project ?>
                  </td>
                  <td>
                    <?= $s->agenda ?><br>
                    <?= $s->for_name ?>
                  </td>
                  <td><?= $s->departure_date ?></td>
                  <td><?= $s->name_destination ?></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              <?php $no++; ?>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>