<?php
    class connection{
        public $con;
        public function connect(){
            $this->con = mysqli_connect("localhost", "root", "", "movie_manager");
        }
    }