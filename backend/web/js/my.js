$("#teachers-marital").change(function(){
        var marital = $('#teachers-marital').find(":selected").text();



var spouse_name = $("#teachers-spouse_name");
var spouse_phone = $("#teachers-spouse_phone");
var children = $("#teachers-number_of_children");


    if (marital=='Single'){

        spouse_name.attr("disabled", "disabled");
        spouse_phone.attr("disabled", "disabled");        
        children.attr("disabled", "disabled");

        spouse_name.val("N/A");
        spouse_phone.val("N/A");
        children.val("N/A");


    }
       else{

        spouse_name.removeAttr("disabled");
        spouse_phone.removeAttr("disabled");
        children.removeAttr("disabled");

        spouse_name.val("Name");
        spouse_phone.val("+998 ");
        children.val("0");
               
        }

});



// create payment confirmation dialog
var pagetitle=$(document).find("title").text();

if ( pagetitle == 'Create Payment')
{

    $("#w0").submit(function() {
      
       if ( !confirm('Add payment? Tolovni tasdiqlaysizmi?')) 
        return false; 
     
    });
}









