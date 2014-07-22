<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller {

	/**
	 * @author VNTrieu
	 * @name __construct
	 * @todo
	 * @param
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('parser');
		check_login(false);
		$this->models = array(
				'product' => new PriceModel(),
				'image' => new ImageModel(),
				'price' => new PriceModel(),
				'inventory' => new InventoryModel());
	}

	public function index()
	{
	}
	
	public function refresh() {
		$id_list = array();
		$type_list = array();
		
		foreach ($this->models as $key => $model) {
			$id_obj = $this->get_id_list($key);
			$id_list = array_merge($id_list, $id_obj['id_list']);
			$type_list = array_merge($type_list, $id_obj['type_list']);
		}
		$this->process_refresh($id_list, $type_list);
	}
	
	public function refresh_by_type($type) {
		$id_obj = $this->get_id_list($type);
		$this->process_refresh($id_obj['id_list'], $id_obj['type_list']);
	}
	
	private function get_id_list($type)
	{
		if (!isset($this->models[$type])) {
			return;
		}
		$modelModel = $this->models[$type];
		
		$model_list = $modelModel->findByStatus('_SUBMITTED_');
		$id_list = array();
		$type_list = array();
		foreach ($model_list as $model) {
			if (!isset($id_list[$model->feedSubmissionId])) {
				array_push($id_list, $model->feedSubmissionId);
				$type_list[$model->feedSubmissionId] = $type;
			}
		}
		
		return array(
				'id_list' => $id_list,
				'type_list' => $type_list
				);
	}
	
	private function process_refresh($id_list, $type_list) {
		if ($id_list) {
			try {
				$result = $this->amazon_api->getFeedSubmissionListById($id_list);
				if ($result['feedSubmissionInfoList']) {
					$result = $this->update_products_status($result['feedSubmissionInfoList'], $type_list);
						
					echo json_encode($result);
				}
			} catch (Exception $e)
			{
				echo $e->getMessage();
			}
		}
	}
	
	private function update_products_status($model_feed_list, $type_list) {
		
		$status_list = array();
		foreach ($model_feed_list as $model_feed) {
			array_push($status_list, $this->update_product_status($model_feed,
				$type_list[$model_feed['FeedSubmissionId']]));
		}
		return $status_list;
	}
	
	private function update_product_status($model_feed, $type) {
		if ($model_feed['FeedProcessingStatus'] != '_DONE_') {
			return;
		}
		
		$result = $this->amazon_api->getFeedSubmissionResult($model_feed['FeedSubmissionId']);
		$modelModel = $this->models[$type];
		if ($result->Message->ProcessingReport->ProcessingSummary->MessagesSuccessful) {
			$modelModel->updateStatus($model_feed['FeedSubmissionId'], '_SUCCESS_');
			return array($model_feed['FeedSubmissionId'] => '_SUCCESS_');
		} else {
			$modelModel->updateStatus($model_feed['FeedSubmissionId'], '_FAIL_');
			return array($model_feed['FeedSubmissionId'] => '_FAIL_');
		}
	}
}