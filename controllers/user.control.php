<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author kathiane.050996
 */
include_once("../../packages/database/database.class.php");
include_once("controller.class.php");
include_once("../../models/user.model.php");

class ControllerUser extends Controller {

    public function checkLogin($user) {
        
        session_start();
        $db = new Includes\Db();
        $line = $db->query("SELECT * FROM user WHERE email='" . $user->getEmail() .
                "'");
        
        if ($line[0]['hash'] == $user->getHash()) {

            $_SESSION['idUser'] = $line[0]['idUser'];
            if ($line[0]['type'] == 'E') {
                $_SESSION['limited'] = 'E';
                header('location: ../lists/estudante.php');
            }
            if ($line[0]['type'] == 'A') {
                $_SESSION['limited'] = 'A';
                header('location: content.form.php');
            }
            if ($line[0]['type'] == 'P') {
                $_SESSION['limited'] = 'P';
                header('location: professor.php');
            }
        }
        return false;
    }

    protected function selectAll() {
        $db = new Includes\Db();
        $lines = $db->query("select * from user");
        $users = array();
        foreach ($lines as $line) {
            $user = new User();
            $user->setIdUser($line["idUser"]);
            $user->setIdProfile($line["idProfile"]);
            $user->setIdCourse($line["idCourse"]);
            $user->setEmail($line["email"]);
            
            $user->setLogin($line["login"]);
            $user->setHash($line["hash"]);
            $user->setReminder($line["reminder"]);
            $user->setReminderResponse($line["reminderResponse"]);
            $user->setCanReceiveContent($line["canReceiveContent"]);
            $user->setType($line["type"]);


            $profile = new Profile();
            $profile->setIdProfile($user->getIdUser());
            $controllerProfile = new ControllerProfile();
            $profile = $controllerProfile->actionControl('selectOne', $profile);
            //$content->set_Medias($contentMedia);


            $course = new Course();
            $course->setIdCourse($user->getIdCourse());
            $controllerCourse = new ControllerCourse();
            $course = $controllerCourse->actionControl('selectOne', $course);
            //$contentCategory->set_Category($contentCategory);

            $users[] = $user;
        }
        return $users;
    }

    protected function selectAllStudents() {
        $db = new Includes\Db();
        $lines = $db->query("select * from user where type = 'E' ");
        $users = array();
        foreach ($lines as $line) {
            $user = new User();
            $user->setIdUser($line["idUser"]);
            $user->setIdProfile($line["idProfile"]);
            $user->setIdCourse($line["idCourse"]);
            $user->setEmail($line["email"]);
            $user->setLogin($line["login"]);
            $user->setHash($line["hash"]);
            $user->setReminder($line["reminder"]);
            $user->setReminderResponse($line["reminderResponse"]);
            $user->setCanReceiveContent($line["canReceiveContent"]);
            $user->setType($line["type"]);


            $profile = new Profile();
            $profile->setIdProfile($user->getIdUser());
            $controllerProfile = new ControllerProfile();
            $profile = $controllerProfile->actionControl('selectOne', $profile);
            //$content->set_Medias($contentMedia);


            $course = new Course();
            $course->setIdCourse($user->getIdCourse());
            $controllerCourse = new ControllerCourse();
            $course = $controllerCourse->actionControl('selectOne', $course);
            //$contentCategory->set_Category($contentCategory);

            $users[] = $user;
        }
        return $users;
    }

    protected function selectAllAdministrators() {
        $db = new Includes\Db();
        $lines = $db->query("select * from user where type = 'A' ");
        $users = array();
        foreach ($lines as $line) {
            $user = new User();
            $user->setIdUser($line["idUser"]);
            $user->setIdProfile($line["idProfile"]);
            $user->setIdCourse($line["idCourse"]);
            $user->setEmail($line["email"]);
            $user->setLogin($line["login"]);
            $user->setHash($line["hash"]);
            $user->setReminder($line["reminder"]);
            $user->setReminderResponse($line["reminderResponse"]);
            $user->setCanReceiveContent($line["canReceiveContent"]);
            $user->setType($line["type"]);


            $profile = new Profile();
            $profile->setIdProfile($user->getIdUser());
            $controllerProfile = new ControllerProfile();
            $profile = $controllerProfile->actionControl('selectOne', $profile);
            //$content->set_Medias($contentMedia);


            $course = new Course();
            $course->setIdCourse($user->getIdCourse());
            $controllerCourse = new ControllerCourse();
            $course = $controllerCourse->actionControl('selectOne', $course);
            //$contentCategory->set_Category($contentCategory);

            $users[] = $user;
        }
        return $users;
    }

