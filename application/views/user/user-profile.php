  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
              <div class="box-tools">
                
              </div>
            </div>            
            <?= form_open_multipart('user/proc_site', 'class="form-horizontal"') ?>
            <div class="box-body">
              <div class="form-group">
                <label for="create" class="col-sm-3 control-label">Badge Number</label>
                <div class="col-sm-9">
                  <input readonly type="text" id="create" class="form-control" value="<?= $user->badge_number ?>" name="create">
                </div>
              </div>
              <div class="form-group">
                <label for="create" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9">
                  <input readonly type="text" id="create" class="form-control" value="<?= ucwords($this->session->userdata('name')) ?>" name="create">
                </div>
              </div>
              <div class="form-group">
                <label for="create" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                  <input readonly type="text" id="create" class="form-control" value="<?= ucwords($this->session->userdata('email')) ?>" name="create">
                </div>
              </div>
              <div class="form-group">
                <label for="create" class="col-sm-3 control-label">SITE</label>
                <div class="col-sm-9">
                  <select class="form-control" name="site">
                    <option value="0">Pilih</option>
                    <?php foreach ($site as $s): ?>
                    <option value="<?= $s->prefix ?>" <?= $this->session->userdata('site') == $s->prefix ? 'selected' : '' ?>><?= $s->prefix.' | '.$s->business_unit ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <center>
                <div class="box-footer">
                  <!-- <button type="submit" class="btn btn-primary" value="save" name="save">SAVE</button>
                  <button type="submit" class="btn btn-danger" value="cancel" name="save">CANCEL</button> -->
                </div>
              </center>
            </div>
            <?= form_close() ?>
          </div>
        </div>
      </div>
    </section>
  </div>

