<?php

include_once("../../packages/database/database.class.php");
include_once("controller.class.php");

class ControllerCourse extends Controller {

    protected function selectOne($course) {
        $db = new Includes\Db();
        $lines = $db->query('select * from course where idCourse = :idCourse', array(
            'idCourse' => $course->getIdCourse(),
        ));
        $course = new Course();
        $course->setIdCourse($lines[0]["idCourse"]);
        $course->setName($lines[0]["name"]);
        return $course;
    }

    protected function selectAll() {
        list($course) = func_get_args();
        $db = new Includes\Db();
        $lines = $db->query("select * from course");
        $courses = array();
        foreach ($lines as $line) {
            $course = new Course();
            $course->setIdCourse($line["idCourse"]);
            $course->setName($line["name"]);

            $courses[] = $course;
        }
        return $courses;
    }

    protected function insert($course) {
        $db = new Includes\Db();
        return $db->query('insert into course (idCourse, name) values 
		(NULL, :name) ', array(
                    'idCourse' => $course->getIdCourse(),
                    'name' => $course->getName(),
        ));
    }

    protected function update($course) {
        $db = new Includes\Db();
        return $db->query('update course set idCourse = :idCourse, name = :name where idCourse = :idCourse', array(
                    'idCourse' => $course->getIdCourse(),
                    'name' => $course->getName(),
        ));
    }

    protected function delete($course) {
        $db = new Includes\Db();

        $ret2 = $db->query("delete from course where IdCourse = :idCourse", array(
            'idCourse' => $course->getIdCourse(),
        )); // ???? verificar!!!!!

        $ret1 = $db->query("delete from user where idCourse = :idCourse", array(
            'idCourse' => $course->getIdCourse(),
        ));

        if ($ret1 && $ret2) {
            return true;
        } else {
            return false;
        }
    }

}
