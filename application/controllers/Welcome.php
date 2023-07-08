<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Student');
	}

	public function index()
	{
		$this->load->database();
		$this->load->model('Student');
		$result['student'] = $this->Student->display_students();
		$result['course'] = $this->Student->display_course();
		$this->load->view('welcome_message', array('data' => $result));
	}

	public function enroll()
	{
		$this->load->database();
		$this->load->model('Student');
		$postData = $this->input->post();
		$data = array(
			'student_id'     => $this->input->post('stu'),
			'course_id'  => $this->input->post('course'),
			'enroll_status'  => 1,
		);
		$result = $this->Student->enroll($data);
		if ($result == 1) {
			redirect('/course');
		}
	}

	public function course()
	{
		$this->load->database();
		$this->load->model('Student');
		$data1['course'] = $this->Student->display_course();
		$this->load->view('course', array('data1' => $data1));
	}

	public function enrolled()
	{
		$this->load->database();
		$this->load->model('Student');
		$id =  $this->input->post('course_id');
		$course_details = $this->Student->get_course_details($id);
		$this->load->library('table');
		$template = array(
			'table_open' => ' <table class="table table-hover" id="rem_tab">'
		);
		$this->table->set_template($template);
		$this->table->set_heading(array('S.No', 'Student Name', 'Course Name'));
		for ($i = 0; $i < count($course_details); $i++) {
			$this->table->add_row(array($i + 1, $course_details[$i]['student_name'], $course_details[$i]['course_name']));
		}
		echo $this->table->generate();
	}

	// public function stu_check()
	// {
	// 	$stu_id = $this->input->post('stu_id');
	// 	$course_details = $this->Student->stu_status($stu_id);
	// 	$course = $this->Student->display_course();
	// 	$data1 = [];
	// 	for ($i = 0; $i < count($course); $i++) {
	// 		$data1[] = $course[$i]->course_id;
	// 	}
	// 	$newarr = array_diff($data1, $course_details);
	// 	$newarr = array_merge(array_unique($newarr));
	// 	// print_r($newarr);
	// 	redirect('/stu_sts/$newarr');
	// }
}
