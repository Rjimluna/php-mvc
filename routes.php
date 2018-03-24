<?php


	function call($controller, $action)
	{
		require_once('controller/'.$controller.'_controller.php');

		switch($controller)
		{
			case 'pages':
				$controller = new PagesController();
			break;
			case 'items':
				require_once('model/item.php');
				$controller = new ItemsController();
			break;
		}

		$controller->{ $action }();
	}

	$routes = array('pages'=>['home','error'],
					'items'=>['index','show','edit','update','destroy', 'store', 'additem']);

	if(array_key_exists($controller, $routes))
	{
		if(in_array($action, $routes[$controller]))
		{
			call($controller, $action);
		} else {
			call('pages','error');
		}
	} else {
		call('pages', 'error');
	}


?>