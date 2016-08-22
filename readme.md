This Library models battles between pirate ships. 

It contains the following classes : 

# PirateShip which implements the ShipInterface
    
 In instantiate a pirate ship pass the AttackPoints and DefencePoints to the constructor. 
    public function getAttackPoints();
        public function getDefencePoints();
        public function attack(ShipInterface $target);
        public function inflictDamage( int $damage);
        public function sunk();
 
        
# Attack Class
        
        
        
        
        
# Aim        
Each attack utilises the Aim Class

It is randomised on construction. 

It has two public methods which return booleans
- hit()
- lucky()

For testing purposes these can be stubbed. 