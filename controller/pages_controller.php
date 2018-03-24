<?php

	class PagesController extends Views
	{
		public function home()
		{
			$fname = 'enrik';
			$lname = 'sabalvaro';

			return Views::view('pages/home',['fname'=>$fname, 'lname'=>$lname]);
		}

		public function error()
		{
			return Views::view('pages/error');
		}
	}


?>