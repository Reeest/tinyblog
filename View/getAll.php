<?php
foreach ($data as $post) {
    echo <<<EOT
                    <div class="blog-post" id="{$post['id']}">
                    <h2 class="blog-post-title">{$post['title']}</h2>
                    <button class="btn btn-primary btn-lg seeContent"  id="{$post['id']}" data-toggle="modal" data-target="#seeModal">
                        Посмотреть
                    </button>
                    <button class="btn btn-primary btn-lg deleteContent"  data-post-id="{$post['id']}">
                       Удалить
                    </button>
                    <p class="blog-post-meta">{$post['lastUpdateDate']}</p>
                    {$post['content']}
                    <img src="{$post['imageUrl']}">
                    </div>
EOT;
}

?>