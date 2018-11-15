<?php	
	namespace ecommarg\cart;
	use ecommarg\cart\SaveAdapterInterface as SaveAdapter;
	use ecommarg\cart\ProductInterface as Product;
	Class Cart implements CartInterface{
		
		private	$adapter;
		public function __construct (SaveAdapter $adapter){
			$this->adapter=$adapter;
		}
		public function add(Product $product, $quantity=1)
		{
			$quantity=(int)$quantity;
			if($quantity<=0){
				throw new \Exception("cantidad invalida");
			}

			$this->adapter->set(
				$product->getId(),
				json_encode([
								'quantity'=>$quantity,
								'product'=>$product
								])
			);

		}
		public function get($id){
			return $this->adapter->get($id);
		}
		public function getAll(){
			
			$data= $this->adapter->getAll();
			foreach($data as &$item){ // el &  modifica el $item y no genera una copia, consume menos memoria
				$item=json_decode($item);
			}
			return $data;
		}
		
	}