<?php
session_start();

const tile_count = 42;
$users = [];
$positions = [];
$streets = [];
$balance = [];

/*class Game {
    private $dbh;

    public function __construct($dsn, $user, $password, $tile_count) {
        $this->tile_count = $tile_count;
        try {
            $this->dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed';
        }
    }
*/
//public
function addUser() {
    global $users;
    $users[] = session_id();
}

//public
function rollDice() {
    return rand(1, 6);
}

//public
function rollDices() {
    return rollDice() + rollDice();
}

//public
function move() {
    global $positions;
    if (!isset($positions[session_id()])) {
        $positions[session_id()] = 0;
    }
    $old_pos = $this->getPos();
    $distance_to_move = $this->rollDices();
    $new_pos = ($old_pos + $distance_to_move) % tile_count;
    if ($new_pos < $old_pos) {
        finished_round();
    }
    $positions[session_id()] = $new_pos;
}

//public
function finished_round() {
    $this->calcBalance(-200);
}

//public
function getPos() {
    global $positions;
    if (!isset($positions[session_id()])) {
        $positions[session_id()] = 0;
    }
    return $positions[session_id()];
}

//public
function isBankrupt() {
    global $balance;
    if (!isset($balance[session_id()])) {
        $balance[session_id()] = 2500;
    }
    return $balance[session_id()] < 0;
}

//public
function buyStreet($id) {
    global $balance, $streets;
    if (!isset($balance[session_id()])) {
        $balance[session_id()] = 2500;
    }
    $money = $balance[session_id()];
    $dbh = new PDO('', '', '');
    $gp = $dbh->prepare('SELECT buying_costs FROM streets WHERE id = :id');
    $gp->bindParam('id', $id);
    $gp->execute();
    $price = $gp->fetch();
    if ($money >= $price) {
        $this->calcBalance($price);
        $streets[session_id()][] = $id;
    }
}

//public
function getOwner($street) {
    global $streets;
    foreach ($streets as $key => $value) {
        if (in_array($street, $value)) {
            return $key;
        }
    }
}

//public
function payDept($street) {
    global $balance;
    if (!isset($balance[session_id()])) {
        $balance[session_id()] = 2500;
    }
    $money = $balance[session_id()];
    $dbh = new PDO('', '', '');
    $gp = $dbh->prepare('SELECT rental_fee FROM streets WHERE id = :id');
    $gp->bindParam('id', $street);
    $gp->execute();
    $dept = $gp->fetch();
    if ($money >= $dept) {
        $this->calcBalance($dept);
    }
    $player = getOwner($street);
    $balance[$player] += $dept;
}

//public
function calcBalance($money) {
    global $balance;
    if (!isset($balance[session_id()])) {
        $balance[session_id()] = 2500;
    }
    $balance[session_id()] = $balance[session_id()] - $money;
}
//}
