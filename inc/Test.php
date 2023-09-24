<?php

namespace Starwebfront;

trait Hello {
    public function msg1(){
        echo "testing trait";
    }
}

trait Newest{
    public function __construct(){
        echo "Another test";
    }
}

class Test{
   use Hello,Newest;
}