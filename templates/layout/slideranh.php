
<?php
	$d->reset();

	$sql_slider = "select photo,link from #_slider where hienthi=1 and com='slider' order by stt,id desc";

	$d->query($sql_slider);

	$result_slider=$d->result_array();


?>
<div id="slider1_container" style="display: none; position: relative; margin: 0 auto; width: 1140px;
        height: 600px; overflow: hidden;">

            <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1140px; height: 600px;
            overflow: hidden;">
              <?php

		for($i=0,$count_slider=count($result_slider);$i<$count_slider;$i++){

	?>
                <div onclick="window.open('<?=$result_slider[$i]['link']?>')">
                    <img id="image_<?=$i?>" value="<?=$result_slider[$i]['link']?>" u="image" src2="<?=_upload_hinhanh_l.$result_slider[$i]['photo']?>" width="1140" height="600" />
                </div>

                  <?php } ?>
            </div>

            <style>
                .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
                    background: url(../img/b05.png) no-repeat;
                    overflow: hidden;
                    cursor: pointer;
                }

                .jssorb05 div {
                    background-position: -7px -7px;
                }

                    .jssorb05 div:hover, .jssorb05 .av:hover {
                        background-position: -37px -7px;
                    }

                .jssorb05 .av {
                    background-position: -67px -7px;
                }

                .jssorb05 .dn, .jssorb05 .dn:hover {
                    background-position: -97px -7px;
                }
            </style>

            <div u="navigator" class="jssorb05" style="position: absolute; bottom: 16px; right: 6px;">

                <div u="prototype" style="POSITION: absolute; WIDTH: 16px; HEIGHT: 16px;"></div>
            </div>

            <style>

                .jssora11l, .jssora11r, .jssora11ldn, .jssora11rdn {
                    position: absolute;
                    cursor: pointer;
                    display: block;
                    background: url(../images/a21.png) no-repeat;
                    overflow: hidden;
                }

                .jssora11l {
                    background-position: -11px -41px;
                }

                .jssora11r {
                    background-position: -71px -41px;
                }

                .jssora11l:hover {
                    background-position: -131px -41px;
                }

                .jssora11r:hover {
                    background-position: -191px -41px;
                }

                .jssora11ldn {
                    background-position: -251px -41px;
                }

                .jssora11rdn {
                    background-position: -311px -41px;
                }
            </style>

            <span u="arrowleft" class="jssora11l" style="width: 37px; height: 37px; top: 123px; left: 8px;">
            </span>

            <span u="arrowright" class="jssora11r" style="width: 37px; height: 37px; top: 123px; right: 8px">
            </span>

        </div>