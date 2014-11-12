<?php
	class Base_Precompiler {
		public function prefix($compiler) {
			$compiler->prefix .= ' @function site_url($url) {
	@return "/~jack/think_scss" + $url
}';
		}

		public function suffix($compiler) {
		}
	}
