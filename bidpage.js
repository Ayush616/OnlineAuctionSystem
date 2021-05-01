
function placeBid(pid, curr_bid){

    if($('#placebid').val() > curr_bid){

    $.ajax({
        url: 'placeBid.php',
        type: 'post',
        data: {pid:pid, bids:$('#placebid').val()},
        success: function(response){
           if(response.trim() == 1){
            $('.addpdalert').show();
             $('.addpdalert').html('<button type="button" class="close" data-dismiss="alert">&times;</button><strong>Congratulations!</strong> You placed your bid.');

             $('#add-product form').trigger("reset");
             $('.main .bid .price').html("&#8377; "+$('#placebid').val());

           }else{
            //   alert('file not uploaded');
           }
        },
     });

    }else{
        console.log("Bid Price should be greater than current bid price.")
    }
}