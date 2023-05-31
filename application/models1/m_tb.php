<?php 

 use GuzzleHttp\Client;



class M_tb extends CI_model {

    private $_client; 

    public function __construct()
    { 
        require_once './vendor/autoload.php';


        // $this->API="http://sirs.yankes.kemkes.go.id/sirsservice/sitb/sitb/";

        $this->_client = new Client([
            'base_uri' => 'http://sirs.yankes.kemkes.go.id/sirsservice/sitb/sitb/'
        ]);
    }

    function insert_tb($params){
        // $ata['kuotanonjkn']=$kuotanonjkn;
        // $ata['keterangan']="a";

        
            $hata = json_encode($params, true);
           $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));

        $alamat='senddata';
     
           $response = $this->_client->request('POST', $alamat, [
            'headers'=>[
                    'X-rs-id'=>'1872042',
                    'X-pass'=>'S!rs2020!!',
                    'X-Timestamp'=>$tStamp,
                    'Content-Type'=>'application/json',
            ],
            'body' => $hata
           ]);



        $result = json_decode($response->getBody()->getContents(), true);

        // var_dump($result);
        // die;

       $status=$result['status'];
       $id_tb_03=$result['id_tb_03'];

       if($status=='berhasil'){
         return $id_tb_03;
       }
       else{
        return '0';
       }


        

        // $meta=$result['metadata'];

        // if($meta['code']==200){
        //     return 'OK';
        // }
        // else{
        //     return 'failed';
        // }
    }


}