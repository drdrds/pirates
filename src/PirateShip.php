<?php Namespace Drdrds\Pirates;

/**
 * Class PirateShip
 * @package Drdrds\Pirates
 */
Class PirateShip implements ShipInterface
{
    
    
    public $health;
    protected $attackPoints;
    protected $defencePoints;

    /**
     * PirateShip constructor.
     * @param int $attackPoints
     * @param int $defencePoints
     */
    public function __construct(int $attackPoints, int $defencePoints)
    {
        $this->attackPoints = $attackPoints;
        $this->defencePoints = $defencePoints;
        $this->health = 100;
    }

    /**
     * @return int
     */
    public function getAttackPoints()
    {
        return $this->attackPoints;
    }

    /**
     * @return int
     */
    public function getDefencePoints()
    {
        return $this->defencePoints;
    }


    /**
     * @param ShipInterface $target
     * @return DamageReport
     */
    public function attack(ShipInterface $target)
    {
        $aim = new Aim();
        $damageReport = $target->receiveHit( $this->attackPoints, $aim);
        return $damageReport;
    }

    /**
     * @param int $attackPoints
     * @param Aim $aim
     * @return DamageReport
     */
    public function receiveHit(int $attackPoints, Aim $aim){
        if ( $aim->hit()) {
            $damage = $this->calculateDamage( $attackPoints);
            if ($aim->lucky()) $damage = $damage * 3;
            $sunk = $this->receiveDamage($damage);
        } else {
            $damage = 0;
            $sunk= FALSE;
        }
        return new DamageReport( $aim, $damage, $sunk); 
    }
    
    /**
     * @return bool
     */
    public function sunk()
    {
        return ($this->health == 0);
    }

    /**
     * @param int $attackStrength
     * @return int
     */
    protected function calculateDamage(int $attackStrength){
        return intdiv(($attackStrength*3) , $this->getDefencePoints() );
    }


    /**
     * @param int $damage
     * @return bool
     */
    protected function receiveDamage(int $damage)
    {
        $this->health = ($this->health - $damage < 0) ? 0 : ($this->health - $damage);
        return $this->sunk();
    }

   


}