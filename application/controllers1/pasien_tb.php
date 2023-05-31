<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Pasien_tb extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_igd'); 
        $this->load->model('m_tb'); 
        $this->load->model('m_rawat_jalan');  
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
        $this->load->library('datetimemanipulation');
        $this->load->library('tupload');
        //$this->load->library('twhatsapp');
        $this->smarty->assign('dtm', $this->datetimemanipulation);
        $this->smarty->assign('m_cppt', $this->m_cppt);
    }


    public function index() {
        // set page rules 
                $this->_set_page_rule("R");
        // set template content
                $this->smarty->assign("template_content", "lab/pasientb.html");
                $this->smarty->load_javascript('resource/js/jquery.datatables/jquery.dataTables.js');
                $this->smarty->load_javascript('resource/js/jquery.datatables/dataTables.fixedHeader.js');
                $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
                $this->smarty->load_style("jquery.ui/datatables/jquery.dataTables.css");
        // load javascript
                $this->smarty->load_javascript('resource/js/jquery/jquery-ui-1.9.2.custom.min.js');
                $rolenya=$this->com_user['role_nm'];
                $this->smarty->assign("username", $this->com_user['user_name']);
                $this->smarty->assign("rolenya", $this->com_user['role_nm']);
        
                $search = $this->tsession->userdata('medis_rawat_jalan');
                $now = date('Y-m-d'); 

                $date = new DateTime();
                                $date_plus = $date->modify("-1 days");
                                $akhirnya= $date_plus->format("Y-m-d");
                $this->smarty->assign("rs_pasien", $this->m_igd->get_px_tb());           
                 $this->smarty->assign("icd", $this->m_igd->get_icd());  
            
           
                $x = $this->com_user['user_name'];
                $FS_KD_PEG = $this->com_user['user_name'];
             
                $now = date('Y-m-d'); 

                $date = new DateTime();
				$date_plus = $date->modify("-1 days");
				$akhirnya= $date_plus->format("Y-m-d");

         
          
                $this->smarty->assign("no", '1');  
         
             
                 
        // notification
                $this->tnotification->display_notification();
                $this->tnotification->display_last_field();
        // output
                parent::display();
     }




      

    public function edit_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE TRANSAKSI', 'trim|required');
       
 
        if ($this->tnotification->run() !== FALSE) {
           
                $FS_KD_REG=$this->input->post('FS_KD_REG');
            
                $cek_id_tb=$this->m_igd->cek_id_tb(array($FS_KD_REG));
 
                $tglmulai=$this->input->post('tanggal_mulai_pengobatan');
                if($tglmulai=='0000-00-00' || $tglmulai==''){
                        $tglmulai=$this->input->post('tglmulailama');
                }
                else{
                        $tglmulai=substr($tglmulai,0,4).substr($tglmulai,5,2).substr($tglmulai,8,2);
                }
               
                $id_tb_03= $this->input->post('id_tb_03');
               
 
        //        $thorax=$this->m_igd->get_hasil_rad(array($FS_KD_REG));
        //        $tha='';
        //        foreach($thorax as $th){
        //         $tha=$tha.''.$th['Ket'];
        //        }

        //        $lab=$this->m_igd->get_hasil_mikro1(array($FS_KD_REG));
        //        $labd=$this->m_igd->get_hasil_mikro2(array($FS_KD_REG));
        //        $hlab="IgG : ".$lab['Hasil'].", IgM : ".$labd['Hasil'];
               

               

                if($id_tb_03=='0' || $id_tb_03==0 || $id_tb_03==''){//ID TB BELUM ADA, KIRIM KE SITB 
                 
                    $params_tb['id_tb_03']="";
                    $params_tb['kd_pasien']= $this->input->post('Nama');
                    $params_tb['nik']= $this->input->post('nik');
                    $params_tb['jenis_kelamin']=$this->input->post('jenis_kelamin');
                    $params_tb['alamat_lengkap']= $this->input->post('Alamat');
                    $params_tb['id_propinsi_faskes']= $this->input->post('id_propinsi_pasien');
                    $params_tb['kd_kabupaten_faskes']=$this->input->post('kd_kabupaten_pasien');
                    $params_tb['id_propinsi_pasien']="18";
                    $params_tb['kd_kabupaten_pasien']="1872";
                    $params_tb['kd_fasyankes']="1872042";
                    $params_tb['kode_icd_x']=$this->input->post('kode_icd_x');
                    $params_tb['tipe_diagnosis']=$this->input->post('tipe_diagnosis');
                    $params_tb['klasifikasi_lokasi_anatomi']=$this->input->post('klasifikasi_lokasi_anatomi');
                    $params_tb['klasifikasi_riwayat_pengobatan']= $this->input->post('klasifikasi_riwayat_pengobatan');
                    $params_tb['tanggal_mulai_pengobatan']=$tglmulai;
                    $params_tb['paduan_oat']=$this->input->post('paduan_oat');
                    $params_tb['sebelum_pengobatan_hasil_mikroskopis']= $this->input->post('sebelum_pengobatan_hasil_mikroskopis');
                    $params_tb['sebelum_pengobatan_hasil_tes_cepat']= $this->input->post('sebelum_pengobatan_hasil_tes_cepat');
                    $params_tb['sebelum_pengobatan_hasil_biakan']= $this->input->post('sebelum_pengobatan_hasil_biakan');
                    $params_tb['hasil_mikroskopis_bulan_2']= $this->input->post('hasil_mikroskopis_bulan_2');
                    $params_tb['hasil_mikroskopis_bulan_3']= $this->input->post('hasil_mikroskopis_bulan_3');
                    $params_tb['hasil_mikroskopis_bulan_5']= $this->input->post('hasil_mikroskopis_bulan_5');
                    $params_tb['akhir_pengobatan_hasil_mikroskopis']= $this->input->post('akhir_pengobatan_hasil_mikroskopis');
                    $params_tb['tanggal_hasil_akhir_pengobatan']=$this->input->post('tanggal_hasil_akhir_pengobatan');
                    $params_tb['hasil_akhir_pengobatan']=$this->input->post('hasil_akhir_pengobatan');
                    $params_tb['tgl_lahir']=$this->input->post('tgl_lahir');
                    $params_tb['foto_toraks']="";

                    $id_tb_03=$this->m_tb->insert_tb($params_tb);
                //     var_dump($id_tb_03);
                //     die;
                     
                }
                else{// ID TB SUDAH ADA
                            
                             $params_tb['id_tb_03']=$id_tb_03;
                             $params_tb['kd_pasien']= $this->input->post('Nama');
                             $params_tb['nik']= $this->input->post('nik');
                             $params_tb['jenis_kelamin']=$this->input->post('jenis_kelamin');
                             $params_tb['alamat_lengkap']= $this->input->post('Alamat');
                             $params_tb['id_propinsi_faskes']= $this->input->post('id_propinsi_pasien');
                             $params_tb['kd_kabupaten_faskes']=$this->input->post('kd_kabupaten_pasien');
                             $params_tb['id_propinsi_pasien']="18";
                             $params_tb['kd_kabupaten_pasien']="1872";
                             $params_tb['kd_fasyankes']="1872042";
                             $params_tb['kode_icd_x']=$this->input->post('kode_icd_x');
                             $params_tb['tipe_diagnosis']=$this->input->post('tipe_diagnosis');
                             $params_tb['klasifikasi_lokasi_anatomi']=$this->input->post('klasifikasi_lokasi_anatomi');
                             $params_tb['klasifikasi_riwayat_pengobatan']= $this->input->post('klasifikasi_riwayat_pengobatan');
                             $params_tb['tanggal_mulai_pengobatan']=$tglmulai;
                             $params_tb['paduan_oat']=$this->input->post('paduan_oat');
                             $params_tb['sebelum_pengobatan_hasil_mikroskopis']= $this->input->post('sebelum_pengobatan_hasil_mikroskopis');
                             $params_tb['sebelum_pengobatan_hasil_tes_cepat']= $this->input->post('sebelum_pengobatan_hasil_tes_cepat');
                             $params_tb['sebelum_pengobatan_hasil_biakan']= $this->input->post('sebelum_pengobatan_hasil_biakan');
                             $params_tb['hasil_mikroskopis_bulan_2']= $this->input->post('hasil_mikroskopis_bulan_2');
                             $params_tb['hasil_mikroskopis_bulan_3']= $this->input->post('hasil_mikroskopis_bulan_3');
                             $params_tb['hasil_mikroskopis_bulan_5']= $this->input->post('hasil_mikroskopis_bulan_5');
                             $params_tb['akhir_pengobatan_hasil_mikroskopis']= $this->input->post('akhir_pengobatan_hasil_mikroskopis');
                             $params_tb['tanggal_hasil_akhir_pengobatan']=$this->input->post('tanggal_hasil_akhir_pengobatan');
                            $params_tb['hasil_akhir_pengobatan']=$this->input->post('hasil_akhir_pengobatan');
                             $params_tb['tgl_lahir']=$this->input->post('tgl_lahir');
                             $params_tb['foto_toraks']="";
    
                             $this->m_tb->insert_tb($params_tb); //UPDATE KE SITB
                        //     var_dump($id_tb_03);
                        //     die;
                }

                $params = array( 
                    $id_tb_03,
                    $this->input->post('Nama'), 
                    $this->input->post('nik'), 
                    $this->input->post('jenis_kelamin'), 
                    $this->input->post('Alamat'),
                    '18',
                    '1872',
                    $this->input->post('id_propinsi_pasien'),
                    $this->input->post('kd_kabupaten_pasien'),
                    '1872042',
                    $this->input->post('kode_icd_x'),
                    $this->input->post('tipe_diagnosis'),
                    $this->input->post('klasifikasi_lokasi_anatomi'),
                    $this->input->post('klasifikasi_riwayat_pengobatan'),
                    $tglmulai,
                    $this->input->post('paduan_oat'),
                    $this->input->post('sebelum_pengobatan_hasil_mikroskopis'),
                    $this->input->post('sebelum_pengobatan_hasil_tes_cepat'),
                    $this->input->post('sebelum_pengobatan_hasil_biakan'),
                    $this->input->post('hasil_mikroskopis_bulan_2'),
                    $this->input->post('hasil_mikroskopis_bulan_3'),
                    $this->input->post('hasil_mikroskopis_bulan_5'),
                    $this->input->post('akhir_pengobatan_hasil_mikroskopis'),
                    $this->input->post('tanggal_hasil_akhir_pengobatan'),
                    $this->input->post('hasil_akhir_pengobatan'),
                    $this->input->post('tgl_lahir'),
                    'Negatif',
                    $FS_KD_REG,
                    $this->input->post('No_MR'),
                    $this->com_user['user_name'],
                    date('Y-m-d H:i'),
                    $FS_KD_REG,

                );
                
                $this->m_igd->update_tb($params); 

             
                   $this->tnotification->delete_last_field();
                     $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
                
                
            } else { 
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            }
 
            redirect("pasien_tb");
        
    }


    }