<?php   
        $this->load->model("superadmin_model");        
        $arr = $this->db->get_where('tbl_user_access_menu', ['id_role'=> $this->session->userdata('id_role')])->row();
        $arr = json_decode($arr->id_menu);
?>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets/img/profile/') ?>default.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('name') == '' || null ? '' : $this->session->userdata('name') ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php foreach ($arr as $m): ?>
        <li class="treeview">
          <?php $submenu = $this->superadmin_model->getSubMenu($m)->result() ?>
          <?php $menu = $this->db->get_where('tbl_user_menu', ['ID' => $m])->row() ?>
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span><?= ucwords($menu->menu) ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php foreach ($submenu as $sm): ?>
              <li><a href="<?= base_url().$sm->link ?>"><i class="fa fa-circle-o"></i> <?= ucwords($sm->title) ?></a></li>
            <?php endforeach ?>
          </ul>
        </li>
        <?php endforeach ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
              