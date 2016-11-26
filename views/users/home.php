<?php
use yii\helpers\Html;
$this->title = 'Dashboard';

?> 

<div class="row">
    <div>
        <h2><center>Welcome to BookMyRoom - Admin Panel</center></h2>
    </div>
    <div class="col-sm-12">  
        <section class="panel" style="border-color:#999999">  
            <header class="panel-heading font-bold">Dashboard - Statistics</header>  
            <div class="panel-body">
                <div class="row ">
                    <div class="top-section ">
                        <div class="col-sm-offset-2 col-sm-8">
                            <div class="row" >
                                <div class="general-overiew text-center">
                                    <div class="bottom">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="info-box">
                                                    <div class="count">
                                                        <span class="number"><?php echo '1' ?></span>
                                                        <p>Pending Requests</p>
                                                    </div>
                                                    <div class="add-action">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="info-box">
                                                    <div class="count">
                                                        <span class="number"><?php echo '1' ?></span>
                                                        <p>Accepted Requests</p>
                                                    </div>
                                                    <div class="add-action">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="info-box">
                                                    <div class="count">
                                                        <span class="number"><?php echo '1' ?></span>
                                                        <p>Cancelled Requests</p>
                                                    </div>
                                                    <div class="add-action">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="info-box">
                                                    <div class="count">
                                                        <span class="number"><?php echo '1' ?></span>
                                                        <p>Total Requests</p>
                                                    </div>
                                                    <div class="add-action">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
    </div>
</div>