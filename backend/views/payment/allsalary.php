<?php
use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
//use dosamigos\datepicker\DatePicker;
use kartik\daterange\DateRangePicker;

use common\models\Teachers;

use common\models\Teacherselect;

use yii\helpers\ArrayHelper;



use common\models\Payment;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">


<?php 




            $last_month_start=date('Y-m-d', strtotime('first day of last month'));
            $last_month_end=date('Y-m-d', strtotime('last day of last month'));
 

?>

<!--  Main

 Hotel
 
 Shark
 ,
 Dialog
 
 Eski shahar  
    -->
    




     <h1> ADC salary report - (<?php echo $last_month_start." - ".$last_month_end; ?>) </h1>

<table id="mytable" class="table table-striped table-bordered table-hover"><thead>

<tr>
<th> ID </th>
<th> Name </th>
<th> Cash </th>
<th> Plastic </th>
<th> total </th>


<th> Salary % </th>
<th> Paper % </th>
<th> Nalog </th>
<th> Kommunal </th>
<th> Bonus % </th>
<th> Plastik for teacher </th>

<th> Salary </th>

</tr>
</thead>

<tbody>


 <!--  Main office teachers -->

<?php 
$t = Teacherselect::findAll([
1,2,3,4,5
]);

foreach ( $t as $rows )
{

      $branchname=$rows->branchname;
      $tanlanganlar=$rows->teacherids;
      $myValues =explode(',', $tanlanganlar);




?>

<tr><td colspan="12" style="text-align: center; color: blue; font-size: 32px"><b> <?php echo $branchname; ?> </b></td></tr>
<?php 

            $k = Teachers::find()->where(['in','id',$myValues])->all();

            foreach ( $k as $rows )
            {

            $last_month_cash = Payment::find()
            ->where([  'between','date(created_at)', $last_month_start, $last_month_end  ])
            ->andWhere(['teacher'=>$rows->id ])
            ->andWhere(['type'=>'cash'])
            ->sum('amount');

            $last_month_plastbank = Payment::find()
            ->where([  'between','date(created_at)', $last_month_start, $last_month_end  ])
            ->andWhere(['teacher'=>$rows->id ])
            ->andWhere(['or', ['type'=>'plastic'],['type'=>'bank']   ])
            //->andWhere(['type'=>'bank'])            
            ->sum('amount');


            $all=$last_month_cash+$last_month_plastbank;

            $sal_per=$rows->salary_percentage;
            $paper_per=$rows->paper_percentage;
            $nalog=$rows->nalog;
            $kommunal=$rows->kommunal;
            $plastik_for_teacher=$rows->fine_percentage;
            $bonus_per=$rows->bonus_percentage;

            $sal_per_amount=$all*$sal_per/100;
            $paper_per_amount=$sal_per_amount*$paper_per/100;
            
            $bonus_per_amount=$sal_per_amount*$bonus_per/100;

            $total=$sal_per_amount-$paper_per_amount-$nalog-$kommunal+$bonus_per_amount-$plastik_for_teacher;

            echo "<tr>";
            echo "<td>".$rows->id."</td>";
            echo "<td>".$rows->name."</td>"; 
            echo "<td>".$last_month_cash."</td>";
            echo "<td>".$last_month_plastbank."</td>";            
            echo "<td><b>".$all."</b></td>"; 
            
            echo "<td>".$sal_per."</td>";
            echo "<td>".$paper_per."</td>";            
            echo "<td>".$nalog."</td>";
            echo "<td>".$kommunal."</td>"; 
            echo "<td>".$bonus_per."</td>";

            echo '<td><b style="color:red">'.$plastik_for_teacher.'</b></td>'; 
            echo '<td><b style="color:red">'.$total."</b></td>";  
                                               
            echo "</tr>";    
 
            }



}

     ?>

 

</tbody></table>
</div>











<iframe id="txtArea1" style="display:none"></iframe>

<button id="btnExport" onclick="fnExcelReport();" class="btn btn-primary"> EXPORT </button>

<script>
function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('mytable'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"adc salary.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}

</script>