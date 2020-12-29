<?php   
        $this->load->model("m_superadmin");
        
        $arr = $this->db->get_where('tbl_user_access_menu', ['id_role'=> $this->session->userdata('id_role')])->row();
        $arr = json_decode($arr->id_menu);
?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets/img/profile/') ?>default.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('name') == '' || null ? '' : $this->session->userdata('name') ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php foreach ($arr as $m): ?>
        <li class="treeview">
          <?php $submenu  = $this->m_superadmin->getSubMenu($m)->result() ?>
          <?php $menu     = $this->db->get_where('tbl_user_menu', ['ID' => $m])->row() ?>
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span><?= strtoupper($menu->menu) ?></span>
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
  </aside>
              