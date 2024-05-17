$('.btn-modal-change-address').click(function(){
    let newAddress = $('#change-customer-address').val();
   $('#customer-address').text(newAddress);
   $('#change-customer-address').val('');
})

