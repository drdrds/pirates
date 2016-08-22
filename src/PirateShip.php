<?php Namespace Drdrds\Pirates;

Class PirateShip implements ShipInterface
{
    
    
    public $health;
    protected $attackPoints;
    protected $defencePoints;

    public function __construct(int $attackPoints, int $defencePoints)
    {
        $this->attackPoints = $attackPoints;
        $this->defencePoints = $defencePoints;
        $this->health = 100;
    }

    public function getAttackPoints()
    {
        return $this->attackPoints;
    }

    public function getDefencePoints()
    {
        return $this->defencePoints;
    }


    public function attack(ShipInterface $T)
    {
        return new Attack($this, $T);
    }

    public function receiveDamage(int $damage)
    {
        $this->health = ($this->health - $damage < 0) ? 0 : ($this->health - $damage);
        return $this->sunk();
    }

    public function sunk()
    {
        return ($this->health == 0);
    }


}