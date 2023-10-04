$(document).ready(function () {
    // Counter to keep track of the row number
    var rowCount = 1;
    // Function to add a new row
function addRow() {
        var newRow = $('#invoice_table_list tr:last').clone();
        newRow.find('select, input').val(''); // Clear input values
        newRow.find('[id]').each(function () {
            var name  = $(this).attr('name');
            name      = name.replace(/\d+/, rowCount);
            $(this).attr('name', name);
            var id = $(this).attr('id');
            id = id.substring(0, id.length - 1) + rowCount;
            $(this).attr('id', id);
        });

        // Add a delete button to the new row
        newRow.find('td:last').html('<a href="javascript:void(0)" class="btn btn-danger delete-row"><i class="fa fa-trash"></i> Delete</a>');

        $('#invoice_table_list').append(newRow);
        rowCount++;

        // Attach click event handler for the delete button in the new row
        newRow.find('.delete-row').on('click', function () {
            $(this).closest('tr').remove();
        });
        // Attach change event handler for the item select in the new row
    }
        $('.add-more-invoice-value').on('click', function () {
        addRow();
        });

function calculateTotal() {
        var total = 0;
        $('input[name^="invoice"][name$="[rate]"]').each(function () {
            var rate = parseFloat($(this).val()) || 0;
            total += rate;
        });
        // Display the total in the desired location
        $('#invoice_total_val').text(total.toFixed(2));
    }
});
