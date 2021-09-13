<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{

    public function index()
    {
        $t = null;
        $result = [
            'success'=> $t ??  'y',
            'MSG'  => 'aa'
        ];


        $response = new Response(json_encode($result));

        $this->addFlash('notice', 'Please find it');
        return $this->render('index.html.twig', [
            'modelName' => 'dddd',
        ]);
    }

    public function getInfo(int $id, Request $request)
    {
        $result = [
            'sucess' => false,
            'id' => $id,
            'msg' => json_decode($request->getContent(), true)
        ];

        $r = json_decode($request->getContent(), true);
        echo $r[0]['dd'] . 'aaaaaaaaa';
        return new Response(json_encode($result));
    }


}