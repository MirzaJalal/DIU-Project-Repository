<?php
namespace config\helpers;

class Help{

    /*
    !============================================
    ! Constructor will load after making object
    ! of a class
    !============================================
    */
    public function __construct()
    {

    }

    /*
    !============================================
    ! Get Random String
    !============================================
    */
    public static function randomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /*
    !============================================
    ! Get Current URL
    !============================================
    */
    public static function current_url($value='')
    {
      return base_url(uri_string());
    }

    /*
    !============================================
    ! Get Total post for each category
    !============================================
    */
    public static function postPercategory($catid="")
    {
        $this->db->where('catid',$catid);
        $row = $this->db->get()->result_id_num_rows;
        return $row;
    }

}
