<?php
$x = 0;
$width = 450;
if(empty($is_road_symbol)) {
	$width = $width + 200;
}
?>
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 841.9 595.3" style="enable-background:new 0 0 841.9 595.3;" xml:space="preserve">
	<style type="text/css">
		.st0{fill:#FFFFFF;stroke:#000000;stroke-width:1.2;stroke-miterlimit:10;}
		.st1{clip-path:url(#SVGID_2_);}
		.st2{fill:#096EB6;}
		.st3{fill:#FFFFFF;}
		.st4{fill:#E63047;}
	</style>
	<path class="st0" d="M0.7,158.2c12.9-0.1,25.8-0.2,38.6-0.3h768.4c11.2,0.1,22.4,0.2,33.6,0.4c0,94,0,187.9,0,281.9
		c-11.2,0-22.4,0-33.6,0H40c-13.1,0-26.2,0-39.3,0C0.7,346.2,0.7,252.2,0.7,158.2z"/>
	<g>
		<g>
			<g>
				<g>
					<g>
						<g>
							<g>
								<defs>
									<rect id="SVGID_1_" x="52" y="247.4" width="78.1" height="110.5"/>
								</defs>
								<clipPath id="SVGID_2_">
									<use xlink:href="#SVGID_1_"  style="overflow:visible;"/>
								</clipPath>
								<g class="st1">
									
										<image style="overflow:visible;enable-background:new    ;" width="187" height="263" xlink:href="../CA6B3280.jpeg"  transform="matrix(0.4187 0 0 0.4187 52.033 247.5282)">
									</image>
								</g>
							</g>
						</g>
					</g>
				</g>
			</g>
		</g>
	</g>
<?php
if($logo) {
	if($logo_position) {
		$x = 180;
		?>
		<image xlink:href="<?= $logo; ?>" height="140" width="150" x="130" y="5"/>
		<?php
	}
	else {
		$x = 180;
		?>
		<image xlink:href="<?= $logo; ?>" height="140" width="150" x="20" y="210"/>
		<?php
	}
}
else {
	$width = $width + 170;
}
?>
<?php
/*$streetArray = street_name($street_name, 16);
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
  	<text id="circleResize" text-anchor="middle" x="400" y="<?= $y; ?>" font-size="50" style="font-family: <?= $font; ?>"><?= $value; ?></text>
  	<?php
}*/
?>

<!-- <switch>
	<foreignObject x="400" y="90" width="150" font-size="50" height="200">
	<p xmlns="http://www.w3.org/1999/xhtml"><?= $street_name; ?></p>
	</foreignObject>
	<foreignObject font-size="50" style="" height="280" y="160" x="180" width="450">
	<p xmlns="http://www.w3.org/1999/xhtml" style="color: #000;"><?= $street_name; ?></p>
	</foreignObject>
</switch> -->
<!-- width : 650 x : 0 width : 820-->
<foreignObject height="280" y="160" x="<?= $x; ?>" width="<?= $width; ?>">
   	<style>
      	svg div { display: table; font-size: 60px; width: 100%; height: 100%; }
      	svg p   { display: table-cell; text-align: center; vertical-align: middle; color: #000; }
   	</style>
   	<body xmlns="http://www.w3.org/1999/xhtml">
       	<div>
          	<p id="text"><?= $street_name; ?></p>
       	</div>
   	</body>
</foreignObject>
<?php
if($is_road_symbol == 1) {
	?>
	<rect x="636.1" y="158.4" class="st2" width="204.8" height="281"/>
	<path class="st3" d="M793.1,181.9H681.5v63.2H723V415h28.2V245.1h41.8V181.9L793.1,181.9z"/>
	<rect x="683.9" y="185.7" class="st4" width="106.4" height="55.4"/>
	<?php
}
?>
<?php
if($is_zip) {
	if($is_road_symbol == 1) {
		?>
		<text text-anchor="middle" x="585" y="435" font-size="40"><?= $zip; ?></text>
		<?php
	}
	else {
		?>
		<text text-anchor="middle" x="750" y="435" font-size="40"><?= $zip; ?></text>
		<?php
	}
}
?>
	<rect x="731" y="440" class="st5" width="7" height="37.9"/>
	<rect x="104.4" y="440" class="st5" width="7" height="37.9"/>
</svg>