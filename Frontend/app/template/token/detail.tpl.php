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
                        <li class="breadcrumb-item"><a href="<?= $webRoot ?>"><i class="f-16 fa fa-home"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                    </ol>
                    <h3><?= _L('Token_Index') ?></h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0"><?= _L('Token_Detail') ?></h4>
                            <div class="card-options">
                                <a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form theme-form" action="<?= $webRoot ?>/t/r/<?= $PRM['tokenData']['id'] ?>" method="POST">
                                <input type="text" name="_csrf" hidden value="<?= $this->getCsrfToken() ?>"/>
                                <div class="row mb-2">
                                    <div class="col">
                                        <h3 class="mb-1"><?= $PRM['tokenData']['type_name'] ?></h3>
                                        <p class="mb-4"><?= $PRM['tokenData']['type_content'] ?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label"><?= _L('Token_Up_Id') ?></label>
                                    <input class="form-control" name="room" placeholder="<?= $PRM['tokenData']['up_id'] ?>" value="<?= $PRM['tokenData']['up_id'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit"><?= _L('Token_Submit') ?></button>
                                </div>
                            </form>
                            <? if ($PRM['tokenData']['configuration'] != "{}") { ?>
                                <div class="form-group">
                                    <label class="form-label"><?= _L('Token_Link') ?></label>
                                    <input class="form-control" id="copy<?= $PRM['id'] ?>" value="<?= $site ?>/api/display/<?= $PRM['tokenData']['token'] ?>">
                                </div>
                                <button class="btn btn-primary btn-square digits" data-clipboard-target="#copy<?= $PRM['id'] ?>"><?= _L('Token_Copy') ?></button>
                                <a target="_blank" href="<?=$site?>/api/display/<?=$PRM['tokenData']['token']?>"><button class="btn btn-primary btn-square digits"><?=_L('Token_Enter')?></button></a>
                            <? } else { ?>
                                <div class="form-group">
                                    <label class="form-label"><?= _L('Token_Link') ?></label>
                                    <input class="form-control" id="copy<?= $PRM['id'] ?>" value="<?= _L('Token_Not_Set') ?>">
                                </div>
                            <? } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0"><?= _L('Token_Edit') ?></h4>
                            <div class="card-options">
                                <a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php include App::$view_root . "/token/configure/" . $PRM['tokenData']['mate_type'] . ".tpl.php" ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
    </div>
</div>


<?php include App::$view_root . "/base/footer.tpl.php" ?>

<script>
    new ClipboardJS('.btn');
</script>