

<div class="time" style="padding:10px">
    <form method="POST">
        <span>Chọn ngày:</span>
        <input type="date"  value="<?php echo $time?>" name="timeday">
        <input type="submit" class="btn btn-primary" value="Thống kê" name="btnthongke">
    </form>
</div>
<div class="khung" style="border: 2px solid black">
    <div style="padding:10px;">
    <span>Thống kê ngày:</span>
    <input type="text"  placeholder="" value="<?php echo date("d/m/Y", strtotime($time))?>" style="outline:none; width:100px;" readonly>
    </div>
    <center><span><h2>THỐNG KÊ CHUNG</h2></span></center>
    <div class="row" style=" padding:30px; height:200px; color: white;">
        <div class="col-sm-4" style="text-align:center; height:200px">
            <center>
                <div class="khungtong" style="width:200px; height:100px; padding:5px; background-color:#66FF66;">
                    <span><h5>Tổng số</h5></span>
                    <span><h3><?php echo $sum_status;?></h3></span>
                </div>
            </center>
        </div>
        <div class="col-sm-4" style="text-align:center; height:200px">
            <center>
                <div class="khungtong" style="width:200px; height:100px; padding:5px; background-color:#FF3366;">
                    <span><h5>Số ca mắc</h5></span>
                    <span><h3><?php echo $duong ;?></h3></span>
                </div>
            </center>
        </div>
        <div class="col-sm-4" style="text-align:center; height:200px">
            <center>
                <div class="khungtong" style="width:200px; height:100px; padding:5px; background-color:#0099FF;">
                    <span><h5>Số ca khỏi</h5></span>
                    <span><h3><?php echo $am;?></h3></span>
                </div>
            </center>
        </div>
    </div>
    <center><span><h2>KHU VỰC TP.HCM</h2></span></center>
    <div class="row" style=" padding:30px; height:150px; color: white;">
        <div class="col-sm-4" style="text-align:center; height:200px">
            <center>
                <div class="khungtong" style="width:200px; height:100px; padding:5px; background-color:#66FF66;">
                    <span><h5>Tổng số</h5></span>
                    <span><h3><?php echo $sum_status_hcm;?></h3></span>
                </div>
            </center>
        </div>
        <div class="col-sm-4" style="text-align:center; height:200px">
            <center>
                <div class="khungtong" style="width:200px; height:100px; padding:5px; background-color:#FF3366;">
                    <span><h5>Số ca mắc</h5></span>
                    <span><h3><?php echo $duong_hcm ;?></h3></span>
                </div>
            </center>
        </div>
        <div class="col-sm-4" style="text-align:center; height:200px">
            <center>
                <div class="khungtong" style="width:200px; height:100px; padding:5px; background-color:#0099FF;">
                    <span><h5>Số ca khỏi</h5></span>
                    <span><h3><?php echo $am_hcm;?></h3></span>
                </div>
            </center>
        </div>
    </div>
</div>
