<?php

use app\models\Tickets;
use app\models\RouteStopTypeSearch;

//echo $user_id,"<br>";

//echo json_encode($data);
//echo $data->fare;
$mod = Tickets::find()->where(['customer_id' => $customer_id])->groupBy(['created_at'])->all();
echo "<br>";
$seats = array();
echo "<h2>All Bookings</h2><br>";
foreach ($mod as $col) {
    // echo $col->ticket_id,"<br>";

    $tickets = Tickets::find()->where(['created_at' => $col->created_at ])->all();
    $rst = RouteStopTypeSearch::find()->where(['route_stop_type_id' => $col->route_stop_type_id ])->one();
    $date = Tickets::find()->select('created_at')->where(['created_at' => $col->created_at ])->one();
    $from = $rst->route->from;
    $to = $rst->stop->stop_name;
    //$time = $tickets->bus_route_id;
    //echo $tme('H:i');
    
    $doj = $date->created_at;
    // echo $doj;
    foreach ($tickets as $cols) {
        $time = $cols->busRoute->timing;
        $fare = $cols->fare;
        
        array_push($seats, $cols->seat_code);
    }
    // echo $time;
    //echo "each",json_encode($seats),"<br>";?>
       <html>
       
       <body>
       
           <div>
           <div class="panel panel-info" style="background-color:#F4B41A;">
                    <div class="panel-heading" style="background-color:#143D59; color:white">
                    <div class="row">
                    <div class="col-md-3">
                                        <h4>Bus Number: <b><?php echo 'GA376336' ?></b></h4>
                                        
                                                      
                    </div>

                    <div class="col-md-4">
                    <h4>Date  <b><?php echo $doj ?></b></h4> 
                    </div>
                    
                    </div>

                    </div>
                    <div class="panel-body">
                    
                        <div class=row>
                                        <div class="col-md-4">
                                            <p>From</p>
                                            <h3 style="text-transform: capitalize;"><?php echo $from; ?> </h3>
                                        </div>
                                        <div class="col-sm-4">
                                            <p>To</p>
                                            <h3 style="text-transform: capitalize;"> <?php echo $to; ?> </h3>
                                        </div>
                                        <div class="col-sm-2">
                                            <p>Timing</p>
                                            <h4><?php echo $time; ?> </h4>
                                        </div>
                        </div>
                        <div class=row>
                        <div class="col-md-4">
                                            <p>Seats</p>
                                            <h4 style=""><?php echo implode(",", $seats); ?> </h4>
                                        </div>
                                        <div class="col-sm-4">
                                            <p>Amount</p>
                                            <h4 style="text-transform: capitalize;"> <?php echo $fare; ?> </h4>
                                        </div>
    
                        </div>
                    
                    </div>
            </div>           
           </div>
       </body>
       </html> 



<?php
echo "<br>";
    $seats = array();
}
?>