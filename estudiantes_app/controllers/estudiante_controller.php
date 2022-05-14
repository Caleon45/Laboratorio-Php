<?php
namespace controllers;

use controllers\IController;
use db\ConexionDB;
use models\Estudiante;

class EstudianteController implements IController
{
    public function list()
    {
        $sql = "select * from estudiantes";
        $conexionDB = new ConexionDB();
        $resultQuery = $conexionDB->getResultQuery($sql);
        $estudiantes = [];
        if ($resultQuery->num_rows > 0){
            while ($row = $resultQuery->fetch_assoc()){
                $estudiante->set('id', $row['id']);
                $estudiante->set('codigo', $row['codigo']);
                $estudiante->set('nombres', $row['nombres']);
                $estudiante->set('apellidos', $row['apellidos']);
                $estudiante->set('edad', $row['edad']);

                array.push($estudiantes, $estudiante);

            }
        }
        conexionDB->close();
        return $estudiantes;
    }
    public function detail($id)
    {
        $sql = "SELECT * FROM estudiantes WHERE id =" .$id;
        $conexionDB = new ConexionDB();
        $resultQuery = $conexionDB->getResultQuery($sql);
        $estudiante = null;
        if($resultQuery->num_rows > 0){
            while ($row = $resultQuery->fetch_assoc()){
                $estudiante = new Estudiante();
                $estudiante->set('id', $row['id']);
                $estudiante->set('codigo', $row['codigo']);
                $estudiante->set('nombres', $row['nombres']);
                $estudiante->set('apellidos', $row['apellidos']);
                $estudiante->set('edad', $row['edad']);
            }
        }
        $conexionDB->close();
        return $estudiante;
    }

    public function create($estudianteModel)
    {
        $sql = "insert into estudiantes (codigo, nombres, apellidos, edad)";
        $sql .= " values ('" . $estudianteModel->get('codigo') . "',
        '" . $estudianteModel->get('nombres') . "',
        '" . $estudianteModel->get('apellidos') . "',
        '" . $estudianteModel->get('edad') . " )";
        $conexionDB = new ConexionDB();
        $resultQuery = $conexionDB->getResultQuery($sql);
        $conexionDB->close();
        return $resultQuery;
    }

    public function update($id, $estudianteModel)
    {
        $sql = "update estudiantes set";
        $sql .= " codigo='" . $estudianteModel->get('codigo') . "',";
        $sql .= " nombres='" . $estudianteModel->get('nombres') . "',";
        $sql .= " apellidos='" . $estudianteModel->get('apellidos') . "',";
        $sql .= " edad=" . $estudianteModel->get('edad');
        $sql .= " where id=" .$id;
        $conexionDB = new ConexionDB();
        $resultQuery = $conexionDB->getResultQuery($sql);
        $conexionDB->close();
        return $resultQuery;
    }

    public function delete($id)
    {
        $sql = "delete from estudiantes where id=" .$id;
        $conexionDB = new ConexionDB();
        $resultQuery = $conexionDB->getResultQuery($sql);
        $conexionDB->close();
        return $resultQuery;
    }
}