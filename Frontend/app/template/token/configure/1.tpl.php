<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link <? if ($PRM['tokenData']['configuration'] != "{}") { ?>active<? } ?>" id="manage-tab" data-toggle="tab" href="#manage" role="tab" aria-controls="manage" aria-selected="<? if ($PRM['tokenData']['configuration'] != "{}") { ?>true<? } else { ?>false<? } ?>"><?= _L('Token_Edit') ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link <? if ($PRM['tokenData']['configuration'] == "{}") { ?>active<? } ?>" id="add-tabs" data-toggle="tab" href="#add" role="tab" aria-controls="add" aria-selected="<? if ($PRM['tokenData']['configuration'] != "{}"){ ?>false" <? }else{ ?>true<? } ?>"><?= _L('Token_Add') ?></a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade <? if ($PRM['tokenData']['configuration'] != "{}") { ?>show active<? } ?>" id="manage" role="tabpanel" aria-labelledby="manage-tab">
        <? if ($PRM['tokenData']['configuration'] != "{}") { ?>
            <br>
            <div class="row">
                <? foreach ($PRM['tokenData']['config']['gifts'] as $k => $v){?>
                    <div class="col-md-12">
                        <form class="form theme-form" action="<?= $webRoot ?>/t/e/<?= $PRM['tokenData']['id'] ?>" method="POST">
                            <input type="text" name="_csrf" hidden value="<?= $this->getCsrfToken() ?>"/>
                            <input type="text" name="action" hidden value="delete"/>
                            <input type="text" name="gift" hidden value="<?= $v['gift_name'] ?>"/>
                            <div class="form-group row mb-0">
                                <label class="col-sm-6"><?= $v['gift_name'] ?></label>
                                <label class="col-sm-3"><?= $v['gift_amount'] ?></label>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary form-control" type="submit"><?= _L('Token_Delete') ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <br>
                <? } ?>
            </div>
        <? }else{ ?>
            <p class="mb-0 m-t-30"><?= _L('Token_Not_Set') ?></p>
        <? } ?>
    </div>
    <div class="tab-pane fade <? if ($PRM['tokenData']['configuration'] == "{}") { ?>show active<? } ?>" id="add" role="tabpanel" aria-labelledby="add-tab">
        <br>
        <form class="form theme-form" action="<?= $webRoot ?>/t/e/<?= $PRM['tokenData']['id'] ?>" method="POST">
            <input type="text" name="_csrf" hidden value="<?= $this->getCsrfToken() ?>"/>
            <input type="text" name="action" hidden value="add"/>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label"><?= _L('Token_Gift') ?></label>
                        <select class="form-control digits" name="gift">
                            <? foreach ($PRM['giftData'] as $k => $v) { ?>
                                <option value="<?= $v['id'] ?>"><?= $v['gift_name'] ?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label"><?= _L('Token_Gift_Amount') ?></label>
                        <input class="form-control" type="number" name="amount" placeholder="10" value="" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit"><?= _L('Token_Submit') ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>