<?php 
use \yii\helpers\Url;
?>
<aside class="main-sidebar" style="position:fixed">
    <!-- sidebar: CSS can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="nav sidebar-menu">
            <li class="header"><b>Navigation SideBar</b></li>
            <!-- Optionally, you can add icons to the links -->

            <li><a href=<?= Url::to(['/users']) ?>><i class="fa fa-photo"></i> <span>Users</span></a></li>
            <li><a href=<?= Url::to(['/area']) ?>><i class="fa fa-user"></i> <span>Areas</span></a></li>
            <li><a href=<?= Url::to(['/workspace']) ?>><i class="fa fa-photo"></i> <span>Workspaces</span></a></li>
            <li><a href=<?= Url::to(['/booking-request/userhistory']) ?>><i class="fa fa-columns"></i> <span>Booking History</span></a></li>
            <li><a href=<?= Url::to(['/booking-request/bookingavail']) ?>><i class="fa fa-columns"></i> <span>New Booking</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Booking Requests</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="<?= Url::to(['/booking-request']) ?>"><i class="fa fa-columns"></i> <span>Pending Requests</span></a></li>
                    <li><a href="<?= Url::to(['/booking-request/history']) ?>"><i class="fa fa-columns"></i> <span>Completed Requests</span></a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
