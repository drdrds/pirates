<?php 
Namespace Drdrds\Pirates;

Class Attack {

    public $attacker;
    public $target;
    public $aim;
    public $damage;
    public $sinking;
    
    
    public function __construct( ShipInterface $A, ShipInterface $T )
    {
        $this->attacker=$A;
        $this->target=$T;
        $this->aim = new Aim();
        $this->inflictDamage();
    }

    public function result(){
        if (! $this->aim->hit()) return "Target missed.";
        $result = ($this->aim->lucky()) ? "Lucky Strike." : "Hit";
        $result .= ($this->sinking) ? " - Target Sunk!!!!" : "";
        return $result;
        
    }
    
    protected function inflictDamage()
    {
        if ( $this->aim->hit()) {
            $this->damage = $this->calculateDamage();
            if ($this->aim->lucky()) $this->damage = $this->damage * 3;
            $this->sinking = $this->target->inflictDamage($this->damage);
        } else {
            $this->damage = 0;
            $this->sinking = FALSE;
        }
    }
        
    protected function calculateDamage()
    {
        return intdiv(($this->attacker->getAttackPoints()*3) , $this->target->getDefencePoints() );
    }   

}