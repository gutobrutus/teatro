<?php
require_once 'Conexao.class.php';

abstract class Crud extends Conexao {
    protected $table;

    abstract public function inserir();

    abstract public function atualizar($id);

    public function buscar($id) {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this -> getDB() -> prepare($sql);
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }

    public function buscarTodos() {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this -> getDB() -> prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll();
    }

    public function deletar($id) {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this -> getDB() -> prepare($sql);
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt -> execute();
    }

}
