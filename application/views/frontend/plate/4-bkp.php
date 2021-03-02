<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 841.9 595.3" style="enable-background:new 0 0 841.9 595.3;" xml:space="preserve">
	<style type="text/css">
		.st0{fill:#FFFFFF;stroke:#000000;stroke-width:1.2;stroke-miterlimit:10;}
		.st1{clip-path:url(#SVGID_2_);}
		.st2{fill:#096EB6;}
		.st3{fill:#FFFFFF;}
		.st4{fill:#E63047;}
		.st5{stroke:#000000;stroke-miterlimit:10;}
	</style>
	<polygon class="st0" points="39.3,205.1 39.3,135.2 807.7,135.2 807.7,208.3 842,208.3 842,351.5 807.7,351.5 807.7,417.4 40,417.4 
		40,351.5 1,351.5 1,205.7 "/>
<?php
if($logo) {
	if($logo_position) {
		?>
		<image xlink:href="<?= $logo; ?>" height="140" width="150" x="130" y="5"/>
		<?php
	}
	else {
		?>
		<image xlink:href="<?= $logo; ?>" height="140" width="150" x="20" y="210"/>
		<?php
	}
}
?>
<?php
$streetArray = street_name($street_name, 16);
if($logo) {
	if($logo_position) {
		$streetArray = street_name($street_name, 25);
	}
}
// echo sizeof($streetArray);
// $y = sizeof($streetArray) > 2 ? 10 : 35;
$y = 110;
if(sizeof($streetArray) == 1) {
	$y = 225;
}
if(sizeof($streetArray) == 2) {
	$y = 175;
}
if(sizeof($streetArray) == 3) {
	$y = 140;
}
if($logo) {
	if($logo_position) {
		$y = sizeof($streetArray) > 2 ? 25 : 35;
	}
}
foreach ($streetArray as $key => $value) {
	$y = $y + 75;
	?>
  	<text id="circleResize" text-anchor="middle" x="400" y="<?= $y; ?>" font-size="60" style="font-family: <?= $font; ?>"><?= $value; ?></text>
  	<?php
}
?>
<?php
if($is_road_symbol == 1) {
	?>
	<g>
		<path class="st2" d="M796.1,209.1c1,0.4,1.5,0.6,2.3,1.3s1.3,1,1.9,1.9c0.6,0.6,1,1.7,1.3,2.3c0.4,0.6,0.4,1.7,0.4,2.3v126.5
			c0,1,0,1.7-0.4,2.3c-0.4,0.6-0.6,1.7-1.3,2.3c-0.6,0.6-1.3,1.3-1.9,1.9c-0.6,0.6-1.5,1-2.3,1.3c-1,0.4-1.5,0.4-2.5,0.4H672.7
			c-1,0-1.5,0-2.5-0.4s-1.5-0.6-2.3-1c-0.6-0.6-1.3-1-1.9-1.9c-0.6-0.6-1-1.7-1.3-2.3c-0.4-0.6-0.4-1.7-0.4-2.3V216.9
			c0-1,0-1.7,0.4-2.3s0.6-1.7,1.3-2.3c0.6-0.6,1.3-1.3,1.9-1.9c0.6-0.6,1.5-1,2.3-1.3c1-0.4,1.5-0.4,2.5-0.4h120.7
			C794.6,208.9,795.2,208.9,796.1,209.1L796.1,209.1z"/>
		<path class="st3" d="M770.6,220.7h-74.7v32.2h27.8v86.5h18.9v-86.5h28V220.7L770.6,220.7z"/>
		<rect x="697.5" y="222.6" class="st4" width="71.2" height="28.2"/>
	</g>
    <?php
}
?>
<?php
if($is_zip) {
	?>
	<text text-anchor="middle" x="735" y="390" font-size="40"><?= $zip; ?></text>
	<?php
}
?>
</svg>