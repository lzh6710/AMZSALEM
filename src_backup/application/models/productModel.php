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
	
	function findByStatus($status)
	{
		$productModel = new ProductModel();
		$productModel->where('feedStatus', $status);
		$products = $productModel->get();
		return $products;
	}
	
	function delete($number)
	{
		$this->db->where('SKU', $number);
		$this->db->delete('product');
	}
	
	function updateStatus($feedId, $status) {
		$productModel = new ProductModel();
		$productModel->where('feedSubmissionId', $feedId);
		$productModel->update(array(
				'feedStatus' => $status));
	}
}
