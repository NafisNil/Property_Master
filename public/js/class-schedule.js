let scheduleType = $('#select_schedule_type');
scheduleType.on('change', function () {
    loadScheduleRow('change')
})


$('#add_more').on('click', function () {
    loadScheduleRow();
})

function loadScheduleRow(mode) {
    let index = $('#class_schedules_table tr:last').find('.index').val();

    let type = scheduleType.val()

    if (index) {
        index = parseInt(index) + 1;
    } else {
        index = 0;
    }

    $.ajax({
        url: `/get-class-schedule-row?type=${type}&index=${index}`,
        success: function (html) {
            if (mode === 'change') {
                $('#class_schedules_table').html(html);
            } else {
                $('#class_schedules_table').append(html);
            }

        }

    })
}

$('#class_id').on('change', function () {
    let classId = this.value;
    $.ajax({
        url: '/edit-schedule-rows?class_id=' + classId,
        success: function (data) {
            let {status, type, html} = data;
            if (status === 'success') {
                $('#class_schedules_table').html(html);
                scheduleType.val(type);
            }
        }
    })
})


$(document).on('click', '.remove-item-btn', function () {
    $(this).closest('tr').remove();
})
