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
            <div class="col-xl-12">
                <div class="card card-with-border tickets">
                    <div class="card-header card-no-border">
                        <div class="d-flex">
                            <h5><?=_L('Token_Title')?></h5>
                            <p><?=_L('Token_Desc')?></p>
                            <a href="<?=$webRoot?>/add">
                            <button class="btn btn-outline-light" type="button">+</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive agent-performance-table">
                            <table class="table table-bordernone">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-inline-block align-middle">
                                                <div class="d-inline-block"><span class="f-12 f-w-600"><?=_L('Token_ID')?></span></span></div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="f-w-600"><?=_L('Token_Link')?></p>
                                        </td>
                                        <td>
                                            <p class="f-w-600"><?=_L('Token_Type')?></p>
                                        </td>
                                        <td>
                                            <p class="f-w-600"><?=_L('Token_Action')?></p>
                                        </td>
                                    </tr>
                                    <? if ($PRM['tokenData']->count() > 0){?>
                                        <? foreach ($PRM['tokenData'] as $k => $v){?>
                                                <tr>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <div class="d-inline-block">
                                                                <span class="f-12 f-w-600"><?=$v['id']?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <? if ($v['configuration'] != "{}"){?>
                                                            <p class="f-w-600" id="copy<?=$v['id']?>"><?=$site?>/api/display/<?=$v['token']?></p>
                                                        <?} else {?>
                                                            <p class="f-w-600"><?=_L('Token_Not_Set')?></p>
                                                        <?}?>
                                                    </td>
                                                    <td>
                                                        <p class="f-w-600" ><?=$v['type']?></p>
                                                    </td>
                                                    <td>
                                                        <? if ($v['configuration'] != "{}"){?>
                                                            <button class="btn btn-primary btn-square digits" data-clipboard-target="#copy<?=$v['id']?>"><?=_L('Token_Copy')?></button>
                                                            <a target="_blank" href="<?=$site?>/api/display/<?=$v['token']?>"><button class="btn btn-primary btn-square digits"><?=_L('Token_Enter')?></button></a>
                                                        <?}?>
                                                        <a href="/t/<?=$v['id']?>"><button class="btn btn-primary btn-square digits"><?=_L('Token_Detail')?></button></a>
                                                        <button class="btn btn-info sweet-add-<?=$v['id']?>" type="button"><?=_L('Token_Delete')?></button>
                                                    </td>
                                                </tr>
                                        <? }?>
                                    <? }else{ ?>
                                        <tr>
                                            <td>
                                                /
                                            </td>
                                            <td>
                                                <p class="f-w-600"><?=_L('Token_NoResult')?></p>
                                            </td>
                                            <td>
                                                /
                                            </td>
                                            <td>
                                                /
                                            </td>
                                        </tr>
                                    <? }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>


<?php include App::$view_root . "/base/footer.tpl.php" ?>


<script>
    new ClipboardJS('.btn');
    var SweetAlert_custom = {
        init: function() {
            <? if ($PRM['tokenData']->count() > 0){?>
                <? foreach ($PRM['tokenData'] as $k => $v){?>
                    document.querySelector('.sweet-add-<?=$v['id']?>').onclick = function(){
                        swal({
                            title: "<?=_L('Token_Delete')?> - <?=$v['id']?>",
                            text: "<?=_L('Token_Delete_Notify')?>",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location.href="/t/d/<?=$v['id']?>";
                            }
                        })
                    };
                <? }?>
            <? }?>
            
        }
    };
    (function($) {
        SweetAlert_custom.init()
    })(jQuery);
</script>