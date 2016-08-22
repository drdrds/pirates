<?php
Namespace Drdrds\Pirates;

Class Aim {

    protected $hit = FALSE;
    protected $lucky = FALSE;

    public function __construct()
    {
        $this->hit=$this->chanceOfHit();
        $this->lucky=$this->chanceOfLuckyStrike();
    }

    protected function chanceOfHit() {
        return (mt_rand(0,3)>0);
    }

    protected function chanceOfLuckyStrike() {
        return ($this->hit) && (mt_rand(0,9)==0);
    }


    public function hit()
    {
        return $this->hit;
    }

    public function lucky(){
        return $this->lucky;
    }

}