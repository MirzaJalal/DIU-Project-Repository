<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use config\helpers\Help;

class Error404 extends CI_Controller
{

    /*
    !--------------------------------------------------------
    !       Constructor Load During Creation of Object
    !--------------------------------------------------------
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    !--------------------------------------------------------
    !       404 Page
    !--------------------------------------------------------
    */
    public function index()

    {
        $this->load->view('web/lib/header');
        $this->load->view('errors/cli/publicerror_404');
        $this->load->view('web/lib/footer');
    }


}
