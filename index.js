$( function() {
    $( "#enddate" ).datepicker();
  } );

$('.portal-header span').click(function(){
    
    $('.portal-header span').each(function(){
        $(this).removeClass('active');
    });
    $(this).addClass('active');

    if($(this).attr('id')=='prds'){
        $('#your-products').toggle();
        $('#add-product').hide();
        $('#transaction-history').hide();
        $('#edit-products').hide();
        $('#remove-products').hide();
    }
    else if($(this).attr('id')=='add'){
        $('#add-product').toggle();
        $('#your-products').hide();
        $('#transaction-history').hide();
        $('#edit-products').hide();
        $('#remove-products').hide();
    }
    else if($(this).attr('id')=='transact'){
        $('#transaction-history').toggle();
        $('#your-products').hide();
        $('#add-product').hide();
        $('#edit-products').hide();
        $('#remove-products').hide();
    }
    else if($(this).attr('id')=='edit'){
        $('#edit-products').toggle();
        $('#your-products').hide();
        $('#add-product').hide();
        $('#transaction-history').hide();
        $('#remove-products').hide();
    }
    else if($(this).attr('id')=='remove'){
        $('#remove-products').toggle();
        $('#your-products').hide();
        $('#add-product').hide();
        $('#edit-products').hide();
        $('#transaction-history').hide();
    }

});

$('.ppost').click(function(){

    var fd = new FormData();
    var primg = $('#primg')[0].files;

    if(primg.length > 0 ){
        fd.append('primg',primg[0]); 
    fd.append('pname',$('#pr-title').val());
    fd.append('desc',$('#desc').val());
    fd.append('cat',$('#category').val());
    fd.append('price',$('#price').val());
    fd.append('enddt',$('#enddate').val());
    fd.append('sid',$('#sid').val());

    $.ajax({
        url: 'postProducts.php',
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response){
           if(response.trim() == 1){
            $('.addpdalert').show();
             $('.addpdalert').html('<button type="button" class="close" data-dismiss="alert">&times;</button><strong>Congratulations!</strong> Your Product is successfully published.');

             $('#add-product form').trigger("reset");

           }else{
              alert('file not uploaded');
           }
        },
     });

    }
});

function bid(){
    
}