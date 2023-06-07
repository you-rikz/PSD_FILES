<header id="header" class="navbar navbar-expand-md fixed-top" style="background-color: #142850;">
    <div class="container-fluid" style="background-color: #142850;">
        <?php if ( user_is_logged_in() ) { ?>
            <ul class="nav pull-left nav_toggler">
                <li>
                    <a href="#" class="toggle_main_menu"><i class="fa fa-bars" aria-hidden="true"></i><span><?php _e('Toggle menu', 'cftp_admin'); ?></span></a>
                </li>
            </ul>
        <?php } ?>

        <div class="navbar-header ms-3 me-auto">
            <span class="navbar-brand">
                <img style="width: 1.5em; height: auto;" src="<?php echo '../OPRS/assets/img/ICON.png'; ?>" class="header-logo-dark" alt="Bhemax4IT – Online Mock Examination System" onclick="history.back()">
            </span>
        </div>

        <ul class="nav pull-right nav_account">
            <?php if ( user_is_logged_in() ) { ?>
                <li class="nav-item" id="header_welcome">
                    <span><?php echo CURRENT_USER_NAME; ?></span>
                </li>
            <?php } ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" id="language_dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown" >
                    <i class="fa fa-globe" aria-hidden="true"></i> <span><?php _e('Language', 'cftp_admin'); ?></span> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="language_dropdown">
                    <?php
                        // scan for language files
                        $available_langs = get_available_languages();
                        foreach ($available_langs as $filename => $lang_name) {
                    ?>
                            <li>
                                <a class="dropdown-item" href="<?php echo BASE_URI.'process.php?do=change_language&language='.$filename.'&return_to='.BASE_URI.urlencode(basename($_SERVER['REQUEST_URI'])); ?>">
                                    <?php echo $lang_name; ?>
                                </a>
                            </li>
                    <?php
                        }
                    ?>
                    <?php if ( user_is_logged_in() && CURRENT_USER_LEVEL != 0) { ?>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="<?php echo TRANSLATIONS_URL; ?>" target="_blank"><?php _e('Get more translations','cftp_admin'); ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
            <?php if ( user_is_logged_in() ) { ?>
                <li>
                    <?php $my_account_link = (CURRENT_USER_LEVEL == 0) ? 'clients-edit.php' : 'users-edit.php'; ?>
                    <a href="<?php echo BASE_URI.$my_account_link; ?>?id=<?php echo CURRENT_USER_ID; ?>" class="my_account"><i class="fa fa-user-circle" aria-hidden="true"></i> <span><?php _e('My Account', 'cftp_admin'); ?></span></a>
                </li>
                <li>
                    <a href="<?php echo BASE_URI; ?>process.php?do=logout" ><i class="fa fa-sign-out" aria-hidden="true"></i> <span><?php _e('Logout', 'cftp_admin'); ?></span></a>
                </li>
            <?php } ?>
        </ul>
    </div>
</header>
