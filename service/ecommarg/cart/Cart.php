<?php	
	namespace ecommarg\cart;
	use ecommarg\cart\SaveAdapterInterface as SaveAdapter;
	use ecommarg\cart\ProductInterface as Product;

	class Cart implements CartInterface
	{
		private $adapter;
		
		public function __construct(SaveAdapter $adapter)
		{
			$this->adapter=$adapter;
		}
		public function add(Product $producto)
		{
			$this->adapter->set($producto->getId(), json_encode($producto));
		}
		public function get($id)
		{
			$this->adapter->get($id);
		}
		public function all()
		{
			$this->adapter->all();
		}
	}