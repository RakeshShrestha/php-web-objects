<?php$authuser = getCurrentUser();$authusertype = getCurrentUserType();$pagetitle = isset($pagename) ? $pagename : SITE_TITLE;?><!DOCTYPE html><html>    <head>        <meta charset="utf-8">        <title>Admin Panel :: <?php echo $pagetitle ?></title>               <link rel="icon" href="<?php echo getUrl('favicon.ico') ?>" type="image/x-icon">        <link href="<?php echo getUrl('css/admin_style.css') ?>" rel="stylesheet" type="text/css">        <link href="<?php echo getUrl('css/smoothness/jquery-ui-1.10.4.min.css') ?>" rel="stylesheet" type="text/css">        <script src="<?php echo getUrl('js/jquery-1.11.1.min.js') ?>" type="text/javascript"></script>        <?php echo isset($head) ? $head : '' ?>    </head>    <body>        <header>Admin Panel             <div class="user-info">Hello                 <?php                if (isset($authuser['firstname'])) {                    echo $authuser['firstname'];                }                ?> |                 <span>                    <a class="logout" href="<?php echo getUrl('main/logout') ?>">                        Logout                    </a>                </span>            </div>        </header>        <aside>            <nav>                <ul>                    <li><a href="<?php echo getUrl('admin') ?>">Dashboard</a></li>                    <li><a href="<?php echo getUrl('admin/main/users') ?>">Users</a></li>                    <li><a href="<?php echo getUrl('admin/main/contentlist') ?>">Manage Content</a></li>                    <li><a href="<?php echo getUrl('admin/main/myprofile') ?>">My Profile</a></li>                    <li><a href="<?php echo getUrl('main/logout') ?>">Logout</a></li>                </ul>            </nav>        </aside>        <main>              <div class="information_section">            </div>            <div class="container">                <h3>Home</h3>                Welcome <?php                if (isset($authuser['firstname'])) {                    echo $authuser['firstname'];                }                ?> 			            </div>            <div class="inner-box-main sign-in-page">                <div class="left_signin">                </div>                <div style="clear:both;"></div>             </div>            <?php echo ((isset($splashmsgs) && is_array($splashmsgs)) ? implode("<br />\n", $splashmsgs) : ''); ?>            <?php echo isset($mainregion) ? $mainregion : '' ?>        </main>        <footer>            &copy; Copyright 2015</a>    </footer></body></html>