<?php

namespace SONRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
class AlunoController extends AbstractRestfulController
{

// get
    public function getList()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $data = $em->getRepository('Application\Entity\Aluno')->findAll();

        return $data;

    }

    // get
    public function get($id)
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $data = $em->getRepository('Application\Entity\Aluno')->find($id);

        return $data;
    }

    // post
    public function create($data)
    {
        $serviceAluno = $this->getServiceLocator()->get('Application\Service\Aluno');
        $nome = $data['nome_aluno'];

        $Aluno = $serviceAluno->insert($nome);
        if($Aluno) {
            return $Aluno;
        } else {
            return array('success'=>false);
        }

    }

    // put
    public function update($id, $data)
    {
        $serviceAluno = $this->getServiceLocator()->get('Application\Service\Aluno');
        $param['id'] = $id;
        $param['nome'] = $data['nome'];

        $Aluno = $serviceAluno->update($param);
        if($Aluno) {
            return $Aluno;
        } else {
            return array('success'=>false);
        }
    }

    // delete
    public function delete($id)
    {
        $serviceAluno = $this->getServiceLocator()->get('Application\Service\Aluno');
        $result = $serviceAluno->delete($id);
        if($result) return $result;
    }

    

} 