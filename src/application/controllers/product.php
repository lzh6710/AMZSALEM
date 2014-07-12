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
	
	public function add_categories($categories)
	{
		$data = array();
		$data['is_edit'] = false;
		$data['categories'] = $categories;
		$productModel = new ProductModel();
		
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
		$this->form_validation->set_rules('SKU', 'SKU', 'trim|required|callback_SKU_check['.$is_update.']');
		$this->form_validation->set_rules('ASIN', 'ASIN', 'trim|required|callback_ASIN_check['.$is_update.']');
		$this->form_validation->set_rules('itemPackageQuantity', 'Item Package Quantity', 'trim|numeric');
		$this->form_validation->set_rules('numberOfItems', 'Number Of Items', 'trim|numeric');
		$this->form_validation->set_rules('brand', 'Brand', 'trim');
		$this->form_validation->set_rules('country', 'Country', 'trim');
		$this->form_validation->set_rules('MSRP', 'MSRP', 'trim');
		$this->form_validation->set_rules('packageWeight', 'Package Weight', 'trim');
		$this->form_validation->set_rules('shippingWeight', 'ShippingWeight', 'trim');
		$this->form_validation->set_rules('manufacturer', 'Manufacturer', 'trim');
		$this->form_validation->set_rules('description', 'Description', 'trim');

		$productModel->title = trim($this->input->post('title'));
		$productModel->SKU = trim($this->input->post('SKU'));
		$productModel->ASIN = trim($this->input->post('ASIN'));
		$productModel->itemPackageQuantity = trim($this->input->post('itemPackageQuantity'));
		$productModel->numberOfItems = trim($this->input->post('numberOfItems'));
		$productModel->brand = trim($this->input->post('brand'));
		$productModel->country = trim($this->input->post('country'));
		$productModel->MSRP = trim($this->input->post('MSRP'));
		$productModel->packageWeight = trim($this->input->post('packageWeight'));
		$productModel->shippingWeight = trim($this->input->post('shippingWeight'));
		$productModel->manufacturer = trim($this->input->post('manufacturer'));
		$productModel->description = trim($this->input->post('description'));

		if($this->form_validation->run() == false) {
			$data['product'] = $productModel;
			$this->layout->view('product_form', $data);
		} else {
			if ($is_update) {
				$product = array();
				$productModel->where('SKU', $productModel->SKU);
				$productModel['title'] = trim($this->input->post('title'));
				$productModel['SKU'] = trim($this->input->post('SKU'));
				$productModel['ASIN'] = trim($this->input->post('ASIN'));
				$productModel['itemPackageQuantity'] = trim($this->input->post('itemPackageQuantity'));
				$productModel['numberOfItems'] = trim($this->input->post('numberOfItems'));
				$productModel['brand'] = trim($this->input->post('brand'));
				$productModel['country'] = trim($this->input->post('country'));
				$productModel['MSRP'] = trim($this->input->post('MSRP'));
				$productModel['packageWeight'] = trim($this->input->post('packageWeight'));
				$productModel['shippingWeight'] = trim($this->input->post('shippingWeight'));
				$productModel['manufacturer'] = trim($this->input->post('manufacturer'));
				$productModel['description'] = trim($this->input->post('description'));
				$productModel->update($product);
			} else {

				try{
					$data = array(
							'MerchantIdentifier' => 'A2T7KN13JZ9T6W',
							'Title' => $productModel->title,
							'SKU' => $productModel->SKU,
							'ASIN' => $productModel->ASIN,
							'ItemPackageQuantity' => $productModel->itemPackageQuantity,
							'NumberOfItems' => $productModel->numberOfItems,
							'Brand' => $productModel->brand,
							'Country' => $productModel->country,
							'MSRP' => $productModel->MSRP,
							'PackageWeight' => $productModel->packageWeight,
							'ShippingWeight' => $productModel->shippingWeight,
							'Manufacturer' => $productModel->manufacturer,
							'Description' => $productModel->description
					);
					$feed = $this->parser->parse('xml/product_template', $data, TRUE);
					$result=$this->amazon_api->submitFeed($feed);
				}
				catch(Exception $e)
				{
					echo $e->getMessage();
				}

				//print_r($result);

				$productModel->save();
			}
			redirect('home');
		}
	}

	function SKU_check($sku, $is_update){
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

	function ASIN_check($asin, $is_update){
		if ($is_update) {
			return true;
		}

		$productModel = new ProductModel();
		$product = $productModel->findByASIN($asin);
		if ($product->result_count() == 1) {
			$product->form_validation->set_message('ASIN_check', 'The %s is exist');
			return false;
		} else {
			return true;
		}
	}


}