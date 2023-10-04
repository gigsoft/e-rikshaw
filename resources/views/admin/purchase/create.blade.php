@extends('admin.layouts.master',['layout'=>'purchase'])
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Supplier</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('admin.purchase')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <!-- /.content -->
    <form action="{{ route('admin.purchase.store') }}" method="post" id="user-form">
        @csrf
        <input type="hidden" name="grand_total" id="grand_total">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="name">Vehicle Models</label>

                                <select id="vehicle_id" name="vehicle_id" class="form-control" required>
                                    <option value="">Select Model </option>
                                    @if($vehicle_models)
                                    @foreach ($vehicle_models as $model)
                                    <option value="{{ $model['id'] }}">{{ $model['name'] }}</option>
                                    @endforeach
                                 @endif
                                </select>
                                <span class="text-danger" id="name-error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="supplier_name">Supplier Name</label>
                                <input type="text" name="supplier_name" id="supplier_name" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="supplier_contact_no"> Supplier Contact No</label>
                                <input type="text" name="supplier_contact_no" id="supplier_contact_no" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h3 class="card-title"><strong>Items</strong></h3>
                    </div>
                    <div class="row">
                        {{-- <div class="invoice_table_list"> --}}
                           <table class="table table-bordered">
                              <thead>
                                 <tr>
                                    <th>Item</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody id="invoice_table_list" data-gstrate="">
                             <tr>
                                 <td>
                                     <select name="invoice[0][item]" id="item_0" class="form-select form-control selected_item" required>
                                       <option value="">Select Item</option>
                                           @if($item)
                                               @foreach ($item as $row)
                                                  <option value="{{ $row->id }}">{{ $row->name }}</option>
                                               @endforeach
                                            @endif
                                         </select>
                                </td>
                                       <td>
                                          <input type="text" name="invoice[0][qty]" id="qty_0" class="form-control " required />
                                       </td>
                                       <td>
                                          <input type="text" name="invoice[0][price]" id="price_0" class="form-control invoice_rate invoice_value" required />
                                       </td>
                                       <td>
                                          <input type="text" name="invoice[0][total]" id="total"  class="form-control required invoice_value invoice-item"  required/>
                                       </td>
                                       <td>
                                          <a href="javascript:void(0)" data-mode="add" class="btn btn-primary add-more-invoice-value"><i class="fa fa-plus-circle"></i> More</a>
                                       </td>
                             </tr>
                              </tbody>
                              <tbody>
                                <tr id="total_invoice_row">
                                        <td></td>
                                        <td colspan="3" class="text-center total_price">Total Price</td><td id="total_price"></td><td></td>
                                     </tr>
                              </tbody>
                            </table>
                     </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
@endsection

@section('customJs')
<script>
    $(document).ready(function() {
        // Attach an event listener to input fields for quantity and price
        $(document).on('keyup', '.invoice_value', function() {
            calculateTotal($(this));
        });

    
        // Function to calculate the total
        function calculateTotal(inputField) {
            var $row = inputField.closest('tr');
            var qty = parseFloat($row.find('input[name^="invoice["][name$="][qty]"]').val()) || 0;
            var price = parseFloat($row.find('input[name^="invoice["][name$="][price]"]').val()) || 0;
            var total = qty * price;
            $row.find('input[name^="invoice["][name$="][total]"]').val(total.toFixed(2));
            $('#grand_total').val(total.toFixed(2))
            updateTotalPrice();
        }

        // Function to update the total price
        function updateTotalPrice() {
            var total = 0;
                $('input[name^="invoice["][name$="][total]"]').each(function() {
                total += parseFloat($(this).val()) || 0;
                });

                $('#total_price').text(total.toFixed(2));
                $('#grand_total').val(total.toFixed(2))
            var totalprice_price = $('#total_price').text();
                //console.log("checked::::"+totalprice_price);
        }
                 // Add a new row
        $('.add-more-invoice-value').click(function() {
            var $table = $('#invoiceTable');
            var newRow = $table.find('tr:first').clone();
            // Clear input values in the new row
            newRow.find('.invoice_value').val('');
            // Append the new row to the table
            $table.append(newRow);
        });

        // Remove a row
        $(document).on('click', '.delete-row', function() {
            var $row = $(this).closest('tr');
            $row.remove();
            // Recalculate total price after removing a row
            updateTotalPrice();
        });

    });
</script>


@endsection
@section('flash')
  @include('admin.flash_message.message')
@endsection
