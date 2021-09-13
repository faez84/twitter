<?php
/**
 * Created by PhpStorm.
 * User: Benutzer
 * Date: 9/7/2021
 * Time: 11:11 PM
 */

namespace App\Controller;


use App\Exception\ValidationException;
use App\Model\Twitt;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TwitterController extends AbstractController
{

    public $twitt;
    public function __construct(Twitt $twitt)
    {
        $this->twitt = $twitt;
    }

    public function index()
    {
        return new JsonResponse($this->twitt->select());
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function insert(Request $request)
    {
        $data = $request->query->all();
        $statusCode = Response::HTTP_OK;
        try {
            $return = [
                'status' => $this->twitt->insert($data)?? false
            ];
        } catch (ValidationException $exception) {
            $return = [
                'status' => $exception->getMessage()
            ];
            $statusCode = Response::HTTP_BAD_REQUEST;
        }

        $response = new JsonResponse($return);
        $response->setStatusCode($statusCode);

       return $response;

    }

    public function delete(Request $request): JsonResponse
    {
        $id = $request->request->get('id');

        return new JsonResponse($this->twitt->delete($id));
    }


    public function getTest()
    {
        return 'kkk';
    }
}