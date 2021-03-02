<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="538.084px" height="245.484px" viewBox="0 0 538.084 245.484" enable-background="new 0 0 538.084 245.484"
	 xml:space="preserve">
<g>
	<g>
		<rect x="21" y="19.226" fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" width="506.667" height="184.667"/>
	</g>
	<g>
		<rect x="47.135" y="192.784" fill="#231F20" width="452" height="6"/>
	</g>
	<g>
		<rect x="47.135" y="23.785" fill="#231F20" width="452" height="6"/>
	</g>
	<g>
		<rect x="44.135" y="23.784" fill="#231F20" width="6" height="42.216"/>
	</g>
	<g>
		<rect x="24.135" y="63.784" fill="#231F20" width="6" height="94.191"/>
	</g>
	<g>
		<rect x="27.333" y="63.892" fill="#231F20" width="22.91" height="6"/>
	</g>
	<g>
		<rect x="27.333" y="151.892" fill="#231F20" width="22.91" height="6"/>
	</g>
	<g>
		<rect x="44.135" y="156.784" fill="#231F20" width="6" height="42.216"/>
	</g>
	<g>
		<rect x="518.244" y="64.809" fill="#231F20" width="6" height="94.191"/>
	</g>
	<g>
		<rect x="498.244" y="156.784" fill="#231F20" width="6" height="42.216"/>
	</g>
	<g>
		<!-- post line below -->
		<g>
			<rect x="80.135" y="204.784" fill="#231F20" width="50" height="29.549"/>
		</g>
		<g>
			<rect x="417.244" y="204.784" fill="#231F20" width="50" height="29.549"/>
		</g>
	</g>
	<g>
		<rect x="498.135" y="152.892" fill="#231F20" width="22.91" height="6"/>
	</g>
	<g>
		<rect x="498.135" y="64.892" fill="#231F20" width="22.91" height="6"/>
	</g>
	<g>
		<rect x="498.244" y="23.784" fill="#231F20" width="6" height="42.216"/>
	</g>
	<g>
		<path fill="#231F20" d="M529.667,205.892H19V17.226h510.667V205.892z M23,201.892h502.667V21.226H23V201.892z"/>
	</g>
	<?php
	if($logo) {
		if($logo_position) {
			?>
			<image xlink:href="<?= $logo; ?>" height="140" width="150" x="130" y="5"/>
			<?php
		}
		else {
			?>
			<image xlink:href="<?= $logo; ?>" height="100" width="150" x="10" y="60"/>
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
	$y = 110;
	if(sizeof($streetArray) == 1) {
		$y = 75;
	}
	if(sizeof($streetArray) == 2) {
		$y = 55;
	}
	if(sizeof($streetArray) == 3) {
		$y = 30;
	}
	if($logo) {
		if($logo_position) {
			$y = sizeof($streetArray) > 2 ? 25 : 35;
		}
	}
	foreach ($streetArray as $key => $value) {
		$y = $y + 45;
		?>
	  	<text id="circleResize" text-anchor="middle" x="270" y="<?= $y; ?>" font-size="30" style="text-transform: uppercase;font-family: <?= $font; ?>"><?= $value; ?></text>
	  	<?php
	}
	?>
	<?php
	if($is_road_symbol == 1) {
		?>
		<g>
			<g>
				<path fill-rule="evenodd" clip-rule="evenodd" fill="#096EB5" d="M412.405,112.569c0-11.49-0.016-22.98,0.007-34.47
					c0.012-6.136,1.26-7.481,7.174-7.49c22.147-0.033,44.294-0.036,66.441-0.001c5.668,0.009,6.965,1.342,6.974,7.17
					c0.033,23.146,0.037,46.293-0.004,69.439c-0.01,5.851-1.566,7.356-7.458,7.364c-21.814,0.028-43.629,0.025-65.443,0.001
					c-6.351-0.007-7.667-1.313-7.683-7.543C412.386,135.549,412.405,124.059,412.405,112.569z"/>
			</g>
			<g>
				<path fill-rule="evenodd" clip-rule="evenodd" fill="#FEFEFE" d="M447.749,146.73c-0.119-16.597-0.238-33.194-0.357-49.792
					c1.907-4.38,5.586-2.42,8.537-2.104c2.75,0.294,2.108,2.917,2.111,4.822c0.022,14.094,0.017,28.188,0.011,42.282
					c-0.003,5.303-0.014,5.341-5.438,5.279C450.991,147.198,449.291,147.663,447.749,146.73z"/>
			</g>
			<g>
				<path fill-rule="evenodd" clip-rule="evenodd" fill="#D9D3E0" d="M447.749,146.73c9.813-0.22,9.813-0.22,9.813-10.122
					c0-11.15,0-22.301,0-33.452c-0.001-8.03-2.327-9.452-10.171-6.218c-4.486-0.074-8.978-0.298-13.458-0.163
					c-2.639,0.08-3.491-0.799-3.38-3.409c0.185-4.317,0.124-8.648,0.023-12.971c-0.051-2.141,0.765-2.927,2.9-2.917
					c12.807,0.056,25.614,0.056,38.421-0.003c2.082-0.01,3.017,0.622,2.963,2.835c-0.109,4.488-0.091,8.982-0.005,13.471
					c0.039,2.078-0.665,3.156-2.858,2.936c-0.329-0.033-0.666-0.016-0.997,0.003c-3.953,0.232-9.223-1.709-11.535,0.72
					c-2.714,2.852-0.836,8.208-0.89,12.468c-0.133,10.643-0.271,21.296,0.063,31.931c0.142,4.514-1.055,6.515-5.689,5.661
					C451.226,147.183,449.297,148.243,447.749,146.73z"/>
			</g>
			<g>
				<path fill-rule="evenodd" clip-rule="evenodd" fill="#E53047" d="M452.564,78.787c5.821,0,11.644,0.087,17.462-0.041
					c2.418-0.053,3.44,0.447,3.554,3.228c0.529,12.994,0.63,12.99-12.278,12.99c-8.315,0-16.635-0.128-24.945,0.063
					c-3.282,0.076-4.652-0.617-4.65-4.314c0.005-11.927-0.154-11.927,11.878-11.927C446.577,78.786,449.571,78.786,452.564,78.787z"
					/>
			</g>
		</g>
		<?php
	}
	?>	
	<?php
	if($is_zip) {
		?>
		<text text-anchor="middle" x="455" y="180" font-size="30"><?= $zip; ?></text>
		<?php
	}
	?>
</g>
</svg>
