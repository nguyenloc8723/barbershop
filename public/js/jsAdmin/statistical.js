$(document).ready(function() {

    function gd(year, day, month) {
        return new Date(year, month - 1, day).getTime();
    }

    $('.dashboard-filter').change(function() {
        var dashboard_value = $(this).val();
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: "{{url('/dashboard-filter')}}",
            method: 'POST',
            dataType: 'JSON',
            data: {dashboard_value: dashboard_value, _token: _token},

            success: function(data) {
                chartBooking.setData(data);
            }
        });
    });

    $('#btn-dashboard-filter').click(function() {
        var _token = $('input[name="_token"]').val();
        var from_date = $('#startDate').val();
        var to_date = $('#endDate').val();
        alert(from_date);
        alert(to_date);

        // $.ajax({
        //     url: "{{url('/filter-by-date')}}",
        //     method: 'POST',
        //     dataType: 'JSON',
        //     data: {from_date: from_date, to_date: to_date, _token: _token},

        //     success: function(data) {
        //         chartBooking.setData(data);
        //     }
        // });
    });
});
