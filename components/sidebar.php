<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Sayfalar</div>
                <a class="nav-link" href="<?php echo SITE_URL ?>index.php">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    Ana Sayfa
                </a>
                <a class="nav-link" href="<?php echo SITE_URL ?>agents.php">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    Agents
                </a>
                <a class="nav-link" href="<?php echo SITE_URL ?>datas.php">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    Veriler
                </a>
                <a class="nav-link" href="<?php echo SITE_URL ?>settings.php">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    Ayarlar
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Giriş yapan kullanıcı</div>
            <strong><?php echo $_SESSION['user'] ?></strong>
        </div>
    </nav>
</div>