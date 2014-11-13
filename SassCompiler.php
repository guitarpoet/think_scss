<?php
	if(!extension_loaded('sass')) {
		trigger_error('Cant\'t find any sass plugin installed!!');
		die;
	}

	require_once('PluginLoader.php');

	/**
	 * Loading all the sass file altogether, and compile the string as sass
	 */
	class SassCompiler {
		public function __construct() {
			$this->sass = new Sass();
			$this->sasses = array();
			$this->includePathes = array(dirname(__FILE__).'/css');
		}

		public function precompile() {
			if(!isset($this->p)) {
				$this->p = new PluginLoader();
				$this->ps = $this->p->load(dirname(__FILE__).'/precompiler');
			}

			if(isset($this->theme)) {
				$this->addIncludePath('css/themes/'.$this->theme);
			}
			else {
				$this->addIncludePath('css/themes/default');
			}

			$this->prefix = '';
			$this->suffix = '';
			foreach($this->ps as $plugin) {
				if(method_exists($plugin, 'prefix')) {
					$plugin->prefix($this);
				}
			}

			$content = $this->prefix."\n";
			foreach($this->sasses as $sass) {
				$content .= $this->readFile($sass)."\n";
			}


			foreach($this->ps as $plugin) {
				if(method_exists($plugin, 'suffix')) {
					$plugin->suffix($this);
				}
			}
			$content .= $this->suffix;
			return $content;
		}

		public function readFile($file) {
			foreach($this->includePathes as $path) {
				$filepath = $path.'/'.$file;
				if(file_exists($filepath) && is_file($filepath) &&
					is_readable($filepath)) {
					return file_get_contents($filepath);
				}
			}
			return '';
		}

		public function compile() {
			$args = func_get_args();
			if($args) {
				foreach($args as $sass) {
					$this->addSass($sass);
				}
			}
			
			$content = $this->precompile();
			$this->sass->setIncludePath(implode(PATH_SEPARATOR, $this->includePathes));
			$this->sass->setImagePath('/~jack/think_scss');
			echo $this->sass->compile($content);
		}

		public function addIncludePath($path, $index = -1) {
			if(array_search($path, $this->includePathes) === FALSE) {
				if($index == -1)
					$this->includePathes []= $path;
				else
					array_splice($this->includePathes, $index, 0, $path);
			}
		}

		public function addSass($file, $index = -1) {
			if(array_search($file, $this->sasses) === FALSE) {
				if($index == -1)
					$this->sasses []= $file;
				else
					array_splice($this->sasses, $index, 0, $file);
			}
		}
	}
