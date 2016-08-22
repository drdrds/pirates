<?php 

Namespace Drdrds\Pirates;

Class DamageReport {
    
    public $aim;
    public $damage;
    public $sunk;

    public function __construct( $aim, $damage, $sunk)
    {
        $this->aim = $aim;
        $this->damage = $damage;
        $this->sunk = $sunk;
    }

    public function resultString()
    {
        if (! $this->aim->hit()) return "Target missed.";
        $result = ($this->aim->lucky()) ? "Lucky Strike." : "Hit";
        $result .= ($this->sunk) ? " - Target Sunk!!!!" : "";
        return $result;
    }
    
}

