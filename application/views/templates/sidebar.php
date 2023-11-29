<?php
    error_reporting(0);
    
    $beranda = TRUE;
    $CI = get_instance();
    $url = $CI->uri->segment(1);
?>
<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand" href="<?= base_url() ?>html/ltr/vertical-collapsed-menu-template/index.html">
                            <span class="brand-logo">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAC1klEQVR4Ae2XNZDcQBBFZWZmJu2aYzNLF5sxLzPMRIbIzI7MkF1eZg7NzMzMzLT+Sy398cqrWzMEr1o4/adJJSsWi/1Sfg8BEVcXAAV05Yij5oDD4BbOr4FbEUeftV1dEVgmeM4kZwGtYB+CWMQBsLarYrajYRPnkzK+B4c2k5OAYuARiAmOSghInifs3aD3bcYnwFFhGcXOU1acA1yD7Q0sExaUiwBXX6JdOxQJsWC/DYdMsICw4e8sTgA7VhwRWDhsbQrAdUIERF2dFSy8Do5opyRCrouofHMTuUfAUTXEWTCmsE+gQigBUplBOGqm4Shd+e/BLSlC6oyEnQgsIpcixGJPuNIl5AdAS6MWqCW593MbRAMpx8zU1GI7zdaUYnR0L2AJrhBawH4JqexUWrAesMAQ3j2xj6JZwCJskdy94RzgeJMvp0Vx/DxIBELfKlNqw9TAKsmnpEBsNyC5xbVFNA+4XfO5pcMVYWnwNu3U5t1dSS8S9WhOBcptiZZUFWTtUAJcNYp37J9yeqw3I4C36GHqBh7VE+SbEK4L1AUeLBLS97BlPAG0q07GdKSW9ARoFpChVztzP9OCq2D9U7Is6IrjrrB5sC+DpiPW7gXQCdki4Kh1ot4QYaMzfK1UE9fu8AxQH/ldTzyQlgyuAVfXAME9zaFfYIRZ4M6h4myVbQ5M4dDRiO0L0qkqhPuP0y1nizMTvg7ys3XBA08x9fRDYPkE9Kbd0c6/+rX8BFsxSEAvI58096Mp502SQi5mrHhgA3Yq11LR0hODUrCLJxgpr+Gr/gbgIhY+AXtccFQSzAPwTKL3ZUTuZopAU1HvwLKANekeTk29EjaszUPIi2Tyq9dW0gHMNGH97oYAvYw/IFR87c3RGyiAz0/StwHY3vl2fwpKgrcSerZXZIKBKAgrAAzjcez7gcGxX8Bcrmj6BOd5AkAIAdE0ri5NuedUJAT8/zv+DD47hE/YqbHuAAAAAElFTkSuQmCC"></img>
                            </span>
                        <h2 class="brand-text">ASL 2023</h2>
                    </a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

               <?php
                    $level = "Tamu";
                    $menu = $this->menu->showMenu($level);
               ?>
                <?php foreach ($menu as $m) : ?>

                    <li class=" navigation-header">
                        <span data-i18n="<?= $m['nama_menu'];?>"><?= $m['nama_menu'];?></span><i data-feather="more-horizontal">
                    </i>

                <?php
                    $menuId = $m['nama_menu'];
                    $subMenu = $this->menu->showSubMenu($menuId); 
                ?>

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
<li class="nav-item active">
                <?php else : ?>
<li class="nav-item">
                <?php endif; ?>

                <?php if($sm['title'] == "Site Pesanan") { ?>
                    <a class="d-flex align-items-center" href="<?=  base_url().$sm['url']; ?>"> 
                        <i data-feather="<?= $sm['icon']; ?>"></i><span class="menu-title text-truncate" data-i18n="<?= $sm['title']; ?>"><?= $sm['title']; ?></span></a>
                        <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="<?=  base_url()."site/targetPesanan"; ?>"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">Target Pesanan</span></a></li>
                        <li><a class="d-flex align-items-center" href="<?=  base_url()."site/trickAndTips"; ?>"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="eCommerce">Trik & Tips Peasanan</span></a></li>
                        <li><a class="d-flex align-items-center" href="<?=  base_url()."site/pertanyaanUmum"; ?>"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="eCommerce">Pertanyaan Umum</span></a></li>
                        <li><a class="d-flex align-items-center" href="<?=  base_url()."site/ketentuan"; ?>"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="eCommerce">Ketentuan Layanan</span></a></li>
                        <li><a class="d-flex align-items-center" href="<?=  base_url()."site/kontak"; ?>"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="eCommerce">Kontak</span></a></li>
                    </ul>
                    </li>
                <?php } else { ?>
        <a class="d-flex align-items-center" href="<?=  base_url().$sm['url']; ?>">
                        <i data-feather="<?= $sm['icon']; ?>"></i><span class="menu-title text-truncate" data-i18n="<?= $sm['title']; ?>"><?= $sm['title']; ?></span>
                        </a>
                    </li>
                <?php } ?>
            <?php endforeach; ?>
        <?php endforeach; ?>

        </ul>
        </div>
    </div>