<?php 
	namespace ecommarg\cart;
use ecommarg\cart\ProductInterface as Product;
Interface CartInterface{
	public function add(Product $product);
	public function get($id);
	public function getAll();
	

}