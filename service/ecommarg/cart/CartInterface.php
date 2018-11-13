<?php 
	namespace ecommarg\cart;
	use ecommarg\cart\ProductInterface as Product;

	interface CartInterface
	{
		public function add(Product $producto);
		public function get($id);
	}