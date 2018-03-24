<?php


	class Item
	{
		public $id;
		public $itemname;
		public $itemquantity;
		public $itemprice;

		public function __construct($id, $itemname, $itemquantity, $itemprice)
		{
			$this->id = $id;
			$this->itemname = $itemname;
			$this->itemquantity = $itemquantity;
			$this->itemprice = $itemprice;
		}

		public static function all()
		{
			$list = [];
			$db = Db::getInstance();
			$req = $db->query('select * from items');

			foreach($req->fetchAll() as $item)
			{
				$list[] = new Item($item['id'], $item['itemname'], $item['itemquantity'], $item['itemprice']);
			}

			return $list;
		}

		public static function find($id)
		{
			$db = Db::getInstance();
			$req = $db->prepare('select * from items where id=:id');
			$req->execute(array('id'=>$id));
			$item = $req->fetch();

			return new Item($item['id'], $item['itemname'], $item['itemquantity'], $item['itemprice']);
		}

		public static function update($id,$itemname,$itemquantity,$itemprice)
		{
			$db = Db::getInstance();
			$req = $db->prepare('update items set itemname=:itemname, itemquantity=:itemquantity, itemprice=:itemprice where id=:id');
			$req->execute(array('id'=>$id,
								'itemname'=>$itemname,
								'itemquantity'=>$itemquantity,
								'itemprice'=>$itemprice));
		}

		public static function create($itemname,$itemquantity,$itemprice)
		{
			$db = Db::getInstance();
			$req = $db->prepare('insert into items (itemname, itemquantity, itemprice) values (:itemname, :itemquantity, :itemprice)');
			$req->execute(array('itemname'=>$itemname,
								'itemquantity'=>$itemquantity,
								'itemprice'=>$itemprice));
		}

		public static function delete($id)
		{
			$db = Db::getInstance();
			$req = $db->prepare('delete from items where id=:id');
			$req->execute(array('id'=>$id));
		}

		public static function orderBy($column, $order)
		{
			$db = Db::getInstance();
			$req = $db->query("select * from items order by $column $order");
			$list = [];

			foreach($req->fetchAll() as $item)
			{
				$list[] = new Item($item['id'], $item['itemname'], $item['itemquantity'], $item['itemprice']);
			}

			return $list;
		}

	}

?>