
    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav bookmark-icons">
                <?php if($user['tamplate'] == "LIGHT") { ?>
                    <li class="nav-item d-lg-block"><a href="<?=  base_url()."site/tamplate/dark"; ?>"><i class="ficon" data-feather="moon"></i></a></li>
                <?php } else if($user['tamplate'] == "DARK") { ?>
                    <li class="nav-item d-lg-block"><a href="<?=  base_url()."site/tamplate/light"; ?>"><i class="ficon" data-feather="sun"></i></a></li>
                <?php } ?>
                    
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <!-- <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#" data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge rounded-pill bg-danger badge-up">5</span></a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 me-auto">Notifikasi Berita</h4>
                                <div class="badge rounded-pill badge-light-primary">6 New</div>
                            </div>
                        </li>
                        <li class="scrollable-container media-list"><a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-primary">
                                            <div class="avatar-content"><i data-feather="refresh-cw"></i></div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">INFORMASI "UPDATE" Layanan </span></p><div class="badge rounded-pill badge-light-primary">6</div><small class="notification-text"> .</small>
                                    </div>
                                </div>
                            </a><a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-success">
                                            <div class="avatar-content"><i data-feather="arrow-up-circle"></i></div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">INFORMASI "PENAMBAHAN" Layanan </span></p><small class="notification-text">.</small>
                                    </div>
                                </div>
                            </a><a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-danger">
                                            <div class="avatar-content"><i data-feather="arrow-down-circle"></i></div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">INFORMASI "PENGHAPUSAN" Layanan </span></p><small class="notification-text"> .</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="#">Tandai Telah Terbaca</a></li>
                    </ul>
                </li> -->
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">APTAVIS Soccer League</span><span class="user-status">#ASL2023</span></div><span class="avatar"><img class="round" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAC1klEQVR4Ae2XNZDcQBBFZWZmJu2aYzNLF5sxLzPMRIbIzI7MkF1eZg7NzMzMzLT+Sy398cqrWzMEr1o4/adJJSsWi/1Sfg8BEVcXAAV05Yij5oDD4BbOr4FbEUeftV1dEVgmeM4kZwGtYB+CWMQBsLarYrajYRPnkzK+B4c2k5OAYuARiAmOSghInifs3aD3bcYnwFFhGcXOU1acA1yD7Q0sExaUiwBXX6JdOxQJsWC/DYdMsICw4e8sTgA7VhwRWDhsbQrAdUIERF2dFSy8Do5opyRCrouofHMTuUfAUTXEWTCmsE+gQigBUplBOGqm4Shd+e/BLSlC6oyEnQgsIpcixGJPuNIl5AdAS6MWqCW593MbRAMpx8zU1GI7zdaUYnR0L2AJrhBawH4JqexUWrAesMAQ3j2xj6JZwCJskdy94RzgeJMvp0Vx/DxIBELfKlNqw9TAKsmnpEBsNyC5xbVFNA+4XfO5pcMVYWnwNu3U5t1dSS8S9WhOBcptiZZUFWTtUAJcNYp37J9yeqw3I4C36GHqBh7VE+SbEK4L1AUeLBLS97BlPAG0q07GdKSW9ARoFpChVztzP9OCq2D9U7Is6IrjrrB5sC+DpiPW7gXQCdki4Kh1ot4QYaMzfK1UE9fu8AxQH/ldTzyQlgyuAVfXAME9zaFfYIRZ4M6h4myVbQ5M4dDRiO0L0qkqhPuP0y1nizMTvg7ys3XBA08x9fRDYPkE9Kbd0c6/+rX8BFsxSEAvI58096Mp502SQi5mrHhgA3Yq11LR0hODUrCLJxgpr+Gr/gbgIhY+AXtccFQSzAPwTKL3ZUTuZopAU1HvwLKANekeTk29EjaszUPIi2Tyq9dW0gHMNGH97oYAvYw/IFR87c3RGyiAz0/StwHY3vl2fwpKgrcSerZXZIKBKAgrAAzjcez7gcGxX8Bcrmj6BOd5AkAIAdE0ri5NuedUJAT8/zv+DD47hE/YqbHuAAAAAElFTkSuQmCC" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item" href="<?=  base_url()."user/profile"; ?>"><i class="me-50" data-feather="settings"></i> Settings</a><a class="dropdown-item" href="<?=  base_url()."auth/logout"; ?>"><i class="me-50" data-feather="power"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>