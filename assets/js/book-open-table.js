jQuery(document).ready(function($) {
    $("#cms-open-table-date").datepicker({
        dateFormat: open_table.date_format,
        minDate: new Date(),
        onClose: function(date, obj) {
            console.log(obj);
            var str = obj.selectedYear + '-' + (obj.selectedMonth + 1) + '-' + obj.selectedDay;
            var time = $('#cms-open-table-time').val();
            $('[name="datetime"]').val(str + 'T' + time);
        }
    });
    $('#cms-open-table-time').on('change', function(e) {
        e.preventDefault();
        var getdate = $('#cms-open-table-date').datepicker('getDate');
        var str = getdate.getFullYear() + '-' + (getdate.getMonth() + 1) + '-' + getdate.getDate();
        var time = $(this).val();
        $('[name="datetime"]').val(str + 'T' + time);
    })
})