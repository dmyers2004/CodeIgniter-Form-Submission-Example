<?php

class Welcome extends CI_Controller {
	public $data = [];
	public $form_fields = 'fname as firstname,lastname,email,favfood';

	public function __construct() {
		parent::__construct();
		
		/*
		load the controller specific model and form helper		
		If you tended to include the same model,helpers,libraries over and over you can add them to ../config/autoload.php
		Then they will be loaded automatically on every page load (the added overhead is why you don't just add everything to autoload)
		*/
		$this->load->model('book_model');
		$this->load->helper('form');
	}

	public function index() {
		/* storage for the submitted form variables */
		$posted = [];

		/* add some view data */
		$this->data = [
			/* pulled from database or something */
			'favfood_options'=>['pizza'=>'pizza','ice cream'=>'ice cream','cookies'=>'cookies','steak'=>'steak','vegetables'=>'vegetables'],
		];

		/* did they post anything? */
		if ($this->input->post()) {
			/* yes - map the posted input to the fields the model expects */
			$this->input->map($this->form_fields,$posted);

			/* insert with model validation */
			if ($this->book_model->insert($posted)) {
				/* it's good no error thrown! redirect to thank you page */
				redirect('/welcome/thank-you');
			} else {
				/* insert failed! show errors! - merge the submitted form values */
				$this->data = array_merge($this->data,$this->input->post());
				
				/* add our errors */
				$this->data['form_errors'] = $this->form_validation->error_array();
			}

		}

		$this->load->view('welcome/form',$this->data);
	}

	public function thank_you() {
		$this->load->view('welcome/thank_you',$this->data);
	}

} /* end class */