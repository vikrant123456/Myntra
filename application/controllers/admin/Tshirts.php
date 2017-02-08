<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tshirts extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->lang->load('en_admin', 'english');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
		$this->load->model('Tshirts_model');
	}	

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('rid') == 1 ) {
			// Set Page Title
			$header['page_title'] = "Tshirts Male Products";
			$page = 1;		

			$tshirts_male = $this->Tshirts_model->getAllTshirtMale($page);

			// Create the data array to pass to view
			$menu_details['session'] = $this->session->userdata;

			$data['tshirts_male'] = $tshirts_male;
			$data['message'] = $this->session->flashdata('message');

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/left_menu', $menu_details);
			$this->load->view('admin/tshirts/male/list', $data);
			$this->load->view('admin/common/footer');
		} else {
			redirect('admin/login');
		}
	}

	public function male_add() {
	if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('rid') == 1 ) {
			// Set validation rules for view filters
			//$this->form_validation->set_rules('destination_name', "Name field is required", 'required');
			//$this->form_validation->set_rules('destination_state', $this->lang->line('signin_email'), 'required');

			$this->form_validation->set_error_delimiters('<p class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">&times;</a>', '</p>');

		if(!empty($this->input->post('champions_products_title'))) {

			//$data = array();
        if(!empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $uploadPath = 'upload/t-shirts/male/anatomy';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                }
            }
        }

        if(!empty($_FILES['championsProductsImages']['name'])){
            $filesCount1 = count($_FILES['championsProductsImages']['name']);
            for($j = 0; $j < $filesCount1; $j++){

                $_FILES['championsProductsImage']['name'] = $_FILES['championsProductsImages']['name'][$j];
                $_FILES['championsProductsImage']['type'] = $_FILES['championsProductsImages']['type'][$j];
                $_FILES['championsProductsImage']['tmp_name'] = $_FILES['championsProductsImages']['tmp_name'][$j];
                $_FILES['championsProductsImage']['error'] = $_FILES['championsProductsImages']['error'][$j];
                $_FILES['championsProductsImage']['size'] = $_FILES['championsProductsImages']['size'][$j];

                $uploadPath = 'upload/t-shirts/male/champion_products';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('championsProductsImage')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                }
            }
        }


        if(!empty($_FILES['trendsImages']['name'])){
            $filesCount2 = count($_FILES['trendsImages']['name']);
            for($i = 0; $i < $filesCount2; $i++){
            	
                $_FILES['trendsImage']['name'] = $_FILES['trendsImages']['name'][$i];
                $_FILES['trendsImage']['type'] = $_FILES['trendsImages']['type'][$i];
                $_FILES['trendsImage']['tmp_name'] = $_FILES['trendsImages']['tmp_name'][$i];
                $_FILES['trendsImage']['error'] = $_FILES['trendsImages']['error'][$i];
                $_FILES['trendsImage']['size'] = $_FILES['trendsImages']['size'][$i];

                $uploadPath = 'upload/t-shirts/male/trend_images';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('trendsImage')){
                	
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                }
            }
        }


        if(!empty($_FILES['vintageImage']['name'])){
            $filesCount3 = count($_FILES['vintageImage']['name']);
            for($i = 0; $i < $filesCount3; $i++){
                $_FILES['vintageImages']['name'] = $_FILES['vintageImage']['name'][$i];
                $_FILES['vintageImages']['type'] = $_FILES['vintageImage']['type'][$i];
                $_FILES['vintageImages']['tmp_name'] = $_FILES['vintageImage']['tmp_name'][$i];
                $_FILES['vintageImages']['error'] = $_FILES['vintageImage']['error'][$i];
                $_FILES['vintageImages']['size'] = $_FILES['vintageImage']['size'][$i];

                $uploadPath = 'upload/t-shirts/male/vintage_images';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('vintageImages')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                }
            }
        }
        if(!empty($_FILES['vintageVideo']['name'])){
           

                $uploadPath = 'upload/t-shirts/male/vintage_video';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('vintageVideo')){
                    $fileData = $this->upload->data();
                }
            }

        $image_array[] = implode(",",$_FILES['userFiles']['name']);
       	$championsproducts_array[] = implode(",",$_FILES['championsProductsImages']['name']);
       	$trendsImages_array[] = implode(",",$_FILES['trendsImages']['name']);
       	$vintageImage_array[] = implode(",",$_FILES['vintageImage']['name']);
		
				$time=time();
				$created = date ("Y-m-d H:i:s", $time);				

				if(!empty($this->input->post('champions_products_title'))) {
						$addData = array(
							'anatomy' => json_encode($image_array, true),
							'champion_products_title' => $this->input->post('champions_products_title'),
							'champion_products_desc' => $this->input->post('champions_products_desc'),
							'champion_products_images' => json_encode($championsproducts_array, true),
							'trends_launch_date' => $this->input->post('trends_launch_date'),
							'trends_title' => $this->input->post('trends_title'),
							'trends_images' => json_encode($trendsImages_array, true),
							'vintage_images' => json_encode($vintageImage_array, true),
							'vintage_video' => $_FILES['vintageVideo']['name'],
							'vintage_title' => $this->input->post('vintage_title'),
							'vintage_desc' => $this->input->post('vintage_description'),
							'active' => ($this->input->post('active') == "on") ? 1 : 0,
							'modify' => date("Y-m-d H:i:s")
						);
					} else {
						$addData = [];
					}

					$id = $this->Tshirts_model->addTshirtMale($addData);
				//	echo $id;
					$this->session->set_flashdata('message', 'Shirt has been added');

					redirect('admin/tshirts');				
				
			} else {
				// Create the data array to pass to view
				$menu_details['session'] = $this->session->userdata;

				// Set Page Title
				$header['page_title'] = "Add User";

				$data['roles'] = $this->Tshirts_model->getRoles();

				$this->load->view('admin/common/header', $header);
				$this->load->view('admin/common/left_menu', $menu_details);
				$this->load->view('admin/tshirts/male/add', $data);
				$this->load->view('admin/common/footer');
			}
		} else {
			redirect('admin/login');
		}
	}	

	public function male_edit() {
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('rid') == 1 ) {

			$did = trim($this->uri->segment(4));

			// $this->form_validation->set_rules('destination_name', "Name field is required", 'required');
			// $this->form_validation->set_rules('destination_state', $this->lang->line('signin_email'), 'required');

			// $this->form_validation->set_error_delimiters('<p class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">&times;</a>', '</p>');

			if(!empty($this->input->post('champions_products_title'))) {
				$data = array(
						'Id' => $did,
						//'anatomy' => json_encode($image_array, true),
						'champion_products_title' => $this->input->post('champions_products_title'),
						'champion_products_desc' => $this->input->post('champions_products_desc'),
						//'champion_products_images' => json_encode($championsproducts_array, true),
						'trends_launch_date' => $this->input->post('trends_launch_date'),
						'trends_title' => $this->input->post('trends_title'),
						//'trends_images' => json_encode($trendsImages_array, true),
						//'vintage_images' => json_encode($vintageImage_array, true),
						//'vintage_video' => $_FILES['vintageVideo']['name'],
						'vintage_title' => $this->input->post('vintage_title'),
						'vintage_desc' => $this->input->post('vintage_description'),
						'active' => ($this->input->post('active') == "on") ? 1 : 0,
						'modify' => date("Y-m-d H:i:s")
				);

				$this->Tshirts_model->updateTshirtMale($data);

				$this->session->set_flashdata('message', 'T-shirt has been updated');

				redirect('admin/tshirts');

			} else {
				if(is_numeric($did)) {
				
					$checkTshirt = $this->Tshirts_model->checkTshirtMale($did);
					if($checkTshirt->num_rows() == 1) {
						// Create the data array to pass to view
						$menu_details['session'] = $this->session->userdata;

						// Set Page Title
						$header['page_title'] = "Edit T-shirts Products";				

						foreach ($checkTshirt->result() as $row) {
							$data['tshirts_male'] = array(
								'id' => $row->Id,
								'champion_products_title' => $row->champion_products_title,
								'champion_products_desc' => $row->champion_products_desc,
								'trends_launch_date' => $row->trends_launch_date,
								'trends_title' => $row->trends_title,
								'vintage_title' => $row->vintage_title,
								'vintage_desc' => $row->vintage_desc,
								'active' => $row->active,

							);		
						}

						$this->load->view('admin/common/header', $header);
						$this->load->view('admin/common/left_menu', $menu_details);
						$this->load->view('admin/tshirts/male/edit', $data);
						$this->load->view('admin/common/footer');
					} else {
						$this->session->set_flashdata('message', 'User not found');
						redirect('admin/users');
					}
				} else {
					$this->session->set_flashdata('message', 'User not found');
					redirect('admin/users');
				}
			}

		} else {
			redirect('admin/login');
		}
	}

	public function female_list() {
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('rid') == 1 ) {
			// Set Page Title
			$header['page_title'] = "T-shirt Female Products";
			$page = 1;		

			$tshirts_female = $this->Tshirts_model->getAllTshirtFemale($page);

			// Create the data array to pass to view
			$menu_details['session'] = $this->session->userdata;

			$data['tshirts_female'] = $tshirts_female;
			$data['message'] = $this->session->flashdata('message');

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/left_menu', $menu_details);
			$this->load->view('admin/tshirts/female/list', $data);
			$this->load->view('admin/common/footer');
		} else {
			redirect('admin/login');
		}
	}

	public function female_add() {
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('rid') == 1 ) {
			// Set validation rules for view filters
			//$this->form_validation->set_rules('destination_name', "Name field is required", 'required');
			//$this->form_validation->set_rules('destination_state', $this->lang->line('signin_email'), 'required');

			$this->form_validation->set_error_delimiters('<p class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">&times;</a>', '</p>');

		if(!empty($this->input->post('champions_products_title1'))) {

			//$data = array();
        if(!empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $uploadPath = 'upload/t-shirts/female/anatomy';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                }
            }
        }

        if(!empty($_FILES['championsProductsImages']['name'])){
            $filesCount1 = count($_FILES['championsProductsImages']['name']);
            for($j = 0; $j < $filesCount1; $j++){

                $_FILES['championsProductsImage']['name'] = $_FILES['championsProductsImages']['name'][$j];
                $_FILES['championsProductsImage']['type'] = $_FILES['championsProductsImages']['type'][$j];
                $_FILES['championsProductsImage']['tmp_name'] = $_FILES['championsProductsImages']['tmp_name'][$j];
                $_FILES['championsProductsImage']['error'] = $_FILES['championsProductsImages']['error'][$j];
                $_FILES['championsProductsImage']['size'] = $_FILES['championsProductsImages']['size'][$j];

                $uploadPath = 'upload/t-shirts/female/champion_products';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('championsProductsImage')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                }
            }
        }


        if(!empty($_FILES['trendsImages']['name'])){
            $filesCount2 = count($_FILES['trendsImages']['name']);
            for($i = 0; $i < $filesCount2; $i++){
            	
                $_FILES['trendsImage']['name'] = $_FILES['trendsImages']['name'][$i];
                $_FILES['trendsImage']['type'] = $_FILES['trendsImages']['type'][$i];
                $_FILES['trendsImage']['tmp_name'] = $_FILES['trendsImages']['tmp_name'][$i];
                $_FILES['trendsImage']['error'] = $_FILES['trendsImages']['error'][$i];
                $_FILES['trendsImage']['size'] = $_FILES['trendsImages']['size'][$i];

                $uploadPath = 'upload/t-shirts/female/trend_images';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('trendsImage')){
                	
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                }
            }
        }


        if(!empty($_FILES['vintageImage']['name'])){
            $filesCount3 = count($_FILES['vintageImage']['name']);
            for($i = 0; $i < $filesCount3; $i++){
                $_FILES['vintageImages']['name'] = $_FILES['vintageImage']['name'][$i];
                $_FILES['vintageImages']['type'] = $_FILES['vintageImage']['type'][$i];
                $_FILES['vintageImages']['tmp_name'] = $_FILES['vintageImage']['tmp_name'][$i];
                $_FILES['vintageImages']['error'] = $_FILES['vintageImage']['error'][$i];
                $_FILES['vintageImages']['size'] = $_FILES['vintageImage']['size'][$i];

                $uploadPath = 'upload/t-shirts/female/vintage_images';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('vintageImages')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                }
            }
        }
        if(!empty($_FILES['vintageVideo']['name'])){
           

                $uploadPath = 'upload/t-shirts/female/vintage_video';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('vintageVideo')){
                    $fileData = $this->upload->data();
                }
            }

        $image_array[] = implode(",",$_FILES['userFiles']['name']);
       	$championsproducts_array[] = implode(",",$_FILES['championsProductsImages']['name']);
       	$trendsImages_array[] = implode(",",$_FILES['trendsImages']['name']);
       	$vintageImage_array[] = implode(",",$_FILES['vintageImage']['name']);
		
				$time=time();
				$created = date ("Y-m-d H:i:s", $time);				

				if(!empty($this->input->post('champions_products_title1'))) {
						$addData = array(
							'anatomy' => json_encode($image_array, true),
							'champion_products_title' => $this->input->post('champions_products_title1'),
							'champion_products_desc' => $this->input->post('champions_products_desc'),
							'champion_products_images' => json_encode($championsproducts_array, true),
							'trends_launch_date' => $this->input->post('trends_launch_date'),
							'trends_title' => $this->input->post('trends_title'),
							'trends_images' => json_encode($trendsImages_array, true),
							'vintage_images' => json_encode($vintageImage_array, true),
							'vintage_video' => $_FILES['vintageVideo']['name'],
							'vintage_title' => $this->input->post('vintage_title'),
							'vintage_desc' => $this->input->post('vintage_description'),
							'active' => ($this->input->post('active') == "on") ? 1 : 0,
							'modify' => date("Y-m-d H:i:s")
						);
					} else {
						$addData = [];
					}


					$id = $this->Tshirts_model->addTshirtFemale($addData);

					$this->session->set_flashdata('message', 'Shirt has been added');

					redirect('admin/tshirts/female_list');				
				
			} else {
				// Create the data array to pass to view
				$menu_details['session'] = $this->session->userdata;

				// Set Page Title
				$header['page_title'] = "Add T-shirts";

				$data['roles'] = $this->Tshirts_model->getRoles();

				$this->load->view('admin/common/header', $header);
				$this->load->view('admin/common/left_menu', $menu_details);
				$this->load->view('admin/tshirts/female/add', $data);
				$this->load->view('admin/common/footer');
			}
		} else {
			redirect('admin/login');
		}
	}	

	public function female_edit() {
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('rid') == 1 ) {

			$did = trim($this->uri->segment(4));

			// $this->form_validation->set_rules('destination_name', "Name field is required", 'required');
			// $this->form_validation->set_rules('destination_state', $this->lang->line('signin_email'), 'required');

			// $this->form_validation->set_error_delimiters('<p class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">&times;</a>', '</p>');

			if(!empty($this->input->post('champions_products_title1'))) {
				$data = array(
						'Id' => $did,
						//'anatomy' => json_encode($image_array, true),
						'champion_products_title' => $this->input->post('champions_products_title1'),
						'champion_products_desc' => $this->input->post('champions_products_desc'),
						//'champion_products_images' => json_encode($championsproducts_array, true),
						'trends_launch_date' => $this->input->post('trends_launch_date'),
						'trends_title' => $this->input->post('trends_title'),
						//'trends_images' => json_encode($trendsImages_array, true),
						//'vintage_images' => json_encode($vintageImage_array, true),
						//'vintage_video' => $_FILES['vintageVideo']['name'],
						'vintage_title' => $this->input->post('vintage_title'),
						'vintage_desc' => $this->input->post('vintage_description'),
						'active' => ($this->input->post('active') == "on") ? 1 : 0,
						'modify' => date("Y-m-d H:i:s")
				);

				$this->Tshirts_model->updateTshirtFemale($data);

				$this->session->set_flashdata('message', 'Shirt has been updated');

				redirect('admin/tshirts/female_list');

			} else {
				if(is_numeric($did)) {
				
					$checkTshirtFemale = $this->Tshirts_model->checkTshirtFemale($did);
					if($checkTshirtFemale->num_rows() == 1) {
						// Create the data array to pass to view
						$menu_details['session'] = $this->session->userdata;

						// Set Page Title
						$header['page_title'] = "Edit Shirts Products";				

						foreach ($checkTshirtFemale->result() as $row) {
							$data['tshirts_female'] = array(
								'id' => $row->Id,
								'champion_products_title' => $row->champion_products_title,
								'champion_products_desc' => $row->champion_products_desc,
								'trends_launch_date' => $row->trends_launch_date,
								'trends_title' => $row->trends_title,
								'vintage_title' => $row->vintage_title,
								'vintage_desc' => $row->vintage_desc,
								'active' => $row->active,

							);		
						}

						$this->load->view('admin/common/header', $header);
						$this->load->view('admin/common/left_menu', $menu_details);
						$this->load->view('admin/tshirts/female/edit', $data);
						$this->load->view('admin/common/footer');
					} else {
						$this->session->set_flashdata('message', 'User not found');
						redirect('admin/users');
					}
				} else {
					$this->session->set_flashdata('message', 'User not found');
					redirect('admin/users');
				}
			}

		} else {
			redirect('admin/login');
		}
	}


}
