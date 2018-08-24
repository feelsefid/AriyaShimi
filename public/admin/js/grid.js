$(document).ready(function() {
    getContents('?page=1');
    $(document).on('click', '.pagination a', function (e) {
        getContents($(this).attr('href'));
        e.preventDefault();
    });
});

function getContents(page) {
    $.ajax({
        url : page,
        type: 'get',
        dataType: 'json',
        beforeSend: function () {
            $('#grid tbody').html();
        },
        success: function (data) {
            $('#grid tbody').html(data);
        }
    });
}

//######################################################################################################################
$(document).delegate('#search', 'submit', function (e) {
    e.preventDefault();

    var data = {};
    $.each($('[name^="srch_"]'), function(){
        data[$(this).attr('name')] = $(this).val();
    });

    $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: data,
        dataType: 'json',
        beforeSend: function () {
            $('#grid tbody').html();
        },
        success: function (data) {
            $('#grid tbody').html(data);
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
        }
    });
});

$(document).delegate('input[name^="srch_"], select[name^="srch_"]', 'keyup change', function () {
    $('#search').submit();
});

//######################################################################################################################
$(document).delegate('label[for^="chk-"]', 'click', function () {
    if($('input[name="items[]"]:checked').length < $('input[name="items[]"]').length)
    {
        $('input[name="selectAll"]').prop('checked', false).parent().removeClass('checked').addClass('unchecked');
    } else {
        $('input[name="selectAll"]').prop('checked', true).parent().removeClass('unchecked').addClass('checked');
    }

    if($(this).find('input').prop('checked')) {
        $(this).removeClass('unchecked').addClass('checked');
    } else {
        $(this).removeClass('checked').addClass('unchecked');
    }
});


$(document).delegate('input[name="selectAll"]', 'click', function () {
    if($(this).prop('checked')) {
        $(this).parent().removeClass('unchecked').addClass('checked');
        $('input[name="items[]"]').prop('checked', true).parent().removeClass('unchecked').addClass('checked');
    } else {
        $(this).parent().removeClass('checked').addClass('unchecked');
        $('input[name="items[]"]').prop('checked', false).parent().removeClass('checked').addClass('unchecked');
    }
});

//#### Delete record from grid #########################################################################################
$('.delete').click(function (e) {
    e.preventDefault();
    if($('input[name="items[]"]:checked').length < 1) {
        $("#alertModal").on('show.bs.modal', function () {
            $('#alertModal .modal-footer button#yes').hide();
            $('#alertModal .modal-body p').html('هیچ رکوردی انتخاب نشده است!');
            $('#alertModal .modal-title').html('هشدار!');
            $('#alertModal .modal-footer button#no').text('بستن');
        }).modal('show');

        return false;
    }

    $('#deleteModal').modal('show');
});

