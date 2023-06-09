<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/UptLoginBase.php' );

// --

class uptlogin extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
//        $this->load->model('m_account');
        // load global
        $this->load->library('tnotification');
    }

    // view
    public function index($status = "") {
        // set template content
        $this->smarty->assign("template_content", "login/upt/form.html");
        // bisnis proses
        if (!empty($this->com_user)) {
            // get default page
            $default = $this->m_account->get_user_default_page(array($this->com_user['user_id'], $this->com_user['role_id']));
//            print_r($default);exit();
            // still login
            redirect($default);
        } else {
            $this->smarty->assign("login_st", $status);
        }
        // output
        parent::display();
    }

    // login process
    public function login_process() {
        // set rules
        $this->tnotification->set_rules('username', 'Username', 'trim|required|max_length[30]');
        $this->tnotification->set_rules('pass', 'Password', 'trim|required|max_length[30]');
        // process
        if ($this->tnotification->run() !== FALSE) {
            // params
            $username = trim($this->input->post('username'));
            $password = trim($this->input->post('pass'));
            // get user detail
            $result = $this->m_account->get_user_login_auto_role($username, $password, $this->portal_id);
            // check
            if (!empty($result)) {
                // cek lock status
                if ($result['lock_st'] == '1') {
                    // output
                    redirect('login/uptlogin/index/locked');
                }
                // set session
                $this->tsession->set_userdata('session_upt', array('user_id' => $result['user_id'], 'role_id' => $result['role_id']));
                // insert login time
                $this->m_account->save_user_login($result['user_id'], $_SERVER['REMOTE_ADDR']);
                // redirect
                redirect($result['default_page']);
            } else {
                // output
                redirect('login/uptlogin/index/error');
            }
        } else {
            // default error
            redirect('login/uptlogin/index/error');
        }
        // output
        redirect('login/uptlogin');
    }

    // logout process
    public function logout_process() {
        // user id
        $user_id = $this->tsession->userdata('session_upt');
        // insert logout time
        $this->m_account->update_user_logout($user_id);
        // unset session
        $this->tsession->unset_userdata('session_upt');
        // output
        redirect('login/uptlogin');
    }

}

