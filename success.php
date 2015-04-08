<?php include("checkout/paypal.php") ?>
<?php if($_GET['dp'] != 1){if($payment_checking == 0){header("Location: index.html");}} ?>
<meta charset="UTF-8">
<head><script type="text/javascript" src="js/jquery-1.10.2.min.js"></script></head>
<body onload="finishPayment();">
<div class="container">
<div class="row" style="margin-top: 15%; margin-bottom: 20%;">
    <div class="col-lg-3 col-xs-12"></div>
    <div class="col-lg-6 col-xs-12" style="border: 1px solid #e2227c">
        <div class="row" style="background-color: #e2227c; font-weight: bolder; font-size: 20px; padding: 10px; color: white; text-align: center"><span style="padding: 20px">CONFIRMATION</span></div>
        <?php if($_GET['dp'] != 1){ ?>
        <div class="row" id="divProgress">
            <div class="content" style="text-align: center; margin-top: 30px;" id="divLoading">
                <img src="images/loading.gif">
            </div>
            <div class="content">
                <p style="text-align: center; color: red; font-style: italic" id="divError">The system is resolving, please wait...</p>
            </div>
        </div>
        <?php } ?>
        <div class="row" id="divFinish">
            <div class="content">
                <p style="text-align: center; color: darkgreen; font-weight: bold" id="pStatus">Congratulate, You are booking successfully! Thank you very much.</p>
            </div>
            <div class="content">
                <p style="text-align: center; color: red; font-style: italic">We sent an notification to your email.</p>
            </div>
            <div class="content">
                <p style="text-align: center; color: darkgreen; font-style: italic">The system is automatically redirecting to homepage. Unless, please click on the below link.</p>
            </div>
        </div>
        <div class="row" style="text-align: center" id="divHome">
            <span style="padding: 10px; width: 500px; background-color: #e2227c; color: white; font-size: 18px; cursor: pointer; margin: 20px" onclick="window.location.href = 'index.html'">Trở về trang chủ</span>
        </div>
    </div>
    <div class="col-lg-3 col-xs-12"></div>
</div>
<div>
</body>

<script>
    function finishPayment(){
        var dp = "<?php echo $_GET['dp'] ?>";
        if(dp != 1){
            var paymentChecking = "<?php echo $payment_checking ?>";
            if(paymentChecking == 1){
                $('#divProgress').show();
                $('#divFinish').hide();
                $('#divHome').hide();

                var paymentCode = "<?php echo $_GET['vbt'] ?>";
                var paymentStatus = "<?php echo $payment_status ?>";

                if(paymentStatus == 'Completed'){
                    $('#pStatus').html('Payment confirmation is successful!');
                }
                else{
                    $('#pStatus').html('Payment confirmation is unsuccessful!');
                }

                var transactionID = "<?php echo $tx ?>";
                var dataString = "paymentCode="+paymentCode+"&paymentStatus="+paymentStatus+"&transactionID="+transactionID+"&functionName="+"updateBooking"+"&paypal="+"1";

                $.ajax({
                    type: "POST",
                    url: "checkout/functions.php",
                    data: dataString,
                    success: function(x){
                        if(x == 1){
                            $.ajax({
                                type: "POST",
                                url: "phpmailer/vbiketours/booking_success.php",
                                data: dataString,
                                success: function(x){
                                    $('#divProgress').hide();
                                    $('#divFinish').show();
                                    $('#divHome').show();
                                    redirectHome();
                                }
                            });
                        }
                        else{
                            $('#divLoading').hide();
                            $('#divError').html('We cannot find information about this transaction...');
                        }
                    }
                });
            }
        }
        else{
            redirectHome();
        }
    }

    function redirectHome(){
        window.setTimeout(function () {
            location.href = "index.html";
        }, 10000)
    }
</script>