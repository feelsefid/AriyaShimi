$(document).ready(function () {
    $('#sortable tbody').sortable({
        update: function () {
            $(".page-loader-wrapper").show();
            $orderList=[];
            $("#sortable tbody tr").each(function () {
                $rowId=$(this).attr('data-id');
                $position=$(this).index() + 1;
                $thisRow=[];
                if($rowId!=undefined){
                    $thisRow.push($rowId);
                    $thisRow.push($position);
                    $orderList.push($thisRow)
                }
            })
            $.ajax({
                type: 'GET',
                url: '',
                data:{
                    'orderList' : $orderList
                },
                success : function ($response) {
                    $(".page-loader-wrapper").hide();
                }
            })
        }
    })
    $("#sortable tbody" ).disableSelection();
    
    $(".addVizhegi").click(function () {
        $("#vizhegi").append('<div class="vizhegiPack ">\n' +
            '                                                <div class="row clearfix" style="border-top: 1px solid #ccc;">\n' +
            '                                                    <div class="col-md-6">\n' +
            '                                                        <div class="form-group">\n' +
            '                                                            <label for="">ویژگی</label>\n' +
            '                                                            <input type="text" class="form-control" placeholder="" name="vizhegi_key[]">\n' +
            '                                                        </div>\n' +
            '                                                    </div>\n' +
            '                                                    <div class="col-md-6">\n' +
            '                                                        <div class="form-group">\n' +
            '                                                            <label for="">توضیحات</label>\n' +
            '                                                            <input type="text" class="form-control" placeholder="" name="vizhegi_value[]">\n' +
            '                                                        </div>\n' +
            '                                                    </div>\n' +
            '                                                    <a href="#" class="text-danger delete-row">\n' +
            '                                                        <i class="fa fa-trash"></i>\n' +
            '                                                    </a>\n' +
            '                                                </div>\n' +
            '                                            </div>')
    })

    $("body").on('click','.vizhegiPack .delete-row',function () {
        $(this).parents(".vizhegiPack").fadeOut(1000, function () {
            $(this).remove();
        });
    })
})