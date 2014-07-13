<?php
class PriceModel extends DataMapper {

	var $table = "price";

	function findBySKU($sku)
	{
		$priceModel = new PriceModel();
		$priceModel->where('SKU', $sku);
		$price = $priceModel->get(1);
		return $price;
	}
	
	function getList()
	{
		$priceModel = new PriceModel();
		$price_list = $priceModel->get();
		return $price_list;
	}
	
	function delete($number)
	{
		$this->db->where('SKU', $number);
		$this->db->delete('price');
	}
	
	function updateStatus($feedId, $status) {
		$priceModel = new PriceModel();
		$priceModel->where('feedSubmissionId', $feedId);
		$priceModel->update(array(
				'feedStatus' => $status));
	}
	
	function findByStatus($status)
	{
		$priceModel = new PriceModel();
		$priceModel->where('feedStatus', $status);
		$prices = $priceModel->get();
		return $prices;
	}
	
	function save_or_update() {
		$priceModel = new PriceModel();
		$priceModel->where('SKU', $this->SKU);
		if ($priceModel->get()) {
			// update
			$priceModel->update(array(
					'price' => $this->price,
					'currency' => $this->currency,
					'feedSubmissionId' => $this->feedSubmissionId,
					'feedStatus' => $this->feedStatus
					));
			
		} else {
			// add
			$this->save();
		}
	}
}
