<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CMS_Controller class
 *
 * @author gofrendi
 */

class MYTS_Controller extends MX_Controller
{
	protected $__myts_dynamic_widget = FALSE;
	  
	public function __construct()
    {
		parent::__construct();

        // $this->load->model('No_CMS_Model');

        /* Standard Libraries */
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->helper('string');
        $this->load->library('form_validation');
        // $this->load->driver('session');
		
		$this->load->library('template');
	}
	protected function view($view_url, $data = NULL, $navigation_name = NULL, $config = NULL, $return_as_string = FALSE)
    {
        $result   = NULL;
		
		/**
         * PREPARE PARAMETERS *********************************************************************************************
         */

        // this method can be called as $this->view('view_path', $data, true);
        // or $this->view('view_path', $data, $navigation_name, true);
        if (is_bool($navigation_name) && count($config) == 0) {
            $return_as_string = $navigation_name;
            $navigation_name  = NULL;
            $config           = NULL;
        } else if (is_bool($config)) {
            $return_as_string = $config;
            $config           = NULL;
        }
		
        if (!isset($return_as_string))
            $return_as_string = FALSE;
        if (!isset($config))
            $config = array();

		$custom_theme       = isset($config['theme']) ? $config['theme'] : NULL;
        $custom_layout      = isset($config['layout']) ? $config['layout'] : NULL;
        $custom_title       = isset($config['title']) ? $config['title'] : NULL;
        $custom_metadata    = isset($config['metadata']) ? $config['metadata'] : array();
		$only_content       = isset($config['only_content']) ? $config['only_content'] : NULL;
		
		// GET THE THEME, TITLE & ONLY_CONTENT FROM DATABASE
        $theme         = 'default';
        $title         = 'default';
        $keyword       = 'default';
        $layout        = 'default';
        $default_theme = NULL;
        $page_title    = NULL;
        $page_keyword  = NULL;
		
		if ($only_content || $this->__myts_dynamic_widget || (isset($_REQUEST['_only_content'])) || $this->input->is_ajax_request()) {            
            $result = $this->load->view($view_url, $data, TRUE);
        } else {
			// set theme, layout and title
            $this->template->title($title);
            $this->template->set_theme($theme);
            $this->template->set_layout($layout);
			
			$result = $this->template->build($view_url, $data, TRUE); 
		}
		 
		if ($return_as_string) {
            return $result;
        } else {
            $this->myts_show_html($result);
        }
	}
	protected function myts_show_html($html)
    {
        $data = array(
            'myts_content' => $html
        );
        $this->load->view('MYTS_View', $data);
    }
}

class MY_Controller extends CI_Controller
{
}