<?php
/**
 * Created by PhpStorm.
 * User: speroni
 * Date: 29/09/18
 * Time: 22:23
 * Classe contendo os atributos de uma tabela de categoria
 * Os atributos estão encapsulados e temos os métodos GETTERS e SETTERS
 */

class Produto
{
    private $id;
    private $nome;
    private $descricao;
    private $preco;
    private $id_categoria;

    public function __construct($nome=null, $descricao=null, $id=null, $preco = null, $id_categoria = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->id_categoria = $id_categoria;
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

    public function getpreco()
    {
        return $this->preco;
    }

    public function setpreco($preco)
    {
        $this->preco = $preco;
    }

    public function getid_categoria()
    {
        return $this->id_categoria;
    }

    public function setid_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;
    }

}