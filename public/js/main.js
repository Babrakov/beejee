$(document).ready(function () {

    $('#datatable').DataTable({
        "language": {
            "url": "/js/Russian.json"
        },
        retrieve: true,
        "iDisplayLength": 3,
        "aaSorting": [[1, 'asc']],
        "aoColumnDefs": [
            {'bSortable': false, 'aTargets': [0,2]}
        ],
    });


    $('.mass').click(function () {
        if ($(this).is(":checked")) {
            $('.single').each(function () {
                if ($(this).is(":checked") == false) {
                    $(this).click();
                }
            });
        } else {
            $('.single').each(function () {
                if ($(this).is(":checked") == true) {
                    $(this).click();
                }
            });
        }
    });

});