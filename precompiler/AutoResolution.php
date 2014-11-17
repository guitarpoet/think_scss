<?php
	class AutoResolution_Precompiler {

		public function suffix($compiler) {
			if(!isset($compiler->resolutions)) 
				return;

			foreach($compiler->resolutions as $r) {
				$compiler->suffix .= '@media (min-width: '.$r.'px) {'."\n";
				foreach($compiler->sasses as $s) {
					$s = str_replace('.scss', '', $s);
					$basename = basename($s);
					$name = str_replace('/', '_', $s);

					if($basename != $name) {
						$this->addConstruct($basename, $compiler, $r);
					}
					$this->addConstruct($name, $compiler, $r);
				}
				$compiler->suffix .= '}'."\n";
			}
		}

		protected function addConstruct($name, $compiler, $r) {
			$the_name = 'responsive_'.$name;
			if(strpos($compiler->content, $the_name) !== FALSE) {
					$compiler->suffix .= "\t".'@include '.$the_name.'('.$r.'px);'."\n";
			}
		}
	}
