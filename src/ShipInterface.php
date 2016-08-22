<?php 
Namespace Drdrds\Pirates;

Interface ShipInterface {

        public function getAttackPoints();
        public function getDefencePoints();
        public function attack(ShipInterface $target);
        public function receiveHit( int $damage, Aim $aim);
        public function sunk();
    }