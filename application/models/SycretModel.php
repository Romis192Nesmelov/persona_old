<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SycretModel extends CI_Model
{
    private $main;
    private $piter;

    public function __construct()
    {
        parent::__construct();
        $this->main = $this->load->database('sycret', true);
        //$this->piter = $this->load->database('piter', true);
    }

    private function getSalonFromCompany($company_id)
    {
        $salons = [
            1 => 'spb-gallery',
            2 => 'mega-tepli-stan',
            4 => 'mega-himki',
            5 => 'belyaevo',
            6 => 'mezdunarodnaya',
            8 => 'dobrininskaya',
            10 => 'rumyancevo',
            11 => 'imperia',
            12 => 'kashirskaya',
            14 => 'mega-belaya-dacha',
            15 => 'rublevka',
            16 => 'hodinka',
            17 => 'lubyanka',
            18 => 'novoslobodskaya',
            19 => 'rimskaya',
            20 => 'personaxdavines',
            21 => 'maslovka',
            22 => 'mega-himki-premium'
        ];
        if (!empty($salons[$company_id])) {
            return $salons[$company_id];
        }
        return null;
    }

    public function getMasterInfo($master)
    {
        return [
            'id' => $master['ID'],
            'name' => preg_replace('/\(.*/im', '', mb_convert_encoding($master['NAME'], "utf-8", "windows-1251")),
            'surname' => preg_replace('/\(.*/im', '', mb_convert_encoding($master['SURNAME'], "utf-8", "windows-1251")),
            'description' => mb_convert_encoding($master['WEBDESCRIPTION'], "utf-8", "windows-1251"),
            'salon' => $this->getSalonFromCompany($master['COMPANYID']),
            'active' => (empty($master['ISACTIVE']) || empty($master['ISONLINE'])) ? null : 1,
            'img' => mb_convert_encoding($master['WEBIMAGELINK'], "utf-8", "windows-1251"),
            'position' => mb_convert_encoding($master['POSITION'], "utf-8", "windows-1251")
        ];
    }

    public function getMasters()
    {
        $masters = [];

        $this->main->select('DOCTOR.*, DICTPOSITION.NAME as POSITION');
        $this->main->join('DICTPOSITION', 'DOCTOR.POSITIONID = DICTPOSITION.ID');
        $main_query = $this->main->get('DOCTOR');
        foreach ($main_query->result_array() as $master) {
            if ($this->getSalonFromCompany($master['COMPANYID'])) {
                $masters[] = $this->getMasterInfo($master);
            }
        }

        /*
        $this->piter->select('DOCTOR.*, DICTPOSITION.NAME as POSITION');
        $this->piter->join('DICTPOSITION', 'DOCTOR.POSITIONID = DICTPOSITION.ID');

        $piter_query = $this->piter->get('DOCTOR');
        foreach ($piter_query->result_array() as $master) {
            if ($this->getSalonFromCompany($master['COMPANYID'])) {
                $masters[] = $this->getMasterInfo($master);
            }
        }
        */

        return $masters;
    }
}
