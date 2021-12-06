<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="<?php echo site_url(); ?>">
                    <img src="<?php echo base_url('Assets/img/icon/adman_logo.png'); ?>" style="height: 60px;" alt="Adman Logo" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-handshake-o"></i>Campaign</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo site_url('camp/create_camp'); ?>">Create Campaign</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('camp/list_estimates'); ?>">Estimates</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('camp/list_outward_invoiced'); ?>">Invoiced</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-clipboard-list"></i>Advertiser</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo site_url('advertiser/create_advt'); ?>">Create Advertiser</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('advertiser/list_advt'); ?>">List All Advertisers</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-envelope"></i>ASP</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo site_url('asp/create_asp'); ?>">Create ASP</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('asp/list_asp'); ?>">List All ASP</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="far fa-check-square"></i>Release Order</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo site_url('ro/create_ro'); ?>">Create Release Orders</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('ro/list_ro'); ?>">List All Release Orders</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('ro/oldlist_ro'); ?>">Old Release Orders</a>
                                </li>
                            </ul>    
                        </li>
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-file-alt"></i>Invoice</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo site_url('invoice/list_inward_invoice'); ?>">Inward Invoices</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('invoice/list_outward_invoice'); ?>">Outward Invoices</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>Screen</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo site_url('screen/create_screen'); ?>">Create Screen</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('screen/list_screen'); ?>">List All Screen</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <!-- <a class="js-arrow" href="<?php //echo site_url('settings'); ?>"> -->
                            <a class="js-arrow" href="#">
                                <i class="fas fa-cog"></i>Settings</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo site_url('newlogo'); ?>">Add Users</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('settings'); ?>">List Users</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Reports</a>
                        </li>
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->