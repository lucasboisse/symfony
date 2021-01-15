<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Entreprise;
class ProStagesController extends AbstractController
{
    public function index(): Response
    {
      $repositoryE= $this->getDoctrine()->getRepository(Entreprise::class);
      $entreprisess = $repositoryE->findall();
        return $this->render('pro_stages/index.html.twig', ['entreprisess'=>$entreprisess]);
    }
    public function entreprises(): Response
    {
        return $this->render('pro_stages/entreprises.html.twig', [
            'controller_name' => 'Cette page affichera la liste des formations de l\'IUT',
        ]);
    }
    public function formations(): Response
    {
        return $this->render('pro_stages/formations.html.twig', [
            'controller_name' => 'Cette page affichera la liste des formations de l\'IUT',
        ]);
    }
    public function stages(): Response
    {
        return $this->render('pro_stages/stages.html.twig', [
            'controller_name' => "Cette page affichera le descriptif du stage ayant pour identifiant ".$id,
    ]);
    }
}
?>
