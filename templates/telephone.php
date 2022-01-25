<div class="row mb-3 g-3 align-items-center telephone">
    <div class="col-auto">
        <input type="tel" class="form-control" placeholder="Telephone" name="telephone[<?=($GLOBALS['number']?$GLOBALS['number']:$GLOBALS['data']->id);?>]" value="<?=(isset($GLOBALS['data']->value)?$GLOBALS['data']->value:'');?>">
    </div>
    <div class="col-auto">
        <input class="form-check-input" type="radio" name="radioTelephone[<?=($GLOBALS['number']?$GLOBALS['number']:$GLOBALS['data']->id);?>]"<?=($GLOBALS['data']->basic?' checked':'');?>>
    </div>
    <div class="col-auto">
        <span class="form-text">
            Select main.
        </span>
    </div>
</div>