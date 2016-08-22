This Library models battles between pirate ships. 

It contains the following classes : 

# PirateShip which implements the ShipInterface
    
 In instantiate a pirate ship pass the AttackPoints and DefencePoints to the constructor. 
    public function getAttackPoints();
        public function getDefencePoints();
        public function attack(ShipInterface $target);
        public function receiveHit( int $attackPoints);
        public function sunk();
        
# Aim        
Each attack utilises the Aim Class

It is randomised on construction. 

It has two public methods which return booleans
- hit() 75% of shots hit, and 25% miss.
- lucky() of 10% of the hits are lucky hits an infliced triple damage. 

For testing purposes these can be stubbed. 

# DamageReport 

This class is used by the Pirateship attack and receiveHit methods to return the result of the attack. 

It has three public properties $aim, $damage, and $sunk. 

The resultString() method provides an English readable summary of the damage inflicted. 