<?php

namespace controllers;

interface IController 
{
    public function list();
    public function detail($id);
    public function create($request);
    public function update($id, $request);
    public function delete($id);
}