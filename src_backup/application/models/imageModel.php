<?php
class ImageModel extends DataMapper {

	var $table = "image";

	function findBySKU($sku)
	{
		$imageModel = new ImageModel();
		$imageModel->where('SKU', $sku);
		$image = $imageModel->get();
		return $image;
	}
	
	function getList()
	{
		$imageModel = new ImageModel();
		$image_list = $imageModel->get();
		return $image_list;
	}
	
	function delete($number)
	{
		$this->db->where('SKU', $number);
		$this->db->delete('image');
	}
	
	function updateStatus($feedId, $status) {
		$imageModel = new ImageModel();
		$imageModel->where('feedSubmissionId', $feedId);
		$imageModel->update(array(
				'feedStatus' => $status));
	}
	
	function findByStatus($status)
	{
		$imageModel = new ImageModel();
		$imageModel->where('feedStatus', $status);
		$images = $imageModel->get();
		return $images;
	}
	
	function save_or_update() {
		$imageModel = new ImageModel();
		$imageModel->where('SKU', $this->SKU);
		$imageModel->where('ImageType', $this->ImageType);
		if ($imageModel->get(1)->result_count() == 1) {
			// update
			$imageModel->update(array(
					'ImageLocation' => $this->ImageLocation,
					'feedSubmissionId' => $this->feedSubmissionId,
					'feedStatus' => $this->feedStatus
					));
			
		} else {
			// add
			$this->save();
		}
	}
}
