<?php
	

	class ItemsController
	{

		public static function index()
		{
			$items = Item::orderBy('id','ASC');
			Views::view('items/index',['items'=>$items]);
		}

		public function store()
		{
			$itemname = $_POST['itemname'];
			$itemquantity = $_POST['itemquantity'];
			$itemprice = $_POST['itemprice'];

			Item::create($itemname, $itemquantity, $itemprice);

			$items = Item::all();

			Views::view('items/index',['items'=>$items]);
		}

		public static function edit()
		{	
			if(!isset($_GET['id']))
			{
				call('pages','error');
			}

			$id = $_GET['id'];

			$item = Item::find($id);

			Views::view('items/edit',['item'=>$item]);
		}

		public static function update()
		{
			$id = $_POST['id'];
			$itemname = $_POST['itemname'];
			$itemquantity = $_POST['itemquantity'];
			$itemprice = $_POST['itemprice'];
			Item::update($id, $itemname, $itemquantity, $itemprice);
			$items = Item::all();

			Views::view('items/index',['items'=>$items]);
		}

		public function additem()
		{
			Views::view('items/additem');
		}

		public function destroy()
		{
			$id = $_GET['id'];
			Item::delete($id);
			$items = Item::all();
			Views::view('items/index', ['items'=>$items]);
		}
	}

?>