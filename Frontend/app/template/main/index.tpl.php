<?php include App::$view_root . "/base/common.tpl.php" ?>
<?php include App::$view_root . "/base/header.tpl.php" ?>
<?php include App::$view_root . "/base/sideBar.tpl.php" ?>

<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=$webRoot?>"><i class="f-16 fa fa-home"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                    </ol>
                    <h3>
                        <?=_L('Index_Index')?></h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 xl-100 box-col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="project-overview">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6 col-6" style="border-left:0px">
                                    <h2 class="f-w-600 font-primary"><?=$PRM['userCount']?></h2>
                                    <p class="mb-0"><?=_L('Index_User_Count')?></p>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-6" style="border-left:0px">
                                    <h2 class="f-w-600 font-secondary"><?=$PRM['giftCount']?></h2>
                                    <p class="mb-0"><?=_L('Index_Gift_Count')?></p>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-6" style="border-left:0px">
                                    <h2 class="f-w-600 font-success"><?=$PRM['userConfigCount']?></h2>
                                    <p class="mb-0"><?=_L('Index_User_Config_Count')?></p>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-6" style="border-left:0px">
                                    <h2 class="f-w-600 font-info"><?=$PRM['mateTypeCount']?></h2>
                                    <p class="mb-0"><?=_L('Index_Mate_Type_Count')?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 xl-100 box-col-12">
                <div class="card card-with-border overall-rating">
                    <div class="card-header resolve-complain card-no-border">
                        <h5 class="d-inline-block">使用须知</h5><span class="setting-round pull-right d-inline-block mt-0"><i class="fa fa-spin fa-cog"></i></span>
						<p class="f-12 mb-0">组件开源，地址：<a href="https://github.com/ShigemoriHakura/ACMate_Gifts">Github</a></p>
                    </div>
                    <div class="card-body pt-0">
                        <div class="timeline-recent">
                            <div class="media">
                                <div class="timeline-line"></div>
                                <div class="timeline-dot-danger"></div>
                                <div class="media-body"><span class="d-block f-w-600">本站仅提供OBS/XSplit助手。不会记录任何用户敏感数据。<span class="pull-right light-font f-w-400">2020/10/20</span></span>
                                    <p> <span class="font-danger">白咲 </span>管理员</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="timeline-dot-success"></div>
                                <div class="media-body"><span class="d-block f-w-600">请在注册用户后使用。<span class="pull-right light-font f-w-400">2020/10/20</span></span>
                                    <p> <span class="font-success">白咲 </span>管理员</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>


<?php include App::$view_root . "/base/footer.tpl.php" ?>


