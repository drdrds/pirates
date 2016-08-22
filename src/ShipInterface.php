<?php 
Namespace Drdrds\Pirates;

Interface ShipInterface {

        public function getAttackPoints();
        public function getDefencePoints();
        public function attack(ShipInterface $target);
        public function receiveDamage( int $damage);
        public function sunk();
    }