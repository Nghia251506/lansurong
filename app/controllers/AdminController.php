<?php
    class AdminController extends BaseController{
        private $__homeModel;
        public function __construct($conn)
        {
            $this->__homeModel = $this->initModel("AdminModel", $conn);
        }

        public function index(){
            $this->view("layouts/admin",["page"=>"admin"]);
        }
    }


?>