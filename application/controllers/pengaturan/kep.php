<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class Kep extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_kep');
        // load library
        $this->load->library('pagination');
        $this->load->library('tnotification');
        // load javascript
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
    }

    // view
    public function index() {
        //set page rule
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "pengaturan/kep/list.html");
        // pagination attribute
        $start = $this->uri->segment(4, 0) + 1;
        // pagination assign value
        $this->smarty->assign("no", $start);
        /* end of pagination ---------------------- */
        // get list data
        $this->smarty->assign("rs_diag", $this->m_kep->get_diagnosa());
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function list_tujuan() {
        //set page rule
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "pengaturan/kep/list_tujuan.html");
        // pagination attribute
        $start = $this->uri->segment(4, 0) + 1;
        // pagination assign value
        $this->smarty->assign("no", $start);
        /* end of pagination ---------------------- */
        // get list data
        $this->smarty->assign("rs_noc", $this->m_kep->get_noc());
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function list_kriteria() {
        //set page rule
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "pengaturan/kep/list_indikator.html");
        // pagination attribute
        $start = $this->uri->segment(4, 0) + 1;
        // pagination assign value
        $this->smarty->assign("no", $start);
        /* end of pagination ---------------------- */
        // get list data
        $this->smarty->assign("rs_indikator", $this->m_kep->get_indikator());
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function list_perencanaan() {
        //set page rule
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "pengaturan/kep/list_perencanaan.html");
        // pagination attribute
        $start = $this->uri->segment(4, 0) + 1;
        // pagination assign value
        $this->smarty->assign("no", $start);
        /* end of pagination ---------------------- */
        // get list data
        $this->smarty->assign("rs_perencanaan", $this->m_kep->get_perencanaan());
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
    
    public function list_rincian() {
           //set page rule
           $this->_set_page_rule("R");
           // set template content
           $this->smarty->assign("template_content", "pengaturan/kep/list_rincian.html");
           // pagination attribute
           $start = $this->uri->segment(4, 0) + 1;
           // pagination assign value
           $this->smarty->assign("no", $start);
           /* end of pagination ---------------------- */
           // get list data
           $this->smarty->assign("rs_rincian", $this->m_kep->get_rincian());
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
        $this->smarty->assign("template_content", "pengaturan/kep/add.html");
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        //output
        parent::display();
    }

    //add process
    public function add_process() {
        //set rule
        $this->_set_page_rule("C");
        //cek input
        $this->tnotification->set_rules('FS_NM_DIAGNOSA', 'Diagnosa', 'trim|required|maxlength[100]');
        //process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_NM_DIAGNOSA')
            );
            //insert
            if ($this->m_kep->insert_diagnosa($params)) {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            } else {
                //default error
                $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
        } else {
            //default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        //default redirect
        redirect("pengaturan/kep/add");
    }

    public function add_tujuan() {
        //set rule
        $this->_set_page_rule("C");
        //set template content
        $this->smarty->assign("template_content", "pengaturan/kep/add_tujuan.html");
        $this->smarty->assign("rs_diag", $this->m_kep->get_diagnosa());
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        //output
        parent::display();
    }

    //add process
    public function add_tujuan_process() {
        //set rule
        $this->_set_page_rule("C");
        //cek input
        $this->tnotification->set_rules('FS_KD_DAFTAR_DIAGNOSA', 'Diagnosa', 'trim|required');
        $this->tnotification->set_rules('FS_NM_NOC', 'Tujuan', 'trim|required');
        //process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_DAFTAR_DIAGNOSA'),
                $this->input->post('FS_NM_NOC')
            );
            //insert
            if ($this->m_kep->insert_noc($params)) {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            } else {
                //default error
                $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
        } else {
            //default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        //default redirect
        redirect("pengaturan/kep/add_tujuan");
    }

    public function add_indikator() {
        //set rule
        $this->_set_page_rule("C");
        //set template content
        $this->smarty->assign("template_content", "pengaturan/kep/add_indikator.html");
        $this->smarty->assign("rs_diag", $this->m_kep->get_diagnosa());
        $this->smarty->assign("rs_noc", $this->m_kep->get_noc());
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        //output
        parent::display();
    }

    //add process
    public function add_indikator_process() {
        //set rule
        $this->_set_page_rule("C");
        //cek input
        $this->tnotification->set_rules('FS_KD_DAFTAR_DIAGNOSA', 'Diagnosa', 'trim|required');
        $this->tnotification->set_rules('FS_KD_NOC', 'Tujuan', 'trim|required');
        $this->tnotification->set_rules('FS_NM_INDIKATOR', 'Indikator', 'trim|required');
        //process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_DAFTAR_DIAGNOSA'),
                $this->input->post('FS_KD_NOC'),
                $this->input->post('FS_NM_INDIKATOR')
            );
            //insert
            if ($this->m_kep->insert_indikator($params)) {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            } else {
                //default error
                $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
        } else {
            //default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        //default redirect
        redirect("pengaturan/kep/add_indikator");
    }

    public function add_perencanaan() {
        //set rule
        $this->_set_page_rule("C");
        //set template content
        $this->smarty->assign("template_content", "pengaturan/kep/add_perencanaan.html");
        $this->smarty->assign("rs_diag", $this->m_kep->get_diagnosa());
        $this->smarty->assign("rs_noc", $this->m_kep->get_noc());
        $this->smarty->assign("rs_indikator", $this->m_kep->get_indikator());
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        //output
        parent::display();
    }

    //add process
    public function add_perencanaan_process() {
        //set rule
        $this->_set_page_rule("C");
        //cek input
        $this->tnotification->set_rules('FS_KD_DAFTAR_DIAGNOSA', 'Diagnosa', 'trim|required');
        $this->tnotification->set_rules('FS_KD_NOC', 'Tujuan', 'trim|required');
        $this->tnotification->set_rules('FS_KD_INDIKATOR', 'Indikator', 'trim|required');
        $this->tnotification->set_rules('FS_NM_NIC', 'Keterangan', 'trim|required');
        //process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_DAFTAR_DIAGNOSA'),
                $this->input->post('FS_KD_NOC'),
                $this->input->post('FS_KD_INDIKATOR'),
                $this->input->post('FS_NM_NIC')
            );
            //insert
            if ($this->m_kep->insert_perencanaan($params)) {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            } else {
                //default error
                $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
        } else {
            //default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        //default redirect
        redirect("pengaturan/kep/add_perencanaan");
    }

    public function add_rincian() {
        //set rule
        $this->_set_page_rule("C");
        //set template content
        $this->smarty->assign("template_content", "pengaturan/kep/add_rincian.html");
        $this->smarty->assign("rs_diag", $this->m_kep->get_diagnosa());
        $this->smarty->assign("rs_noc", $this->m_kep->get_noc());
        $this->smarty->assign("rs_indikator", $this->m_kep->get_indikator());
        $this->smarty->assign("rs_perencanaan", $this->m_kep->get_perencanaan());
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        //output
        parent::display();
    }

     public function add_rincian_process() {
        //set rule
        $this->_set_page_rule("C");
        //cek input
        $this->tnotification->set_rules('FS_KD_DAFTAR_DIAGNOSA', 'Diagnosa', 'trim|required');
        $this->tnotification->set_rules('FS_KD_NOC', 'Tujuan', 'trim|required');
        $this->tnotification->set_rules('FS_KD_INDIKATOR', 'Indikator', 'trim|required');
        $this->tnotification->set_rules('FS_KD_NIC', 'Perencanaan', 'trim|required');
        $this->tnotification->set_rules('FS_NM_NIC2', 'Keterangan', 'trim|required');
        //process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_DAFTAR_DIAGNOSA'),
                $this->input->post('FS_KD_NOC'),
                $this->input->post('FS_KD_INDIKATOR'),
                $this->input->post('FS_KD_NIC'),
                $this->input->post('FS_NM_NIC2')
            );
            //insert
            if ($this->m_kep->insert_rincian($params)) {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            } else {
                //default error
                $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
        } else {
            //default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        //default redirect
        redirect("pengaturan/kep/add_rincian");
    }
