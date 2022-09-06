
<nav class="navbar header-navbar pcoded-header" header-theme="theme4">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <a class="mobile-search morphsearch-search" href="#">
                <i class="ti-search"></i>
            </a>
            <a href="index.html">
                <img class="img-fluid" src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="Theme-Logo" />
            </a>
            <a class="mobile-options">
                <i class="ti-more"></i>
            </a>
        </div>
        <div class="navbar-container container-fluid p-0">
            <div>
                <ul class="nav-left">
                    <li>
                        <div><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                        </div>
                    </li>
                    <li>
                        <div class="main-search morphsearch-search p-0">
                            <a href="#">
                                <!-- themify icon -->
                                <i class="ti-search"></i>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div>
                            <a href="#!" class="p-0" onclick="javascript:toggleFullScreen()">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </div>
                    </li>
                </ul>
                <ul class="nav-right">
                    <li class="header-notification lng-dropdown">
                        <a href="#" id="dropdown-active-item">
                            <i class="m-r-5 ti-world"></i> Select Location
                        </a>
                        <ul class="show-notification">
                            <li>
                                <a href="#" data-lng="en">
                                    <i class="flag-icon flag-icon-gb m-r-5"></i> English
                                </a>
                            </li>
                            <li>
                                <a href="#" data-lng="es">
                                    <i class="flag-icon flag-icon-es m-r-5"></i> Spanish
                                </a>
                            </li>
                            <li>
                                <a href="#" data-lng="pt">
                                    <i class="flag-icon flag-icon-pt m-r-5"></i> Portuguese
                                </a>
                            </li>
                            <li>
                                <a href="#" data-lng="fr">
                                    <i class="flag-icon flag-icon-fr m-r-5"></i> French
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="header-notification">
                        <a style="cursor: pointer;">
                            <i class="ti-bell"></i>
                            <span class="badge"><?php echo e(@$notification_count); ?></span>
                        </a>
                        <ul class="show-notification">
                            <li>
                                <h6>Notifications</h6>
                                <label class="label label-danger">New</label>
                            </li>
                            <?php $__currentLoopData = $notification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notifications): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li id="notification_body" value="<?php echo e($notifications['id']); ?>" <?php if($notifications['status']==1): ?> class="bg-info border border-light rounded text-white"
                                <?php endif; ?>>
                                <div class="media">
                                    <img class="d-flex align-self-center" src="<?php echo e(asset('assets/images/user.png')); ?>"
                                        alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="notification-user"><?php echo e($notifications['user']['username']); ?></h5>
                                        <p class="notification-msg"><?php echo e($notifications['message']); ?></p>
                                        <span class="notification-time text-muted"><b><?php echo e($date); ?></b></span>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                    <li class="header-notification">
                        <a href="#!" class="displayChatbox">
                            <i class="ti-comments"></i>
                            <span class="badge">9</span>
                        </a>
                    </li>
                    <li class="user-profile header-notification">
                        <a>
                            <img src="<?php echo e(asset('assets/images/user.png')); ?>" alt="User-Profile-Image">
                            <span><?php echo e(Auth::user()->username); ?></span>
                            <i class="ti-angle-down"></i>
                        </a>
                        <ul class="show-notification profile-notification">
                            
                            <li>
                                <a href="<?php echo e(route('user.profile') . '/' . Auth::user()->id); ?>">
                                    <i class="ti-user"></i> Profile
                                </a>
                            </li>
                            
                            
                            <li>
                                <a href="<?php echo e(route('auth.logout')); ?>">
                                    <i class="ti-layout-sidebar-left"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- search -->
                <div id="morphsearch" class="morphsearch">
                    <form class="morphsearch-form">
                        <input class="morphsearch-input" type="search" placeholder="Search..." />
                        <button class="morphsearch-submit" type="submit">Search</button>
                    </form>
                    <div class="morphsearch-content">
                        <div class="dummy-column">
                            <h2>People</h2>
                            <a class="dummy-media-object" href="#!">
                                <img class="round"
                                    src="http://0.gravatar.com/avatar/81b58502541f9445253f30497e53c280?s=50&d=identicon&r=G"
                                    alt="Sara Soueidan" />
                                <h3>Sara Soueidan</h3>
                            </a>
                            <a class="dummy-media-object" href="#!">
                                <img class="round"
                                    src="http://1.gravatar.com/avatar/9bc7250110c667cd35c0826059b81b75?s=50&d=identicon&r=G"
                                    alt="Shaun Dona" />
                                <h3>Shaun Dona</h3>
                            </a>
                        </div>
                        <div class="dummy-column">
                            <h2>Popular</h2>
                            <a class="dummy-media-object" href="#!">
                                <img src="<?php echo e(asset('assets/images/avatar-1.png')); ?>" alt="PagePreloadingEffect" />
                                <h3>Page Preloading Effect</h3>
                            </a>
                            <a class="dummy-media-object" href="#!">
                                <img src="<?php echo e(asset('assets/images/avatar-1.png')); ?>" alt="DraggableDualViewSlideshow" />
                                <h3>Draggable Dual-View Slideshow</h3>
                            </a>
                        </div>
                        <div class="dummy-column">
                            <h2>Recent</h2>
                            <a class="dummy-media-object" href="#!">
                                <img src="<?php echo e(asset('assets/images/avatar-1.png')); ?>" alt="TooltipStylesInspiration" />
                                <h3>Tooltip Styles Inspiration</h3>
                            </a>
                            <a class="dummy-media-object" href="#!">
                                <img src="<?php echo e(asset('assets/images/avatar-1.png')); ?>" alt="NotificationStyles" />
                                <h3>Notification Styles Inspiration</h3>
                            </a>
                        </div>
                    </div>
                    <!-- /morphsearch-content -->
                    <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
                </div>
                <!-- search end -->
            </div>
        </div>
    </div>
</nav><?php /**PATH C:\xampp\htdocs\TRT\Shippment-System\resources\views/layouts/partials/nav.blade.php ENDPATH**/ ?>