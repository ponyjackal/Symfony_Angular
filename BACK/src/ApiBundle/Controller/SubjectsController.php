<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Projects;
use ApiBundle\Entity\Subjects;
use ApiBundle\Entity\Users;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SubjectsController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addSubjectAction(Request $request) {
        $required = array('name','description','created_by','project_id');

        $content = $request->getContent();
        $post = json_decode($content, true);

        if (count(array_intersect_key(array_flip($required), $post)) !== count($required)) {
            $json = $this->get("jms_serializer")->serialize(array('message'=> 'Name, Description, created_by, project_id obligatoire'), 'json');
            return new JsonResponse($json, 400, [], true);
        }

        $user = $this->getDoctrine()->getRepository(Users::class)->getUserById($post['created_by']);

        if(!$user) {
            $json = $this->get("jms_serializer")->serialize(array('message'=> 'Cette utilisateur n\'existe pas'), 'json');
            return new JsonResponse($json, 404, [], true);
        }

        $subject = $this->getDoctrine()->getRepository(Subjects::class)
                        ->getSubjectByNameAndProjectId($post['name'], $post['project_id']);

        if($subject) {
            $json = $this->get("jms_serializer")->serialize(array('message'=> 'Le nom du sujet est unique dans chaques projets'), 'json');
            return new JsonResponse($json, 400, [], true);
        }

        $em = $this->getDoctrine()->getManager();
        $subject = new Subjects();
        $subject->setName($post['name']);
        $subject->setDescription($post['description']);
        $subject->setSubjectUsers($em->getReference('ApiBundle\Entity\Users', $post['created_by']));
        $subject->setSubjectProject($em->getReference('ApiBundle\Entity\Projects', $post['project_id']));
        $em->persist($subject);
        $em->flush();

        $json = $this->get("jms_serializer")->serialize(array('response'=> true), 'json');
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @param $subject_id
     * @return JsonResponse
     */
    public function getCoatchBySubjectIdAction($subject_id) {
        $coatch = $this->getDoctrine()->getRepository(Users::class)->getCoatchBySubjectId($subject_id);

        $json = $this->get("jms_serializer")->serialize($coatch, 'json');
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @param $team_id
     * @return JsonResponse
     */
    public function getSubjectByTeamAction($team_id) {
        $subject = $this->getDoctrine()->getRepository(Subjects::class)->getSubjectByTeam($team_id);

        $json = $this->get("jms_serializer")->serialize($subject, 'json');
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @param $subject_id
     * @return JsonResponse
     */
    public function getSubjectAction($subject_id) {
        $subject = $this->getDoctrine()->getRepository(Subjects::class)->getSubject($subject_id);

        if($subject) {
            $subject = $subject[0];
        }

        $json = $this->get("jms_serializer")->serialize($subject, 'json');
        return new JsonResponse($json, 200, [], true);
    }
}
