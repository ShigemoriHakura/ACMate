<div class="row">
    <div class="col-md-12">
        <form class="form theme-form" action="<?= $webRoot ?>/t/e/<?= $PRM['tokenData']['id'] ?>" method="POST">
            <input type="text" name="_csrf" hidden value="<?= $this->getCsrfToken() ?>"/>
            <div class="form-group">
                <label class="form-label"><?= _L('Token_Live_Time') ?></label>
                <input class="form-control" type="number" name="live" placeholder="10" value="<?=$PRM['tokenData']['config']['liveTime']?>" required>
            </div>
            <div class="form-group">
                <label class="form-label"><?= _L('Token_Live_Text') ?>1</label>
                <input class="form-control" type="text" name="text1" placeholder="下播倒计时！" value="<?=$PRM['tokenData']['config']['liveText1']?>" required>
            </div>
            <div class="form-group">
                <label class="form-label"><?= _L('Token_Live_Text') ?>2</label>
                <input class="form-control" type="text" name="text2" placeholder="下播倒计时！" value="<?=$PRM['tokenData']['config']['liveText2']?>" required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit"><?= _L('Token_Submit') ?></button>
            </div>
        </form>
    </div>
</div>