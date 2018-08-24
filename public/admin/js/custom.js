/**
 * Created by Programmer2 on 5/26/18.
 */
$(document).ready(function () {
    $(".engName").hide();
    if($("select[name=article_categories_id]").val()==20){
        $(".engName").show();
    }
    else{
        $(".engName").fadeOut();
    }
    $("select[name=article_categories_id]").change(function () {
        if($(this).val()==20){
            $(".engName").show();
        }
        else{
            $(".engName").fadeOut();
        }
    })
})
var loading  = '<tr><td colspan="10" style="text-align: center !important; background-color: #fff">';
    loading += '';
    loading += '</td></tr>';

// File Picker modification for FCK Editor v2.0 - www.fckeditor.net
var urlobj;

var baseURL = $('base').attr('href');

// ## active Or deactive And yes Or no Buttons #########################################################################
$('.on').click(function () {
    $(this).parent().find('.btn').removeClass('bg-blush').addClass('btn-default')
    $(this).addClass('bg-green')
});

$('.off').click(function () {
    $(this).parent().find('.btn').removeClass('bg-green').addClass('btn-default')
    $(this).addClass('bg-blush')
});

$('.btn-save').click(function() {
    var content = $(this).data('content');
    $("#saveMethod").val(content);
});

//## Clone new row #####################################################################################################
$('.btn-clone').click(function () {
    var $target = $(this).data('target').split('|');
    var $clone = $('#' + $target[0] + ' .clone-row:last-child').clone();

    $.each($target, function(key, val) {
        var $id = parseInt($($clone).find('input[name^="' + val + '"]').attr('id').split('-')[1]) + 1;
        $id = val + '-' + $id;

        $($clone).find('input[name^="' + val + '"]').attr('id', $id).val('');

        $($clone).find('span[id^="span-' + val + '"]').attr('onclick', "BrowseServer('" + $id + "');");
    });

    $('#' + $target[0]).append($clone);
});
//### delete clone row #################################################################################################
var child = +$('.clone-row').children().length;
$(document).on('click','.delete-row', function (e) {
    if($(this).parents(".clone-row").is(':last-child')){
        return;
    }
    e.preventDefault();
    var url = $(this).attr('href');
    var el = $(this);
    var $parent = $(this).parent().parent().attr('id');

    $.ajax({
        url: url,
        type: 'post',
        data: {
            _token: $('[name="csrf-token"]').attr('content'),
            image: $(this).data('image'),
            thumb: $(this).data('thumb'),
            video: $(this).data('video')
        },
        beforeSend: function () {
            $('i', el).removeClass('fa-trash').addClass('fa-refresh fa-spin');
        },
        success: function (data) {
            if($('#' + $parent + ' .clone-row').length > 1) {
                el.parent().fadeOut(500, function() { $(this).remove(); });
                child -= 1;
            } else {
                $('#' + $parent + ' .clone-row').find('input[type="text"]').val('');
                $('i', el).removeClass('fa-refresh fa-spin').addClass('fa-trash');
            }
        },
        complete: function () {
            if($('#' + $parent + ' .clone-row').length > 1) {
                el.parent().fadeOut(500, function() { $(this).remove(); });
                child -= 1;
            } else {
                $('#' + $parent + ' .clone-row').find('input[type="text"]').val('');
                $('i', el).removeClass('fa-refresh fa-spin').addClass('fa-trash');
            }
        }
    });
});

//### Submit form with Ajax ############################################################################################
$('form.ajax-submit').submit(function (e) {
    e.preventDefault();

    if($('#ckeditor').val() != null)
        $('#ckeditor').val(CKEDITOR.instances.ckeditor.getData());

    var btn = $(this).find("button[type=submit]:focus" );
    var form = e.target;
    var data = new FormData(form);

    $.ajax({
        url: form.action,
        method: form.method,
        processData: false,
        contentType: false,
        data: data,
        dataType: 'json',
        beforeSend: function () {
            $(btn).attr('disabled', true);
            $('span', btn).removeClass('fa-check').addClass('fa-refresh fa-spin');
        },
        success: function (data) {
            console.log(data);
            $(btn).attr('disabled', false);
            $('span', btn).removeClass('fa-refresh fa-spin').addClass('fa-check');

            if(data.hasError) {
                var errors = '<ul>';
                $.each(data.errorMessage, function (key, value) {
                    errors += '<li class="text-danger">' + value + '</li>';
                });
                errors += '</ul>';

                $("#alertModal").on('show.bs.modal', function () {
                    $('#alertModal .modal-footer button#yes').hide();
                    $('#alertModal .modal-body p').html(errors);
                    $('#alertModal .modal-title').html('هشدار!');
                    $('#alertModal .modal-footer button#no').text('بستن');
                }).modal();
            } else if(data.redirectPath) {
                window.location = data.redirectPath;
            }
        }
    });
});

