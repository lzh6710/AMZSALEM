<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	/**
	 * @author NNTrung
	 * @name __construct
	 * @todo
	 * @param
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('parser');
		check_login(false);
	}

	public function index()
	{
		$productModel = new ProductModel();
		$product_list = $productModel->getList();
		
		$data = array();
		$data['product_list'] = $product_list;
		$this->layout->view('product_list', $data);
	}
	
	public function categories()
	{
		$data = array();
		$this->layout->view('product_categories', $data);
	}
	
	/** Edit product*/
	public function edit()
	{
		$sku = $this->input->post('SKU');
		$data = array();
		$productModel = new ProductModel();
		$product = $productModel->findBySKU($sku);
		$product->productData = new SimpleXMLElement($product->productData);
		$imageModel = new ImageModel();
		$priceModel = new PriceModel();
		$inventoryModel = new InventoryModel();
		$product->imageList = $imageModel->findBySKU($sku);
		$product->price = $priceModel->findBySKU($sku);
		$product->inventory = $inventoryModel->findBySKU($sku);
		$data['categories'] = $product->categories;
		$data['product'] = $product;
		
		$this->layout->view('product_edit', $data);
	}
	
	public function image() {
		$this->load->library('uploadHandler');
	}
	
	public function update_image() {
		$imageType = array('Main', 'Swatch', 'PT1', 'PT2', 'PT3', 'PT4', 'PT5', 'PT6', 'PT7', 'PT8', 'Search');
		
		$messages = '';
		$imageList = array();
		$count = 0;
		foreach ($imageType as $type) {
			if ($this->input->post($type)) {
				$count++;
				array_push($imageList, array(
						'Id' => $count,
						'SKU' => $this->input->post('SKU'),
						'ImageType' => $type,
						'ImageLocation' => $this->input->post($type)
						));
			}
		}
		if (!$imageList) {
			return;
		}
		foreach ($imageList as $image) {
				$messages.= $this->parser->parse('xml/product_image_message', $image, TRUE);
		}
		$feed =  $this->parser->parse('xml/product_image', array(
				'MerchantIdentifier' => MERCHANT_ID,
				'Message' => $messages), TRUE);
		try {
			$result = $this->amazon_api->submitImage($feed);
			
			foreach ($imageList as $image) {
				$imageModel = new ImageModel();
				$imageModel->SKU = $image['SKU'];
				$imageModel->ImageType = $image['ImageType'];
				$imageModel->ImageLocation = $image['ImageLocation'];
				$imageModel->feedSubmissionId = $result['FeedSubmissionId'];
				$imageModel->feedStatus = $result['FeedProcessingStatus'];
	
				$imageModel->save_or_update();
				echo "success";
			}
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function update_price() {
		$price = array(
				'MerchantIdentifier' => MERCHANT_ID,
				'SKU' => $this->input->post('SKU'),
				'currency' => $this->input->post('currency'),
				'price' => $this->input->post('price')
				);
		$feed = $this->parser->parse('xml/product_price', $price, TRUE);
		try {
			$result = $this->amazon_api->submitPrice($feed);
			
			$priceModel = new PriceModel();
			
			$priceModel->SKU = $price['SKU'];
			$priceModel->currency = $price['currency'];
			$priceModel->price = $price['price'];
			$priceModel->feedSubmissionId = $result['FeedSubmissionId'];
			$priceModel->feedStatus = $result['FeedProcessingStatus'];
			
			$priceModel->save_or_update();
			echo "success";
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function update_inventory() {
		$inventory = array(
				'MerchantIdentifier' => MERCHANT_ID,
				'SKU' => $this->input->post('SKU'),
				'Quantity' => $this->input->post('quantity'),
				'FulfillmentLatency' => $this->input->post('fulfillmentLatency')
		);
		$feed = $this->parser->parse('xml/product_inventory', $inventory, TRUE);
		try {
			$result = $this->amazon_api->submitInventory($feed);
				
			$inventoryModel = new InventoryModel();

			$inventoryModel->SKU = $inventory['SKU'];
			$inventoryModel->quantity = $inventory['Quantity'];
			$inventoryModel->fulfillmentLatency = $inventory['FulfillmentLatency'];
			$inventoryModel->feedSubmissionId = $result['FeedSubmissionId'];
			$inventoryModel->feedStatus = $result['FeedProcessingStatus'];
				
			$inventoryModel->save_or_update();
			echo "success";
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	/** Add product */
	public function add_categories($categories)
	{
		$data = array();
		$data['is_edit'] = false;
		$data['categories'] = $categories;
		$productModel = new ProductModel();
		$productModel->productData = array();
		
		if (!$this->input->post()) {
			$data['product'] = $productModel;
			$this->layout->view('product_form', $data);
		} else {
			$this->validation($data, $productModel, false);
		}
	}

	public function add()
	{
		$data = array();
		$data['is_edit'] = false;
		$data['categories'] = $this->input->post('categories');
		$productModel = new ProductModel();
			
		if (!$this->input->post()) {
			$data['product'] = $productModel;
			$this->layout->view('product_form', $data);
		} else {
			$this->validation($data, $productModel, false);
		}
	}

	private function validation($data, $productModel, $is_update) {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Product Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('itemPackageQuantity', 'Item Package Quantity', 'trim|numeric');
		$this->form_validation->set_rules('brand', 'Brand', 'trim');
		$this->form_validation->set_rules('country', 'Country', 'trim');
		$this->form_validation->set_rules('MSRP', 'MSRP', 'trim');
		$this->form_validation->set_rules('manufacturer', 'Manufacturer', 'trim');
		$this->form_validation->set_rules('description', 'Description', 'trim');

		$productModel->title = trim($this->input->post('title'));
		$productModel->itemPackageQuantity = trim($this->input->post('itemPackageQuantity'));
		$productModel->brand = trim($this->input->post('brand'));
		$productModel->country = trim($this->input->post('country'));
		$productModel->MSRP = trim($this->input->post('MSRP'));
		$productModel->currency = trim($this->input->post('currency'));
		$productModel->manufacturer = trim($this->input->post('manufacturer'));
		$productModel->description = trim($this->input->post('description'));
		$productModel->productData = $this->input->post('productData');
		$productModel->mfrPartNumber = $this->input->post('mfrPartNumber');
		

		if($this->form_validation->run() == false) {
			$data['product'] = $productModel;
			$this->layout->view('product_form', $data);
		} else {
			$productModel->SKU = $this->generateSKU();
			$productModel->UPC = "4015643103921";
			$productModel->productData = $this->parser->parse('xml/product_'.$data['categories'], $productModel->productData, TRUE);
			$productModel->categories = $data['categories'];

			try{
				$data = array(
						'MerchantIdentifier' => MERCHANT_ID,
						'Title' => $productModel->title,
						'SKU' => $productModel->SKU,
						'UPC' => $productModel->UPC,
						'ItemPackageQuantity' => $productModel->itemPackageQuantity,
						'Brand' => $productModel->brand,
						'Country' => $productModel->country,
						'MSRP' => $productModel->MSRP,
						'currency' => $productModel->currency,
						'Manufacturer' => $productModel->manufacturer,
						'MfrPartNumber' => $productModel->mfrPartNumber,
						'Description' => $productModel->description,
						'ProductData' => $productModel->productData
				);
				$feed = $this->parser->parse('xml/product_template', $data, TRUE);
				echo "<textarea>".$feed."</textarea>";
					
				$result=$this->amazon_api->submitProduct($feed);
				$productModel->feedSubmissionId = $result['FeedSubmissionId'];
				$productModel->feedStatus = $result['FeedProcessingStatus'];
	
				$productModel->save();
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
			
			redirect('product');
		}
	}

	function SKU_check($sku, $is_update = false){
		if ($is_update) {
			return true;
		}

		$productModel = new ProductModel();
		$product = $productModel->findBySKU($sku);
		if ($product->result_count() == 1) {
			$product->form_validation->set_message('SKU_check', 'The %s is exist');
			return false;
		} else {
			return true;
		}
	}

	function generateRandomString($length = 17) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	
	function generateSKU() {
		$sku = $this->generateRandomString();
		if (!$this->SKU_check($sku)) {
			$sku = $this->generateSKU();
		}
		return $sku;
	}


}