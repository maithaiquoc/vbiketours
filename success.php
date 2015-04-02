<body onload="lightbox_open('lightRegisterConfirm', 'fadeRegisterConfirm')">
<div class="container">
<div class="row" style="margin-top: 15%; margin-bottom: 20%;">
    <div class="col-lg-3 col-xs-12"></div>
    <div class="col-lg-6 col-xs-12" style="border: 1px solid #F36F00">
        <div class="row" style="background-color: orange; font-weight: bolder; font-size: 20px; padding: 10px; color: white; text-align: center"><span style="padding: 20px">XÁC NHẬN</span></div>
        <div class="row">
            <div class="content">
                <p style="text-align: center; color: darkgreen; font-weight: bold">Xin chúc mừng bạn đã đăng ký thành viên thành công!</p>
            </div>
            <div class="content">
                <p style="text-align: center; color: red; font-style: italic">Chúng tôi đã gửi cho bạn một email để kích hoạt tài khoản.</p>
            </div>
            <div class="content">
                <p style="text-align: center; color: red; font-style: italic">Xin vui lòng kiểm tra hộp thư của bạn và hoàn thành thủ tục đăng ký.</p>
            </div>
            <div class="content">
                <p style="text-align: center; color: darkgreen; font-style: italic">Hệ thống đang chuyển về trang chủ. Nếu hệ thống không tự chuyển, xin vui lòng bấm vào liên kết bên dưới.</p>
            </div>
        </div>
        <div class="row" style="text-align: center">
            <span style="padding: 10px; width: 500px; background-color: darkorange; color: white; font-size: 18px; cursor: pointer; margin: 20px" onclick="window.location.href = '<?php echo base_url() ?>'">Trở về trang chủ</span>
        </div>
    </div>
    <div class="col-lg-3 col-xs-12"></div>
</div>
<div>
</body>

<script>
    $(document).ready(function () {
        window.setTimeout(function () {
            location.href = "<?php echo base_url() ?>";
        }, 10000)
    });
</script>