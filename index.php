<?php
	/**
	 * ChickenASM Programming Language
	 * Copyright (C) 2013 powder96 <https://github.com/powder96/>
	 *
	 * This program is free software: you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
	 * the Free Software Foundation, either version 3 of the License, or
	 * (at your option) any later version.
	 *
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License
	 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
	 */

	require_once('ChickenLanguage.php');
	
	define('EXAMPLES_DIR', __DIR__ . '/examples');
	
	test(EXAMPLES_DIR . '/helloworld.chn', '(unused)', '&#72;&#101;&#108;&#108;&#111;&#32;&#119;&#111;&#114;&#108;&#100;');
	test(EXAMPLES_DIR . '/quine.chn', '(unused)', 'chicken');
	test(EXAMPLES_DIR . '/cat.chn', 'Chicken Power!', 'Chicken Power!');
	test(EXAMPLES_DIR . '/99chickens.chn', '9', '9&#32;chicken&#115;&#10;8&#32;chicken&#115;&#10;7&#32;chicken&#115;&#10;6&#32;chicken&#115;&#10;5&#32;chicken&#115;&#10;4&#32;chicken&#115;&#10;3&#32;chicken&#115;&#10;2&#32;chicken&#115;&#10;1&#32;chicken&#10;n&#111;&#32;chicken&#115;&#10;');
	test(EXAMPLES_DIR . '/deadfish.chn', 'iissiso', '&#32;289&#32;');
	
	function test($file, $input, $expectedOutput) {
		echo '<h3>' . $file . '</h3>';
		echo 'Input: <code>' . $input . '</code><br />';

		try {
			$output = ChickenLanguage\interpretChickenCode(file_get_contents($file), $input);
		}
		catch(Exception $e) {
			$output = $e->getMessage();
		}		
		echo 'Output: <code>' . $output . ' <small><em>[' . htmlspecialchars($output) . ']</em></small></code><br />';
		if($output !== $expectedOutput)
			echo 'Expected output: <code>' . $expectedOutput . ' <small><em>[' . htmlspecialchars($expectedOutput) . ']</em></small></code>';
		
		echo '<hr />';
	}