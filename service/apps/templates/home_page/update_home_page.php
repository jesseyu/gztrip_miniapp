<h2 class='contentTitle'><?php echo $title; ?></h2>
<div class='pageContent'>
    <form method='post' action='<?= URL('Homepage/updateHomepage'); ?>' class='pageForm required-validate' enctype="multipart/form-data" onsubmit="return iframeCallback(this);">
        <div class='pageFormContent nowrap' layoutH='97'>
            <input type='hidden' name='id' value='<?= $data['id']; ?>'/>
            <dl>
                <dt>slogan：</dt>
                <dd>
                    <input type='text' name='slogan' maxlength='255' value='<?= $data['slogan']; ?>'/>
                    <span class='info'></span>
                </dd>
            </dl>
            <dl>
                <dt>视频链接：</dt>
                <dd>
                    <input type='text' name='video_url' maxlength='255' value='<?= $data['video_url']; ?>'/>
                    <span class='info'></span>
                </dd>
            </dl>
            <dl>
                <dt>Banner：</dt>
            </dl>
            <dl>
                <div class="unit">
                    <ul id="upload-preview" class="upload-preview">
                        <?php if (isset($data['banners'])) { ?>
                            <?php foreach ($data['banners'] as $img) { ?>
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
                <dt>当季景点：</dt>
                <dd>
                    <input type='text' name='season_view' maxlength='255' value='<?= $data['season_view']; ?>'/>
                    <span class='info'></span>
                </dd>
            </dl>
            <dl>
                <dt>推荐景点：</dt>
                <dd>
                    <input type='text' name='recommend_view' maxlength='255' value='<?= $data['recommend_view']; ?>'/>
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
                            <button type='button' class='close'>取消</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </form>
</div>