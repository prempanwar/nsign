<?php
$x = 430;
$width = 450;
$text_font_size = 60;
if($is_road_symbol == 0) {
	$width = $width + 200;
}
else {
	$x = $x - 100;
}
if($is_road_symbol == 1 && $logo) {
	$text_font_size = 42;
	$x = $x + 100;
}
if($is_road_symbol == 0 && $logo) {
	$x = $x + 20;
}
?>
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 841.9 288.3" style="enable-background:new 0 0 841.9 288.3;" xml:space="preserve">
<style type="text/css">
	<?php 
		// if($plateColor == '#007D00' || $plateColor == '#19169b' || $plateColor == '#000000' ) 
		// 	$fontColor = 'white'; 
		// else 
		// 	$fontColor = 'black';
	?>
	.st0{fill:<?php echo ($plateColor)?$plateColor:'#FFFFFF'; ?>}
	.st1{fill-rule:evenodd;clip-rule:evenodd;}
	.st2{font-family:'ArialMT';}
	.st3{font-size:60px;}
	.st4{fill-rule:evenodd;clip-rule:evenodd;fill:#385CA6;}
	.st5{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
	.st6{fill-rule:evenodd;clip-rule:evenodd;fill:#E73329;}
	.st7{font-size:40px;}
	.st8{fill:<?php echo ($fontColor)?$fontColor:'#000000'; ?>;}
</style>
<g>
	<rect x="7.7" y="33" class="st0" width="828.3" height="193" style="stroke:<?php echo ($fontColor)?$fontColor:'#000000'; ?>;stroke-width:12"/>
	<g>
		<!-- <path class="st1" d="M13.1,42.3c-0.4,1.3-0.6,2.7-0.6,4.1v166.5c0,1.5,0.1,3.1,0.6,4.5s1.4,2.6,2.4,3.9c2.5,1.3,5.1,2.1,7.7,2.1
			h798.3c1.6,0,3.1-0.2,4.5-0.7s2.6-1.5,3.8-2.4c1.6-2.4,2.5-4.9,2.5-7.5V46.7c0-1.5,0.1-3-0.4-4.4c-0.4-1.4-1.3-2.6-2.2-3.8
			c-1.3-0.8-2.6-1.7-4-2.1c-1.4-0.4-2.9-0.5-4.5-0.5l-798-0.1c-1.9-0.3-3.9,0.1-5.9,1.1c-0.9,0.5-1.7,1.1-2.5,2
			C14.2,39.7,13.5,41,13.1,42.3 M1.2,234.6h841.2V24.5H1.2V234.6z"/> -->
		<?php
		if($logo) {
			if($logo_position) {
				// $x = $x + 100;
				?>
				<image xlink:href="<?= $logo; ?>" height="140" width="180" x="130" y="5"/>
				<?php
			}
			else {
				// $x = $x + 100;
				?>
				<image xlink:href="<?= $logo; ?>" height="140" width="150" x="20" y="50"/>
				<?php
			}
		}
		else {
			$width = $width + 170;
		}
		?>
		


		<?php
		$streetArray = street_name($street_name, 16);
		if($logo) {
			if($logo_position) {
				$streetArray = street_name($street_name, 25);
			}
		}
		$y = 10;
		if(sizeof($streetArray) == 1) {
			$y = 90;
		}
		if(sizeof($streetArray) == 2) {
			$y = 55;
		}
		if(sizeof($streetArray) == 3) {
			$y = 20;
		}
		if($logo) {
			if($logo_position) {
				$y = sizeof($streetArray) > 2 ? 25 : 35;
			}
		}
		foreach ($streetArray as $key => $value) {
			$y = $y + 65;
			?>
		  	<text id="circleResize" text-anchor="middle" x="<?= $x; ?>" y="<?= $y; ?>" font-size="<?= $text_font_size; ?>" class="st8" style="text-transform: uppercase;font-family: <?= $font; ?>"><?= $value; ?></text>
		  	<?php
		}
		?>




		<?php
		if($is_road_symbol == 1) {
			?>
			<g>
				<path class="st4" d="M832.4,42.7c0-1.3-0.4-2.8-1.3-4.1c-1.5-2-3.5-2.8-5.4-2.8h-169c-1.2,0-2.6,0.3-3.8,1.2
					c-2.1,1.6-2.8,3.6-2.9,5.6v173.8c0,1.3,0.4,2.8,1.3,4.1c1.5,2,3.5,2.8,5.4,2.8h169c1.2,0,2.6-0.3,3.8-1.2
					c2.1-1.6,2.8-3.6,2.9-5.6V42.7"/>
				<polyline class="st5" points="788.6,52.7 693.8,52.7 693.8,94.1 729.3,94.1 729.3,206.4 753.1,206.4 753.1,94.1 788.6,94.1 
					788.6,52.7 			"/>
				<rect x="695.9" y="55.5" class="st6" width="90.6" height="36.5"/>
			</g>
			<?php
		}
		?>
		<?php
		if($is_zip) {
			if($is_road_symbol == 1) {
				?>
				<text text-anchor="middle" x="585" y="220" font-size="40"><?= $zip; ?></text>
				<?php
			}
			else {
				?>
				<text text-anchor="middle" x="770" y="220" font-size="40"><?= $zip; ?></text>
				<?php
			}
		}
		?>
	</g>
	<rect x="655" y="232" width="70" height="37.9"/>
	<rect x="104.4" y="232" width="70" height="37.9"/>
</g>
</svg>
