<?php 
use \yii\helpers\Url;
?>
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="nav sidebar-menu">
            <li class="header">Navigation SideBar</li>
            <!-- Optionally, you can add icons to the links -->

            <li><a href=<?= Url::to(['/users']) ?>><i class="fa fa-photo"></i> <span>Users</span></a></li>
            <li><a href=<?= Url::to(['/area']) ?>><i class="fa fa-user"></i> <span>Areas</span></a></li>
            <li><a href=<?= Url::to(['/workspace']) ?>><i class="fa fa-photo"></i> <span>Workspaces</span></a></li>
            <li><a href=<?= Url::to(['/booking-request']) ?>><i class="fa fa-columns"></i> <span>Booking Request</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
