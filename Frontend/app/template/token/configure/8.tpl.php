<div class="row">
    <div class="col-md-12">
        <form class="form theme-form" action="<?= $webRoot ?>/t/e/<?= $PRM['tokenData']['id'] ?>" method="POST">
            <input type="text" name="_csrf" hidden value="<?= $this->getCsrfToken() ?>"/>
            <div class="form-group">
                <label class="form-label"><?= _L('Token_FX') ?></label>
                <select class="form-control digits" name="fx">
                    <option value="snow"><?= _L('Token_FX_Snow') ?></option>
                    <option value="sakura"><?= _L('Token_FX_Sakura') ?></option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit"><?= _L('Token_Submit') ?></button>
            </div>
        </form>
    </div>
</div>