//## Setting Clone New Row #####################################################################################################
var set_counter = false;
var counter = 0;
$('.setting-btn-clone').click(function () {

    if(set_counter == false) {
        counter = $($(this).data('target') + ' input[name="row"]').val();
        set_counter = true;
    }
    counter++;

    var $target = $(this).data('target');
    var $clone = $($target + ' div.row:last-child').clone();
    console.log($clone);

    $.each($('input[type="text"]', $clone), function (key, value) {
        var name = $(value).attr('name');

        var start_pos = name.indexOf('[');
        var end_pos = name.indexOf(']');
        var section_1 = name.substring(0, start_pos + 1);
        var section_2 = name.substring(end_pos);
        var new_name = section_1 + counter + section_2;

        $(this).attr('name', new_name);
    });

    $clone.find('input, textarea, select').val('');

    $($target).append($clone);
});
//### Setting Delete Clone Row #################################################################################################
var child = +$('.clone-row').children().length;
$(document).delegate('.delete-row', 'click', function (e) {
    e.preventDefault();
    if($(this).parents(".clone-row").is(':last-child')){
        return;
    }
    var target = $(this).data('target');
    var field = $(this).data('field');
    var url = $(this).attr('href');
    var el = $(this);
    var $parent = $(this).parent().parent().attr('id');

    $.ajax({
        url: url,
        type: 'post',
        data: {
            _token: $('[name="csrf-token"]').attr('content'),
            target: target,
            field: field
        },
        beforeSend: function () {
            $('i', el).removeClass('fa-trash').addClass('fa-refresh fa-spin');
        },
        success: function (data) {
            if($('#' + $parent + ' .clone-row').length > 1) {
                    el.parent().fadeOut(500, function() { $(this).remove(); });
                    child -= 1;

            } else {
                $('#' + $parent + ' .clone-row').find('input[type="text"]').val('');
                $('i', el).removeClass('fa-refresh fa-spin').addClass('fa-trash');
            }
        },
        complete: function () {
            if($('#' + $parent + ' .clone-row').length > 1) {
                    el.parent().fadeOut(500, function () {
                        $(this).remove();
                    });
                    child -= 1;
            } else {
                $('#' + $parent + ' .clone-row').find('input[type="text"]').val('');
                $('i', el).removeClass('fa-refresh fa-spin').addClass('fa-trash');
            }
        }
    });
});

//## Check And Uncheck #################################################################################################
$('label.chk').click(function () {
    if($(this).find('input[type=checkbox]').prop('checked') == true) {
        $(this).removeClass('btn-default').addClass('bg-green');
        $(this).find('i').addClass('fa-check').removeClass('fa-close');
    } else {
        $(this).removeClass('bg-green').addClass('btn-default');
        $(this).find('i').removeClass('fa-check').addClass('fa-close');
    }
});

$('input[type=checkbox]:checked').parent().removeClass('btn-default').addClass('bg-green');
$('input[type=checkbox]:checked').parent().find('i').addClass('fa-check').removeClass('fa-close');

//## CKEditor ##########################################################################################################
function BrowseServer(obj)
{
    urlobj = obj;
    OpenServerBrowser(
        baseURL + '/laravel-filemanager?type=Files',
        screen.width * 0.7,
        screen.height * 0.7
    );
}

function OpenServerBrowser( url, width, height )
{
    var iLeft = (screen.width - width) / 2 ;
    var iTop = (screen.height - height) / 2 ;
    var sOptions = "toolbar=no,status=no,resizable=yes,dependent=yes" ;
    sOptions += ",width=" + width ;
    sOptions += ",height=" + height ;
    sOptions += ",left=" + iLeft ;
    sOptions += ",top=" + iTop ;
    var oWindow = window.open( url, "BrowseWindow", sOptions ) ;
}

function SetUrl( url, width, height, alt )
{
    url = url.replace(baseURL, "");
    document.getElementById(urlobj).value = url ;
    oWindow = null;

    var imagecontainer = 'runtime_' + document.getElementById(urlobj).getAttribute('id');

    if (document.getElementById(imagecontainer)) {
        document.getElementById(imagecontainer).src = baseURL + url;
    }
}

var options = {
    filebrowserImageBrowseUrl: baseURL + '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
};

CKEDITOR.replace('ckeditor', options);
