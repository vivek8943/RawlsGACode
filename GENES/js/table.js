/**
 * 
 */
$( document ).ready(function() {
    $(function () {
        $('#via-javascript-table').next().click(function () {
            $(this).hide();

            $('#wordlistTable').bootstrapTable({
                method: 'post',
                url: 'Administration',
                cache: false,
                height: 400,
                striped: true,
                pagination: true,
                pageSize: 50,
                pageList: [10, 25, 50, 100, 200],
                search: true,
                showColumns: true,
                showRefresh: true,
                minimumCountColumns: 2,
                clickToSelect: true,
                columns: [{
                    field: 'id',
                    title: 'Item ID',
                    align: 'right',
                    valign: 'bottom',
                    sortable: true
                }, {
                    field: 'word',
                    title: 'word',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                    formatter: nameFormatter
                }]
            });
        });
    });
    
});