<?php 
   class Home extends CI_Controller {


       public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        //$this->load->helper('url_helper');
    }
      public function index() { 
      	 $data['users'] = $this->home_model->get_users();
      	 $this->load->view('header');
         $this->load->view('view', $data);  
     }

      public function create(){  
         $this->load->view('header');
         $this->load->view('home'); 
    }
      public function addform(){ 
   	     $this->load->helper('form');
         $this->load->library('form_validation');
         $this->form_validation->set_rules('firstname', 'Firstname', 'required');
         $this->form_validation->set_rules('lastname', 'Lastname', 'required');
         $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
         $this->form_validation->set_rules('phone', 'Phone', 'required');
         $this->form_validation->set_rules('message', 'Message', 'required');
      
        if ($this->form_validation->run() === FALSE)
        {
            echo validation_errors();
 
        }
        else
        {
            $this->home_model->set_user();
      		echo "<div class='w3-panel w3-green w3-round'><h3>Success!</h3><h3>Form Added Succesfully.</h3><div>";
        }
       
   }

       public function edit($id) {
   	     $data['users'] = $this->home_model->get_user_by_id($id);
   	     $this->load->view('header');
   	     $this->load->view('edit' ,$data); 
    }

        public function editform($id) {
   	     $this->home_model->set_user($id);
   	     $data['users'] = $this->home_model->get_user_by_id($id);
   	     $data['message'] = "Form Updated Succesfully";
   	     $this->load->view('header');
   	     $this->load->view('edit' ,$data); 
   }
   
        public function delete($id)
    {
         $id = $this->uri->segment(3);
        
         if (empty($id))
         {
            show_404();
         }
                
         $users = $this->home_model->get_user_by_id($id);
         $this->home_model->delete_user($id);
         $data['message'] = "Record has been Succesfully Deleted";       
         $data['users'] = $this->home_model->get_users();
      	 $this->load->view('header');
         $this->load->view('view', $data);        
    }

   } 
?>