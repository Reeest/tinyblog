init();

function init() {
    $('.js-addNew').one("click",
        function () {
            addNew();
        }
    );

    $('.seeContent').click(
        function () {
            see($(this).attr('id'));
        }
    );

    $('.js-Update').click(
        function () {
            edit($(this).attr('id'));
        }
    );

    $('.deleteContent').click(
        function () {
            delContent($(this).attr('data-post-id'));
        }
    );
}

function addNew() {
    $.ajax({
        type: 'POST',
        url: 'Main/addNew',
        data: {
            'title': $('input[name=js-title]').val(),
            'content': $('.js-content').val(),
            'imageUrl': $('input[name=js-imageUrl]').val()
        },
        success: function (data) {
            if (data) {
                $('.blog-main').empty().html(data);
                $('.form-control').val('');
                init();
            }
        }
    });
}

function see(id) {
    $.ajax({
        type: 'POST',
        url: 'Main/getOnce',
        data: {
            'id': id
        },
        success: function (data) {
            if (data) {
                $('.getContent').empty().html(data);
                $('.js-Update').attr('id', id);
                init();
            }
        }
    });
}

function delContent(id) {
    $.ajax({
        type: 'POST',
        url: 'Main/delete',
        data: {
            'id': id
        },
        success: function (data) {
            if (data) {
                $('.blog-main').empty().html(data);
                init();
            }
        }
    });
}

function edit(id) {
    $.ajax({
        type: 'POST',
        url: 'Main/update',
        data: {
            'id': id,
            'params': {
                'title': $('input[name=js-title]', '.getContent').val(),
                'content': $('.js-content', '.getContent').val(),
                'imageUrl': $('input[name=js-imageUrl]', '.getContent').val()
            }
        },
        success: function (data) {
            if (data) {
                $('.blog-main').empty().append(data);
                init();
            }
        }
    });
}