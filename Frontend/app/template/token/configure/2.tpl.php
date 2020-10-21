<div class="row">
    <div class="col-md-12">
        <form class="form theme-form" action="<?= $webRoot ?>/t/e/<?= $PRM['tokenData']['id'] ?>" method="POST">
            <input type="text" name="_csrf" hidden value="<?= $this->getCsrfToken() ?>"/>
            <div class="form-group">
                <label class="form-label"><?= _L('Token_Gift_Amount') ?></label>
                <input class="form-control" type="number" name="amount" placeholder="<?= $PRM['tokenData']['config']['amount'] ?>" value="<?= $PRM['tokenData']['config']['amount'] ?>" required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit"><?= _L('Token_Submit') ?></button>
            </div>
        </form>
    </div>
</div>