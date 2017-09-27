<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <link rel="shortcut icon" href="favicon.ico">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</head>
<body>
<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
        </nav>
    </div>
</div>
<div class="container">

    <div class="blog-header">
        <h1 class="blog-title">The Bootstrap Blog</h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
    </div>
    <ul class="pager">
        <li><a class="js-New" data-toggle="modal" data-target="#myModal">Add new</a></li>
    </ul>
    <div class="row">

        <div class="col-sm-11 blog-main mainContent">

            <?php
            foreach ($data as $post) {
                echo <<<EOT
                    <div class="blog-post"> 
                    <h2 class="blog-post-title">{$post['title']}</h2> 
                    <button class="btn btn-primary btn-lg seeContent"  id="{$post['id']}" data-toggle="modal" data-target="#seeModal">
                        Посмотреть
                    </button>
                    <button class="btn btn-primary btn-lg deleteContent"  data-post-id="{$post['id']}">
                       Удалить
                    </button>
                    <p class="blog-post-meta">{$post['lastUpdateDate']}</p>
                    <p>    <img src="{$post['imageUrl']}"></p>
                    {$post['content']}
                    
EOT;
            }

            ?>

        </div><!-- /.blog-main -->
    </div><!-- /.blog-sidebar -->

</div><!-- /.row -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Добавить новую запись</h4>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-addon">Title</span>
                    <input type="text" name="js-title" class="form-control" placeholder="Username">
                </div>

                <div class="input-group">
                    <span class="input-group-addon">Content</span>
                    <textarea name="" class="form-control js-content" cols="15" style="height: 200px;"></textarea>

                </div>

                <div class="input-group">
                    <span class="input-group-addon">Add an image src</span>
                    <input name="js-imageUrl" type="text" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <div type="button" class="btn btn-default" data-dismiss="modal">Закрыть</div>
                <div type="button" class="btn btn-primary js-addNew">Сохранить изменения</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="seeModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Просмотр</h4>
            </div>
            <div class="modal-body getContent">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary js-Update">Сохранить изменения</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>