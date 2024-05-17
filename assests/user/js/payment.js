$('.btn-change-address').click(function(){

     Swal.fire({
    title: "Enter your IP address",
    input: "text",
    inputLabel: "Your IP address",
    inputValue,
    showCancelButton: true,
    inputValidator: (value) => {
        if (!value) {
        return "You need to write something!";
        }
    }
    });
    if (ipAddress) {
    Swal.fire(`Your IP address is ${ipAddress}`);
    }
})