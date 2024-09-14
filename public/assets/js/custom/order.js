$(document).ready(function(){
    $('.add-product-btn').on('click' , function(e){

        e.preventDefault();//fuction to stop reload page

        //get id+name+price of product
        var id = $(this).data('id');
        var name = $(this).data('name');
        var price = $.number($(this).data('price'),2);

        //remove btn-success from add porduct
        $(this).removeClass('btn-info').prop('disabled', true);

        var html = 
            `<tr>
                <td>${name}</td>
                <input type="hidden" name="product_ids[]" value="${id}">
                <td><input type="number"  data-price="${price}" name="quantities[]" class="form-control input-sm product-quantity" min="1" value="1"></td>
                <td class="product-price">${price}</td>
                <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}"><i class="fa fa-trash"></i></button></td>
            </tr>`
        ;

        $('.order-list').append(html);

        calculate_total();

    });
    //function to disabled add order button
    $('body').on('click' ,'.disabled' , function(e){

        e.preventDefault();
        
    });
    //function to remove trash button from orders
    $('body').on('click' ,'.remove-product-btn' , function(e){

        e.preventDefault();

        var id = $(this).data('id');

        var $row = $(this).closest('tr');
        $row.remove();

        $('.add-product-btn[data-id="' + id + '"]').addClass('btn-info').prop('disabled', false);

        $row.find('td').eq(0).removeAttr('disabled');

        calculate_total();
    });
    
    //function to calculate quantity
    $('body').on('keyup change' , '.product-quantity',function(){

        var quantity = Number($(this).val());

        var unitPrice = parseFloat($(this).data('price').replace(/,/g,''));

        $(this).closest('tr').find('.product-price').html($.number(quantity * unitPrice , 2 ));

        calculate_total();

    });

    //function to calculate total
    function calculate_total(){

        var price = 0;

        $('.order-list .product-price').each(function(index){

            price += parseFloat($(this).html().replace(/,/g,''));

        });

        $('.total-price').html($.number(price , 2));

        //check if price > 0 undislabled add order button
        if(price > 0){
            $('#add-orders-form').prop('disabled', false)
        }else{
            $('#add-orders-form').prop('disabled', true)
        }
    }
});

//script to get product_id by category_id

// $(document).ready(function () {
//     $('#categorySelect').on('change', function () {
//         var id = $(this).val();
//         var locale = "{{ App::getLocale() }}"; // Get the current locale
//         var url = '/' + locale + '/get-products/' + id; // Dynamic locale-based URL

//         if (id) {
//             $.ajax({
//                 url: url, 
//                 type: 'GET',
//                 success: function (data) {
//                     $('#productSelect').empty(); // Clear previous options

//                     if (data.length === 0) {
//                         $('#productSelect').append('<option>No products available</option>');
//                     } else {
//                         $.each(data, function (key, product) {
//                             // Get product name based on locale
//                             var productName = (locale === 'ar') ? product.name_ar : product.name_en;
//                             $('#productSelect').append('<option value="' + product.id + '">' + productName + '</option>');
//                         });
//                     }
//                 },
//                 error: function () {
//                     $('#productSelect').empty().append('<option>Error loading products</option>');
//                 }
//             });
//             $('#productSelect').prop('disabled', false); // Enable product select field
//         } else {
//             $('#productSelect').prop('disabled', true); // Disable if no category selected
//         }
//     });
// });