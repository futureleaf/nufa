<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public $user_management = "User Management";
	public $education_management = "Education Management";
	public $content_management = "Content Management";
	public $admin = "Administrator";
	public $head_master = "Kepala Sekolah";
	public $teacher = "Guru";
	public $student = "Murid";
	public $school_year = "Tahun Ajaran";
	public $classes = "Kelas";
	

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('template');
		$this->load->library('method');
		$this->load->model('mdl_common','',TRUE);
		$this->load->model('mdl_content','',TRUE);
		$this->load->model('mdl_admin','',TRUE);
		$this->load->model('mdl_head_master','',TRUE);
		$this->load->model('mdl_function','',TRUE);
		$this->load->model('mdl_teacher','',TRUE);
		$this->load->model('mdl_student','',TRUE);
		$this->load->model('mdl_class','',TRUE);
		$this->load->model('mdl_education','',TRUE);
		$this->load->model('mdl_grade','',TRUE);
		$this->load->model('mdl_login','',TRUE);
		$this->load->model('mdl_comment','',TRUE);
		$this->load->model('mdl_picture','',TRUE);
		$this->load->model('mdl_review','',TRUE);
		$this->load->model('mdl_alumnus','',TRUE);
		
	}

	public function index() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->content_management;
		$data['_title'] = "Dashboard";
		$data['_title_content'] = "Daftar " . $data['_title'];
		$display = "index";
		// teacher database
		$data['amount_teacher'] = $this->mdl_teacher->count_records();
		$data['ll_teachers'] = $this->mdl_teacher->ll_records()->result();
		// student database
		$data['amount_student'] = $this->mdl_student->count_records();
		$data['ll_students'] = $this->mdl_student->ll_records()->result();
		// method
		$data['school_year'] = $this->method->school_year();
		$data['new_comments'] = $this->mdl_comment->count_new_records($this->method->month_year());
		$data['new_registrators'] = $this->mdl_student->count_year_records($this->method->school_year());
		$data['new_articles'] = $this->mdl_content->count_article_records($this->method->month_year());
		$data['new_back_reviews'] = $this->mdl_review->count_records($this->method->month_year(), 1);
		$data['new_front_reviews'] = $this->mdl_review->count_records($this->method->month_year(), 2);
		$this->template->backend('content/mainManagement/index', $data);
	}
	// belum
	public function timeline() {
		$data['uploads'] = $this->get_upload_path();
		$this->template->backend('timeline');
	}
	
	public function logout() {
		$this->session->sess_destroy();
		redirect("admin/login");
	}
	
	public function login() {
		$data['uploads'] = $this->get_upload_path();
		$data['_title'] = "Login";
		$this->session->unset_userdata();
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email|callback_email_check');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[50]|xss_clean|callback_password_check[email]');
		if(isset($_POST['submit']) && $this->form_validation->run() == TRUE) {
			$dataRecord['email'] = $_POST['email'];
			$dataLogins = $this->mdl_login->email_check($dataRecord['email']);
			foreach($dataLogins as $dataLogin) {
				foreach($dataLogins as $dataLogin) {
					$this->session->set_userdata(array(
					'id_user' => $dataLogin->id_user,
					'id_class' => $dataLogin->id_class,
					'id_city' => $dataLogin->id_city,
					'id_ruser' => $dataLogin->id_ruser,
					'is_auser' => $dataLogin->is_auser,
					'id_picture' => $dataLogin->id_picture,
					'password' => $dataLogin->password,
					'email' => $dataLogin->email,
					'full_name' => $dataLogin->full_name,
					'picture_user' => $dataLogin->picture_user,
					'parent_name' => $dataLogin->parent_name,
					'no_jenjang' => $dataLogin->no_jenjang,
					'nis' => $dataLogin->nis,
					'nisn' => $dataLogin->nisn,
					'nip' => $dataLogin->nip,
					'gender' => $dataLogin->gender,
					'born_date' => $dataLogin->born_date,
					'desc_user' => $dataLogin->desc_user,
					'cd_user' => $dataLogin->cd_user,
					'is_login' => TRUE
					));
					$this->mdl_login->update($dataLogin->id_user);
				}
				redirect("admin/index");
			}
		}
		$this->template->backendContentOnly('content/common/login', $data);
	}
	
	public function email_check($email) {
		$emails = $this->mdl_login->email_check($email);
		foreach($emails as $email) {
			if($email->id_ruser == 4 || $email->id_ruser == 5) {
				$this->form_validation->set_message('email_check', "You'r prohibited to login");
				return FALSE;
			}
		}
		if(sizeof($emails) == 0) {
			$this->form_validation->set_message('email_check', "Your %s is not registered");
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	
	
	public function password_check($passwd, $email) {
		$email = $_POST["$email"];
		$passwords = $this->mdl_login->get_password($email);
		$passwords = $this->encrypt->decode($passwords);
		if($passwords != $passwd) {
			$this->form_validation->set_message('password_check', "Your %s is miss match");
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	
	
	
	
	/****** admin begin ******/
	public function administrator() {
		// check user login
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->content_management;
		$data['_title'] = "Administrator";
		$data['_title_content'] = "Daftar " . $data['_title'];
		$display = "admin";
		// data model
		$data['admins'] = $this->mdl_admin->records()->result();
		$dataRecord['full_name'] = $this->input->post("full_name");
		$dataRecord['email'] = $this->input->post("email");
		$dataRecord['old_password'] = $this->encrypt->encode($this->input->post("old_password"));
		$dataRecord['password'] = $this->encrypt->encode($this->input->post("password"));
		// data validation
		// create admin
		if($this->uri->segment(3) == "create") {
			$data['_title_content'] = "Buat " . $data['_title'];
			$display = "adminCreate";
			if(isset($_POST['doCreate'])) {
				$this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|min_length[4]|max_length[50]|xss_clean|');
				$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email|is_unique[user.email]|');
				$this->form_validation->set_rules('repeat_email', 'Repeat E-mail', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email|matches[email]');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|xss_clean');
				$this->form_validation->set_rules('repeat_password', 'Repeat Password', "trim|required|min_length[6]|max_length[50]|xss_clean|matches[password]");
				if($this->form_validation->run() == TRUE) {
					$this->mdl_admin->save($dataRecord);
					redirect("admin/administrator");
				}
			}
		}
		// update admin
		else if($this->uri->segment(3) == "view" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "adminDetail";
			$id = $this->uri->segment(4);
			$data['admin_details'] = $this->mdl_admin->record($id)->result();
		}
		// update admin
		else if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "adminUpdate";
			$id = $this->uri->segment(4);
			$data['id_user'] = $id;
			$data['admin_update'] = $this->mdl_admin->record($id)->result();
			if(isset($_POST['doUpdate'])) {
				if(isset($_POST['change_name'])) {
					$data['change_name'] = "";
					$this->form_validation->set_rules('full_name', 'full_name', 'trim|required|min_length[4]|max_length[50]|xss_clean|');
				}
				else $_POST['change_name'] = "";
				if(isset($_POST['change_email'])) {
					$data['change_email'] = "";
					$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email|is_unique[user.email]|');
					$this->form_validation->set_rules('repeat_email', 'Repeat E-mail', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email|matches[email]');
				}
				else $_POST['change_email'] = "";
				if(isset($_POST['change_pass'])) {
					$data['change_pass'] = "";
					$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|min_length[6]|max_length[50]|xss_clean|matches[current_password]');
					$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|xss_clean');
					$this->form_validation->set_rules('repeat_password', 'Repeat Password', "trim|required|min_length[6]|max_length[50]|xss_clean|matches[password]");
				}
				else $_POST['change_pass'] = "";
				if(isset($_POST['change_name']) || isset($_POST['change_email']) || isset($_POST['change_pass'])) {
					if($this->form_validation->run() == TRUE) {
						$this->mdl_admin->update($id, $dataRecord, $_POST['change_email'], $_POST['change_pass']);
						redirect("admin/administrator");
					}
				}
				else redirect("admin/administrator");
			}
		}
		// delete admin
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$display = "admin";
			$id = $this->uri->segment(4);
			$this->mdl_admin->delete($id);
			redirect("admin/administrator");
		}
		$this->template->backend('content/userManagement/'.$display, $data);
	}
	/****** admin end ******/
	
	
	
	
	
	
	/****** teacher begin ******/
	public function teacher() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->content_management;
		$data['_title'] = "Pegawai";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$display = "teacher";
		$data['teachers'] = $this->mdl_teacher->records()->result();
		$data['classes'] = $this->mdl_class->common_records()->result();
		$this->mdl_common->set_pk("id_city");
		$this->mdl_common->set_tb("city");
		$data['cities'] = $this->mdl_common->records()->result();
		$data['pure_edus'] = $this->mdl_education->pure_records()->result();
		$data['staffs'] = $this->mdl_teacher->staff_records()->result();
		$dataRecord['nip'] = $this->input->post("nip");
		$dataRecord['full_name'] = $this->input->post("full_name");
		$dataRecord['email'] = $this->input->post("email");
		$dataRecord['password'] = $this->encrypt->encode($this->input->post("password"));
		$dataRecord['id_city'] = $this->input->post("id_city");
		$dataRecord['id_ruser'] = $this->input->post("id_ruser");
		$dataRecord['id_class'] = $this->input->post("id_class");
		$dataRecord['edu'] = $this->input->post("edu");
		$dataRecord['gender'] = $this->input->post("gender");
		$dataRecord['born_date'] = $this->method->dateToDatabase($this->input->post("born_date"));;
		$dataRecord['address'] = $this->input->post("address");
		$dataRecord['desc_user'] = $this->input->post("desc_user");
		$dataRecordGrade['id_edu'] = $this->input->post("id_edu");
		$dataRecordGrade['name_grade'] = $this->input->post("name_grade");
		$dataRecordGrade['grade'] = $this->input->post("grade");
		$dataRecordGrade['desc_grade'] = $this->input->post("desc_grade");
		$dataRecordGrade['id_user'] = $this->uri->segment(4);
		$dataRecordGrade['id_semester'] = $this->uri->segment(5);
		if($dataRecord['desc_user'] == "<br>") {$dataRecord['desc_user'] = "-";}
		// create teacher
		if($this->uri->segment(3) == "create") {
			$data['errorImage'] = null;
			$dataUploads['file_name'] = "";
			$dataRecord['picture_user'] = "";
			$data['_title_content'] = "Buat " . $data['_title'];
			$display = "teacherCreate";
			if(isset($_POST['doCreate'])) {
				$this->form_validation->set_rules('nip', 'NIP', 'trim|required|min_length[4]|max_length[50]|xss_clean|is_unique[user.nip]');
				$this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|min_length[4]|max_length[50]|xss_clean|');
				$this->form_validation->set_rules('born_date', 'Born Date', 'trim|required|min_length[10]|max_length[10]|xss_clean|');
				$this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[25]|max_length[200]|xss_clean|');
				$this->form_validation->set_rules('desc_user', 'Description User', 'trim|max_length[500]|xss_clean|');
				$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email|is_unique[user.email]|');
				$this->form_validation->set_rules('repeat_email', 'Repeat E-mail', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email|matches[email]');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|xss_clean');
				$this->form_validation->set_rules('repeat_password', 'Repeat Password', "trim|required|min_length[6]|max_length[50]|xss_clean|matches[password]");
				$dataUploads['file_name'] = "";
				$dataRecord['picture_user'] = "";
				$dataUploads = $this->mdl_function->do_upload(100, 100);
				$data['errorImage'] = $dataUploads['error'];
				$dataRecord['picture_user'] = $dataUploads['file_name'];
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					$this->mdl_teacher->save($dataRecord);
					redirect("admin/teacher");
				}
				else {
					$this->method->deleteUserPicture($dataRecord['picture_user']);
				}
			}
		}
		// detail teacher
		if($this->uri->segment(3) == "view" && $this->uri->segment(4) != null) {
			$data['id_user'] = $this->uri->segment(4);
			$data['_title_content'] = "Detail " . $data['_title'];
			$display = "teacherDetail";
			$id = $this->uri->segment(4);
			$data['teacher_record'] = $this->mdl_teacher->record($id)->result();
			
		}
		// update teacher
		else if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['errorImage'] = null;
			$data['id_user'] = $this->uri->segment(4);
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "teacherUpdate";
			$id = $this->uri->segment(4);
			$data['teacher_record'] = $this->mdl_teacher->record($id)->result();
			if(isset($_POST['doUpdate'])) {
				// validation
				if($_POST['current_nip'] != $_POST['nip']) $this->form_validation->set_rules('nip', 'NIP', 'trim|required|min_length[4]|max_length[50]|xss_clean|is_unique[user.nip]');
				$this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|min_length[4]|max_length[50]|xss_clean|');
				$this->form_validation->set_rules('born_date', 'Born Date', 'trim|required|min_length[10]|max_length[10]|xss_clean|');
				$this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[25]|max_length[200]|xss_clean|');
				$this->form_validation->set_rules('desc_user', 'Description User', 'trim|xss_clean|');
				if(isset($_POST['change_email'])) {
					$data['change_email'] = "";
					$dataRecord['change_email'] = TRUE;
					$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email|is_unique[user.email]|');
					$this->form_validation->set_rules('repeat_email', 'Repeat E-mail', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email|matches[email]');
				}
				else {
					$dataRecord['change_email'] = FALSE;
				}
				if(isset($_POST['change_pass'])) {
					$data['change_pass'] = "";
					$dataRecord['change_pass'] = TRUE;
					$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|min_length[6]|max_length[50]|xss_clean|matches[current_password]');
					$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|xss_clean');
					$this->form_validation->set_rules('repeat_password', 'Repeat Password', "trim|required|min_length[6]|max_length[50]|xss_clean|matches[password]");
				}
				else {
					$dataRecord['change_pass'] = FALSE;
				}
				$dataUploads['file_name'] = "";
				$dataRecord['picture_user'] = "";
				if(isset($_POST['change_photo'])) {
					$data['change_photo'] = "";
					$dataUploads = $this->mdl_function->do_upload(100, 100);
					$data['errorImage'] = $dataUploads['error'];
					$dataRecord['picture_user'] = $dataUploads['file_name'];
					$dataRecord['change_photo'] = TRUE;
				}
				else {
					$dataRecord['change_photo'] = FALSE;
				}
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					if($dataRecord['change_photo'] == TRUE) foreach($data['teacher_record'] as $teacher) $this->method->deleteUserPicture($teacher->picture_user);
					$this->mdl_teacher->update($id, $dataRecord);
					redirect("admin/teacher");
				}
			}
		}
		// delete teacher
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$display = "teacher";
			$id = $this->uri->segment(4);
			$data['teacher_record'] = $this->mdl_teacher->record($id)->result();
			foreach($data['teacher_record'] as $teacher) $this->method->deleteUserPicture($teacher->picture_user);
			$this->mdl_teacher->delete($id);
			redirect("admin/teacher");
		}
		
		
		
		
		// create grade teacher
		else if($this->uri->segment(3) == "grade" && $this->uri->segment(4) != null && $this->uri->segment(5) != null && $this->uri->segment(6) != null) {
			$data['id_user'] = $this->uri->segment(4);
			$data['id_semester'] = $this->uri->segment(5);
			$data['teacher_record'] = $this->mdl_teacher->record($data['id_user'])->result();
			foreach($data['teacher_record'] as $row) {
				$data['_title_content'] = "Nilai Semester $data[id_semester] " . $row->full_name;
			}
			$data['education_record'] = $this->mdl_education->rnedu_smt_records($data['id_user'], $data['id_semester'])->result();
			$this->form_validation->set_rules('name_grade', 'Nama Nilai', 'trim|required|min_length[4]|max_length[50]|xss_clean|is_unique[grade.name_grade]|');
			//$this->form_validation->set_rules('grade', 'Nilai', 'trim|required|min_length[1]|max_length[3]|xss_clean|integer|less_than[101]');
			$this->form_validation->set_rules('desc_grade', 'Pesan', 'trim|max_length[100]|xss_clean|');
			// update grade
			if($this->uri->segment(6) == "update" && $this->uri->segment(7) != null) {
				$data['id_grade'] = $this->uri->segment(7);
				$data['grade_records'] = $this->mdl_grade->record($data['id_grade'])->result();
				$data['name_grade'] = "";
				foreach($data['grade_records'] as $grade_record) {
					$data['name_grade'] = $grade_record->name_grade;
				}
				if(isset($_POST['doUpdate'])) {
					if($this->form_validation->run() == TRUE) {
							$this->mdl_grade->update_name($data['name_grade'], $dataRecordGrade);
							redirect("admin/teacher/grade/$data[id_user]/$data[id_semester]");
					}
				}
				$display = "teacherGradeUpdate";
			}
			// class grade
			if($this->uri->segment(6) == "class" && $this->uri->segment(7) != null) {
				$data['id_grade'] = $this->uri->segment(7);
				$data['grade_records'] = $this->mdl_grade->record($data['id_grade'])->result();
				$data['_title_content'] = "Pelajaran ";
				$data['name_grade'] = "";
				foreach($data['grade_records'] as $grade_record) {
					$data['name_grade'] = $grade_record->name_grade;
				}
				$data['user_grade_records'] = $this->mdl_grade->user_grade_records($data['name_grade'])->result();
				if(isset($_POST['value'])) {
				?>
					<script>
					</script>
				<?php
					$dataRecord['id'] = $_POST['id'];
					$dataRecord['field'] = $_POST['field'];
					$dataRecord['value'] = $_POST['value'];
					if($dataRecord['field'] == "desc_grade")
						$this->mdl_grade->update_desc_grade($dataRecord);
					else
						$this->mdl_grade->update_grade($dataRecord);
				}
				$display = "teacherGradeClass";
			}
			// create grade
			if($this->uri->segment(6) == "create") {
				if(isset($_POST['doCreate'])) {
					if($this->form_validation->run() == TRUE) {
							$this->mdl_grade->saves($dataRecordGrade);
							redirect("admin/teacher/grade/$data[id_user]/$data[id_semester]");
					}
				}
				$display = "teacherGradeCreate";
			}
			// delete grade
			else if($this->uri->segment(6) == "delete" && $this->uri->segment(7) != null) {
				$id = $this->uri->segment(7);
				$this->mdl_grade->delete($id);
				redirect("admin/teacher/grade/$data[id_user]/$data[id_semester]");
			}
		}
		// update teacher education
		else if($this->uri->segment(3) == "education" && $this->uri->segment(4) != null) {
			$data['_title'] = "Mata Pelajaran Guru";
			$data['id_user'] = $this->uri->segment(4);
			$data['teacher_record'] = $this->mdl_teacher->record($data['id_user'])->result();
			$data['redus'] = $this->mdl_education->redu_records()->result();
			foreach($data['teacher_record'] as $row) {
				$data['_title_content'] = "Daftar Mata Pelajaran Guru " . $row->full_name;
			}
			if(isset($_POST['doUpdate'])) {
				$this->mdl_teacher->update_redu($data['id_user']);
				redirect("admin/teacher");
			}
			$display = "teacherEducationUpdate";
		}
		// list education semester teacher
		else if($this->uri->segment(3) == "grade" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$data['id_user'] = $this->uri->segment(4);
			$data['id_semester'] = $this->uri->segment(5);
			$data['teacher_record'] = $this->mdl_teacher->record($data['id_user'])->result();
			foreach($data['teacher_record'] as $row) {
				$data['_title_content'] = "Daftar Ajaran Semester  $data[id_semester] " . $row->full_name;
			}
			$data['education_record'] = $this->mdl_education->rnedu_smt_records($data['id_user'], $data['id_semester'])->result();
			$display = "teacherGrade";
		}
		// list semester teacher
		else if($this->uri->segment(3) == "grade" && $this->uri->segment(4) != null) {
			$data['_title'] = "Daftar Nilai Semester Murid";
			$data['id_user'] = $this->uri->segment(4);
			$data['teacher_record'] = $this->mdl_teacher->record($data['id_user'])->result();
			$data['semesters'] = $this->mdl_education->semester_records($data['id_user'])->result();
			foreach($data['teacher_record'] as $row) {
				$data['_title_content'] = "Daftar Semester Kelas " . $row->full_name;
			}
			$display = "teacherSmester";
		}
		$this->template->backend('content/userManagement/'.$display, $data);
	}
	/****** teacher end ******/
	
	
	
	
	
	
	
	/****** student begin ******/
	public function student() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->content_management;
		$data['_title'] = "Murid";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$display = "student";
		$data['studentviis'] = $this->mdl_student->records(1)->result();
		$data['studentviiis'] = $this->mdl_student->records(2)->result();
		$data['studentixs'] = $this->mdl_student->records(3)->result();
		$data['classes'] = $this->mdl_class->common_records()->result();
		$this->mdl_common->set_pk("id_city");
		$this->mdl_common->set_tb("city");
		$data['cities'] = $this->mdl_common->records()->result();
		$dataRecord['full_name'] = $this->input->post("full_name");
		$dataRecord['parent_name'] = $this->input->post("parent_name");
		$dataRecord['no_jenjang'] = $this->input->post("no_jenjang");
		$dataRecord['nis'] = $this->input->post("nis");
		$dataRecord['nisn'] = $this->input->post("nisn");
		$dataRecord['email'] = $this->input->post("email");
		$dataRecord['password'] = $this->encrypt->encode($this->input->post("password"));
		$dataRecord['id_class'] = $this->input->post("id_class");
		$dataRecord['school_year'] = $this->method->school_year();
		$dataRecord['is_auser'] = $this->input->post("is_auser");
		$dataRecord['id_city'] = $this->input->post("id_city");
		$dataRecord['gender'] = $this->input->post("gender");
		$dataRecord['born_date'] = $this->method->dateToDatabase($this->input->post("born_date"));
		$dataRecord['address'] = $this->input->post("address");
		$dataRecord['desc_user'] = $this->input->post("desc_user");
		$dataRecordGrade['id_edu'] = $this->input->post("id_edu");
		$dataRecordGrade['name_grade'] = $this->input->post("name_grade");
		$dataRecordGrade['grade'] = $this->input->post("grade");
		$dataRecordGrade['desc_grade'] = $this->input->post("desc_grade");
		$dataRecordGrade['id_user'] = $this->uri->segment(4);
		$dataRecordGrade['id_semester'] = $this->uri->segment(5);
		// validation
		$this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|min_length[4]|max_length[50]|xss_clean|');
		$this->form_validation->set_rules('parent_name', 'Parent Name', 'trim|required|min_length[4]|max_length[50]|xss_clean|');
		$this->form_validation->set_rules('no_jenjang', 'No Jenjang', 'trim|required|min_length[4]|max_length[50]|xss_clean|');
		$this->form_validation->set_rules('nis', 'NIS', 'trim|required|min_length[4]|max_length[50]|xss_clean|');
		$this->form_validation->set_rules('nisn', 'NISN', 'trim|required|min_length[4]|max_length[50]|xss_clean|');
		$this->form_validation->set_rules('born_date', 'Born Date', 'trim|required|min_length[10]|max_length[10]|xss_clean|');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[25]|max_length[200]|xss_clean|');
		$this->form_validation->set_rules('desc_user', 'Description User', 'trim|xss_clean|');
		if($dataRecord['desc_user'] == "<br>") {$dataRecord['desc_user'] = "-";}
		// create student
		if($this->uri->segment(3) == "create") {
			$data['errorImage'] = null;
			$dataUploads['file_name'] = "";
			$dataRecord['picture_user'] = "";
			$data['_title_content'] = "Buat " . $data['_title'];
			$display = "studentCreate";
			if(isset($_POST['doCreate'])) {
				$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email|is_unique[user.email]|');
				$this->form_validation->set_rules('repeat_email', 'Repeat E-mail', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email|matches[email]');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|xss_clean');
				$this->form_validation->set_rules('repeat_password', 'Repeat Password', "trim|xss_clean|matches[password]");
				$dataUploads = $this->mdl_function->do_upload(100, 100);
				$data['errorImage'] = $dataUploads['error'];
				$dataRecord['picture_user'] = $dataUploads['file_name'];
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					$this->mdl_student->save($dataRecord);
					redirect("admin/student");
				}
				else $this->method->deleteUserPicture($dataRecord['picture_user']);
			}
		}
		// detail student
		if($this->uri->segment(3) == "view" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Detail " . $data['_title'];
			$display = "studentDetail";
			$id = $this->uri->segment(4);
			$data['student_record'] = $this->mdl_student->record($id)->result();
			
		}
		// update student
		else if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['errorImage'] = null;
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "studentUpdate";
			$id = $this->uri->segment(4);
			$data['student_record'] = $this->mdl_student->record($id)->result();
			if(isset($_POST['doUpdate'])) {
				if(isset($_POST['change_email'])) {
					$data['change_email'] = "";
					$dataRecord['change_email'] = TRUE;
					$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email|is_unique[user.email]|');
					$this->form_validation->set_rules('repeat_email', 'Repeat E-mail', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email|matches[email]');
				}
				else {
					$dataRecord['change_email'] = FALSE;
				}
				if(isset($_POST['change_pass'])) {
					$data['change_pass'] = "";
					$dataRecord['change_pass'] = TRUE;
					$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|min_length[6]|max_length[50]|xss_clean|matches[current_password]');
					$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|xss_clean');
					$this->form_validation->set_rules('repeat_password', 'Repeat Password', "trim|required|min_length[6]|max_length[50]|xss_clean|matches[password]");
				}
				else {
					$dataRecord['change_pass'] = FALSE;
				}
				$dataUploads['file_name'] = "";
				foreach($data['student_record'] as $student) $dataRecord['picture_user'] = $student->picture_user;
				if(isset($_POST['change_photo'])) {
					$data['change_photo'] = "";
					$dataUploads = $this->mdl_function->do_upload(100, 100);
					$data['errorImage'] = $dataUploads['error'];
					$dataRecord['picture_user'] = $dataUploads['file_name'];
					$dataRecord['change_photo'] = TRUE;
				}
				else {
					$dataRecord['change_photo'] = FALSE;
				}
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					if($dataRecord['change_photo'] == TRUE) foreach($data['student_record'] as $student) $this->method->deleteUserPicture($student->picture_user);
					$this->mdl_student->update($id, $dataRecord);
					redirect("admin/student");
				}
			}
		}
		// delete student
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$id = $this->uri->segment(4);
			$data['student_record'] = $this->mdl_student->record($id)->result();
			foreach($data['student_record'] as $student) $this->method->deleteUserPicture($student->picture_user);
			$this->mdl_student->delete($id);
			redirect("admin/student");
		}
		// export student
		else if($this->uri->segment(3) == "export" && $this->uri->segment(4) != null) {
			$id = $this->uri->segment(4);
			$dataRecords = $this->mdl_student->records($id)->result();
			$datas[] = array();
			$i = 0;
			foreach($dataRecords as $dataRecord) {
				//$datas['']['parent name'] = $dataRecord->parent_name;
				$datas[$i]['Nama Murid'] = $dataRecord->full_name;
				$datas[$i]['Nama Orang Tua'] = $dataRecord->parent_name;
				$datas[$i]['Email'] = $dataRecord->email;
				$datas[$i]['No Jenjang'] = $dataRecord->no_jenjang;
				$datas[$i]['NIS'] = $dataRecord->nis;
				$datas[$i]['NISN'] = $dataRecord->nisn;
				$datas[$i]['Jenis Kelamin'] = ($dataRecord->gender==1)?"L":"P";
				$datas[$i]['Tanggal Lahir'] = $dataRecord->born_date;
				$datas[$i]['Kota'] = $dataRecord->name_city;
				$i++;
			}
			$this->method->getReportExel($datas);
		}
		// upAll student
		else if($this->uri->segment(3) == "upAll" && $this->uri->segment(4) != null) {
			$id = $this->uri->segment(4);
			$this->mdl_student->upAll($id);
			redirect("admin/student");
		}
		// downAll student
		else if($this->uri->segment(3) == "downAll" && $this->uri->segment(4) != null) {
			$id = $this->uri->segment(4);
			$this->mdl_student->downAll($id);
			redirect("admin/student");
		}
		// up student
		else if($this->uri->segment(3) == "up" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$id_class = $this->uri->segment(4);
			$id_user = $this->uri->segment(5);
			$this->mdl_student->up($id_class, $id_user);
			redirect("admin/student");
		}
		// down student
		else if($this->uri->segment(3) == "down" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$id_class = $this->uri->segment(4);
			$id_user = $this->uri->segment(5);
			$this->mdl_student->down($id_class, $id_user);
			redirect("admin/student");
		}
		
		
		
		
		// create grade student
		else if($this->uri->segment(3) == "grade" && $this->uri->segment(4) != null && $this->uri->segment(5) != null && $this->uri->segment(6) != null) {
			$data['id_user'] = $this->uri->segment(4);
			$data['id_semester'] = $this->uri->segment(5);
			$data['student_record'] = $this->mdl_student->record($data['id_user'])->result();
			foreach($data['student_record'] as $row) {
				$data['_title_content'] = "Nilai Semester $data[id_semester] " . $row->full_name;
			}
			$data['education_record'] = $this->mdl_education->user_records($data['id_user'], $data['id_semester'] )->result();
			$this->form_validation->set_rules('name_grade', 'Nama Nilai', 'trim|required|min_length[4]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('grade', 'Nilai', 'trim|required|min_length[1]|max_length[3]|xss_clean|integer|less_than[101]');
			$this->form_validation->set_rules('desc_grade', 'Pesan', 'trim|max_length[100]|xss_clean|');
			// create grade
			if($this->uri->segment(6) == "update" && $this->uri->segment(7) != null) {
				$data['id_grade'] = $this->uri->segment(7);
				$data['grade_records'] = $this->mdl_grade->record($data['id_grade'])->result();
				if(isset($_POST['doUpdate'])) {
					if($this->form_validation->run() == TRUE) {
							$this->mdl_grade->update($data['id_grade'], $dataRecordGrade);
							redirect("admin/student/grade/$data[id_user]/$data[id_semester]");
					}
				}
				$display = "studentGradeUpdate";
			}
			// create grade
			if($this->uri->segment(6) == "create") {
				if(isset($_POST['doCreate'])) {
					if($this->form_validation->run() == TRUE) {
							$this->mdl_grade->save($dataRecordGrade);
							redirect("admin/student/grade/$data[id_user]/$data[id_semester]");
					}
				}
				$display = "studentGradeCreate";
			}
			// delete grade
			else if($this->uri->segment(6) == "delete" && $this->uri->segment(7) != null) {
				$id = $this->uri->segment(7);
				$this->mdl_grade->delete($id);
				redirect("admin/student/grade/$data[id_user]/$data[id_semester]");
			}
		}
		// list grade student
		else if($this->uri->segment(3) == "grade" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$data['_title'] = "Daftar Nilai Semester Murid";
			$data['id_user'] = $this->uri->segment(4);
			$data['id_semester'] = $this->uri->segment(5);
			$data['student_record'] = $this->mdl_student->record($data['id_user'])->result();
			foreach($data['student_record'] as $row) {
				$data['_title'] = "Nilai Semester $data[id_semester] " . $row->full_name;
				$data['_title_content'] = "Nilai Semester $data[id_semester] " . $row->full_name;
			}
			$data['education_record'] = $this->mdl_education->user_records($data['id_user'], $data['id_semester'])->result();
			$display = "studentGrade";
		}
		// list semester student
		else if($this->uri->segment(3) == "grade" && $this->uri->segment(4) != null) {
			$data['_title'] = "Daftar Nilai Semester Murid";
			$data['id_user'] = $this->uri->segment(4);
			$data['student_record'] = $this->mdl_student->record($data['id_user'])->result();
			foreach($data['student_record'] as $row) {
				$data['_title_content'] = "Daftar Semester Kelas " . $row->full_name;
			}
			$display = "studentSmester";
		}
		$this->template->backend('content/userManagement/'.$display, $data);
	}
	/****** student end ******/
	
	
	
	
	
	
	
	/****** alumnus begin ******/
	public function alumnus() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->content_management;
		$data['_title'] = "Alumni";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$display = "alumnus";
		$data['alumnuses'] = $this->mdl_alumnus->records()->result();
		$data['classes'] = $this->mdl_class->common_records()->result();
		$this->mdl_common->set_pk("id_city");
		$this->mdl_common->set_tb("city");
		$data['cities'] = $this->mdl_common->records()->result();
		$dataRecord['full_name'] = $this->input->post("full_name");
		$dataRecord['parent_name'] = $this->input->post("parent_name");
		$dataRecord['no_jenjang'] = $this->input->post("no_jenjang");
		$dataRecord['nis'] = $this->input->post("nis");
		$dataRecord['nisn'] = $this->input->post("nisn");
		$dataRecord['email'] = $this->input->post("email");
		$dataRecord['password'] = $this->encrypt->encode($this->input->post("password"));
		$dataRecord['id_class'] = $this->input->post("id_class");
		$dataRecord['school_year'] = $this->method->school_year();
		$dataRecord['is_auser'] = $this->input->post("is_auser");
		$dataRecord['id_city'] = $this->input->post("id_city");
		$dataRecord['gender'] = $this->input->post("gender");
		$dataRecord['born_date'] = $this->method->dateToDatabase($this->input->post("born_date"));
		$dataRecord['address'] = $this->input->post("address");
		$dataRecord['desc_user'] = $this->input->post("desc_user");
		$dataRecordGrade['id_edu'] = $this->input->post("id_edu");
		$dataRecordGrade['name_grade'] = $this->input->post("name_grade");
		$dataRecordGrade['grade'] = $this->input->post("grade");
		$dataRecordGrade['desc_grade'] = $this->input->post("desc_grade");
		$dataRecordGrade['id_user'] = $this->uri->segment(4);
		$dataRecordGrade['id_semester'] = $this->uri->segment(5);
		// validation
		$this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|min_length[4]|max_length[50]|xss_clean|');
		$this->form_validation->set_rules('parent_name', 'Parent Name', 'trim|required|min_length[4]|max_length[50]|xss_clean|');
		$this->form_validation->set_rules('no_jenjang', 'No Jenjang', 'trim|required|min_length[4]|max_length[50]|xss_clean|');
		$this->form_validation->set_rules('nis', 'NIS', 'trim|required|min_length[4]|max_length[50]|xss_clean|');
		$this->form_validation->set_rules('nisn', 'NISN', 'trim|required|min_length[4]|max_length[50]|xss_clean|');
		$this->form_validation->set_rules('born_date', 'Born Date', 'trim|required|min_length[10]|max_length[10]|xss_clean|');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[25]|max_length[200]|xss_clean|');
		$this->form_validation->set_rules('desc_user', 'Description User', 'trim|xss_clean|');
		if($dataRecord['desc_user'] == "<br>") {$dataRecord['desc_user'] = "-";}
		// create alumnus
		if($this->uri->segment(3) == "create") {
			$data['errorImage'] = null;
			$dataUploads['file_name'] = "";
			$dataRecord['picture_user'] = "";
			$data['_title_content'] = "Buat " . $data['_title'];
			$display = "alumnusCreate";
			if(isset($_POST['doCreate'])) {
				$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email|is_unique[user.email]|');
				$this->form_validation->set_rules('repeat_email', 'Repeat E-mail', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email|matches[email]');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|xss_clean');
				$this->form_validation->set_rules('repeat_password', 'Repeat Password', "trim|xss_clean|matches[password]");
				$dataUploads['file_name'] = "";
				$dataRecord['picture_user'] = "";
				$dataUploads = $this->mdl_function->do_upload(100, 100);
				$data['errorImage'] = $dataUploads['error'];
				$dataRecord['picture_user'] = $dataUploads['file_name'];
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					$this->mdl_alumnus->save($dataRecord);
					redirect("admin/alumnus");
				}
				else $this->method->deleteUserPicture($dataRecord['picture_user']);
			}
		}
		// detail alumnus
		if($this->uri->segment(3) == "view" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Detail " . $data['_title'];
			$display = "alumnusDetail";
			$id = $this->uri->segment(4);
			$data['alumnus_record'] = $this->mdl_alumnus->record($id)->result();
			
		}
		// update alumnus
		else if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['errorImage'] = null;
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "alumnusUpdate";
			$id = $this->uri->segment(4);
			$data['alumnus_record'] = $this->mdl_alumnus->record($id)->result();
			if(isset($_POST['doUpdate'])) {
				if(isset($_POST['change_email'])) {
					$data['change_email'] = "";
					$dataRecord['change_email'] = TRUE;
					$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email|is_unique[user.email]|');
					$this->form_validation->set_rules('repeat_email', 'Repeat E-mail', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email|matches[email]');
				}
				else {
					$dataRecord['change_email'] = FALSE;
				}
				if(isset($_POST['change_pass'])) {
					$data['change_pass'] = "";
					$dataRecord['change_pass'] = TRUE;
					$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|min_length[6]|max_length[50]|xss_clean|matches[current_password]');
					$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|xss_clean');
					$this->form_validation->set_rules('repeat_password', 'Repeat Password', "trim|required|min_length[6]|max_length[50]|xss_clean|matches[password]");
				}
				else {
					$dataRecord['change_pass'] = FALSE;
				}
				$dataUploads['file_name'] = "";
				foreach($data['alumnus_record'] as $alumnus) $dataRecord['picture_user'] = $alumnus->picture_user;
				if(isset($_POST['change_photo'])) {
					$data['change_photo'] = "";
					$dataUploads = $this->mdl_function->do_upload(100, 100);
					$data['errorImage'] = $dataUploads['error'];
					$dataRecord['picture_user'] = $dataUploads['file_name'];
					$dataRecord['change_photo'] = TRUE;
				}
				else {
					$dataRecord['change_photo'] = FALSE;
				}
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					if($dataRecord['change_photo'] == TRUE) foreach($data['alumnus_record'] as $alumnus) $this->method->deleteUserPicture($alumnus->picture_user);
					$this->mdl_alumnus->update($id, $dataRecord);
					redirect("admin/alumnus");
				}
			}
		}
		// delete alumnus
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$id = $this->uri->segment(4);
			$data['alumnus_record'] = $this->mdl_alumnus->record($id)->result();
			foreach($data['alumnus_record'] as $alumnus) $this->method->deleteUserPicture($alumnus->picture_user);
			$this->mdl_alumnus->delete($id);
			redirect("admin/alumnus");
		}
		// up alumnus
		else if($this->uri->segment(3) == "up" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$id_class = $this->uri->segment(4);
			$id_user = $this->uri->segment(5);
			$this->mdl_alumnus->up(2, $id_user);
			redirect("admin/alumnus");
		}
		// export alumnus
		else if($this->uri->segment(3) == "export" && $this->uri->segment(4) != null) {
			$id = $this->uri->segment(4);
			$dataRecords = $this->mdl_alumnus->records($id)->result();
			$datas[] = array();
			$i = 0;
			foreach($dataRecords as $dataRecord) {
				//$datas['']['parent name'] = $dataRecord->parent_name;
				$datas[$i]['Nama Murid'] = $dataRecord->full_name;
				$datas[$i]['Nama Orang Tua'] = $dataRecord->parent_name;
				$datas[$i]['Email'] = $dataRecord->email;
				$datas[$i]['No Jenjang'] = $dataRecord->no_jenjang;
				$datas[$i]['NIS'] = $dataRecord->nis;
				$datas[$i]['NISN'] = $dataRecord->nisn;
				$datas[$i]['Jenis Kelamin'] = ($dataRecord->gender==1)?"L":"P";
				$datas[$i]['Tanggal Lahir'] = $dataRecord->born_date;
				$datas[$i]['Kota'] = $dataRecord->name_city;
				$i++;
			}
			$this->method->getReportExel($datas);
		}
		$this->template->backend('content/userManagement/'.$display, $data);
	}
	/****** alumnus end ******/
	
	
	
	
	

	/****** city begin ******/
	public function city() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->user_management;
		$data['_title'] = "Kota";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$this->mdl_common->set_pk("id_city");
		$this->mdl_common->set_tb("city");
		$bcu = true;
		$data['cities'] = $this->mdl_common->records()->result();
		// create city
		if(isset($_POST['create'])) {
			$dataRecord['name_city'] = $_POST['name_city'];
			foreach($data['cities'] as $city){
				if($city->name_city == $dataRecord['name_city'])
					 $bcu = false;
			}
			if($bcu === true) {
				$this->mdl_common->save($dataRecord);
				redirect("admin/city");
			}
		}
		// update city
		else if(isset($_POST['value'])) {
			$dataRecord[$_POST['field']] = $_POST['value'];
			foreach($data['cities'] as $city){
				if($city->name_city == $dataRecord[$_POST['field']])
					 $bcu = false;
			}
			if($bcu === true) {
				$this->mdl_common->update($_POST['id'], $dataRecord);
				redirect("admin/city");
			}
		}
		// delete city
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$id = $this->uri->segment(4);
			$this->mdl_common->delete($id);
			redirect("admin/city");
		}
		$this->template->backend('content/contentManagement/city', $data);
	}
	/****** city end ******/
	
	
	
	
	
	
	
	/****** classes begin ******/
	public function classes() {
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->content_management;
		$data['_title'] = "Kelas";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$display = "class";
		$this->mdl_common->set_pk("id_class");
		$this->mdl_common->set_tb("class");
		$bcu = true;
		$data['classes'] = $this->mdl_common->records()->result();
		$data['teachers'] = $this->mdl_teacher->records()->result();
		$dataRecord['name_class'] = $this->input->post("name_class");
		$dataRecord['id_class_year'] = $this->input->post("id_class_year");
		// valudation
		$this->form_validation->set_rules('name_class', 'Class Name', 'trim|required|min_length[1]|max_length[10]|xss_clean|');
		$this->form_validation->set_rules('id_class_year', 'School Year', 'trim|required|min_length[1]|max_length[10]|xss_clean|is_unique[class.id_class_year]');
		// update classes
		if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "classUpdate";
			$id = $this->uri->segment(4);
			$data['class_record'] = $this->mdl_common->record($id)->result();
			if(isset($_POST['doUpdate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_common->update($id, $dataRecord);
					redirect("admin/classes");
				}
			}
		}
		$this->template->backend('content/userManagement/'.$display, $data);
	}
	/****** classes end ******/
	
	
	
	
	
	
	

	/****** education begin ******/
	public function education() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->education_management;
		$data['_title'] = "Pelajaran";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$bcu = true;
		$display = "education";
		$data['educations'] = $this->mdl_education->records()->result();
		$data['teachers'] = $this->mdl_teacher->records()->result();
		$data['teacherses'] = null;
		foreach($data['teachers'] as $teacher) { $data['teacherses']["$teacher->id_user"] = $teacher->full_name; }
		$data['teachers'] = $data['teacherses'];
		$dataRecord['name_edu'] = $this->input->post("name_edu");
		$dataRecord['id_edu'] = $this->uri->segment(4);
		$dataRecord['id_user'] = $this->input->post("id_user");
		$dataRecord['kkm'] = $this->input->post("kkm");
		$dataRecord['desc_edu'] = $this->input->post("desc_edu");
		$dataRecord['mode_edu'] = 0;
		// valudation
		$this->form_validation->set_rules('name_edu', 'Education Name', 'trim|required|min_length[1]|max_length[50]|xss_clean|is_unique[education.name_edu]');
		$this->form_validation->set_rules('kkm', 'KKM', 'trim|required|min_length[1]|max_length[3]|xss_clean');
		$this->form_validation->set_rules('mode_edu[]', 'Semester', 'trim|required|greater_than[0]xss_clean');
		// create education
		if($this->uri->segment(3) == "create") {
			$data['_title_content'] = "Buat " . $data['_title'];
			$display = "educationCreate";
			if(isset($_POST['doCreate']) && $this->form_validation->run() == TRUE) {
				if(isset($_POST['mode_edu'])) {for($i = 0 ; $i < sizeof($_POST['mode_edu']); $i++) {$dataRecord['mode_edu'] += $_POST['mode_edu'][$i];}}
				$this->mdl_education->save($dataRecord);
				redirect("admin/education");
			}
		}
		// update education
		else if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Update " . $data['_title'];
			$display = "educationUpdate";
			$data['edu_update'] = $this->mdl_education->record($dataRecord['id_edu'])->result();
			$name_edu = "";
			foreach($data["edu_update"] as $edu_update) {$name_edu = $edu_update->name_edu;}
			if($name_edu == $dataRecord["name_edu"]) 
				$this->form_validation->set_rules('name_edu', 'Education Name', 'trim|required|min_length[1]|max_length[50]|xss_clean|');
			else 
				$this->form_validation->set_rules('name_edu', 'Education Name', 'trim|required|min_length[1]|max_length[50]|xss_clean|is_unique[education.name_edu]');
			if(isset($_POST['doUpdate']) && $this->form_validation->run() == TRUE) {
				if(isset($_POST['mode_edu'])) {for($i = 0 ; $i < sizeof($_POST['mode_edu']); $i++) {$dataRecord['mode_edu'] += $_POST['mode_edu'][$i];}}
				$this->mdl_education->update($dataRecord);
				redirect("admin/education");
			}
		}
		// delete education
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$display = "education";
			$this->mdl_education->delete($dataRecord['id_edu']);
			redirect("admin/education");
		}
		$this->template->backend('content/educationManagement/'.$display, $data);
	}
	/****** edcation end ******/
	
	
	
	
	
	

	/****** news begin ******/
	public function news() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->content_management;
		$data['_title'] = "Berita Sekolah";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$this->mdl_content->set_pk("id_content");
		$this->mdl_content->set_tb("content");
		$bcu = true;
		$display = "news";
		$data['newses'] = $this->mdl_content->news_records()->result();
		// input post news
		$data['id_content'] = $this->uri->segment(4);
		$dataRecord['id_content'] = $this->uri->segment(4);
		$dataRecord['id_user'] = $this->session->userdata("id_user");
		$dataRecord['name_content'] = $this->input->post("name_content");
		$dataRecord['desc_content'] = $this->input->post("desc_content");
		$dataRecord['is_acontent'] = $this->input->post("is_acontent");
		$dataRecord['is_dcontent'] = $this->input->post("is_dcontent");
		$data['errorImage'] = null;
		$dataRecord['picture_content'] = "";
		// input post comment
		$data['id_comment'] = $this->uri->segment(5);
		$dataRecord['id_comment'] = $this->uri->segment(5);
		$dataRecord['author_comment'] = $this->input->post("author_comment");
		$dataRecord['email_comment'] = $this->input->post("email_comment");
		$dataRecord['desc_comment'] = $this->input->post("desc_comment");
		$dataRecord['parent_comment'] = $this->input->post("parent_comment");
		if($dataRecord['parent_comment'] == null) $dataRecord['parent_comment'] = "0";
		// create news
		if($this->uri->segment(3) == "create") {
			$data['_title_content'] = "Buat " . $data['_title'];
			$display = "newsCreate";
			// validation news
			$this->form_validation->set_rules('name_content', 'News Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doCreate'])) {
				$dataUploads['file_name'] = "";
				$dataUploads = $this->mdl_function->do_upload();
				$data['errorImage'] = $dataUploads['error'];
				$dataRecord['picture_content'] = $dataUploads['file_name'];
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					$this->mdl_content->news_save($dataRecord);
					redirect("admin/news");
				}
				else $this->method->deleteUserPicture($dataRecord['picture_content']);
			}
		}
		// update news
		else if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "newsUpdate";
			$data['news_update'] = $this->mdl_content->news_record($data['id_content'])->result();
			$newPhoto = "";
			foreach($data["news_update"] as $news_update) {
				$oldPicture = $news_update->picture_content;
				$dataRecord['picture_content'] = $news_update->picture_content;
			}
			// validation news
			$this->form_validation->set_rules('name_content', 'News Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doUpdate'])) {
				// image
				if(isset($_POST['change_photo'])) {
					$dataUploads['file_name'] = "";
					$dataUploads = $this->mdl_function->do_upload(200, 200);
					$data['errorImage'] = $dataUploads['error'];
					$dataRecord['picture_content'] = $dataUploads['file_name'];
					$newPhoto = $dataUploads['file_name'];
				}
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					if(isset($_POST['change_photo'])) $this->method->deleteUserPicture($oldPicture);
					$this->mdl_content->news_update($dataRecord);
					redirect("admin/news");
				}
				else $this->method->deleteUserPicture($newPhoto);
			}
		}
		// comment create news
		else if($this->uri->segment(3) == "commentCreate" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Buat Komentar " . $data['_title'];
			$display = "newsCommentCreate";
			$data['news_update'] = $this->mdl_content->news_record($data['id_content'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->save($dataRecord, 4);
					redirect("admin/news/view/$dataRecord[id_content]");
				}
			}
		}
		// comment update news
		else if($this->uri->segment(3) == "commentUpdate" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$data['_title_content'] = "Perbaharui Komentar " . $data['_title'];
			$display = "newsCommentUpdate";
			$data['news_update'] = $this->mdl_content->news_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->record($dataRecord['id_comment'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->update($dataRecord);
					redirect("admin/news/view/$dataRecord[id_content]");
				}
			}
		}
		// comment delete news
		else if($this->uri->segment(3) == "commentDelete" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$this->mdl_comment->delete($data['id_comment']);
			redirect("admin/news/view/$dataRecord[id_content]");
		}
		else if($this->uri->segment(3) == "view" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Detail " . $data['_title'];
			$display = "newsDetail";
			$data['newses'] = $this->mdl_content->news_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->id_content_records($data['id_content'])->result();
		}
		else if($this->uri->segment(3) == "toogle" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$status = $this->uri->segment(5);
			$this->mdl_content->toogle_is_acontent($dataRecord['id_content'], $status);
			redirect("admin/news");
		}
		// delete news
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$data['content_record'] = $this->mdl_content->news_record($data['id_content'])->result();
			foreach($data['content_record'] as $content) $this->method->deleteUserPicture($content->picture_content);
			$this->mdl_content->news_delete($data['id_content']);
			redirect("admin/news");
		}
		$this->template->backend('content/contentManagement/'.$display, $data);
	}
	/****** news end ******/
	
	
	
	
	
	

	/****** article begin ******/
	public function article() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->education_management;
		$data['_title'] = "Artikel";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$this->mdl_content->set_pk("id_content");
		$this->mdl_content->set_tb("content");
		$bcu = true;
		$dataUploads['file_name'] = "";
		$display = "article";
		$data['articlees'] = $this->mdl_content->article_records()->result();
		$this->mdl_common->set_pk("id_tcontent");
		$this->mdl_common->set_tb("tcontent");
		$data['tcontents'] = $this->mdl_common->records()->result();
		foreach($data['tcontents'] as $tcontent) {$data['tcontentses']["$tcontent->id_tcontent"] = $tcontent->name_tcontent;}
		// input post article
		$data['id_content'] = $this->uri->segment(4);
		$dataRecord['id_content'] = $this->uri->segment(4);
		$dataRecord['id_user'] = $this->session->userdata("id_user");
		$dataRecord['id_tcontent'] = $this->input->post("id_tcontent");
		$dataRecord['name_content'] = $this->input->post("name_content");
		$dataRecord['desc_content'] = $this->input->post("desc_content");
		$dataRecord['is_acontent'] = $this->input->post("is_acontent");
		$dataRecord['is_dcontent'] = $this->input->post("is_dcontent");
		$data['errorImage'] = null;
		$dataRecord['picture_content'] = "";
		// input post comment
		$data['id_comment'] = $this->uri->segment(5);
		$dataRecord['id_comment'] = $this->uri->segment(5);
		$dataRecord['author_comment'] = $this->input->post("author_comment");
		$dataRecord['email_comment'] = $this->input->post("email_comment");
		$dataRecord['desc_comment'] = $this->input->post("desc_comment");
		$dataRecord['parent_comment'] = $this->input->post("parent_comment");
		if($dataRecord['parent_comment'] == null) $dataRecord['parent_comment'] = "0";
		// create article
		if($this->uri->segment(3) == "create") {
			$data['_title_content'] = "Buat " . $data['_title'];
			$display = "articleCreate";
			// validation article
			$this->form_validation->set_rules('name_content', 'article Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doCreate'])) {
				$dataUploads = $this->mdl_function->do_upload();
				$data['errorImage'] = $dataUploads['error'];
				$dataRecord['picture_content'] = $dataUploads['file_name'];
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					$this->mdl_content->article_save($dataRecord);
					redirect("admin/article");
				}
				else $this->method->deleteUserPicture($dataRecord['picture_content']);
			}
		}
		// update article
		else if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "articleUpdate";
			$data['article_update'] = $this->mdl_content->article_record($data['id_content'])->result();
			$newPicture = "";
			foreach($data["article_update"] as $article_update) {
				$oldPicture = $article_update->picture_content;
				$dataRecord['picture_content'] = $article_update->picture_content;
			}
			// validation article
			$this->form_validation->set_rules('name_content', 'article Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doUpdate'])) {
				// image
				if(isset($_POST['change_photo'])) {
					$dataUploads = $this->mdl_function->do_upload(200, 200);
					$data['errorImage'] = $dataUploads['error'];
					$newPicture = $dataUploads['file_name'];
					
		$data['uploads'] = $this->get_upload_path();$dataRecord['picture_content'] = $dataUploads['file_name'];
				}
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					if(isset($_POST['change_photo'])) $this->method->deleteUserPicture($oldPicture);
					$this->mdl_content->article_update($dataRecord);
					redirect("admin/article");
				}
				else $this->method->deleteUserPicture($newPicture);
			}
		}
		// comment create article
		else if($this->uri->segment(3) == "commentCreate" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Buat Komentar " . $data['_title'];
			$display = "articleCommentCreate";
			$data['article_update'] = $this->mdl_content->article_record($data['id_content'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->save($dataRecord, 8);
					redirect("admin/article/view/$dataRecord[id_content]");
				}
			}
		}
		// comment update article
		else if($this->uri->segment(3) == "commentUpdate" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$data['_title_content'] = "Perbaharui Komentar " . $data['_title'];
			$display = "articleCommentUpdate";
			$data['article_update'] = $this->mdl_content->article_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->record($dataRecord['id_comment'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->update($dataRecord);
					redirect("admin/article/view/$dataRecord[id_content]");
				}
			}
		}
		// comment delete article
		else if($this->uri->segment(3) == "commentDelete" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$this->mdl_comment->delete($data['id_comment']);
			redirect("admin/article/view/$dataRecord[id_content]");
		}
		else if($this->uri->segment(3) == "view" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Detail " . $data['_title'];
			$display = "articleDetail";
			$data['articlees'] = $this->mdl_content->article_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->id_content_records($data['id_content'])->result();
		}
		else if($this->uri->segment(3) == "toogle" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$status = $this->uri->segment(5);
			$this->mdl_content->toogle_is_acontent($dataRecord['id_content'], $status);
			redirect("admin/article");
		}
		// delete article
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$data['content_record'] = $this->mdl_content->article_record($data['id_content'])->result();
			foreach($data['content_record'] as $content) $this->method->deleteUserPicture($content->picture_content);
			$this->mdl_content->article_delete($data['id_content']);
			redirect("admin/article");
		}
		$this->template->backend('content/educationManagement/'.$display, $data);
	}
	/****** article end ******/
	
	
	
	
	
	

	/****** achievement begin ******/
	public function achievement() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->education_management;
		$data['_title'] = "Prestasi";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$this->mdl_content->set_pk("id_content");
		$this->mdl_content->set_tb("content");
		$bcu = true;
		$display = "achievement";
		$data['achievementes'] = $this->mdl_content->achievement_records()->result();
		// input post achievement
		$data['id_content'] = $this->uri->segment(4);
		$dataRecord['id_content'] = $this->uri->segment(4);
		$dataRecord['id_user'] = $this->session->userdata("id_user");
		$dataRecord['name_content'] = $this->input->post("name_content");
		$dataRecord['desc_content'] = $this->input->post("desc_content");
		$dataRecord['is_acontent'] = $this->input->post("is_acontent");
		$dataRecord['is_dcontent'] = $this->input->post("is_dcontent");
		$data['errorImage'] = null;
		$dataRecord['picture_content'] = "";
		// input post comment
		$data['id_comment'] = $this->uri->segment(5);
		$dataRecord['id_comment'] = $this->uri->segment(5);
		$dataRecord['author_comment'] = $this->input->post("author_comment");
		$dataRecord['email_comment'] = $this->input->post("email_comment");
		$dataRecord['desc_comment'] = $this->input->post("desc_comment");
		$dataRecord['parent_comment'] = $this->input->post("parent_comment");
		if($dataRecord['parent_comment'] == null) $dataRecord['parent_comment'] = "0";
		// create achievement
		if($this->uri->segment(3) == "create") {
			$data['_title_content'] = "Buat " . $data['_title'];
			$display = "achievementCreate";
			// validation achievement
			$this->form_validation->set_rules('name_content', 'achievement Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doCreate'])) {
				$dataUploads['file_name'] = "";
				$dataUploads = $this->mdl_function->do_upload();
				$data['errorImage'] = $dataUploads['error'];
				$dataRecord['picture_content'] = $dataUploads['file_name'];
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					$this->mdl_content->achievement_save($dataRecord);
					redirect("admin/achievement");
				}
				else $this->method->deleteUserPicture($dataRecord['picture_content']);
			}
		}
		// update achievement
		else if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "achievementUpdate";
			$data['achievement_update'] = $this->mdl_content->achievement_record($data['id_content'])->result();
			$newPhoto = "";
			foreach($data["achievement_update"] as $achievement_update) {
				$oldPicture = $achievement_update->picture_content;
				$dataRecord['picture_content'] = $achievement_update->picture_content;
			}
			// validation achievement
			$this->form_validation->set_rules('name_content', 'achievement Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doUpdate'])) {
				// image
				if(isset($_POST['change_photo'])) {
					$dataUploads['file_name'] = "";
					$dataUploads = $this->mdl_function->do_upload(200, 200);
					$data['errorImage'] = $dataUploads['error'];
					$dataRecord['picture_content'] = $dataUploads['file_name'];
					$newPhoto = $dataUploads['file_name'];
				}
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					if(isset($_POST['change_photo'])) $this->method->deleteUserPicture($oldPicture);
					$this->mdl_content->achievement_update($dataRecord);
					redirect("admin/achievement");
				}
				else $this->method->deleteUserPicture($newPhoto);
			}
		}
		// comment create achievement
		else if($this->uri->segment(3) == "commentCreate" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Buat Komentar " . $data['_title'];
			$display = "achievementCommentCreate";
			$data['achievement_update'] = $this->mdl_content->achievement_record($data['id_content'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->save($dataRecord, 9);
					redirect("admin/achievement/view/$dataRecord[id_content]");
				}
			}
		}
		// comment update achievement
		else if($this->uri->segment(3) == "commentUpdate" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$data['_title_content'] = "Perbaharui Komentar " . $data['_title'];
			$display = "achievementCommentUpdate";
			$data['achievement_update'] = $this->mdl_content->achievement_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->record($dataRecord['id_comment'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->update($dataRecord);
					redirect("admin/achievement/view/$dataRecord[id_content]");
				}
			}
		}
		// comment delete achievement
		else if($this->uri->segment(3) == "commentDelete" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$this->mdl_comment->delete($data['id_comment']);
			redirect("admin/achievement/view/$dataRecord[id_content]");
		}
		else if($this->uri->segment(3) == "view" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Detail " . $data['_title'];
			$display = "achievementDetail";
			$data['achievementes'] = $this->mdl_content->achievement_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->id_content_records($data['id_content'])->result();
		}
		else if($this->uri->segment(3) == "toogle" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$status = $this->uri->segment(5);
			$this->mdl_content->toogle_is_acontent($dataRecord['id_content'], $status);
			redirect("admin/achievement");
		}
		// delete achievement
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$data['content_record'] = $this->mdl_content->achievement_record($data['id_content'])->result();
			foreach($data['content_record'] as $content) $this->method->deleteUserPicture($content->picture_content);
			$this->mdl_content->achievement_delete($data['id_content']);
			redirect("admin/achievement");
		}
		$this->template->backend('content/educationManagement/'.$display, $data);
	}
	/****** achievement end ******/
	
	
	
	
	
	

	/****** facility begin ******/
	public function facility() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->education_management;
		$data['_title'] = "Fasilitas";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$this->mdl_content->set_pk("id_content");
		$this->mdl_content->set_tb("content");
		$bcu = true;
		$display = "facility";
		$data['facilityes'] = $this->mdl_content->facility_records()->result();
		// input post facility
		$data['id_content'] = $this->uri->segment(4);
		$dataRecord['id_content'] = $this->uri->segment(4);
		$dataRecord['id_user'] = $this->session->userdata("id_user");
		$dataRecord['name_content'] = $this->input->post("name_content");
		$dataRecord['desc_content'] = $this->input->post("desc_content");
		$dataRecord['is_acontent'] = $this->input->post("is_acontent");
		$dataRecord['is_dcontent'] = $this->input->post("is_dcontent");
		$data['errorImage'] = null;
		$dataRecord['picture_content'] = "";
		// input post comment
		$data['id_comment'] = $this->uri->segment(5);
		$dataRecord['id_comment'] = $this->uri->segment(5);
		$dataRecord['author_comment'] = $this->input->post("author_comment");
		$dataRecord['email_comment'] = $this->input->post("email_comment");
		$dataRecord['desc_comment'] = $this->input->post("desc_comment");
		$dataRecord['parent_comment'] = $this->input->post("parent_comment");
		if($dataRecord['parent_comment'] == null) $dataRecord['parent_comment'] = "0";
		// create facility
		if($this->uri->segment(3) == "create") {
			$data['_title_content'] = "Buat " . $data['_title'];
			$display = "facilityCreate";
			// validation facility
			$this->form_validation->set_rules('name_content', 'facility Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doCreate'])) {
				$dataUploads['file_name'] = "";
				$dataUploads = $this->mdl_function->do_upload();
				$data['errorImage'] = $dataUploads['error'];
				$dataRecord['picture_content'] = $dataUploads['file_name'];
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					$this->mdl_content->facility_save($dataRecord);
					redirect("admin/facility");
				}
				else $this->method->deleteUserPicture($dataRecord['picture_content']);
			}
		}
		// update facility
		else if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "facilityUpdate";
			$data['facility_update'] = $this->mdl_content->facility_record($data['id_content'])->result();
			$newPhoto = "";
			foreach($data["facility_update"] as $facility_update) {
				$oldPicture = $facility_update->picture_content;
				$dataRecord['picture_content'] = $facility_update->picture_content;
			}
			// validation facility
			$this->form_validation->set_rules('name_content', 'facility Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doUpdate'])) {
				// image
				if(isset($_POST['change_photo'])) {
					$dataUploads['file_name'] = "";
					$dataUploads = $this->mdl_function->do_upload(200, 200);
					$data['errorImage'] = $dataUploads['error'];
					$dataRecord['picture_content'] = $dataUploads['file_name'];
					$newPhoto = $dataUploads['file_name'];
				}
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					if(isset($_POST['change_photo'])) $this->method->deleteUserPicture($oldPicture);
					$this->mdl_content->facility_update($dataRecord);
					redirect("admin/facility");
				}
				else $this->method->deleteUserPicture($newPhoto);
			}
		}
		// comment create facility
		else if($this->uri->segment(3) == "commentCreate" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Buat Komentar " . $data['_title'];
			$display = "facilityCommentCreate";
			$data['facility_update'] = $this->mdl_content->facility_record($data['id_content'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->save($dataRecord, 10);
					redirect("admin/facility/view/$dataRecord[id_content]");
				}
			}
		}
		// comment update facility
		else if($this->uri->segment(3) == "commentUpdate" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$data['_title_content'] = "Perbaharui Komentar " . $data['_title'];
			$display = "facilityCommentUpdate";
			$data['facility_update'] = $this->mdl_content->facility_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->record($dataRecord['id_comment'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->update($dataRecord);
					redirect("admin/facility/view/$dataRecord[id_content]");
				}
			}
		}
		// comment delete facility
		else if($this->uri->segment(3) == "commentDelete" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$this->mdl_comment->delete($data['id_comment']);
			redirect("admin/facility/view/$dataRecord[id_content]");
		}
		else if($this->uri->segment(3) == "view" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Detail " . $data['_title'];
			$display = "facilityDetail";
			$data['facilityes'] = $this->mdl_content->facility_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->id_content_records($data['id_content'])->result();
		}
		else if($this->uri->segment(3) == "toogle" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$status = $this->uri->segment(5);
			$this->mdl_content->toogle_is_acontent($dataRecord['id_content'], $status);
			redirect("admin/facility");
		}
		// delete facility
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$data['content_record'] = $this->mdl_content->facility_record($data['id_content'])->result();
			foreach($data['content_record'] as $content) $this->method->deleteUserPicture($content->picture_content);
			$this->mdl_content->facility_delete($data['id_content']);
			redirect("admin/facility");
		}
		$this->template->backend('content/educationManagement/'.$display, $data);
	}
	/****** facility end ******/
	
	
	
	
	
	

	/****** notification begin ******/
	public function notification() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->education_management;
		$data['_title'] = "Pengumumam";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$this->mdl_content->set_pk("id_content");
		$this->mdl_content->set_tb("content");
		$bcu = true;
		$display = "notification";
		$data['notificationes'] = $this->mdl_content->notification_records()->result();
		// input post notification
		$data['id_content'] = $this->uri->segment(4);
		$dataRecord['id_content'] = $this->uri->segment(4);
		$dataRecord['id_user'] = $this->session->userdata("id_user");
		$dataRecord['name_content'] = $this->input->post("name_content");
		$dataRecord['desc_content'] = $this->input->post("desc_content");
		$dataRecord['is_acontent'] = $this->input->post("is_acontent");
		$dataRecord['is_dcontent'] = $this->input->post("is_dcontent");
		$data['errorImage'] = null;
		$dataRecord['picture_content'] = "";
		// input post comment
		$data['id_comment'] = $this->uri->segment(5);
		$dataRecord['id_comment'] = $this->uri->segment(5);
		$dataRecord['author_comment'] = $this->input->post("author_comment");
		$dataRecord['email_comment'] = $this->input->post("email_comment");
		$dataRecord['desc_comment'] = $this->input->post("desc_comment");
		$dataRecord['parent_comment'] = $this->input->post("parent_comment");
		if($dataRecord['parent_comment'] == null) $dataRecord['parent_comment'] = "0";
		// create notification
		if($this->uri->segment(3) == "create") {
			$data['_title_content'] = "Buat " . $data['_title'];
			$display = "notificationCreate";
			// validation notification
			$this->form_validation->set_rules('name_content', 'notification Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doCreate'])) {
				$dataUploads['file_name'] = "";
				$dataUploads = $this->mdl_function->do_upload(150,150);
				$data['errorImage'] = $dataUploads['error'];
				$dataRecord['picture_content'] = $dataUploads['file_name'];
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					$this->mdl_content->notification_save($dataRecord);
					redirect("admin/notification");
				}
				else $this->method->deleteUserPicture($dataRecord['picture_content']);
			}
		}
		// update notification
		else if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "notificationUpdate";
			$data['notification_update'] = $this->mdl_content->notification_record($data['id_content'])->result();
			$newPhoto = "";
			foreach($data["notification_update"] as $notification_update) {
				$oldPicture = $notification_update->picture_content;
				$dataRecord['picture_content'] = $notification_update->picture_content;
			}
			// validation notification
			$this->form_validation->set_rules('name_content', 'notification Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doUpdate'])) {
				// image
				if(isset($_POST['change_photo'])) {
					$dataUploads['file_name'] = "";
					$dataUploads = $this->mdl_function->do_upload(150, 150);
					$data['errorImage'] = $dataUploads['error'];
					$dataRecord['picture_content'] = $dataUploads['file_name'];
					$newPhoto = $dataUploads['file_name'];
				}
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					if(isset($_POST['change_photo'])) $this->method->deleteUserPicture($oldPicture);
					$this->mdl_content->notification_update($dataRecord);
					redirect("admin/notification");
				}
				else $this->method->deleteUserPicture($newPhoto);
			}
		}
		// comment create notification
		else if($this->uri->segment(3) == "commentCreate" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Buat Komentar " . $data['_title'];
			$display = "notificationCommentCreate";
			$data['notification_update'] = $this->mdl_content->notification_record($data['id_content'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->save($dataRecord, 5);
					redirect("admin/notification/view/$dataRecord[id_content]");
				}
			}
		}
		// comment update notification
		else if($this->uri->segment(3) == "commentUpdate" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$data['_title_content'] = "Perbaharui Komentar " . $data['_title'];
			$display = "notificationCommentUpdate";
			$data['notification_update'] = $this->mdl_content->notification_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->record($dataRecord['id_comment'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->update($dataRecord, 7);
					redirect("admin/notification/view/$dataRecord[id_content]");
				}
			}
		}
		// comment delete notification
		else if($this->uri->segment(3) == "commentDelete" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$this->mdl_comment->delete($data['id_comment']);
			redirect("admin/notification/view/$dataRecord[id_content]");
		}
		else if($this->uri->segment(3) == "view" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Detail " . $data['_title'];
			$display = "notificationDetail";
			$data['notificationes'] = $this->mdl_content->notification_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->id_content_records($data['id_content'])->result();
		}
		else if($this->uri->segment(3) == "toogle" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$status = $this->uri->segment(5);
			$this->mdl_content->toogle_is_acontent($dataRecord['id_content'], $status);
			redirect("admin/notification");
		}
		// delete notification
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$data['content_record'] = $this->mdl_content->notification_record($data['id_content'])->result();
			foreach($data['content_record'] as $content) $this->method->deleteUserPicture($content->picture_content);
			$this->mdl_content->notification_delete($data['id_content']);
			redirect("admin/notification");
		}
		$this->template->backend('content/educationManagement/'.$display, $data);
	}
	/****** notification end ******/
	
	
	
	
	
	

	/****** event begin ******/
	public function event() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->content_management;
		$data['_title'] = "Kegiatan";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$this->mdl_content->set_pk("id_content");
		$this->mdl_content->set_tb("content");
		$bcu = true;
		$display = "event";
		$data['eventes'] = $this->mdl_content->event_records()->result();
		// input post event
		$data['id_content'] = $this->uri->segment(4);
		$dataRecord['id_content'] = $this->uri->segment(4);
		$dataRecord['id_user'] = $this->session->userdata("id_user");
		$dataRecord['name_content'] = $this->input->post("name_content");
		$dataRecord['desc_content'] = $this->input->post("desc_content");
		$dataRecord['is_acontent'] = $this->input->post("is_acontent");
		$dataRecord['is_dcontent'] = $this->input->post("is_dcontent");
		$data['errorImage'] = null;
		$dataRecord['picture_content'] = "";
		// input post comment
		$data['id_comment'] = $this->uri->segment(5);
		$dataRecord['id_comment'] = $this->uri->segment(5);
		$dataRecord['author_comment'] = $this->input->post("author_comment");
		$dataRecord['email_comment'] = $this->input->post("email_comment");
		$dataRecord['desc_comment'] = $this->input->post("desc_comment");
		$dataRecord['parent_comment'] = $this->input->post("parent_comment");
		if($dataRecord['parent_comment'] == null) $dataRecord['parent_comment'] = "0";
		// create event
		if($this->uri->segment(3) == "create") {
			$data['_title_content'] = "Buat " . $data['_title'];
			$display = "eventCreate";
			// validation event
			$this->form_validation->set_rules('name_content', 'event Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doCreate'])) {
				$dataUploads['file_name'] = "";
				$dataUploads = $this->mdl_function->do_upload();
				$data['errorImage'] = $dataUploads['error'];
				$dataRecord['picture_content'] = $dataUploads['file_name'];
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					$this->mdl_content->event_save($dataRecord);
					redirect("admin/event");
				}
				else $this->method->deleteUserPicture($dataRecord['picture_content']);
			}
		}
		// update event
		else if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "eventUpdate";
			$data['event_update'] = $this->mdl_content->event_record($data['id_content'])->result();
			$newPhoto = "";
			foreach($data["event_update"] as $event_update) {
				$oldPicture = $event_update->picture_content;
				$dataRecord['picture_content'] = $event_update->picture_content;
			}
			// validation event
			$this->form_validation->set_rules('name_content', 'event Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doUpdate'])) {
				// image
				if(isset($_POST['change_photo'])) {
					$dataUploads['file_name'] = "";
					$dataUploads = $this->mdl_function->do_upload(200, 200);
					$data['errorImage'] = $dataUploads['error'];
					$dataRecord['picture_content'] = $dataUploads['file_name'];
					$newPhoto = $dataUploads['file_name'];
				}
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					if(isset($_POST['change_photo'])) $this->method->deleteUserPicture($oldPicture);
					$this->mdl_content->event_update($dataRecord);
					redirect("admin/event");
				}
				else $this->method->deleteUserPicture($newPhoto);
			}
		}
		// comment create event
		else if($this->uri->segment(3) == "commentCreate" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Buat Komentar " . $data['_title'];
			$display = "eventCommentCreate";
			$data['event_update'] = $this->mdl_content->event_record($data['id_content'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->save($dataRecord, 11);
					redirect("admin/event/view/$dataRecord[id_content]");
				}
			}
		}
		// comment update event
		else if($this->uri->segment(3) == "commentUpdate" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$data['_title_content'] = "Perbaharui Komentar " . $data['_title'];
			$display = "eventCommentUpdate";
			$data['event_update'] = $this->mdl_content->event_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->record($dataRecord['id_comment'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->update($dataRecord);
					redirect("admin/event/view/$dataRecord[id_content]");
				}
			}
		}
		// comment delete event
		else if($this->uri->segment(3) == "commentDelete" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$this->mdl_comment->delete($data['id_comment']);
			redirect("admin/event/view/$dataRecord[id_content]");
		}
		else if($this->uri->segment(3) == "view" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Detail " . $data['_title'];
			$display = "eventDetail";
			$data['eventes'] = $this->mdl_content->event_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->id_content_records($data['id_content'])->result();
		}
		else if($this->uri->segment(3) == "toogle" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$status = $this->uri->segment(5);
			$this->mdl_content->toogle_is_acontent($dataRecord['id_content'], $status);
			redirect("admin/event");
		}
		// delete event
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$data['content_record'] = $this->mdl_content->event_record($data['id_content'])->result();
			foreach($data['content_record'] as $content) $this->method->deleteUserPicture($content->picture_content);
			$this->mdl_content->event_delete($data['id_content']);
			redirect("admin/event");
		}
		$this->template->backend('content/contentManagement/'.$display, $data);
	}
	/****** event end ******/
	
	
	
	
	
	

	/****** history begin ******/
	public function history() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->content_management;
		$data['_title'] = "Sejarah";
		$data['_title_content'] = " " . $data['_title'];
		// data model
		$this->mdl_content->set_pk("id_content");
		$this->mdl_content->set_tb("content");
		$bcu = true;
		$display = "history";
		$data['historyes'] = $this->mdl_content->history_records()->result();
		// input post history
		$data['id_content'] = $this->uri->segment(4);
		$dataRecord['id_content'] = $this->uri->segment(4);
		$dataRecord['id_user'] = $this->session->userdata("id_user");
		$dataRecord['name_content'] = $this->input->post("name_content");
		$dataRecord['desc_content'] = $this->input->post("desc_content");
		$dataRecord['is_acontent'] = $this->input->post("is_acontent");
		$dataRecord['is_dcontent'] = $this->input->post("is_dcontent");
		// input post comment
		$data['id_comment'] = $this->uri->segment(5);
		$dataRecord['id_comment'] = $this->uri->segment(5);
		$dataRecord['author_comment'] = $this->input->post("author_comment");
		$dataRecord['email_comment'] = $this->input->post("email_comment");
		$dataRecord['desc_comment'] = $this->input->post("desc_comment");
		$dataRecord['parent_comment'] = $this->input->post("parent_comment");
		if($dataRecord['parent_comment'] == null) $dataRecord['parent_comment'] = "0";
		// update history
		if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "historyUpdate";
			$data['history_update'] = $this->mdl_content->history_record($data['id_content'])->result();
			// validation history
			$this->form_validation->set_rules('name_content', 'history Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doUpdate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_content->history_update($dataRecord);
					redirect("admin/history");
				}
			}
		}
		else if($this->uri->segment(3) == "view" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Detail " . $data['_title'];
			$display = "historyDetail";
			$data['historyes'] = $this->mdl_content->history_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->id_content_records($data['id_content'])->result();
		}
		$this->template->backend('content/contentManagement/'.$display, $data);
	}
	/****** history end ******/
	
	
	
	
	
	

	/****** visionAndMission begin ******/
	public function visionAndMission() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->content_management;
		$data['_title'] = "Visi Dan Misi";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$this->mdl_content->set_pk("id_content");
		$this->mdl_content->set_tb("content");
		$bcu = true;
		$display = "visionAndMission";
		$data['visionAndMissiones'] = $this->mdl_content->visionAndMission_records()->result();
		// input post visionAndMission
		$data['id_content'] = $this->uri->segment(4);
		$dataRecord['id_content'] = $this->uri->segment(4);
		$dataRecord['id_user'] = $this->session->userdata("id_user");
		$dataRecord['name_content'] = $this->input->post("name_content");
		$dataRecord['desc_content'] = $this->input->post("desc_content");
		$dataRecord['is_acontent'] = $this->input->post("is_acontent");
		$dataRecord['is_dcontent'] = $this->input->post("is_dcontent");
		// input post comment
		$data['id_comment'] = $this->uri->segment(5);
		$dataRecord['id_comment'] = $this->uri->segment(5);
		$dataRecord['author_comment'] = $this->input->post("author_comment");
		$dataRecord['email_comment'] = $this->input->post("email_comment");
		$dataRecord['desc_comment'] = $this->input->post("desc_comment");
		$dataRecord['parent_comment'] = $this->input->post("parent_comment");
		if($dataRecord['parent_comment'] == null) $dataRecord['parent_comment'] = "0";
		// update visionAndMission
		if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "visionAndMissionUpdate";
			$data['visionAndMission_update'] = $this->mdl_content->visionAndMission_record($data['id_content'])->result();
			// validation visionAndMission
			$this->form_validation->set_rules('name_content', 'visionAndMission Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doUpdate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_content->visionAndMission_update($dataRecord);
					redirect("admin/visionAndMission");
				}
			}
		}
		else if($this->uri->segment(3) == "view" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Detail " . $data['_title'];
			$display = "visionAndMissionDetail";
			$data['visionAndMissiones'] = $this->mdl_content->visionAndMission_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->id_content_records($data['id_content'])->result();
		}
		$this->template->backend('content/contentManagement/'.$display, $data);
	}
	/****** visionAndMission end ******/
	
	
	
	
	
	

	/****** gallery begin ******/
	public function gallery() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->content_management;
		$data['_title'] = "Gallery";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$this->mdl_content->set_pk("id_content");
		$this->mdl_content->set_tb("content");
		$bcu = true;
		$display = "gallery";
		$data['galleryes'] = $this->mdl_content->gallery_records()->result();
		$data['errorImage'] = null;
		// input post gallery
		$data['id_content'] = $this->uri->segment(4);
		$dataRecord['id_content'] = $this->uri->segment(4);
		$dataRecord['id_user'] = $this->session->userdata("id_user");
		$dataRecord['name_content'] = $this->input->post("name_content");
		$dataRecord['desc_content'] = $this->input->post("desc_content");
		$dataRecord['is_acontent'] = $this->input->post("is_acontent");
		$dataRecord['is_dcontent'] = $this->input->post("is_dcontent");
		// input post comment
		$data['id_comment'] = $this->uri->segment(5);
		$dataRecord['id_comment'] = $this->uri->segment(5);
		$dataRecord['author_comment'] = $this->input->post("author_comment");
		$dataRecord['email_comment'] = $this->input->post("email_comment");
		$dataRecord['desc_comment'] = $this->input->post("desc_comment");
		$dataRecord['parent_comment'] = $this->input->post("parent_comment");
		if($dataRecord['parent_comment'] == null) $dataRecord['parent_comment'] = "0";
		if($dataRecord['is_acontent'] == null) $dataRecord['is_acontent'] = "1";
		if($dataRecord['is_dcontent'] == null) $dataRecord['is_dcontent'] = "1";
		// input post gallery
		$data['id_picture'] = $this->uri->segment(5);
		$dataRecord['id_picture'] = $this->uri->segment(5);
		// create gallery
		if(isset($_POST['doCreate'])) {
			$this->mdl_content->gallery_save($dataRecord);
			redirect("admin/gallery");
		}
		// update gallery
		else if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "galleryUpdate";
			$data['gallery_update'] = $this->mdl_content->gallery_record($data['id_content'])->result();
			// validation gallery
			$this->form_validation->set_rules('name_content', 'gallery Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			if(isset($_POST['doUpdate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_content->gallery_update($dataRecord);
					redirect("admin/gallery");
				}
			}
		}
		// picture create gallery
		else if($this->uri->segment(3) == "pictureCreate" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Tambah " . $data['_title'];
			$display = "galleryPictureCreate";
			$data['gallery_update'] = $this->mdl_content->gallery_record($data['id_content'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				// image
				$dataUploads['file_name'] = "";
				$dataUploads = $this->mdl_function->do_upload(200, 200);
				$data['errorImage'] = $dataUploads['error'];
				$dataRecord['name_picture'] = $dataUploads['file_name'];
				if($data['errorImage'] == null) {
					$this->mdl_picture->id_content_save($dataRecord);
					redirect("admin/gallery/picture/$dataRecord[id_content]");
				}
			}
		}
		// picture update gallery
		else if($this->uri->segment(3) == "pictureUpdate" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$data['_title_content'] = "Perbaharui Gambar " . $data['_title'];
			$display = "galleryPictureUpdate";
			$data['gallery_update'] = $this->mdl_content->gallery_record($data['id_content'])->result();
			$data['pictures'] = $this->mdl_picture->record($dataRecord['id_picture'])->result();
			if(isset($_POST['doUpdate'])) {
				foreach($data["pictures"] as $picture) {$oldPicture = $picture->name_picture;}
				// image
				$dataUploads['file_name'] = "";
				$dataUploads = $this->mdl_function->do_upload(200, 200);
				$data['errorImage'] = $dataUploads['error'];
				$dataRecord['name_picture'] = $dataUploads['file_name'];
				if($data['errorImage'] == null) {
					$this->method->deleteUserPicture($oldPicture);
					$this->mdl_picture->update($dataRecord);
					redirect("admin/gallery/picture/$dataRecord[id_content]");
				}
				else $this->method->deleteUserPicture($dataRecord['name_picture']);
			}
		}
		// picture delete gallery
		else if($this->uri->segment(3) == "pictureDelete" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$data['pictures'] = $this->mdl_picture->record($dataRecord['id_picture'])->result();
			foreach($data["pictures"] as $picture) $this->method->deleteUserPicture($picture->name_picture);
			$this->mdl_picture->delete($data['id_picture']);
			redirect("admin/gallery/picture/$dataRecord[id_content]");
		}
		// comment create gallery
		else if($this->uri->segment(3) == "commentCreate" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Buat Komentar " . $data['_title'];
			$display = "galleryCommentCreate";
			$data['gallery_update'] = $this->mdl_content->gallery_record($data['id_content'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->save($dataRecord, 6);
					redirect("admin/gallery/picture/$dataRecord[id_content]");
				}
			}
		}
		// comment update gallery
		else if($this->uri->segment(3) == "commentUpdate" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$data['_title_content'] = "Perbaharui Komentar " . $data['_title'];
			$display = "galleryCommentUpdate";
			$data['gallery_update'] = $this->mdl_content->gallery_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->record($dataRecord['id_comment'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->update($dataRecord);
					redirect("admin/gallery/picture/$dataRecord[id_content]");
				}
			}
		}
		// comment delete gallery
		else if($this->uri->segment(3) == "commentDelete" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$this->mdl_comment->delete($data['id_comment']);
			redirect("admin/gallery/picture/$dataRecord[id_content]");
		}
		else if($this->uri->segment(3) == "picture" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Gambar";
			$display = "galleryPicture";
			$data['galleryes'] = $this->mdl_content->gallery_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->id_content_records($data['id_content'])->result();
			$data['pictures'] = $this->mdl_picture->id_content_records($data['id_content'])->result();
		}
		else if($this->uri->segment(3) == "toogle" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$status = $this->uri->segment(5);
			$this->mdl_content->toogle_is_acontent($dataRecord['id_content'], $status);
			redirect("admin/gallery");
		}
		// delete gallery
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$this->mdl_content->gallery_delete($data['id_content']);
			redirect("admin/gallery");
		}
		$this->template->backend('content/contentManagement/'.$display, $data);
	}
	/****** gallery end ******/
	
	
	
	
	
	

	/****** picture begin ******/
	public function picture() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->content_management;
		$data['_title'] = "Gambar Lain";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$bcu = true;
		$display = "picture";
		$data['pictures'] = $this->mdl_picture->zero_records()->result();
		$data['errorImage'] = null;
		// input post picture
		$data['id_content'] = $this->uri->segment(4);
		$dataRecord['id_content'] = $this->uri->segment(4);
		$dataRecord['id_user'] = $this->session->userdata("id_user");
		$dataRecord['name_content'] = $this->input->post("name_content");
		$dataRecord['desc_content'] = $this->input->post("desc_content");
		$dataRecord['is_acontent'] = $this->input->post("is_acontent");
		$dataRecord['is_dcontent'] = $this->input->post("is_dcontent");
		// input post picture
		$data['id_picture'] = $this->uri->segment(5);
		$dataRecord['id_picture'] = $this->uri->segment(5);
		// create picture
		if(isset($_POST['doCreatepicture'])) {
			$this->mdl_content->picture_save($dataRecord);
			redirect("admin/picture");
		}
		// update picture
		else if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "pictureUpdate";
			$data['picture_update'] = $this->mdl_content->zero_record($data['id_content'])->result();
			// validation picture
			$this->form_validation->set_rules('name_content', 'picture Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			if(isset($_POST['doUpdate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_content->picture_update($dataRecord);
					redirect("admin/picture");
				}
			}
		}
		// picture create picture
		else if($this->uri->segment(3) == "create" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Tambah " . $data['_title'];
			$display = "pictureCreate";
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				// image
				$dataUploads['file_name'] = "";
				$dataUploads = $this->mdl_function->do_upload(200, 200);
				$data['errorImage'] = $dataUploads['error'];
				$dataRecord['name_picture'] = $dataUploads['file_name'];
				if($data['errorImage'] == null) {
					$this->mdl_picture->id_content_save($dataRecord);
					redirect("admin/picture/picture/$dataRecord[id_content]");
				}
			}
		}
		// picture update picture
		else if($this->uri->segment(3) == "pictureUpdate" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$data['_title_content'] = "Perbaharui Gambar " . $data['_title'];
			$display = "pictureUpdate";
			$data['pictures'] = $this->mdl_picture->record($dataRecord['id_picture'])->result();
			if(isset($_POST['doUpdate'])) {
				foreach($data["pictures"] as $picture) {$oldPicture = $picture->name_picture;}
				// image
				$dataUploads['file_name'] = "";
				$dataUploads = $this->mdl_function->do_upload(200, 200);
				$data['errorImage'] = $dataUploads['error'];
				$dataRecord['name_picture'] = $dataUploads['file_name'];
				if($data['errorImage'] == null) {
					$this->method->deleteUserPicture($oldPicture);
					$this->mdl_picture->update($dataRecord);
					redirect("admin/picture/picture/$dataRecord[id_content]");
				}
				else $this->method->deleteUserPicture($dataRecord['name_picture']);
			}
		}
		// toogle is_apicture
		else if($this->uri->segment(3) == "toogle" && $this->uri->segment(4) != null && $this->uri->segment(5) != null && $this->uri->segment(6) != null) {
			$status = $this->uri->segment(6);
			$this->mdl_picture->toogle($dataRecord['id_picture'], $status);
					redirect("admin/picture");
		}
		// delete picture
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$data['pictures'] = $this->mdl_picture->record($dataRecord['id_picture'])->result();
			foreach($data["pictures"] as $picture) $this->method->deleteUserPicture($picture->name_picture);
			$this->mdl_content->picture_delete($data['id_content']);
			redirect("admin/picture");
		}
		$this->template->backend('content/contentManagement/'.$display, $data);
	}
	/****** picture end ******/
	
	
	
	
	
	

	/****** aspiration begin ******/
	public function aspiration() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->content_management;
		$data['_title'] = "Testimoni";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$this->mdl_content->set_pk("id_content");
		$this->mdl_content->set_tb("content");
		$bcu = true;
		$display = "aspiration";
		$data['aspirations'] = $this->mdl_comment->aspiration_records()->result();
		$data['errorImage'] = null;
		// input post aspiration
		$data['id_comment'] = $this->uri->segment(4);
		$dataRecord['id_comment'] = $this->uri->segment(4);
		$dataRecord['author_comment'] = $this->input->post("author_comment");
		$dataRecord['email_comment'] = $this->input->post("email_comment");
		$dataRecord['name_comment'] = $this->input->post("name_comment");
		$dataRecord['desc_comment'] = $this->input->post("desc_comment");
		$dataRecord['parent_comment'] = $this->input->post("parent_comment");
		if($dataRecord['name_comment'] == null) $dataRecord['name_comment'] = "";
		if($dataRecord['parent_comment'] == null) $dataRecord['parent_comment'] = "0";
		// input post aspiration
		$data['id_picture'] = $this->uri->segment(5);
		$dataRecord['id_picture'] = $this->uri->segment(5);
		if($this->uri->segment(3) == "toogle" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$this->mdl_comment->toogle($dataRecord['id_comment'], $this->uri->segment(5));
			redirect("admin/aspiration");
		}
		// comment create aspiration
		else if($this->uri->segment(3) == "create") {
			$data['_title_content'] = "Buat Komentar " . $data['_title'];
			$display = "aspirationCreate";
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->aspiration_save($dataRecord);
					redirect("admin/aspiration/picture/$dataRecord[id_comment]");
				}
			}
		}
		// comment update aspiration
		else if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui Komentar " . $data['_title'];
			$display = "aspirationUpdate";
			$data['aspirations'] = $this->mdl_comment->record($dataRecord['id_comment'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doUpdate'])) {
				if($this->form_validation->run() == TRUE) {
					$dataRecord['id_content'] = "0";
					$this->mdl_comment->update($dataRecord);
					redirect("admin/aspiration/picture/$dataRecord[id_comment]");
				}
			}
		}
		else if($this->uri->segment(3) == "toogle" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$status = $this->uri->segment(5);
			$this->mdl_content->toogle_is_acontent($dataRecord['id_content'], $status);
			redirect("admin/aspiration");
		}
		// delete aspiration
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$this->mdl_comment->delete($data['id_comment']);
			redirect("admin/aspiration");
		}
		$this->template->backend('content/utilityModule/'.$display, $data);
	}
	/****** aspiration end ******/
	
	
	
	
	
	

	/****** diamondWord begin ******/
	public function diamondWord() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->content_management;
		$data['_title'] = "Kata Muriara";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$this->mdl_content->set_pk("id_content");
		$this->mdl_content->set_tb("content");
		$bcu = true;
		$display = "diamondWord";
		$data['diamondWords'] = $this->mdl_comment->diamondWord_records()->result();
		$data['errorImage'] = null;
		// input post diamondWord
		$data['id_comment'] = $this->uri->segment(4);
		$dataRecord['id_comment'] = $this->uri->segment(4);
		$dataRecord['author_comment'] = $this->input->post("author_comment");
		$dataRecord['email_comment'] = $this->input->post("email_comment");
		$dataRecord['name_comment'] = $this->input->post("name_comment");
		$dataRecord['desc_comment'] = $this->input->post("desc_comment");
		$dataRecord['parent_comment'] = $this->input->post("parent_comment");
		if($dataRecord['name_comment'] == null) $dataRecord['name_comment'] = "";
		if($dataRecord['parent_comment'] == null) $dataRecord['parent_comment'] = "0";
		// input post diamondWord
		$data['id_picture'] = $this->uri->segment(5);
		$dataRecord['id_picture'] = $this->uri->segment(5);
		if($this->uri->segment(3) == "toogle" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$this->mdl_comment->toogle($dataRecord['id_comment'], $this->uri->segment(5));
			redirect("admin/diamondWord");
		}
		// comment create diamondWord
		else if($this->uri->segment(3) == "create") {
			$data['_title_content'] = "Buat Komentar " . $data['_title'];
			$display = "diamondWordCreate";
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->diamondWord_save($dataRecord);
					redirect("admin/diamondWord/picture/$dataRecord[id_comment]");
				}
			}
		}
		// comment update diamondWord
		else if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui Komentar " . $data['_title'];
			$display = "diamondWordUpdate";
			$data['diamondWords'] = $this->mdl_comment->record($dataRecord['id_comment'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			if(isset($_POST['doUpdate'])) {
				if($this->form_validation->run() == TRUE) {
					$dataRecord['id_content'] = "0";
					$this->mdl_comment->diamondWord_update($dataRecord);
					redirect("admin/diamondWord");
				}
			}
		}
		else if($this->uri->segment(3) == "toogle" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$status = $this->uri->segment(5);
			$this->mdl_content->toogle_is_acontent($dataRecord['id_content'], $status);
			redirect("admin/diamondWord");
		}
		// delete diamondWord
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$this->mdl_comment->delete($data['id_comment']);
			redirect("admin/diamondWord");
		}
		$this->template->backend('content/utilityModule/'.$display, $data);
	}
	/****** diamondWord end ******/
	
	
	
	
	
	

	/****** contact begin ******/
	public function contact() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->content_management;
		$data['_title'] = "Contact";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$this->mdl_content->set_pk("id_content");
		$this->mdl_content->set_tb("content");
		$bcu = true;
		$display = "contact";
		$data['contacts'] = $this->mdl_comment->contact_records()->result();
		$data['errorImage'] = null;
		// input post contact
		$data['id_comment'] = $this->uri->segment(4);
		$dataRecord['id_comment'] = $this->uri->segment(4);
		$dataRecord['author_comment'] = $this->input->post("author_comment");
		$dataRecord['email_comment'] = $this->input->post("email_comment");
		$dataRecord['phone_comment'] = $this->input->post("phone_comment");
		$dataRecord['desc_comment'] = $this->input->post("desc_comment");
		$dataRecord['parent_comment'] = $this->input->post("parent_comment");
		if($dataRecord['parent_comment'] == null) $dataRecord['parent_comment'] = "0";
		// input post contact
		$data['id_picture'] = $this->uri->segment(5);
		$dataRecord['id_picture'] = $this->uri->segment(5);
		if($this->uri->segment(3) == "toogle" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$this->mdl_comment->toogle($dataRecord['id_comment'], $this->uri->segment(5));
			redirect("admin/contact");
		}
		// comment create contact
		else if($this->uri->segment(3) == "create") {
			$data['_title_content'] = "Buat Komentar " . $data['_title'];
			$display = "contactCreate";
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('phone_comment', 'Phone Number', 'trim|required|min_length[10]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->contact_save($dataRecord);
					redirect("admin/contact/picture/$dataRecord[id_comment]");
				}
			}
		}
		// comment update contact
		else if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui Komentar " . $data['_title'];
			$display = "contactUpdate";
			$data['contacts'] = $this->mdl_comment->record($dataRecord['id_comment'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('phone_comment', 'Phone Number', 'trim|required|min_length[10]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doUpdate'])) {
				if($this->form_validation->run() == TRUE) {
					$dataRecord['id_content'] = "0";
					$this->mdl_comment->contact_update($dataRecord);
					redirect("admin/contact/picture/$dataRecord[id_comment]");
				}
			}
		}
		else if($this->uri->segment(3) == "toogle" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$status = $this->uri->segment(5);
			$this->mdl_content->toogle_is_acontent($dataRecord['id_content'], $status);
			redirect("admin/contact");
		}
		// delete contact
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$this->mdl_comment->delete($data['id_comment']);
			redirect("admin/contact");
		}
		$this->template->backend('content/utilityModule/'.$display, $data);
	}
	/****** contact end ******/
	
	
	
	
	
	

	/****** link begin ******/
	public function link() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->content_management;
		$data['_title'] = "Link";
		$data['_title_content'] = " Daftar " . $data['_title'];
		// data model
		$this->mdl_content->set_pk("id_content");
		$this->mdl_content->set_tb("content");
		$bcu = true;
		$display = "link";
		$data['linkes'] = $this->mdl_content->link_records()->result();
		// input post link
		$data['id_content'] = $this->uri->segment(4);
		$dataRecord['id_content'] = $this->uri->segment(4);
		$dataRecord['id_user'] = $this->session->userdata("id_user");
		$dataRecord['name_content'] = $this->input->post("name_content");
		$dataRecord['desc_content'] = $this->input->post("desc_content");
		$dataRecord['is_acontent'] = $this->input->post("is_acontent");
		$dataRecord['is_dcontent'] = $this->input->post("is_dcontent");
		if($dataRecord['is_acontent'] == null) $dataRecord['is_acontent'] = "1";
		if($dataRecord['is_dcontent'] == null) $dataRecord['is_dcontent'] = "0";
		// create link
		if($this->uri->segment(3) == "create") {
			$data['_title_content'] = "Buat " . $data['_title'];
			$display = "linkCreate";
			// validation link
			$this->form_validation->set_rules('name_content', 'link Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_content->link_save($dataRecord);
					redirect("admin/link");
				}
			}
		}
		// update link
		if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "linkUpdate";
			$data['link_update'] = $this->mdl_content->link_record($data['id_content'])->result();
			// validation link
			$this->form_validation->set_rules('name_content', 'link Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doUpdate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_content->link_update($dataRecord);
					redirect("admin/link");
				}
			}
		}
		else if($this->uri->segment(3) == "view" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Detail " . $data['_title'];
			$display = "linkDetail";
			$data['linkes'] = $this->mdl_content->link_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->id_content_records($data['id_content'])->result();
		}
		// toogle link
		else if($this->uri->segment(3) == "toogle" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$status = $this->uri->segment(5);
			$this->mdl_content->toogle_is_acontent($dataRecord['id_content'], $status);
			redirect("admin/link");
		}
		// delete link
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$this->mdl_content->event_delete($data['id_content']);
			redirect("admin/link");
		}
		$this->template->backend('content/utilityModule/'.$display, $data);
	}
	/****** link end ******/
	
	
	
	
	
	

	/****** support begin ******/
	public function support() {
		// check user login
		$this->valid_login();
		// data view
		$data['uploads'] = $this->get_upload_path();
		$data['_menu'] = $this->admin;
		$data['_sub_menu'] = $this->content_management;
		$data['_title'] = "Sporter";
		$data['_title_content'] = "Daftar " . $data['_title'];
		// data model
		$this->mdl_content->set_pk("id_content");
		$this->mdl_content->set_tb("content");
		$bcu = true;
		$display = "support";
		$data['supportes'] = $this->mdl_content->support_records()->result();
		// input post support
		$data['id_content'] = $this->uri->segment(4);
		$dataRecord['id_content'] = $this->uri->segment(4);
		$dataRecord['id_user'] = $this->session->userdata("id_user");
		$dataRecord['name_content'] = $this->input->post("name_content");
		$dataRecord['desc_content'] = $this->input->post("desc_content");
		$dataRecord['is_acontent'] = $this->input->post("is_acontent");
		$dataRecord['is_dcontent'] = $this->input->post("is_dcontent");
		$data['errorImage'] = null;
		$dataRecord['picture_content'] = "";
		// input post comment
		$data['id_comment'] = $this->uri->segment(5);
		$dataRecord['id_comment'] = $this->uri->segment(5);
		$dataRecord['author_comment'] = $this->input->post("author_comment");
		$dataRecord['email_comment'] = $this->input->post("email_comment");
		$dataRecord['desc_comment'] = $this->input->post("desc_comment");
		$dataRecord['parent_comment'] = $this->input->post("parent_comment");
		if($dataRecord['parent_comment'] == null) $dataRecord['parent_comment'] = "0";
		// create support
		if($this->uri->segment(3) == "create") {
			$data['_title_content'] = "Buat " . $data['_title'];
			$display = "supportCreate";
			// validation support
			$this->form_validation->set_rules('name_content', 'support Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doCreate'])) {
				$dataUploads['file_name'] = "";
				$dataUploads = $this->mdl_function->do_upload();
				$data['errorImage'] = $dataUploads['error'];
				$dataRecord['picture_content'] = $dataUploads['file_name'];
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					$this->mdl_content->support_save($dataRecord);
					redirect("admin/support");
				}
				else $this->method->deleteUserPicture($dataRecord['picture_content']);
			}
		}
		// update support
		else if($this->uri->segment(3) == "update" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Perbaharui " . $data['_title'];
			$display = "supportUpdate";
			$data['support_update'] = $this->mdl_content->support_record($data['id_content'])->result();
			$newPhoto = "";
			foreach($data["support_update"] as $support_update) {
				$oldPicture = $support_update->picture_content;
				$dataRecord['picture_content'] = $support_update->picture_content;
			}
			// validation support
			$this->form_validation->set_rules('name_content', 'support Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('desc_content', 'Description', 'trim|required|min_length[20]|xss_clean|');
			if(isset($_POST['doUpdate'])) {
				// image
				if(isset($_POST['change_photo'])) {
					$dataUploads['file_name'] = "";
					$dataUploads = $this->mdl_function->do_upload(200, 200);
					$data['errorImage'] = $dataUploads['error'];
					$dataRecord['picture_content'] = $dataUploads['file_name'];
					$newPhoto = $dataUploads['file_name'];
				}
				if($this->form_validation->run() == TRUE && $data['errorImage'] == null) {
					if(isset($_POST['change_photo'])) $this->method->deleteUserPicture($oldPicture);
					$this->mdl_content->support_update($dataRecord);
					redirect("admin/support");
				}
				else $this->method->deleteUserPicture($newPhoto);
			}
		}
		// comment create support
		else if($this->uri->segment(3) == "commentCreate" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Buat Komentar " . $data['_title'];
			$display = "supportCommentCreate";
			$data['support_update'] = $this->mdl_content->support_record($data['id_content'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->save($dataRecord, 13);
					redirect("admin/support/view/$dataRecord[id_content]");
				}
			}
		}
		// comment update support
		else if($this->uri->segment(3) == "commentUpdate" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$data['_title_content'] = "Perbaharui Komentar " . $data['_title'];
			$display = "supportCommentUpdate";
			$data['support_update'] = $this->mdl_content->support_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->record($dataRecord['id_comment'])->result();
			$this->form_validation->set_rules('author_comment', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean|');
			$this->form_validation->set_rules('email_comment', 'Email', 'trim|required|min_length[5]|max_length[50]|xss_clean|valid_email');
			$this->form_validation->set_rules('desc_comment', 'Description', 'trim|required|xss_clean|');
			if(isset($_POST['doCreate'])) {
				if($this->form_validation->run() == TRUE) {
					$this->mdl_comment->update($dataRecord);
					redirect("admin/support/view/$dataRecord[id_content]");
				}
			}
		}
		// comment delete support
		else if($this->uri->segment(3) == "commentDelete" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$this->mdl_comment->delete($data['id_comment']);
			redirect("admin/support/view/$dataRecord[id_content]");
		}
		else if($this->uri->segment(3) == "view" && $this->uri->segment(4) != null) {
			$data['_title_content'] = "Detail " . $data['_title'];
			$display = "supportDetail";
			$data['supportes'] = $this->mdl_content->support_record($data['id_content'])->result();
			$data['comments'] = $this->mdl_comment->id_content_records($data['id_content'])->result();
		}
		else if($this->uri->segment(3) == "toogle" && $this->uri->segment(4) != null && $this->uri->segment(5) != null) {
			$status = $this->uri->segment(5);
			$this->mdl_content->toogle_is_acontent($dataRecord['id_content'], $status);
			redirect("admin/support");
		}
		// delete support
		else if($this->uri->segment(3) == "delete" && $this->uri->segment(4) != null) {
			$data['content_record'] = $this->mdl_content->support_record($data['id_content'])->result();
			foreach($data['content_record'] as $content) $this->method->deleteUserPicture($content->picture_content);
			$this->mdl_content->support_delete($data['id_content']);
			redirect("admin/support");
		}
		$this->template->backend('content/utilityModule/'.$display, $data);
	}
	/****** support end ******/
	
	
	
	
	
	
	public function blank() {
		$this->template->backend('blank');
	}

	public function calendar() {
		$this->template->backend('calendar');
	}

	public function chart() {
		$this->template->backend('chart');
	}

	public function error() {
		$this->template->backendContentOnly('error');
	}

	public function file_manager() {
		$this->template->backend('file_manager');
	}

	public function form() {
		$this->template->backend('form');
	}

	/*public function gallery() {
		$this->template->backend('gallery');
	}*/

	public function grid() {
		$this->template->backend('grid');
	}

	public function icon() {
		$this->template->backend('icon');
	}

	public function table() {
		$this->template->backend('table');
	}

	public function tour() {
		$this->template->backend('tour');
	}

	public function typography() {
		$this->template->backend('typography');
	}

	public function ui() {
		$this->template->backend('ui');
	}
	
	
	
	
	
	
	// validation login
	public function is_login() {
		if($this->session->userdata('is_login') != TRUE) return FALSE;
		else return TRUE;
	}
	public function is_login_user($id_ruser) {
		if($this->session->userdata('id_ruser') != $id_ruser) return FALSE;
		else return TRUE;
	}
	
	public function valid_login() {
		if($this->session->userdata('is_login') != TRUE) {
			echo '<script>window.location="'.base_url().'admin/login";</script>';
			echo '<meta></meta>';
			redirect("admin/login");
		}
		else $this->mdl_review->save($this->method->month_year(), 1);
	}
	public function valid_login_user($id_ruser) {
		if($this->session->userdata('id_ruser') != $id_ruser) {
			echo '<script>window.location="'.base_url().'admin/login";</script>';
			redirect("admin/login");
		}
	}
	// upload
	public function get_upload_path() {
		return base_url()."/uploads";
	}
	
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
