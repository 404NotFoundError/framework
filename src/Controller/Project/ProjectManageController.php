<?php 

namespace App\Controller\Project;

use Tool\Controller;

class ProjectManageController extends Controller
{

    // Page de gestion des projets
    public function manage()
    {
        return $this->view('/projects/projectManage.html.twig', []);
    }
    



}