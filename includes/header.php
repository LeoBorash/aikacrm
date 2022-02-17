<div class="page-main-header">
    <div class="main-header-right row">

        <div class="mobile-sidebar">
            <div class="media-body text-right switch-sm">
                <label class="switch"><a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
            </div>
        </div>
        <div class="nav-right col">
            <ul class="nav-menus">
                <li>
                    <form class="form-inline search-form" action="../search.php" method="post">
                        <div class="form-group">
                            <input class="form-control-plaintext" type="search" name="search" placeholder="Поиск.."><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                        </div>
                    </form>
                </li>
                <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize-2"></i></a></li>

                <li class="onhover-dropdown"><i data-feather="bell"></i><span class="badge badge-pill badge-primary pull-right notification-badge">3</span><span class="dot"></span>
                    <ul class="notification-dropdown onhover-show-div p-0">
                        <li>Уведомления <span class="badge badge-pill badge-primary pull-right">3</span></li>
                        <li>
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mt-0"><span><i class="shopping-color" data-feather="shopping-bag"></i></span>Здесь скоро будет уведомление..!</h6>
                                    <p class="mb-0">Здесь скоро будет уведомление..!</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mt-0 txt-success"><span><i class="download-color font-success" data-feather="download"></i></span>Здесь скоро будет уведомление..!</h6>
                                    <p class="mb-0">Здесь скоро будет уведомление..!</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mt-0 txt-danger"><span><i class="alert-color font-danger" data-feather="alert-circle"></i></span>Здесь скоро будет уведомление..!</h6>
                                    <p class="mb-0">Здесь скоро будет уведомление..!</p>
                                </div>
                            </div>
                        </li>
                        <li class="txt-dark"><a href="#">Все</a> уведомления</li>
                    </ul>
                </li>
                <li class="onhover-dropdown">
                    <div class="media align-items-center"><img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded" src="../assets/images/ava.jpg" alt="header-user">
                        <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                        <li><a href="profile.php"><i data-feather="user"></i>Баланс</a></li>
                        <?php
                            if($_SESSION['user_status'] == 4){ ?>
                                <li><a href="transaction.php"><i data-feather="user"></i>Транзакция</a></li>
                            <?php }
                        ?>
                        <li><a href="../exit.php"><i data-feather="log-out"></i>Выход</a></li>
                    </ul>
                </li>
            </ul>
            <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
        </div>
    </div>
</div>