    protected function selectAllTeachers() {
        $db = new Includes\Db();
        $lines = $db->query("select * from user where type = 'P' ");
        $users = array();
        foreach ($lines as $line) {
            $user = new User();
            $user->setIdUser($line["idUser"]);
            $user->setIdProfile($line["idProfile"]);
            $user->setIdCourse($line["idCourse"]);
            $user->setEmail($line["email"]);
            $user->setLogin($line["login"]);
            $user->setHash($line["hash"]);
            $user->setReminder($line["reminder"]);
            $user->setReminderResponse($line["reminderResponse"]);
            $user->setCanReceiveContent($line["canReceiveContent"]);
            $user->setType($line["type"]);


            $profile = new Profile();
            $profile->setIdProfile($user->getIdUser());
            $controllerProfile = new ControllerProfile();
            $profile = $controllerProfile->actionControl('selectOne', $profile);
            //$content->set_Medias($contentMedia);


            $course = new Course();
            $course->setIdCourse($user->getIdCourse());
            $controllerCourse = new ControllerCourse();
            $course = $controllerCourse->actionControl('selectOne', $course);
            //$contentCategory->set_Category($contentCategory);

            $users[] = $user;
        }
        return $users;
    }

    protected function selectOne($user) {
        $db = new Includes\Db();
        $lines = $db->query("select * from user where idUser = :idUser", array(
            'idUser' => $user->getIdUser(),
        ));
        $user = new User();
        $user->setIdUser($lines[0]["idUser"]);
        $user->setIdProfile($lines[0]["idProfile"]);
        $user->setIdCourse($lines[0]["idCourse"]);
        $user->setEmail($lines[0]["email"]);
        $user->setLogin($lines[0]["login"]);
        $user->setHash($lines[0]["hash"]);
        $user->setReminder($lines[0]["reminder"]);
        $user->setReminderResponse($lines[0]["reminderResponse"]);
        $user->setCanReceiveContent($lines[0]["canReceiveContent"]);
        $user->setType($lines[0]["type"]);


        $profile = new Profile();
        $profile->setIdProfile($user->getIdUser());
        $controllerProfile = new ControllerProfile();
        $profile = $controllerProfile->actionControl('selectOne', $profile);
        //$content->set_Medias($contentMedia);


        $course = new Course();
        $course->setIdCourse($user->getIdCourse());
        $controllerCourse = new ControllerCourse();
        $course = $controllerCourse->actionControl('selectOne', $course);
        //$contentCategory->set_Category($contentCategory);

        return $user;
    }

    protected function insert($user) {
        $db = new Includes\Db();
        return $db->query('insert into user (idUser, idProfile, idCourse, email, login, hash, reminder, reminderResponse, canReceiveContent, type) values 
		(NULL, :idProfile, :idCourse, :email, :login, :hash, :reminder
		, :reminderResponse, :canReceiveContent, :type) ', array(
                    'idProfile' => $user->getIdProfile(),
                    'idCourse' => $user->getIdCourse(),
                    'email' => $user->getEmail(),
                    'login' => $user->getLogin(),
                    'hash' => $user->getHash(),
                    'reminder' => $user->getReminder(),
                    'reminderResponse' => $user->getReminderResponse(),
                    'canReceiveContent' => $user->getCanReceiveContent(),
                    'type' => $user->getType(),
        ));
    }

    protected function update($user) {
        $db = new Includes\Db();
        return $db->query('update user set idProfile = :idProfile, idCourse = :idCourse, email = :email, login = :login
		, hash =  :hash, reminder =  :reminder, reminderResponse = :reminderResponse
		, canReceiveContent = :canReceiveContent, type = :type where idUser = :idUser', array(
                    'idProfile' => $user->getIdProfile(),
                    'idCourse' => $user->getIdCourse(),
                    'email' => $user->getEmail(),
                    'login' => $user->getLogin(),
                    'hash' => $user->getHash(),
                    'reminder' => $user->getReminder(),
                    'reminderResponse' => $user->getReminderResponse(),
                    'canReceiveContent' => $user->getCanReceiveContent(),
                    'type' => $user->getType(),
        ));
    }

    protected function delete($user) {
        $db = new Includes\Db();

        $ret2 = $db->query("delete from profile where IdPrfile = :idUser", array(
            'idUser' => $user->getIdUser(),
        )); // ???? verificar!!!!!

        $ret1 = $db->query("delete from user where idUser = :idUser", array(
            'idUser' => $user->getIdUser(),
        ));

        if ($ret1 && $ret2) {
            return true;
        } else {
            return false;
        }
    }

}