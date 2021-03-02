<?php
$x = 1240;
$width = 450;
$y = 250;
$text_font_size = 195;
if($is_road_symbol == 0) {
    $width = $width + 200;
    $x = $x+336;
}
?>
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
viewBox="0 0 3203.1 793.7" style="enable-background:new 0 0 3203.1 793.7;" xml:space="preserve">
<style type="text/css">
.st0{fill-rule:evenodd;fill:<?php echo ($fontColor)?$fontColor:'#000000'; ?>;}
.st1{fill-rule:evenodd;fill:<?php echo ($plateColor)?$plateColor:'#FFFFFF'; ?>;}
.st2{fill-rule:evenodd;fill:#006DB7;}
.st3{fill:none;stroke:#191B1E;stroke-width:0.216;stroke-miterlimit:10;}
.st4{fill-rule:evenodd;fill:#FFFFFF;}
.st5{fill-rule:evenodd;fill:#E62E47;}
.st8{fill:<?php echo ($fontColor)?$fontColor:'#000000'; ?>;}
</style>
<g>
<g>
<polygon class="st0" points="0,793.7 3203.1,793.7 3203.1,0 0,0 "/>
<path class="st1" d="M3118.1,42.5c6.3,0,12.8,1.4,19.3,4.6c2,1,3.9,2.2,5.7,3.5c1.8,1.3,3.5,2.7,5.1,4.3c1.6,1.6,3,3.3,4.3,5.1
c1.3,1.8,2.5,3.7,3.5,5.7c3.1,6.2,4.6,12.8,4.6,19.3v623.7c0,6.3-1.4,12.8-4.6,19.3c-1,2-2.2,3.9-3.5,5.7
c-1.3,1.8-2.8,3.5-4.3,5.1c-1.6,1.6-3.3,3-5.1,4.3c-1.8,1.3-3.7,2.5-5.7,3.5c-6.2,3.1-12.7,4.6-19.3,4.6H84.9
c-6.3,0-12.8-1.4-19.3-4.6c-2-1-3.9-2.2-5.7-3.5c-1.8-1.3-3.5-2.7-5.1-4.3c-1.6-1.6-3-3.3-4.3-5.1c-1.3-1.8-2.5-3.7-3.5-5.7
c-3.1-6.2-4.6-12.8-4.6-19.3V85c0-6.3,1.4-12.8,4.6-19.3c1-2,2.2-3.9,3.5-5.7c1.3-1.8,2.7-3.5,4.3-5.1c1.6-1.6,3.3-3,5.1-4.3
c1.8-1.3,3.7-2.5,5.7-3.5c6.2-3.1,12.8-4.6,19.3-4.6H3118.1L3118.1,42.5z"/>

    <?php if($is_road_symbol==1) { ?>
        <g>
            <path class="st2" d="M3120,42h-590.5c-4.1,0-8.2,0.6-12.2,1.9c-4,1.3-7.8,3.2-11.3,5.7c-3.5,2.5-6.6,5.6-9.1,9.2
            c-2.5,3.5-4.5,7.3-5.7,11.3c-1.3,4-1.9,8.1-1.9,12.2v628.1c0,4.1,0.6,8.2,1.9,12.2s3.2,7.8,5.7,11.3c2.5,3.5,5.6,6.6,9.1,9.1
            c3.5,2.5,7.3,4.5,11.3,5.8c4,1.3,8.1,1.9,12.2,1.9H3120c4.1,0,8.2-0.6,12.2-1.9c4-1.3,7.9-3.2,11.3-5.8c3.5-2.5,6.6-5.6,9.1-9.1
            c2.5-3.5,4.5-7.3,5.7-11.3c1.3-4,1.9-8.1,1.9-12.2V82.3c0-4.1-0.6-8.2-1.9-12.2c-1.3-4-3.2-7.8-5.7-11.3c-2.5-3.5-5.6-6.6-9.1-9.2
            c-3.5-2.5-7.3-4.5-11.3-5.7C3128.2,42.6,3124.1,42,3120,42z"/>

            <polygon class="st4" points="3007.1,101.3 2642.4,101.3 2642.4,260.2 2779,260.2 2779,691.4 2870.6,691.4 2870.6,260.2
            3007.1,260.2 "/>
            <polygon class="st3" points="3007.1,101.3 2642.4,101.3 2642.4,260.2 2779,260.2 2779,691.4 2870.6,691.4 2870.6,260.2
            3007.1,260.2 "/>
            <polygon class="st5" points="2650.5,250.7 2999.1,250.7 2999.1,110.8 2650.5,110.8 "/>
            <polygon class="st3" points="2650.5,250.7 2999.1,250.7 2999.1,110.8 2650.5,110.8 "/>
        </g>
    <?php  } ?>
      <?php 
        if($logo) {
            if($logo_position) {
                ?>
                <image xlink:href="<?= $logo; ?>" height="190" width="635" x="48" y="275"/>
                <?php
            }
            else {
                ?>
                <image xlink:href="<?= $logo; ?>" height="190" width="635" x="23" y="275"/>
                <?php
            }
        }
        ?>
        <?php
        $streetArray = street_name($street_name, 16);
        // $y = 10;
        // if(sizeof($streetArray) == 1) {
        //     $y = 90;
        // }
        // if(sizeof($streetArray) == 2) {
        //     $y = 55;
        // }
        // if(sizeof($streetArray) == 3) {
        //     $y = 20;
        // }
       // foreach ($streetArray as $key => $value) {
            // $y = $y + 65;
            ?>
            <text id="circleResize" text-anchor="middle" x="<?= $x; ?>" y="<?= $y; ?>" font-size="<?= $text_font_size; ?>" class="st8"  style="text-transform: uppercase;font-family: <?= $font; ?>"><?php echo  $street_name; ?></text>
            <?php
        //}
        ?>
<g>
<?php if($is_road_symbol==1){ ?>
<text id="circleResize" text-anchor="middle" x="1250" y="436" font-size="101" class="st8" style="text-transform: uppercase;font-family: <?= $font; ?>">LEADING TO</text>
<?php }else{ ?>
<text id="circleResize" text-anchor="middle" x="1568" y="436" font-size="101" class="st8" style="text-transform: uppercase;font-family: <?= $font; ?>">LEADING TO</text>
<?php } ?>
</g>
<?php  
    $street_name_below = street_name($street_name_below, 100);
    $y = 572;
        foreach ($street_name_below as $textKey => $textValue) { ?>
            <text id="circleResize" text-anchor="middle" x="<?=  $x ?>" y="<?= $y ?>" font-size="100" class="st8" style="text-transform: uppercase;font-family: <?=  $font; ?>"><?= $textValue ?></text>
        <?php $y = $y+133;  
        }
?>
    <?php
        if($is_zip) {
            if($is_road_symbol == 1) {
                ?>
                <text text-anchor="middle" x="2270" y="726" font-size="165"><?= $zip; ?></text>
                <?php
            }
            else {
                ?>
                <text text-anchor="middle" x="2925" y="728" font-size="165"><?= $zip; ?></text>
                <?php
            }
        }
        ?>
</g>
</g>
</svg>