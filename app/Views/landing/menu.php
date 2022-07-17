<!-- Header section  -->
  <nav class="nav-section">
    <div class="container">
      <ul class="main-menu">
        <li class="<?=(current_url()==site_url('')) ? 'active':''?>"><a href="<?= site_url('') ?>">Home</a></li>
        <li class="<?=(current_url()==site_url('about')) ? 'active':''?>"><a href="<?= site_url('about') ?>">About Us</a></li>
        <li class="<?=(current_url()==site_url('services')) ? 'active':''?>"><a href="<?= site_url('services') ?>">Services</a></li>
        <li class="
        <?=(current_url()==site_url('info')) ? 'active':''?>
        <?=(current_url()==site_url('info/detail')) ? 'active':''?>
        "><a href="<?= site_url('info') ?>">Tracking Asset</a></li>
        <li class="<?=(current_url()==site_url('report')) ? 'active':''?>"><a href="<?= site_url('report') ?>">Report</a></li>
        <li class="<?= (current_url()==site_url('contact')) ? "active" : '' ?>"><a href="<?= site_url('contact') ?>">Contact</a></li>
        <li class="<?= (current_url()==site_url('page-login')) ? "active" : '' ?>"><a href="<?= site_url('page-login') ?>">Login</a></li>
      </ul>
    </div>
  </nav>
  <!-- Header section end -->