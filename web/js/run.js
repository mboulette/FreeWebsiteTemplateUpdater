$( document ).ready(function() {
    $cancel = false;

    $('.branche_thumb').hover(
        function(){
            $(this).attr('width', '215');
            $(this).css('z-index', 100);
        },
        function(){
            $(this).attr('width', '16');
            $(this).css('z-index', 0);
        }
    );

    $('#btn_next').on('click', function(){
        $last = $(':checkbox').index($(':checked:last'))+1;
        $(':checkbox:checked').prop('checked', false);
        $(':checkbox').slice($last,$last+5).prop('checked', true);

        if ($(':checkbox:checked').size() > 0 ) {
            $(document.body).animate({scrollTop: $(':checkbox:checked').first().offset().top-50}, 100);
        }
    });

    $('#btn_cancel').on('click', function(){
        $cancel = true;
    });

    $('#btn_reset').on('click', function(){
        $('.result i').html('+');
        $('.result span').html('&nbsp;');
        $('.result div').html('&nbsp;').hide();
    });

    $('#btn_select_all').on('click', function(){
        $(':checkbox').prop('checked', true);
    });

    $('#btn_unselect_all').on('click', function(){
        $(':checkbox:checked').prop('checked', false);
    });

    $('.result span, .result i').on('click', function(){
        $(this).parent().children('div').toggle();
        if ($(this).parent().children('i').html() == '+') {
            $(this).parent().children('i').html('-');
        } else {
            $(this).parent().children('i').html('+');
        }
    });

    $('#btn_run').on('click', function(){
        if ($(':checkbox:checked').size() > 0) {
            $id = $(':checkbox:checked:first').data('id');
            $('input, button').not('#btn_cancel').prop('disabled', true);
            patch($id);
        }
    });

    patch = function(id){
        $('#result_'+id+' span').html('<img src="img/ajax_loading.gif" />');

        $.ajax({
            type: 'POST',
            url: 'run.php',
            data: 'branch='+$('#branche_'+id).val()

        }).fail(function(xhr, msg){
            $('#result_'+id+' span').html('<font color="red">Error!</font>');
            $('#result_'+id+' div').html(xhr.responseText);

        }).done(function(data){
            $('#result_'+id+' span').html('<font color="green">Done!</font>');
            $('#result_'+id+' div').html(data);

            if ($(':checkbox:gt('+id+')').filter(':checked').size() > 0 ) {
                $next_id = $(':checkbox:gt('+id+')').filter(':checked').data('id');

                if (!$cancel) {
                    patch($next_id);
                } else {
                    $cancel = false;
                    $('#result_'+$next_id+' span').html('Canceled!');
                    $('input, button').removeAttr('disabled');
                }
            } else {

                $('input, button').removeAttr('disabled');
            }
        });
    }

});