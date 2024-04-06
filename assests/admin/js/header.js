
  

function moveNav() {
    if( $('#sidebar-header').css('width') === '150px' ){
        $('#sidebar-header').css('width', '250px') ;
        $('#logo').css('width', '70%');
        $('#content').css('margin-left', '250px');
        $('.item-sidebar').css('display','block');
        $('.move-sidebar').css('left', '190px')

    } else {
        $('#sidebar-header').css('width', '150px');
        $('#logo').css('width', '100%');
        $('#content').css('margin-left', '150px');
        $('.item-sidebar').css('display','none');
        $('.move-sidebar').css('left', '115px')
    }
    
}