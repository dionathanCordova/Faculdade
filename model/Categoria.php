<?php
/**
 * Created by PhpStorm.
 * User: speroni
 * Date: 29/09/18
 * Time: 22:23
 * Classe contendo os atributos de uma tabela de categoria
 * Os atributos estão encapsulados e temos os métodos GETTERS e SETTERS
 */

class Categoria
{
    private $id;
    private $nome;
    private $descricao;

    public function __construct($nome=null, $descricao=null, $id=null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

}