$('#deleteModal .modal-footer button#yes').click(function () {
    var data = [];
    $.each($('input[name="items[]"]:checked'), function (key, value) {
        data[key] = value.value;
    });

    $.ajax({
        url: $('.delete').attr('href') + '/' + data,
        type: 'DELETE',
        beforeSend: function () {
            $('.delete').attr('disabled', true);
            $('.delete i').removeClass('fa-trash').addClass('fa-refresh fa-spin');
        },
        success: function (data) {
            $('.delete').attr('disabled', false);
            $('.delete i').removeClass('fa-refresh fa-spin').addClass('fa-trash');
            var canNotDelete = '';
            var deleted = [];
            console.log(data);
            if(data.canNotDelete) {
                var msg = '';
                if(data.canNotDeleteId == 1) {
                    msg = 'منوی ' + data.canNotDelete.name + ' قابل حذف نمی باشد!';
                } else {
                    msg = 'برای گزینه  "' + data.canNotDelete.name + '" زیر گروه تعریف شده است، لطفاً ابتدا زیرگروه ها را حذف نمایید!';
                }

                $("#alertModal").on('show.bs.modal', function () {
                    $('#alertModal .modal-footer button#yes').hide();
                    $('#alertModal .modal-body p').addClass('text-danger').html(msg);
                    $('#alertModal .modal-title').html('هشدار!');
                    $('#alertModal .modal-footer button#no').text('بستن');
                }).modal();

                $('input[type="checkbox"]:checked').prop('checked', false).parent().removeClass('checked').addClass('unchecked');

                return false;
            }
            $.each(data.deleted, function (key, value) {
                $('input[value="' + value + '"]').parent().parent().parent().hide(500, function() { $(this).remove()});
            });
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

//#### Active record on grid ###########################################################################################
$('.actived').click(function (e) {
    e.preventDefault();

    if($('input[name="items[]"]:checked').length < 1) {
        $("#alertModal").on('show.bs.modal', function () {
            $('#alertModal .modal-footer button#yes').hide();
            $('#alertModal .modal-body p').html('هیچ رکوردی انتخاب نشده است!');
            $('#alertModal .modal-title').html('هشدار!');
            $('#alertModal .modal-footer button#no').text('بستن');
        }).modal();

        return false;
    }

    var data = [];
    $.each($('input[name="items[]"]:checked'), function (key, value) {
        data[key] = value.value;
    });

    $.ajax({
        url: $(this).attr('href') + '/' + data,
        type: 'put',
        data: { 'status': 1, id: data },
        beforeSend: function () {
            $('.actived').attr('disabled', true);
            $('.actived i').removeClass('fa-star').addClass('fa-refresh fa-spin');
        },
        success: function (data) {
            $('.actived').attr('disabled', false);
            $('.actived i').removeClass('fa-refresh fa-spin').addClass('fa-star');
            $('input[name="items[]"]:checked').parent().parent().parent().find('i.fa-star-o')
                .removeClass('fa-star-o')
                .addClass('fa-star')
                .attr('style', 'color: #5cb85c');
            $('input[name="items[]"]:checked').parent().parent().parent().find('a span').text('فعال');
            $('input[type="checkbox"]:checked').prop('checked', false).parent().removeClass('checked').addClass('unchecked');
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

//#### Deactive record on grid #########################################################################################
$('.deactived').click(function (e) {
    e.preventDefault();

    if($('input[name="items[]"]:checked').length < 1) {
        $("#alertModal").on('show.bs.modal', function () {
            $('#alertModal .modal-footer button#yes').hide();
            $('#alertModal .modal-body p').html('هیچ رکوردی انتخاب نشده است!');
            $('#alertModal .modal-title').html('هشدار!');
            $('#alertModal .modal-footer button#no').text('بستن');
        }).modal();

        return false;
    }

    var data = [];
    $.each($('input[name="items[]"]:checked'), function (key, value) {
        data[key] = value.value;
    });

    $.ajax({
        url: $(this).attr('href') + '/' + data,
        type: 'PUT',
        data: { 'status': 2, id: data },
        beforeSend: function () {
            $('.deactived').attr('disabled', true);
            $('.deactived i').removeClass('fa-star-o').addClass('fa-refresh fa-spin');
        },
        success: function (data) {
            $('.deactived').attr('disabled', false);
            $('.deactived i').removeClass('fa-refresh fa-spin').addClass('fa-star-o');
            $('input[name="items[]"]:checked').parent().parent().parent().find('i.fa-star')
                .removeClass('fa-star')
                .addClass('fa-star-o')
                .attr('style', 'color: red');
            $('input[name="items[]"]:checked').parent().parent().parent().find('a span').text('غیرفعال');
            $('input[type="checkbox"]:checked').prop('checked', false).parent().removeClass('checked').addClass('unchecked');
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

//#### Change status record on grid ####################################################################################
$(document).delegate('.status', 'click', function (e) {
    e.preventDefault();

    var status = $(this).data('value');
    var id = $(this).data('id');
    var i = $(this).find('i');
    var span = $(this).find('span');
    var el = $(this);

    $.ajax({
        url: $(this).attr('href') + '/' + id,
        type: 'PUT',
        data: { 'status': status, 'id': id },
        beforeSend: function () {
            $(this).attr('disabled', true);
            if(status == 1) {
                $(i).removeClass('fa-star-o').addClass('fa-refresh fa-spin');
                el.data('value', 2);
            } else {
                $(i).removeClass('fa-star').addClass('fa-refresh fa-spin');
                el.data('value', 1);
            }
        },
        success: function (data) {
            console.log(data);
            $(this).attr('disabled', false);
            if(status == 1) {
                $(i).removeClass('fa-refresh fa-spin').addClass('fa-star').attr('style', 'color: #5cb85c');
                $(span).text('فعال');
            } else {
                $(i).removeClass('fa-refresh fa-spin').addClass('fa-star-o').attr('style', 'color: red');
                $(span).text('غیرفعال');
            }
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

//## Sort Column #######################################################################################################
$('a[id^="srch_"]').click(function () {
    $('.sort input').val('');
    $('.sort i').addClass('text-default');
    $('i', this).removeClass('text-default');

    var $target = $('input[name="' + $(this).attr('id') + '"]');
    if($('i', this).hasClass('fa-arrow-circle-up')) {
        var $direction = 'asc';
        $('i', this).removeClass('fa-arrow-circle-up').addClass('fa-arrow-circle-down');
    } else {
        var $direction = 'desc';
        $('i', this).removeClass('fa-arrow-circle-down').addClass('fa-arrow-circle-up');
    }

    $target.val($direction);

    $('#search').submit();
});