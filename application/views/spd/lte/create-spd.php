  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SPD
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> SPD</a></li>
        <li class="active">Create SPD</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create SPD</h3>
            </div>

            <?= form_open_multipart('spd/proses_create2', 'class="form-horizontal"') ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="create" class="col-sm-2 control-label">Date</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="create" placeholder="" value="<?= date('d-m-Y') ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="reqby" class="col-sm-2 control-label">Request By</label>
                  <div class="col-sm-10">
                    <input type="text" id="reqby" name="reqby" class="form-control" readonly value="<?= $this->session->userdata('name') ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="reqby" class="col-sm-2 control-label">Request For</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="reqfor" readonly value="<?= $this->session->userdata('name') ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="reqby" class="col-sm-2 control-label">Pickups</label>
                  <div class="col-sm-10">
                    <input id="pickup" name="pickup" placeholder="Masukan Alamat" type="text" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="reqby" class="col-sm-2 control-label">Destination</label>
                  <div class="col-sm-10">
                    <input id="destination" name="destination" placeholder="Masukan Alamat" type="text" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="reqby" class="col-sm-2 control-label">Distance (KM)</label>
                  <div class="col-sm-10">
                    <input id="jarak" name="jarak" placeholder="" type="text" class="form-control" readonly />
                  </div>
                </div>
                <div class="form-group">
                  <label for="reqby" class="col-sm-2 control-label">Agenda</label>
                  <div class="col-sm-10">
                    <textarea id="message" required="required" class="form-control" name="agenda"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="reqby" class="col-sm-2 control-label">Departure Date</label>
                  <div class="col-sm-3">
                    <input id="timedeparture" name="dept_time" placeholder="" type="text" class="form-control" />
                  </div>
                  <div class="col-sm-3">
                    <select class="form-control select2" multiple="multiple" data-placeholder="Pilih Kendaraan" style="width: 100%;" name="dept_kendaraan[]">
                      <?php $no = 0; ?>
                      <?php foreach ($kendaraan->result() as $kd): ?>
                      <!-- Array untuk contoh json -->
                      <?php $x = ['1', '2']; ?>
                      <?php if ($x[$no] == $kd->ID) {
                        $select = 'selected';
                      } else {
                        $select = '';
                      } ?>
                        <option value="<?= $kd->ID ?>" <?= $select ?>><?= ucwords($kd->kendaraan) ?></option>
                      <?php $no++; ?>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <select class="form-control select2" style="width: 100%;" data-placeholder="Choose Car" disabled name="dept_mobil">
                      <option disabled selected>Choose Car</option>
                      <?php foreach ($mobil->result() as $mbl): ?>
                        <option value="<?= $mbl->ID ?>"><?= $mbl->name_mbl.' | '.$mbl->nmr_plat ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-sm-2">
                   <select class="form-control select2" style="width: 100%;" data-placeholder="Choose Driver" disabled name="dept_driver">
                      <option disabled selected>Choose Driver</option>
                      <?php foreach ($driver->result() as $dr): ?>
                        <option value="<?= $dr->ID ?>"><?= ucwords($dr->name) ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="reqby" class="col-sm-2 control-label">Expected Date</label>
                  <div class="col-sm-3">
                    <input id="timeback" name="return_time" placeholder="" type="text" class="form-control" />
                  </div>
                  <div class="col-sm-3">
                    <select class="form-control select2" multiple="multiple" data-placeholder="Pilih Kendaraan" style="width: 100%;" name="return_kendaraan[]">
                      <?php foreach ($kendaraan->result() as $kd): ?>
                        <option value="<?= $kd->ID ?>" <?= $select ?>><?= ucwords($kd->kendaraan) ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <select class="form-control select2" style="width: 100%;" data-placeholder="Choose Car" disabled name="return_mobil">
                      <option disabled selected>Choose Car</option>
                      <?php foreach ($mobil->result() as $mbl): ?>
                        <option value="<?= $mbl->ID ?>"><?= $mbl->name_mbl.' | '.$mbl->nmr_plat ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-sm-2">
                   <select class="form-control select2" style="width: 100%;" data-placeholder="Choose Driver" disabled name="return_driver">
                      <option disabled selected>Choose Driver</option>
                      <?php foreach ($driver->result() as $dr): ?>
                        <option value="<?= $dr->ID ?>"><?= ucwords($dr->name) ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="reqby" class="col-sm-2 control-label">Job Cost Center Activity</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="project">
                      <option disabled selected>Choose Job Cost Center Activity</option>
                      <option value="CP06792">CP06792 | Muara Karang Gas Power Plant Project JBIC Loan No. IP-512</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="reqby" class="col-sm-2 control-label">Job Cost Center Approval</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="cost_center">
                      <option disabled selected>Choose Job Cost Center Approval</option>
                      <option value="R12700">R12700 | HO -IT & SYSTEM ANALYST | Aries Satriana</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="attach" class="col-sm-2 control-label">Attachment</label>
                  <div class="col-sm-10">
                    <input type="file" id="attach" name="attach" required="required" class="form-control" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="remarks" class="col-sm-2 control-label">Remarks</label>
                  <div class="col-sm-10">
                    <textarea id="message" required="required" class="form-control" name="remarks"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="reqby" class="col-sm-2 control-label">Comment / Notes</label>
                  <div class="col-sm-10">
                    <textarea id="message" required="required" class="form-control" name="comment"></textarea>
                  </div>
                </div>
              </div>

              <!-- Hidden value -->
              <div hidden>
                <input type="text" name="tempo1" id="tempo1">
                <input type="text" name="tempo2" id="tempo2">
                <input type="text" name="lat1" id='lat1'class="form-control" >
                <input type="text" name="lng1" id='lng1' class="form-control">
                <input type="text" name="lat2" id='lat2'class="form-control" >
                <input type="text" name="lng2" id='lng2' class="form-control">
                <input type="text" name="status" class="form-control">
              </div>

              <!-- /.box-body -->
              <center>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">SAVE DRAFT</button>
                  <button type="submit" class="btn btn-primary" name="submit">SAVE & SUBMIT</button>
                  <button type="submit" class="btn btn-danger">CANCEL</button>
                </center>
              </div>
            <?= form_close() ?>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>