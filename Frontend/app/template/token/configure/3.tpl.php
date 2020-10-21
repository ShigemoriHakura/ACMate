<div class="row">
    <div class="col-md-12">
        <form class="form theme-form" action="<?= $webRoot ?>/t/e/<?= $PRM['tokenData']['id'] ?>" method="POST">
            <input type="text" name="_csrf" hidden value="<?= $this->getCsrfToken() ?>"/>
            <div class="form-group">
                <label class="form-label"><?= _L('Token_TTS_Speed') ?></label>
                <input class="form-control" type="number" name="speed" placeholder="6" value="<?= $PRM['tokenData']['config']['speed'] ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label"><?= _L('Token_TTS_Pitch') ?></label>
                <input class="form-control" type="number" name="pitch" placeholder="6" value="<?= $PRM['tokenData']['config']['pitch'] ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label"><?= _L('Token_TTS_Volume') ?></label>
                <input class="form-control" type="number" name="volume" placeholder="6" value="<?= $PRM['tokenData']['config']['volume'] ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label"><?= _L('Token_TTS_Person') ?></label>
                <select class="form-control digits" name="person">
                    <option value="0" <?if($PRM['tokenData']['config']['person'] == 0){echo("selected");}?>>度小美</option>
                    <option value="1" <?if($PRM['tokenData']['config']['person'] == 1){echo("selected");}?>>度小宇</option>
                    <option value="3" <?if($PRM['tokenData']['config']['person'] == 3){echo("selected");}?>>度逍遥</option>
                    <option value="4" <?if($PRM['tokenData']['config']['person'] == 4){echo("selected");}?>>度丫丫</option>
                </select>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <input id="checkbox" name="gift" type="checkbox" <?if($PRM['tokenData']['config']['gift'] == true){echo("checked");}?>>
                    <label for="checkbox"><?= _L('Token_TTS_Gift') ?></label>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit"><?= _L('Token_Submit') ?></button>
            </div>
        </form>
    </div>
</div>