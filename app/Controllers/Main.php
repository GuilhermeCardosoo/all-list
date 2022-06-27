<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Main extends BaseController
{
    public function index()
    {
        // Get all jobs from datebase
        $data['jobs'] = $this ->getAllJobs();

        // Display the HomePage
        return view('home',$data);

    }

    public function newJob(){
        return view('Layouts\newJob');
    }

    public function newJobSubmit(){
        if(!$_SERVER['REQUEST_METHOD']=='POST'){
            return redirect()->to(site_url('main'));
        }
        $job = $this->request->getPost('jobName');
        $params=[
            'job'=>$job
        ];
        //guardar BasedeDados
        $db= db_connect();
        $db->query("
            INSERT INTO jobs(job, dateTimeCreated)
            VALUES(:job:, NOW())
            ",$params);
        $db->close();
        //redirecionar
        return redirect()->to(site_url('main'));
    }

    public function jobDone($idJob=-1){
        //atualizar a bd a tarefa como tendo sido realiazada
        $params=[
            'idJob'=> $idJob
        ];
        $db = db_connect();
        $db->query("
            Update jobs
            SET dateTimeFinished = NOW(),
            dateTimeUpdated = NOW()
            WHERE idJob = :idJob:
        ",$params);
        $db->close();
        //atualizar a pagina
        return redirect()->to(site_url('main'));
    }
    
    public function editJob($idJob=-1){

        $params=[
            'idJob'=> $idJob
        ];
        $db=db_connect();
        $dados = $db->query("
            SELECT * FROM jobs WHERE idJob = :idJob:
        ",$params)->getResultObject();
        $db->close();
 
        $data['job']=$dados[0];
        return view('editJob',$data);
    }

    public function editJobSubmit(){
        // Atualziar designção de tarefa no bd 
        $params=[
                'idJob'=>$this->request->getPost('idJob'),
                'job'=> $this->request->getPost('jobName')
        ];

        $db=db_connect();
        $db->query("
            UPDATE jobs
            SET job = :job:,
            dateTimeUpdated = NOW()
            WHERE idJob = :idJob:
        ",$params);
        $db->close();
        //att a página inicial
        return redirect()->to(site_url('main'));
        
    }

    public function deleteJob($idJob = -1){
        //apresentar uma view questionando se pretende eliminar a tarefa 
        $params=[
            'idJob'=>$idJob
        ];
        $db=db_connect();
        $data['job']=$db->query("
        SELECT * FROM jobs WHERE idJob = :idJob:
        ",$params)->getResultObject()[0];
        $db->close();

        //apresentar a View;

        return view('Layouts/delete',$data);

    }

    public function deleteJobConfirm($idJob=-1){
        //delete da bd

        $params=[
            'idJob'=>$idJob
        ];
        $db=db_connect();
        $db->query("DELETE FROM jobs WHERE idJob=:idJob:",$params);
        $db->close();
        //att da pg main
        return redirect()->to(site_url('main'));
    }
 ///////////////////////PRIVATE////////////////////////////////////////////////
    private function getAllJobs(){
        $db=db_connect();
        $dados = $db->query('SELECT * FROM jobs')->getResultObject();
        $db->close();

        return $dados;
    }
}
