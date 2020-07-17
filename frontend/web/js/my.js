if ( $('#waiting-status').length )
{
     function disable_2_fields()
     {
     
            var status = $('#waiting-status').find(":selected").text();




    var groupid = $("#waiting-group_id");

        if (status=='Given'){

            groupid.removeAttr("disabled");
        }
           else{
                groupid.attr("disabled", "disabled");
                groupid[0].selectedIndex = 0;
            }

    }



     disable_2_fields();


    $("#waiting-status").change(function(){

     disable_2_fields();

    });


}


// create payment confirmation dialog

/*
var pagetitle=$(document).find("title").text();

if ( pagetitle == 'Create Payment')
{

    $("#w0").submit(function() {
      
       if ( !confirm('Add payment? Tolovni tasdiqlaysizmi?')) 
        return false; 
     
    });
}

*/








// printing window
var all='';
var current_td;
var counter=0;
var header='';
$('table tr td').each(function(){

    if ( counter >0 && counter <11)
    {

        current_td = $(this).text();
     
        switch (counter)
        {
            case 1: header='Name: '; break;
            case 2: header='Group ID: '; break;
            case 3: header='Days: ';
                    if ( current_td==1)
                        current_td='MWF'; 
                    else if ( current_td==2)
                        current_td='TTS'; 
                    else if ( current_td==3)
                        current_td='EVERYDAY'; 
                    else if ( current_td==4)
                        current_td='Other days'; break;

            case 4: header='Time: ';                        
                    if ( current_td==1)
                        current_td='09:00'; 
                    else if ( current_td==2)
                        current_td='10:30'; 
                    else if ( current_td==3)
                        current_td='14:00'; 
                    else if ( current_td==4)
                        current_td='15:30';
                     else if ( current_td==5)
                        current_td='Evening'; 
                    else if ( current_td==6)
                        current_td='Early morning'; 
                    else if ( current_td==7)
                        current_td='Lunchtime'; 
                      else if ( current_td==9)
                        current_td='Morning'; 
                    else if ( current_td==10)
                        current_td='Afternoon'; 
                        break; 
                        
                                              
            case 5: header='Teacher: '; break;
            case 6: header='Amount: '; break;
            case 7: header='Month: ';
            case 8: header='Type: '; break;
            case 9: header='Cashier: '; break;
            case 10: header='Date: ';            

                                      

        }

        all=all+header+current_td+'<br>';

    }


    counter++;


});





function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=700,width=500');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body style="font-family: verdana, Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;">');

  

    //mywindow.document.write('<h6> <hr>  </h6>');  
    mywindow.document.write('<h5 style="text-align: center; width=150px">Andijan Development Center <br><br>');
    mywindow.document.write(document.title  + '</h5>');
    //mywindow.document.write('<div> <img src="http://adceducate.com/files/adc-logo2018.png" width="150" /></div>');  
    // yii  -> assets - Include - try for image
    
     
    mywindow.document.write('<h6>' + all  + '</h6>');
    //mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/
    
    mywindow.print();
    mywindow.close();

    return true;
}

