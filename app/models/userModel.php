<?php
class userModel{
    private $pdo;

    public function __construct() {
        require_once("../config/config.php");
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll() {
        $req = $this->pdo->prepare('SELECT * FROM users');
        $req->execute();
        return $req->fetchAll();
    }

    public function getByID($id) {
        $req = $this->pdo->prepare('SELECT * FROM users WHERE idUser = ?');
        $params = array($id);
        $req->execute($params);
        return $req->fetch();
    }

    public function getByEmailPassword($email, $password) {
        $req = $this->pdo->prepare('SELECT * FROM users WHERE email = ? and password = ?');
        $params = array($email, hash('sha256', $password));
        $req->execute($params);
        return $req->fetch();
    }

    public function addUser($email, $password, $nom, $prenom, $cin) {
        $req = $this->pdo->prepare('INSERT INTO users(email, password, nom, prenom, CIN) VALUES (?, ?, ?, ?, ?)');
        $params = array($email, hash('sha256', $password), $nom, $prenom, $cin);
        try {
            $req->execute($params);
            return true;
        } catch (PDOException) {
            return false;
        }
    }

    public function updateUser($id, $email = null, $password = null, $nom = null, $prenom = null, $cin = null, $pht = null) {
        $valid = $valid1 = $valid2 = $valid3 = $valid4 = $valid5 = true;
        if($email) {
            $req = $this->pdo->prepare('UPDATE users SET email = ? WHERE idUser = ?');
            $params = array($email, $id);
            try {
                $req->execute($params);
                $valid1 = true;
            } catch (PDOException) {
                $valid1 = false;
            }
        }
        if ($password) {
            $req = $this->pdo->prepare('UPDATE users SET password = ? WHERE idUser = ?');
            $params = array(hash('sha256', $password), $id);
            $valid2 = $req->execute($params);
        }
        if ($nom) {
            $req = $this->pdo->prepare('UPDATE users SET nom = ? WHERE idUser = ?');
            $params = array($nom, $id);
            $valid3 = $req->execute($params);
        }
        if ($prenom) {
            $req = $this->pdo->prepare('UPDATE users SET prenom = ? WHERE idUser = ?');
            $params = array($prenom, $id);
            $valid4 = $req->execute($params);
        }
        if ($cin) {
            $req = $this->pdo->prepare('UPDATE users SET CIN = ? WHERE idUser = ?');
            $params = array($cin, $id);
            try {
                $req->execute($params);
                $valid5 = true;
            } catch (PDOException) {
                $valid5 = false;
            }
        }
        if ($pht) {
            $req = $this->pdo->prepare('UPDATE users SET pht = ? WHERE idUser = ?');
            $params = array($pht, $id);
            $valid6 = $req->execute($params);
        }
        $valid = $valid1 && $valid2 && $valid3 && $valid4 && $valid5;
        return $valid;
    }
}

?>