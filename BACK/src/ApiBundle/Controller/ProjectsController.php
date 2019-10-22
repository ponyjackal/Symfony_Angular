<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Projects;
use ApiBundle\Entity\Subjects;
use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProjectsController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getProjectsListAction()
    {
        $projects = $this->getDoctrine()->getRepository(Projects::class)->getProjects();

        $json = json_encode($projects);
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @param $project_id
     * @return JsonResponse
     */
    public function getOneProjectAction($project_id) {
        $project = $this->getDoctrine()->getRepository(Projects::class)->getProject($project_id);

        if(!$project) {
            $json = $this->get("jms_serializer")->serialize(array('message'=> 'Le projet n\'existe pas'), 'json');
            return new JsonResponse($json, 400, [], true);
        }

        $json = json_encode($project[0]);
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addProjectAction(Request $request) {
        $required = array('name','description','created_by','begin_at','end_at');

        $content = $request->getContent();
        $post = json_decode($content, true);

        if (count(array_intersect_key(array_flip($required), $post)) !== count($required)) {
            $json = $this->get("jms_serializer")->serialize(array('message'=> 'Name, Description, created_by, begin_at, end_at obligatoire'), 'json');
            return new JsonResponse($json, 400, [], true);
        }

        $project = $this->getDoctrine()->getRepository(Projects::class)->getProjectByName($post['name']);

        if($project) {
            $json = $this->get("jms_serializer")->serialize(array('message'=> 'Le projet ne peut pas avoir le nom d\'un autre'), 'json');
            return new JsonResponse($json, 400, [], true);
        }

        $em = $this->getDoctrine()->getManager();
        $project = new Projects();
        $project->setName($post['name']);
        $project->setDescription($post['description']);
        $project->setBeginAt(new \DateTime($post['begin_at']));
        $project->setEndAt(new \DateTime($post['end_at']));
        $project->setUsersSubjects($em->getReference('ApiBundle\Entity\Users', $post['created_by']));
        $em->persist($project);
        $em->flush();

        $json = $this->get("jms_serializer")->serialize(array('response'=> true), 'json');
        return new JsonResponse($json, 200, [], true);
    }

    public function getSubjectByProjectAction($project_id) {
        $project = $this->getDoctrine()->getRepository(Projects::class)->getProject($project_id)[0];
        $subjects = $this->getDoctrine()->getRepository(Subjects::class)->getSubjectByProject($project_id);

        $object = new stdClass();
        $object->project = $project;
        $object->subjects = $subjects;

        return new JsonResponse(json_encode($object), 200, [], true);
    }
}
