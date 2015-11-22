<?php
require_once 'Crud.class.php';

class Eventos extends Crud {
    protected $table = 'eventos';
    private $id;
    private $login;
    private $titulo;
    private $data;
    private $hora;
    private $descricao;
    private $situacao;

    public function setId($id) {
        $this -> id = $id;
    }

    public function getId($id) {
        return $this -> id;
    }

    public function setLogin($login) {
        $this -> login = $login;
    }

    public function getLogin($login) {
        return $this -> login;
    }

    public function setTitulo($titulo) {
        $this -> titulo = $titulo;
    }

    public function getTitulo($titulo) {
        return $this -> titulo;
    }

    public function setData($dataBR) {
        $this -> data = $this -> dateToUS($dataBR);
    }

    public function getData($dataUS = false) {
        if ($dataUS) {
            return $this -> data;
        } else {
            return $this -> dateToBR($this -> data);
        }
    }

    public function setHora($hora) {
        $this -> hora = $hora;
    }

    public function getHora($hora) {
        return $this -> hora;
    }

    public function setDescricao($descricao) {
        $this -> descricao = $descricao;
    }

    public function getDescricao($descricao) {
        return $this -> descricao;
    }

    public function setSituacao($situacao) {
        $this -> situacao = $situacao;
    }

    public function getSituacao($situacao) {
        return $this -> situacao;
    }

    public function inserir() {
        $sql = "INSERT INTO $this->table (login, titulo, data, hora, descricao, situacao) VALUES (:login, :titulo, :data, :hora, :descricao, :situacao)";
        $stmt = $this -> getDB() -> prepare($sql);
        $stmt -> bindParam(':login', $this -> login);
        $stmt -> bindParam(':titulo', $this -> titulo);
        $stmt -> bindParam(':data', $this -> data);
        $stmt -> bindParam(':hora', $this -> hora);
        $stmt -> bindParam(':descricao', $this -> descricao);
        $stmt -> bindParam(':situacao', $this -> situacao);
        return $stmt -> execute();
    }

    public function atualizar($id) {
        $sql = "UPDATE $this->table SET login = :login, titulo = :titulo, data = :data, hora = :hora, descricao = :descricao, situacao = :situacao WHERE id = :id";
        $stmt = $this -> getDB() -> prepare($sql);
        $stmt -> bindParam(':login', $this -> login);
        $stmt -> bindParam(':titulo', $this -> titulo);
        $stmt -> bindParam(':data', $this -> data);
        $stmt -> bindParam(':hora', $this -> hora);
        $stmt -> bindParam(':descricao', $this -> descricao);
        $stmt -> bindParam(':situacao', $this -> situacao);
        return $stmt -> execute();
    }

}
?>