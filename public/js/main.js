$(".datepicker.mydate").datepicker({
    onSelect: function (dateText, inst) {
        var date = $(this).val();
        //var time = $('#time').val();
        //alert('on select triggered '+date);
        //  $("#start").val(date + time.toString(' HH:mm').toString());


        if (date.length < 8) {

            $(this).css('border-color', 'red');
            isvalid = 0;
            return false;
        }

        else
            $(this).css('border-color', '#cccccc');

        $(this).parent('div').next('div').first().children().first().html("");

        // alert($(this).parent('div').next('div').first().children().first().html());
        return true;

    },
    duration: "slow",
    dateFormat: "yy-mm-dd"
});

