<meta charset="UTF-8">
<body>
<div class="container">
<div class="row" style="margin-top: 15%; margin-bottom: 20%;">
    <div class="col-lg-3 col-xs-12"></div>
    <div class="col-lg-6 col-xs-12" style="border: 1px solid #e2227c">
        <div class="row" style="background-color: #e2227c; font-weight: bolder; font-size: 20px; padding: 10px; color: white; text-align: center"><span style="padding: 20px">CONFIRMATION</span></div>
        <div class="row">
            <div class="content">
                <p style="text-align: center; color: darkgreen; font-weight: bold">Congratulate, You are booking successfully! Thank you very much.</p>
            </div>
            <div class="content">
                <p style="text-align: center; color: red; font-style: italic">We sent an notification to your email.</p>
            </div>
            <div class="content">
                <p style="text-align: center; color: darkgreen; font-style: italic">The system is automatically redirecting to homepage. Unless, please click on the below link.</p>
            </div>
        </div>
        <div class="row" style="text-align: center">
            <span style="padding: 10px; width: 500px; background-color: #e2227c; color: white; font-size: 18px; cursor: pointer; margin: 20px" onclick="window.location.href = 'index.html'">Trở về trang chủ</span>
        </div>
    </div>
    <div class="col-lg-3 col-xs-12"></div>
</div>
<div>
</body>

<script>
    window.onload = function () {
        window.setTimeout(function () {
            location.href = "index.html";
        }, 10000)
    }
</script>