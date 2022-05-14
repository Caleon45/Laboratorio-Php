<?php

namespace models;

class Estudiante{
    protected $id;
    protected $codigo;
    protected $nombres;
    protected $apellidos;
    protected $edad;

    public function get($nameField){
        return $this->{$nameField};
    }

    public function set($nameField, $value){
        $this->{$nameField} = $value;
    }
}