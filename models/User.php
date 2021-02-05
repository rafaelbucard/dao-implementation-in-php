<?php
class Usuario {
    private $id;
    private $name;
    private $client;
    private $price;
    private $desc;
    private $date;
    private $status;

    public function getId() {
        return $this->id;
    }
    public function setId($i) {
        $this->id = trim($i);
    }

    public function getName() {
        return $this->name;
    }
    public function setName($n) {
        $this->name = ucwords($n);
    }


    public function getClient() {
        return $this->client;
    }
    public function setClient($c) {
        $this->client= ucwords($c);
    }

    public function getPrice() {
        return $this->price;
    }
    public function setPrice($p) {
        $this->price = $p;
    }

    public function getDesc() {
        return $this->desc;
    }
    public function setDesc($d) {
        $this->desc = $d;
    }

    public function getDate() {
        return $this->date;
    }
    public function setDate() {
        $this->date = date('Y-m-d H:i:s');
    }

    public function getStatus() {
        return $this->status;
    }
    public function setStatus($s) {
        $this->status = trim($s);
    }

}

interface UserDAO {
    public function add(Usuario $u);
    public function findAll();
    public function findByID($id);
    public function update(Usuario $u);
    public function delete($id);
}