<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class leaflet extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_leaflet');
        // load library
        $this->load->library('pagination');
        $this->load->library('tnotification');
    }

    // view
    public function index() {
        //set page rule
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "pengaturan/leaflet/list.html");
        /* start of pagination --------------------- */
        // pagination attribute
        $start = $this->uri->segment(4, 0) + 1;

        // pagination assign value
        $this->smarty->assign("no", $start);
        /* end of pagination ---------------------- */
        // get list data
        $this->smarty->assign("rs_preferences", $this->m_leaflet->get_leaflet());
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    //add
    public function add() {
        //set rule
        $this->_set_page_rule("C");
        //set template content
        $this->smarty->assign("template_content", "pengaturan/leaflet/add.html");
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        //output
        parent::display();
    }

    //add process
    public function process_add() {
        //set rule
        $this->_set_page_rule("C");
        
        $this->load->library('tupload');
        //cek input
        $this->tnotification->set_rules('FS_NM_JUDUL', 'Judul', 'trim|required');
        //process
        if ($this->tnotification->run() !== FALSE) {
            if (!empty($_FILES['att_name']['tmp_name'])) {
                $name = $_FILES['att_name']['name'];
                $filename = preg_replace('/\s+/', '_', $name);
                $filesize = $_FILES['att_name']['size'];
                $config['upload_path'] = 'resource/doc/leaflet/';
                $config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG';
                $this->tupload->initialize($config);
                //process upload
                if ($this->tupload->do_upload('att_name')) {
                    $data = $this->tupload->data();
                    $params = array(
                        $this->input->post('FS_NM_JUDUL'),
                        $filename,
                        $filesize,
                        $this->com_user['user_name'],
                        date('Y-m-d'),
                        date('H:i:s')
                    );
                    // update
                    $this->m_leaflet->insert($params);
                    // notification
                } else {
                    // jika gagal
                    $this->tnotification->set_error_message($this->tupload->display_errors());
                }
                $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil disimpan");
        } else {
            //default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }

        //default redirect
        redirect("pengaturan/leaflet");
    }

    //hapus
    public function delete($id = "") {
        //set rule
        $this->_set_page_rule("D");
        //set template content
        $this->smarty->assign("template_content", "pengaturan/leaflet/delete.html");
        //get detail data
        $this->smarty->assign("result", $this->m_leaflet->get_leaflet_by_id($id));
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        //output
        parent::display();
    }

    //process hapus
    public function process_delete() {
        //set rule
        $this->_set_page_rule("D");
        //cek input
        $this->tnotification->set_rules('FS_KD_TRS', 'ID', 'trim|required');
        //process
        if ($this->tnotification->run() !== FALSE) {
            if ($this->m_leaflet->delete($this->input->post('FS_KD_TRS'))) {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil dihapus");
                //default redirect
                redirect("pengaturan/leaflet");
            } else {
                //default error
                $this->tnotification->sent_notification("error", "Data gagal dihapus");
            }
        } else {
            //default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }
        //default redirect
        redirect("pengaturan/leaflet/delete/".$this->input->post('FS_KD_TRS'));
    }

    //edit
    public function edit($id = "") {
        //set rule
        $this->_set_page_rule("U");
        //set template content
        $this->smarty->assign("template_content", "pengaturan/leaflet/edit.html");
        //get detail data
        $this->smarty->assign("rs_kategori", $this->m_leaflet->get_leaflet_by_id($id));
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        //output
        parent::display();
    }

    public function process_edit() {
        //set rule
        $this->_set_page_rule("U");
        //cek input
        $this->tnotification->set_rules('FS_KD_TRS', 'ID', 'trim|required');
        $this->tnotification->set_rules('FS_NM_JUDUL', 'Judul', 'trim|required');
        //process
        if ($this->tnotification->run() !== FALSE) {
             if (!empty($_FILES['att_name']['tmp_name'])) {
                $name = $_FILES['att_name']['name'];
                $filename = preg_replace('/\s+/', '_', $name);
                $filesize = $_FILES['att_name']['size'];
                $config['upload_path'] = 'resource/doc/leaflet/';
                $config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG';
                $this->tupload->initialize($config);
                //process upload
                if ($this->tupload->do_upload('att_name')) {
                    $data = $this->tupload->data();
                    $params = array(
                        $this->input->post('FS_NM_JUDUL'),
                        $filename,
                        $filesize,
                       $this->input->post('FS_KD_TRS')
                    );
                    // update
                    $this->m_leaflet->insert($params);
                    // notification
                } else {
                    // jika gagal
                    $this->tnotification->set_error_message($this->tupload->display_errors());
                }
                $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        // default redirect
        redirect("pengaturan/kat_dokumen/edit/" . $this->input->post('kategori_id'));
    }

   public function download($att_name = "") {
        $file_path = 'resource/doc/leaflet/' . $att_name;
        if (is_file($file_path)) {
            header('Content-Description: Download File');
            header('Content-Type: application/octet-stream');
            header('Content-Length: ' . filesize($file_path));
            header('Content-Disposition: attachment; filename="' . $att_name . '"');
            readfile($file_path);
            exit();
        }
    }

}
