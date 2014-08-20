<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage extends MYTS_Controller {

	public function index()
	{
		$data['nama'] = 'Michael';
		$this->view('manage/welcome_message',$data);
	}
	
}

/* End of file Admin.php */