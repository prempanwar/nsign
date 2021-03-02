<?php
$x = 20;
$width = 450;
if(empty($is_road_symbol)) {
	$width = $width + 200;
}
?>
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 841.9 595.3" style="enable-background:new 0 0 841.9 595.3;" xml:space="preserve">
	<style type="text/css">
		.st0{fill:#FFFFFF;}
		.st1{fill-rule:evenodd;clip-rule:evenodd;}
		.st2{fill-rule:evenodd;clip-rule:evenodd;fill:#E52E47;}
		.st3{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
		.st4{fill-rule:evenodd;clip-rule:evenodd;fill:#385CA6;}
		.st5{fill-rule:evenodd;clip-rule:evenodd;fill:#E73329;}
	</style>
	<rect x="7.7" y="201" class="st0" width="828.3" height="193"/>
	<g>
		<path class="st1" d="M13.1,210.3c-0.4,1.3-0.6,2.7-0.6,4.1v166.5c0,1.5,0.1,3.1,0.6,4.5s1.4,2.6,2.4,3.9c2.5,1.3,5.1,2.1,7.7,2.1
			h798.3c1.6,0,3.1-0.2,4.5-0.7s2.6-1.5,3.8-2.4c1.6-2.4,2.5-4.9,2.5-7.5V214.7c0-1.5,0.1-3-0.4-4.4c-0.4-1.4-1.3-2.6-2.2-3.8
			c-1.3-0.8-2.6-1.7-4-2.1c-1.4-0.4-2.9-0.5-4.5-0.5l-798-0.1c-1.9-0.3-3.9,0.1-5.9,1.1c-0.9,0.5-1.7,1.1-2.5,2
			C14.2,207.7,13.5,209,13.1,210.3 M1.2,402.6h841.2V192.5H1.2V402.6z"/>
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
		<foreignObject height="200" y="200" x="<?= $x; ?>" width="<?= $width; ?>">
		   	<style>
		      	svg div { display: table; font-size: 60px; width: 100%; height: 100%; }
		      	svg p   { display: table-cell; text-align: center; vertical-align: middle; color: #000; line-height: 55px;}
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
			<g>
				<path class="st4" d="M832.4,210.7c0-1.3-0.4-2.8-1.3-4.1c-1.5-2-3.5-2.8-5.4-2.8h-169c-1.2,0-2.6,0.3-3.8,1.2
					c-2.1,1.6-2.8,3.6-2.9,5.6v173.8c0,1.3,0.4,2.8,1.3,4.1c1.5,2,3.5,2.8,5.4,2.8h169c1.2,0,2.6-0.3,3.8-1.2c2.1-1.6,2.8-3.6,2.9-5.6
					V210.7"/>
				<polyline class="st3" points="788.6,220.7 693.8,220.7 693.8,262.1 729.3,262.1 729.3,374.4 753.1,374.4 753.1,262.1 788.6,262.1 
					788.6,220.7 		"/>
				<rect x="695.9" y="223.5" class="st5" width="90.6" height="36.5"/>
			</g>
			<?php
		}
		?>
		<?php
		if($is_zip) {
			if($is_road_symbol == 1) {
				?>
				<text text-anchor="middle" x="585" y="380" font-size="40"><?= $zip; ?></text>
				<?php
			}
			else {
				?>
				<text text-anchor="middle" x="770" y="380" font-size="40"><?= $zip; ?></text>
				<?php
			}
		}
		?>
	</g>
	<rect x="731" y="400" width="7" height="37.9"/>
	<rect x="104.4" y="400" width="7" height="37.9"/>
</svg>