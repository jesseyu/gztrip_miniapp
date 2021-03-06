<link href="/assets/themes/css/core.css" rel="stylesheet" type="text/css" media="screen"/>
<h2 class='contentTitle'><?php echo $title; ?></h2>
<div class='pageContent'>
    <form method='post' action='<?= URL('point/addpoint'); ?>' class='pageForm required-validate' enctype="multipart/form-data" onsubmit="return iframeCallback(this);">
        <div class='pageFormContent nowrap' layoutH='97'>
            <dl>
                <dt>名称：</dt>
                <dd>
                    <input type='text' name='name' maxlength='255' class='required'/>
                    <span class='info'></span>
                </dd>
            </dl>
            <dl>
                <dt>地区:</dt>
                <dd>
                    <select class="combox" name="city_id">
                        <?php foreach ($citys as $key => $name) { ?>
                            <?php if ($data['city_id'] == $key) { ?>
                                <option selected value="<?= $key; ?>"><?= $name; ?></option>
                            <?php } else { ?>
                                <option value="<?= $key; ?>"><?= $name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>图片：</dt>
            </dl>
            <dl>
                <div class="unit">
                    <ul id="upload-preview" class="upload-preview">
                        <?php if (isset($data['imgs'])) { ?>
                            <?php foreach ($data['imgs'] as $img) { ?>
                                <li class="thumbnail"><img src="<?= $img ?>" data-width="0" data-height="0" width="80">
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                    <div class="upload-wrap" rel="#upload-preview">
                        <input type="file" name="imgs[]" accept="image/*" multiple="multiple" style="left: 0px;">
                    </div>
                </div>
            </dl>
            <dl>
                <dt>口味：</dt>
                <dd>
                    <input type='text' name='taste' maxlength='255' />
                    <span class='info'></span>
                </dd>
            </dl>
            <dl>
                <dt>哪里买：</dt>
                <dd>
                    <input type='text' name='where' maxlength='255'/>
                    <span class='info'></span>
                </dd>
            </dl>
            <div class='divider'></div>
        </div>
        <div class='formBar'>
            <ul>
                <input type='hidden' name='isPost' value='1'/>
                <li>
                    <div class='buttonActive'>
                        <div class='buttonContent'>
                            <button type='submit'>提交</button>
                        </div>
                    </div>
                </li>
                <li>
                    <div class='button'>
                        <div class='buttonContent'>
                            <input type='hidden' name='type' maxlength='100' value="specialty"/>
                            <button type='button' class='close'>取消</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </form>
</div>