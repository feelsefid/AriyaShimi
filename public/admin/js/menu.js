function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/ /g,'-')
        ;
}

$('input[name="name"]').keyup(function () {
    $('input[name="slug"]').val(convertToSlug($(this).val()));
});

var baseURL = $('base').attr('href');
//######################################################################################################################
$('select[name="type"]').change(function () {
    $('#menu_level_2').fadeOut(500);
    var html = '';

    //======================================================================================================
    if($(this).val() == 'link')
    {
        html += '<input name="link" class="form-control" placeholder="http://www.example.com">';

        $('#menu_level_1').hide().html(html).fadeIn(500);
    }

    //======================================================================================================
    else if($(this).val() == 'article')
    {
        $.ajax({
            url: baseURL + '/api/getArticleCategoriesList',
            type: 'GET',
            success: function (data) {
                html += '<select name="menu_level_1" class="form-control" data-role="article">';
                html += '<option value="">دسته بندی مطلب</option>';
                $.each(data, function (key, value) {
                    html += '<option value="' + key + '">' + value + '</option>';
                });
                html += '</select>';

                $('#menu_level_1').hide().html(html).fadeIn(500);
            }
        });
    }

    //======================================================================================================
    else if($(this).val() == 'category')
    {
        $.ajax({
            url: baseURL + '/api/getArticleCategoriesList',
            type: 'GET',
            success: function (data) {
                html += '<select name="link" class="form-control">';
                html += '<option value="">عنوان دسته بندی</option>';
                $.each(data, function (key, value) {
                    html += '<option value="' + 'article_categories/' + key + '">' + value + '</option>';
                });
                html += '</select>';

                $('#menu_level_1').hide().html(html).fadeIn(500);
            }
        });
    }

    //======================================================================================================
    else if($(this).val() == 'module')
    {
        $.ajax({
            url: baseURL + '/api/getModuleList',
            type: 'GET',
            success: function (data) {
                html += '<select name="link" class="form-control">';
                html += '<option value="">عنوان ماژول</option>';
                $.each(data, function (key, value) {
                    html += '<option value="' + key + '">' + value + '</option>';
                });
                html += '</select>';

                $('#menu_level_1').hide().html(html).fadeIn(500);
            }
        });
    }

    //======================================================================================================
    else
    {
        $('#menu_level_1, #menu_level_2').fadeOut(500);
    }
});

//######################################################################################################################
$(document).delegate('select[name="menu_level_1"]', 'change', function () {
    var html = '';
    var id = $(this).val();
    var url = '';
    switch ($(this).data('role')) {
        case 'article' :
            url = baseURL + '/api/getArticleList/' + id;
            break;
    }

    //======================================================================================================
    if(id > 0 || id != null) {
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                html += '<select name="link" class="form-control" style="margin-top: 10px">';
                html += '<option value="">عنوان مطلب</option>';
                $.each(data, function (key, value) {
                    html += '<option value="' + '/' + key + '">' + value + '</option>';
                });
                html += '</select>';

                $('#menu_level_2').hide().html(html).fadeIn(500);
            }
        });
    }

    //======================================================================================================
    else {
        $('#menu_level_2').hide(500).html('');
    }
});