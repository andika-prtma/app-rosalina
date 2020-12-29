  <header class="main-header">
    <a href="index2.html" class="logo">
      <span class="logo-mini"><b>R</b></span>
      <span class="logo-lg"><b>Rosalina</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url('assets/img/profile/') ?>default.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $this->session->userdata('name') == '' || null ? '' : $this->session->userdata('name') ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?= base_url('assets/img/profile/') ?>default.jpg" class="img-circle" alt="User Image">

                <p>
                  <?= $this->session->userdata('name') ?>
                  <small>PT. Multi Fabrindo Gemilang</small>
                  <small>Kode Site : <?= $this->session->userdata('site') != null ? $this->session->userdata('site') : '' ?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?=base_url('login/logout') ?>" class="btn btn-default btn-flat">LOGOUT</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>