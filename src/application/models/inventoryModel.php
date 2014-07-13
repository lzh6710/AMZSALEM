<?php
class InventoryModel extends DataMapper {

	var $table = "inventory";

	function findBySKU($sku)
	{
		$inventoryModel = new InventoryModel();
		$inventoryModel->where('SKU', $sku);
		$inventory = $inventoryModel->get(1);
		return $inventory;
	}
	
	function getList()
	{
		$inventoryModel = new InventoryModel();
		$inventory_list = $inventoryModel->get();
		return $inventory_list;
	}
	
	function delete($number)
	{
		$this->db->where('SKU', $number);
		$this->db->delete('inventory');
	}
	
	function updateStatus($feedId, $status) {
		$inventoryModel = new InventoryModel();
		$inventoryModel->where('feedSubmissionId', $feedId);
		$inventoryModel->update(array(
				'feedStatus' => $status));
	}
	
	function findByStatus($status)
	{
		$inventoryModel = new InventoryModel();
		$inventoryModel->where('feedStatus', $status);
		$inventorys = $inventoryModel->get();
		return $inventorys;
	}
	
	function save_or_update() {
		$inventoryModel = new InventoryModel();
		$inventoryModel->where('SKU', $this->SKU);
		if ($inventoryModel->get(1)->result_count() == 1) {
			// update
			$inventoryModel->update(array(
					'quantity' => $this->quantity,
					'fulfillmentLatency' => $this->fulfillmentLatency,
					'feedSubmissionId' => $this->feedSubmissionId,
					'feedStatus' => $this->feedStatus
					));
			
		} else {
			// add
			$this->save();
		}
	}
}
