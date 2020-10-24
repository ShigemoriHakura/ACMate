<div class="row">
    <div class="col-md-12">
        <form class="form theme-form" action="<?= $webRoot ?>/t/e/<?= $PRM['tokenData']['id'] ?>" method="POST">
            <input type="text" name="_csrf" hidden value="<?= $this->getCsrfToken() ?>"/>
            <div class="form-group">
                <label class="form-label"><?= _L('Token_Live_Text') ?></label>
                <input class="form-control" type="text" name="text" placeholder="<?=$PRM['tokenData']['config']['text']?>" value="<?=$PRM['tokenData']['config']['text']?>" required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit"><?= _L('Token_Submit') ?></button>
            </div>
        </form>
    </div>
</div>