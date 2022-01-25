<div class="row mb-3 g-3 align-items-center email">
    <div class="col-auto">
        <input type="email" class="form-control" name="email[<?=($GLOBALS['number']?$GLOBALS['number']:$GLOBALS['data']->id);?>]" placeholder="Email" value="<?=(isset($GLOBALS['data']->value)?$GLOBALS['data']->value:'');?>">
    </div>
    <div class="col-auto">
        <input class="form-check-input" type="radio" name="radioEmail[<?=($GLOBALS['number']?$GLOBALS['number']:$GLOBALS['data']->id);?>]"<?=($GLOBALS['data']->basic?' checked':'');?>>
    </div>
    <div class="col-auto">
        <span class="form-text">
            Select main.
        </span>
    </div>
</div>