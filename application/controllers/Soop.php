<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require '/system/libraries/REST_Controller.php';
class Soop extends REST_Controller { //CI_Controller
      // 게시판의 전반적인 내용을 담당하는 컨트롤러

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('article_model');
        // $this->load->model('API_model');
    }

    public function index($num=10){
        
        $articles = $this->article_model->gets($num);
        $this->load->view('main',
                     array('articles'=>$articles)); 
    }
    
    public function time($num=10){
        
        $articles = $this->article_model->gets2($num);
        $this->load->view('main',
                     array('articles'=>$articles)); 
    }

	public function main_get($id_param = NULL){
		$main = $this->article_model->gets($id_param);
		$this->response($main,200);
	// 	$id = $this->input->get('id');
	// 	if($id===NULL){
	// 		$id = $id_param;
	// 	}		
	// 	if ($id === NULL) {
	// 		$data = $this->article_model->gets($id);
	// 		if ($data) {
	// 			$this->response($data, REST_Controller::HTTP_OK);
	// 		} 
	// 		else { 
	// 			$this->response([
	// 			'status' => FALSE,
	// 			'error' => 'No books were found'
	// 			], REST_Controller::HTTP_NOT_FOUND);
	// 		}
	// 	}





	// 	$data = $this->article_model->gets($id);
	// 	if ($data) {
	// 		$this->set_response($data, REST_Controller::HTTP_OK);
	// 	}
	// 	else {
	// 		$this->set_response([
	// 		'status' => FALSE,
	// 		'error' => 'Record could not be found'
	// 		], REST_Controller::HTTP_NOT_FOUND);
	// 	}
	// }
}
?>
