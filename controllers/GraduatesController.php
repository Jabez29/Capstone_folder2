<?php
require_once __DIR__ . '/../model/Users.php';

class GraduatesController
{
    public function listGraduates()
    {
        $usersModel = new Users();
        return $usersModel->list(); // Fetch graduates
    }
}
