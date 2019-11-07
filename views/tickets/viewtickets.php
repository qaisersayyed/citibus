<?php use yii\helpers\Html; ?> 
<script  type="text/javascript">
       history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };

    function my_code(){       
           alert("Ticket Booked");
}
// window.onload=my_code();
</script>


<?php $name = "manisha";
$order_id = 121;
$date = "2018-11-11";
$amount = 100;
$seat = "E1";
$time= "10:30";
$bus_no = "GE1245";
// 'order_id' => $orderid,
//     'amount' => $amount,
//     'date' => $date,
//     'txn_id' => $txnid,
//     'status' => $status


?>
<html lang="en">
<!-- <head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="cardWrap">
  <div class="card cardLeft">
    <h1>Startup <span>Cinema</span></h1>
    <div class="title">
      <h2>How I met your Mother</h2>
      <span>movie</span>
    </div>
    <div class="name">
      <h2>Vladimir Kudinov</h2>
      <span>name</span>
    </div>
    <div class="seat">
      <h2>156</h2>
      <span>seat</span>
    </div>
    <div class="time">
      <h2>12:00</h2>
      <span>time</span>
    </div>
    
  </div>
  <div class="card cardRight">
    <div class="eye"></div>
    <div class="number">
      <h3>156</h3>
      <span>seat</span>
    </div>
    <div class="barcode"></div>
  </div>

</div>
</body>
</html> -->
<div class="container"  >

    <div  style="height:300px;width:800px;border-radius: 20px;">
            <div class="card text-center" style="border-radius: 20px 20px 0px 0px; ">
        <div class="card-header" style="background-color:#5F9EA0;height:50px;border-radius: 20px 20px 0px 0px;color:white">
            <h3>CitiBus</h3>
        </div>
        <div class="card-body"  style="border:1px solid #5F9EA0;background: linear-gradient( #ecedef 26%,  #ecedef 100%);">
             
                <div style="float: left;margin-left:50px;display:inline-block;>">
                    <h4 >Passenger Name: <br><b><?php echo $name?></h4><br>
                    <h4>From:<br> Margao</h4><br>
                    <h4>To:<br> Panjim</h4>
                </div>
                <div style="display:inline-block;margin-right:170px">
                    <h4 >Date: <br><b><?php echo $date?></h4></h4><br>
                    <h4>Time: <br> <b><?php echo $time?></h4><br>
                    <h4>Bus Number: <br><b><?php echo $bus_no?></h4>
                </div>
                <div style="display:inline-block;vertical-align:top">
                    <h4 >Seat: <br><b><?php echo $seat?></h4><br>
                    <h4>Amount: <br> <b><?php echo $amount?></h4><br>
                   
                </div>

            
            <div style="vertical-align:top;float: right;display:inline-block;margin-right:30px;border-left: .18em dashed #fff;">
                <? echo Html::img('@web/uploads/qr.png', ['width'=>'150px']);?>
            </div>
        </div>
        <div class="card-footer text-muted" style="background-color:#5F9EA0;height:50px;border-radius: 0px 0px 20px 20px;color:white">
           
        </div>
        </div>   
    </div>

 
</div> 
<!-- </body>

<style type="text/css">
$red: #e84c3d;
$grey: #ecedef;
$black: #343434;

.cardWrap {
  width: 27em;
  margin: 3em auto;
  color: #fff;
  font-family: sans-serif;
}

.card {
  background: linear-gradient(to bottom, #e84c3d 0%,  #e84c3d 26%,  #ecedef 26%,  #ecedef 100%);
  height: 11em;
  float: left;
  position: relative;
  padding: 1em;
  margin-top: 100px;
}

.cardLeft {
  border-top-left-radius: 8px;
  border-bottom-left-radius: 8px;
  width: 16em;
}

.cardRight {
  width: 6.5em;
  border-left: .18em dashed #fff;
  border-top-right-radius: 8px;
  border-bottom-right-radius: 8px;
  &:before,
  &:after {
    content: "";
    position: absolute;
    display: block;
    width: .9em;
    height: .9em;
    background: #fff;
    border-radius: 50%;
    left: -.5em;
  }
  &:before {
    top: -.4em;
  }
  &:after {
  bottom: -.4em;
  }
}

h1 {
  font-size: 1.1em;
  margin-top: 0;
  span {
    font-weight: normal;
  }
}

.title, .name, .seat, .time {
  text-transform: uppercase;
  font-weight: normal;
  h2 {
    font-size: .9em;
    color: #525252;
    margin: 0;
   }
  span {
    font-size: .7em;
    color: #a2aeae;
  }
}

.title {
  margin: 2em 0 0 0;
}

.name, .seat {
  margin: .7em 0 0 0;
}

.time {
  margin: .7em 0 0 1em;
}

.seat, .time {
  float: left;
}

.eye {
  position: relative;
  width: 2em;
  height: 1.5em;
  background: #fff;
  margin: 0 auto;
  border-radius: 1em/0.6em;
  z-index: 1;
  &:before, &:after {
    content:"";
    display: block;
    position: absolute;
    border-radius: 50%;
  }
  &:before {
    width: 1em;
    height: 1em;
    background:  #e84c3d;
    z-index: 2;
    left: 8px;
    top: 4px;
  }
  &:after {
  width: .5em;
  height: .5em;
  background: #fff;
  z-index: 3;
  left: 12px;
  top: 8px;
  }
}

.number {
  text-align: center;
  text-transform: uppercase;
  h3 {
    color:  #e84c3d;
    margin: .9em 0 0 0;
    font-size: 2.5em;
    
  }
  span {
    display: block;
    color: #a2aeae;
  }
}

.barcode {
  height: 2em;
  width: 0;
  margin: 1.2em 0 0 .8em;
  box-shadow: 1px 0 0 1px #343434,
  5px 0 0 1px #343434,
  10px 0 0 1px #343434,
  11px 0 0 1px #343434,
  15px 0 0 1px #343434,
  18px 0 0 1px #343434,
  22px 0 0 1px #343434,
  23px 0 0 1px #343434,
  26px 0 0 1px #343434,
  30px 0 0 1px #343434,
  35px 0 0 1px #343434,
  37px 0 0 1px #343434,
  41px 0 0 1px #343434,
  44px 0 0 1px #343434,
  47px 0 0 1px #343434,
  51px 0 0 1px #343434,
  56px 0 0 1px #343434,
  59px 0 0 1px #343434,
  64px 0 0 1px #343434,
  68px 0 0 1px #343434,
  72px 0 0 1px #343434,
  74px 0 0 1px #343434,
  77px 0 0 1px #343434,
  81px 0 0 1px #343434;
}
</style>