//edit
    public function edit($id = "") {
        //set rule
        $this->_set_page_rule("U");
        //set template content
        $this->smarty->assign("template_content", "pengaturan/kep/edit.html");
        //get detail data
        $this->smarty->assign("result", $this->m_kep->get_diagnosa_by_id($id));
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        //output
        parent::display();
    }

    // edit process
    public function edit_process() {
        //set rule
        $this->_set_page_rule("U");
        //cek input
        $this->tnotification->set_rules('FS_KD_DAFTAR_DIAGNOSA', 'ID', 'trim|required');
        $this->tnotification->set_rules('FS_NM_DIAGNOSA', 'Diagnosa', 'trim');
        //process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_NM_DIAGNOSA'),
                $this->input->post('FS_KD_DAFTAR_DIAGNOSA')
            );
            //insert
            if ($this->m_kep->update_diagnosa($params)) {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        // default redirect
        redirect("pengaturan/kep/edit/" . $this->input->post('jabatan_id', 0));
    }

    //edit
    public function edit_tujuan($id = "") {
        //set rule
        $this->_set_page_rule("U");
        //set template content
        $this->smarty->assign("template_content", "pengaturan/kep/edit_tujuan.html");
        //get detail data
        $this->smarty->assign("rs_diag", $this->m_kep->get_diagnosa());
        $this->smarty->assign("result", $this->m_kep->get_noc_by_id($id));
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        //output
        parent::display();
    }

    // edit process
    public function edit_tujuan_process() {
        //set rule
        $this->_set_page_rule("U");
        //cek input
        $this->tnotification->set_rules('FS_KD_NOC', 'ID', 'trim|required');
        $this->tnotification->set_rules('FS_KD_DAFTAR_DIAGNOSA', 'Diagnosa', 'trim|required');
        $this->tnotification->set_rules('FS_NM_NOC', 'Keterangan', 'trim');
        //process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_DAFTAR_DIAGNOSA'),
                $this->input->post('FS_NM_NOC'),
                $this->input->post('FS_KD_NOC')
            );
            //insert
            if ($this->m_kep->update_noc($params)) {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        // default redirect
        redirect("pengaturan/kep/edit_tujuan/" . $this->input->post('FS_KD_NOC'));
    }

    public function edit_indikator($id = "") {
        //set rule
        $this->_set_page_rule("U");
        //set template content
        $this->smarty->assign("template_content", "pengaturan/kep/edit_indikator.html");
        //get detail data
        $this->smarty->assign("rs_diag", $this->m_kep->get_diagnosa());
        $this->smarty->assign("rs_noc", $this->m_kep->get_noc());
        $this->smarty->assign("result", $this->m_kep->get_indikator_by_id($id));
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        //output
        parent::display();
    }

    // edit process
    public function edit_indikator_process() {
        //set rule
        $this->_set_page_rule("U");
        //cek input
        $this->tnotification->set_rules('FS_KD_INDIKATOR', 'ID', 'trim|required');
        $this->tnotification->set_rules('FS_KD_NOC', 'Noc', 'trim|required');
        $this->tnotification->set_rules('FS_KD_DAFTAR_DIAGNOSA', 'Diagnosa', 'trim|required');
        $this->tnotification->set_rules('FS_NM_INDIKATOR', 'Keterangan', 'trim');
        //process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_DAFTAR_DIAGNOSA'),
                $this->input->post('FS_KD_NOC'),
                $this->input->post('FS_NM_INDIKATOR'),
                $this->input->post('FS_KD_INDIKATOR'),
            );
            //insert
            if ($this->m_kep->update_indikator($params)) {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        // default redirect
        redirect("pengaturan/kep/edit_indikator/" . $this->input->post('FS_KD_INDIKATOR'));
    }

    public function edit_perencanaan($id = "") {
        //set rule
        $this->_set_page_rule("U");
        //set template content
        $this->smarty->assign("template_content", "pengaturan/kep/edit_perencanaan.html");
        //get detail data
        $this->smarty->assign("result", $this->m_kep->get_perencanaan_by_id($id));
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        //output
        parent::display();
    }

    // edit process
    public function edit_perencanaan_process() {
        //set rule
        $this->_set_page_rule("U");
        //cek input
        $this->tnotification->set_rules('FS_KD_NIC', 'ID', 'trim|required');
        $this->tnotification->set_rules('FS_KD_INDIKATOR', 'Indikator', 'trim|required');
        $this->tnotification->set_rules('FS_KD_NOC', 'Noc', 'trim|required');
        $this->tnotification->set_rules('FS_KD_DAFTAR_DIAGNOSA', 'Diagnosa', 'trim|required');
        $this->tnotification->set_rules('FS_NM_NIC', 'Keterangan', 'trim');
        //process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_DAFTAR_DIAGNOSA'),
                $this->input->post('FS_KD_NOC'),
                $this->input->post('FS_KD_INDIKATOR'),
                $this->input->post('FS_NM_NIC'),
                $this->input->post('FS_KD_NIC'),
            );
            //insert
            if ($this->m_kep->update_perencanaan($params)) {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        // default redirect
        redirect("pengaturan/kep/edit_perencanaan/" . $this->input->post('FS_KD_NIC'));
    }

    public function edit_rincian($id = "") {
        //set rule
        $this->_set_page_rule("U");
        //set template content
        $this->smarty->assign("template_content", "pengaturan/kep/edit_rincian.html");
        //get detail data
        $this->smarty->assign("result", $this->m_kep->get_rincian_by_id($id));
        //notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        //output
        parent::display();
    }
   
    public function edit_rincian_process() {
        //set rule
        $this->_set_page_rule("U");
        //cek input
        $this->tnotification->set_rules('FS_KD_NIC', 'ID', 'trim|required');
        $this->tnotification->set_rules('FS_KD_INDIKATOR', 'Indikator', 'trim|required');
        $this->tnotification->set_rules('FS_KD_NOC', 'Noc', 'trim|required');
        $this->tnotification->set_rules('FS_KD_DAFTAR_DIAGNOSA', 'Diagnosa', 'trim|required');
        $this->tnotification->set_rules('FS_KD_NIC', 'Perencanaan', 'trim');
        $this->tnotification->set_rules('FS_NM_NIC2', 'Keterangan', 'trim');
        //process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_DAFTAR_DIAGNOSA'),
                $this->input->post('FS_KD_NOC'),
                $this->input->post('FS_KD_INDIKATOR'),
                $this->input->post('FS_KD_NIC'),
                $this->input->post('FS_NM_NIC2'),
                $this->input->post('FS_KD_NIC2'),
            );
            //insert
            if ($this->m_kep->update_rincian($params)) {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        // default redirect
        redirect("pengaturan/kep/edit_rincian/" . $this->input->post('FS_KD_NIC2'));
    }
    // delete process
    public function delete_process($FS_KD_DAFTAR_DIAGNOSA = "") {
        //set rule
        $this->_set_page_rule("D");
        //cek input
        //process

        if ($this->m_kep->delete_diagnosa($FS_KD_DAFTAR_DIAGNOSA)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            //default redirect
            redirect("pengaturan/kep/list");
        } else {
            //default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }

        //default redirect
        redirect("pengaturan/kep/list/");
    }

    public function delete_tujuan_process($FS_KD_NOC = "") {
        //set rule
        $this->_set_page_rule("D");
        //cek input
        //process

        if ($this->m_kep->delete_noc($FS_KD_NOC)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            //default redirect
            redirect("pengaturan/kep/list_tujuan");
        } else {
            //default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }

        //default redirect
        redirect("pengaturan/kep/list_tujuan/");
    }

    // delete process
    public function delete_indikator_process($FS_KD_INDIKATOR = "") {
        //set rule
        $this->_set_page_rule("D");
        //cek input
        //process

        if ($this->m_kep->delete_indikator($FS_KD_INDIKATOR)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            //default redirect
            redirect("pengaturan/kep/list_kriteria");
        } else {
            //default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }

        //default redirect
        redirect("pengaturan/kep/list_kriteria/");
    }

    public function delete_perencanaan_process($FS_KD_PERENCANAAN = "") {
        //set rule
        $this->_set_page_rule("D");
        //process
        if ($this->m_kep->delete_perencanaan($FS_KD_PERENCANAAN)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            //default redirect
            redirect("pengaturan/kep/list_perencanaan");
        } else {
            //default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }

        //default redirect
        redirect("pengaturan/kep/list_perencanaan/");
    }
    
    public function delete_rincian_process($FS_KD_RINCIAN = "") {
        //set rule
        $this->_set_page_rule("D");
        //process
        if ($this->m_kep->delete_rincian($FS_KD_RINCIAN)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            //default redirect
            redirect("pengaturan/kep/list_rincian");
        } else {
            //default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }

        //default redirect
        redirect("pengaturan/kep/list_rincian/");
    }
}
