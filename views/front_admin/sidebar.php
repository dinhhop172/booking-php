<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <?php if(isset($_SESSION['admin'])){ ?>
                <li class="menu-title">Hello Admin <h5><?= ($_SESSION['admin']['username']) ?></h5></li>
                <?php }else{ ?>
                <li class="menu-title">Hello Staff <h5><?= ($_SESSION['staff']['username']) ?></h5></li>
                <?php } ?>
                <li>
                    <a href="../dashboard/index.php" class=" waves-effect">
                        <i class="mdi mdi-calendar-check"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-clipboard-outline"></i>
                        <span>Quan ly</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="../users/index.php">Users/Staff</a></li>
                        <li><a href="../rooms/index.php">Rooms</a></li>
                        <li><a href="../booking/index.php">Booking</a></li>   
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->