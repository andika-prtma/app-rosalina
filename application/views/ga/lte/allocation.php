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
              <h3>100</h3>

              <p>Hari ini</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>100</h3>

              <p>Besok</p>
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
              <h3>100</h3>

              <p>Menunggu Driver</p>
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
              <h3>100</h3>

              <p>Assign Driver</p>
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
            <div class="box">
              <h1><-FILLTER-></h1>
            </div>
        </div>
      </div>

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">List SPD</h3>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th width="10%">Nomor SPD</th>
                <th>User</th>
                <th>Waktu Keberangkatan</th>
                <th>Tujuan</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($spd2 as $s): ?>
                <tr>
                  <td></td>
                  <td><?= $s->nomor_spd ?></td>
                  <td><?= $s->first_name ?></td>
                  <td><?= $s->departure_date ?></td>
                  <td><?= $s->name_destination ?></td>
                  <?php if ($s->driver_pickup != null): ?>
                  <td>Driver ready</td>
                  <?php else: ?>
                  <td>Waiting Driver</td>
                  <?php endif ?>
                  <td><a href="<?= base_url('ga/setDriver/').$s->ID ?>" class="btn btn-success">Set Driver</a></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>