

$('#btn-search').click(function(){
        let keyword = $('.search-value').val(); 
        localStorage.setItem("searchValue", keyword );
        window.location.href = "../../views/user/product.php";
   
})



