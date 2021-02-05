<?php
require_once 'models/User.php';

class DaoMysql implements UserDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Usuario $u) {
        $sql = $this->pdo->prepare("INSERT INTO repair ( `namem`, `namec`, `description`, `completed`, `date`, `price`) VALUES (:namem, :namec, :descri, :comp, :dt, :price)");
        $sql->bindValue(':namem', $u->getName());
        $sql->bindValue(':namec', $u->getClient());
        $sql->bindValue(':descri', $u->getDesc());
        $sql->bindValue(':comp', $u->getStatus());
        $sql->bindValue(':dt', $u->getDate());
        $sql->bindValue(':price', $u->getPrice());
        $sql->execute();

        $u->setId( $this->pdo->lastInsertId() );
        return $u;
    }

    public function findAll() {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM repair");
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach($data as $item) {
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setName($item['namem']);
                $u->setClient($item['namec']);
                $u->setDesc($item['description']);
                $u->setStatus($item['completed']);
                $u->setPrice($item['price']);
                $u->setDate($item['date']);

                $array[] = $u;
            }
        }

        return $array;
    }


    public function findById($id) {
        $sql = $this->pdo->prepare("SELECT * FROM repair WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setName($data['namem']);
            $u->setClient($data['namec']);
            $u->setDesc($data['description']);
            $u->setStatus($data['completed']);
            $u->setPrice($data['price']);
            $u->setDate($data['date']);


            return $u;
        } else {
            return false;
        }
    }

    public function update(Usuario $u) {
        $sql = $this->pdo->prepare("UPDATE repair SET namem = :namem, namec = :namec, description = :description, completed = :comp, date = :dt, price = :price WHERE id = :id");
        $sql->bindValue(':namem', $u->getName());
        $sql->bindValue(':namec', $u->getClient());
        $sql->bindValue(':descri', $u->getDesc());
        $sql->bindValue(':comp', $u->getStatus());
        $sql->bindValue(':dt', $u->getDate());
        $sql->bindValue(':price', $u->getPrice());
        $sql->bindValue(':id', $u->getId());
        $sql->execute();

        return true;
    }

    public function delete($id) {
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}
