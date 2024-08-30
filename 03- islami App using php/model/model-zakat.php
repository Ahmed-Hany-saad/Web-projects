<?php
define("nesab",3005);
class Zakat {
    private $amount;
    public function __construct($amount)
    {
        $this->amount=$amount;
    } 
    public function calulate_zakat (){
        if ($this->amount>=nesab*83.5){
            return ($this->amount)*0.025;
        }
        else {
            return 0;
        }
    }
}
?>