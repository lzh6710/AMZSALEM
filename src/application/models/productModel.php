<?php
class ProductModel extends DataMapper {

	var $table = "product";

	function findByASIN($asin)
	{
		$productModel = new ProductModel();
		$productModel->where('ASIN', $asin);
		$product = $productModel->get(1);
		return $product;
	}
	
	function findBySKU($sku)
	{
		$productModel = new ProductModel();
		$productModel->where('SKU', $sku);
		$product = $productModel->get(1);
		return $product;
	}
	
	function getList()
	{
		$productModel = new ProductModel();
		$product_list = $productModel->get();
		return $product_list;
	}
	
	function delete($number)
	{
		$this->db->where('SKU', $number);
		$this->db->delete('product');
	}
}
