<?php

	class Views{

		public function view($directory, $args = [])
		{
			extract($args);

			require_once($directory.'.php');
		}
	}


?>