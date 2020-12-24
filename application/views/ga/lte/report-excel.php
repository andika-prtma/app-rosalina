  <div class="content-wrapper">    
    <section class="content-header">
      <h1>
        Report SPD
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> GA</a></li>
        <li class="active">Report</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <div class="box col-sm-6">
              
              <div class="box-body">
                <?= form_open('ga2/report', 'class="form-horizontal", method="get" ') ?>
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
                <a href="<?= base_url('ga2/exportExcel/'.$url) ?>" class="btn btn-success">Export Excel</a>
              </div>
            </div>
        </div>
      </div>
      <?php
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Data.xls");
      ?>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">List SPD</h3>
        </div>
        <div class="box-body" id="printArea">
          <table id="example1" class="" border="1" width="100%">
            <thead style="background-color: lightgrey">
              <tr>
                <th style="text-align: center; height: 50px" width="5%" rowspan="2">No</th>
                <th style="text-align: center; height: 50px" width="10%" rowspan="2">Nomor SPD</th>
                <th style="text-align: center; height: 50px" rowspan="2">For Name</th>
                <th style="text-align: center; height: 50px" rowspan="2">Description</th>
                <th style="text-align: center; height: 50px" rowspan="2">Project</th>
                <th style="text-align: center; height: 25px" colspan="2">Waktu</th>
              </tr>
              <tr>
                <th style="text-align: center; height: 25px">Departure</th>
                <th style="text-align: center; height: 25px">Return</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!$spd==''): ?>
                <?php $no = 1; ?>
                <?php foreach ($spd as $s): ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $s->nomor_spd ?></td>
                    <td><?= $s->request_for ?></td>
                    <td><?= $s->agenda ?></td>
                    <td><?= $s->project ?></td>
                    <td><?= $s->departure_date ?></td>
                    <td><?= $s->expected_date ?></td>
                  </tr>
                <?php $no++ ?>
                <?php endforeach ?>
              <?php endif ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">List SPD</h3>
        </div>
        <div class="box-body" id="printArea">
          
          <table id="" class="" border="1" width="100%" cellpadding="2" cellspacing="2">
            <thead style="background-color: lightgrey">
              <tr>
                <th style="text-align: center; height: 50px" width="2%" rowspan="2">No</th>
                <th style="text-align: center; height: 50px" width="10%" rowspan="2">Nomor SPD</th>
                <th style="text-align: center; height: 50px" rowspan="2" width="10%">For Name</th>
                <th style="text-align: center; height: 50px" rowspan="2" width="30%">Description</th>
                <th style="text-align: center; height: 50px" rowspan="2">Project</th>
                <th style="text-align: center; height: 25px" colspan="2">Waktu</th>
              </tr>
              <tr>
                <th style="text-align: center; height: 25px">Departure</th>
                <th style="text-align: center; height: 25px">Return</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($spd2!=''): ?>
                <?php $no = 1; ?>
                <?php foreach ($spd2->result() as $s): ?>
                  <tr>
                    <td style="text-align: center;"><?= $no ?></td>
                    <td style="text-align: center;">
                      <?= $s->nomor_spd ?><br>
                      Date: <?= date('d-m-Y', $s->created_at) ?>
                    </td>
                    <td><?= $s->first_name ?></td>
                    <td>
                      <?= $s->agenda ?><br>
                      <strong>Tujuan:</strong>
                      <?= $s->tujuan ?>
                    </td>
                    <td><?= $s->project ?></td>
                    <td><?= $s->departure_date ?></td>
                    <td><?= $s->expected_date ?></td>
                  </tr>
                <?php $no++ ?>
                <?php endforeach ?>
              <?php endif ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>