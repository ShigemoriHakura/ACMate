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
                            <li class="breadcrumb-item"><a href="<?= $webRoot ?>"><i class="f-16 fa fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">Dashboard</li>
                        </ol>
                        <h3>
                            <?= _L('Token_Index') ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5><?= _L('Token_Add_Title') ?></h5>
                        </div>
                        <form class="form theme-form" action="<?= $webRoot ?>/add" method="POST">
                            <input type="text" name="_csrf" hidden value="<?= $this->getCsrfToken() ?>"/>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"><?= _L('Token_Up_Id') ?></label>
                                            <div class="col-sm-9">
                                                <input class="form-control digits" type="number" name="id" required="" placeholder="35119946">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"><?= _L('Token_Type') ?></label>
                                            <div class="col-sm-9">
                                                <select class="form-control digits" name="type">
                                                    <? foreach ($PRM['mateTypeData'] as $k => $v) { ?>
                                                        <option value="<?= $v['id'] ?>"><?= $v['name'] ?></option>
                                                    <? } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-sm-9 offset-sm-3">
                                    <button class="btn btn-primary" type="submit"><?= _L('Token_Submit') ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>


<?php include App::$view_root . "/base/footer.tpl.php" ?>