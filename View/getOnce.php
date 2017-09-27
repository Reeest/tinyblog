<?php

    echo <<<EOT
            <div class="input-group">
    <span class="input-group-addon">Title</span>
    <input type="text" name="js-title" class="form-control" placeholder="Username" value="{$data['title']}">
</div>

<div class="input-group">
    <span class="input-group-addon">Content</span>
    <textarea name="" class="form-control js-content" cols="15" style="height: 200px;" > {$data['content']}</textarea>

</div>

<div class="input-group">
    <span class="input-group-addon">Add an image src</span>
    <input name="js-imageUrl" type="text" class="form-control" value="{$data['imageUrl']}">
</div>
EOT;

?>
