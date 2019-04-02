$(document).ready(function () {
    $('#btnSearch').on('click', function (e) {
        e.preventDefault()
        var from = $('#from option:selected').val();
        var to = $('#to option:selected').val();
        var departure = $('#departure').val();
        var way_type = $("input[name='flight_type']:checked").val();
        var return_day = $('#return_day').val();
        var flight_class = $('#flight_class option:selected').val();
        var total_person = $('#total_person option:selected').val();


        if (way_type == "one-way") {
            if (from && to && departure && way_type && flight_class && total_person) {
                if (from == to) {
                    alert("Nơi đến và nơi đi không được trùng nhau");
                    return false;
                } else {
                    $('#search').submit()
                }
            } else
            {
                alert("Vui lòng chọn đầy đủ thông tin yêu cầu");
                return false;
            }
        } else {
            if (from && to && departure && way_type && return_day && flight_class && total_person) {
                if (from == to) {
                    alert("Nơi đến và nơi đi không được trùng nhau");
                    return false;
                } else if (departure > return_day) {
                    alert("Ngày về phải lớn hơn ngày đi");
                    return false;
                } else {
                    $('#search').submit()
                }
            } else
            {
                alert("Vui lòng chọn đầy đủ thông tin yêu cầu");
                return false;
            }
        }
    }),
            $('#one_way').on('click', function (e) {
        $('#returnn_day').css('display', 'none')
    }),
            $('#Return').on('click', function (e) {
        $('#returnn_day').css('display', 'block')
    })
});

