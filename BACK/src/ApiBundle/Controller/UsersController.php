<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Projects;
use ApiBundle\Entity\Subjects;
use ApiBundle\Entity\Team_details;
use ApiBundle\Entity\Users;
use ApiBundle\Entity\Users_team;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getConnectAction(Request $request)
    {
        $required = array('email');

        $content = $request->getContent();
        $post = json_decode($content, true);

        if (count(array_intersect_key(array_flip($required), $post)) !== count($required)) {
            $json = $this->get("jms_serializer")->serialize(array('message' => 'Lastname, Firstname et Email Obligatoire'), 'json');
            return new JsonResponse($json, 400, [], true);
        }

        $userEmail = $post['email'];
        $user = $this->getDoctrine()->getRepository(Users::class)->getUserByEmail($userEmail);

        if(!$user) {
            $em = $this->getDoctrine()->getManager();
            $user = new Users();
            $user->setFirstname($post['firstname']);
            $user->setLastname($post['lastname']);
            $user->setEmail($post['email']);
            $user->setRole(0);
            $em->persist($user);
            $em->flush();
        }

        $data = $this->get("jms_serializer")->toArray($user);
        unset($data['_users_team']);
        $json = json_encode($data[0]);
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getUserTeamAction($user_id)
    {
        $teams = $this->getDoctrine()->getRepository(Team_details::class)->getTeamByUser($user_id);

        if(!$teams) {
            $json = json_encode(array('message' => 'Il n\'y pas de team associé a cette utilisateur / vérifier l\'existence de l\'utilisateur'));
            return new JsonResponse($json, 404, [], true);
        }

        $json = json_encode($teams);
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getProjectByUserAction($user_id, Request $request) {
        $projects = $this->getDoctrine()->getRepository(Projects::class)->getUserSubjects($user_id);

        $json = json_encode($projects);
        return new JsonResponse($json, 200, [], true);

    }

    /**
     * @param $team_id
     * @return JsonResponse
     */
    public function getUserNotInTeamAction($team_id) {
        $user = $this->getDoctrine()->getRepository(Users::class)->getUsersNotInTeam($team_id);

        $json = json_encode($user);
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addToTeamAction(Request $request) {
        $required = array('team_id','user_id');

        $content = $request->getContent();
        $post = json_decode($content, true);

        if (count(array_intersect_key(array_flip($required), $post)) !== count($required)) {
            $json = $this->get("jms_serializer")->serialize(array('message' => 'team_id et user_id Obligatoire'), 'json');
            return new JsonResponse($json, 400, [], true);
        }

        $user = $this->getDoctrine()->getRepository(Users::class)->getUserById($post['user_id']);

        if(!$user) {
            $json = $this->get("jms_serializer")->serialize(array('message' => 'utilisateur existe pas'), 'json');
            return new JsonResponse($json, 404, [], true);
        }

        $team = $this->getDoctrine()->getRepository(Team_details::class)->getTeam($post['team_id']);

        if(!$team) {
            $json = json_encode(array('message' => 'La team n\'existe pas'));
            return new JsonResponse($json, 400, [], true);
        }

        $ifIsInTeam = $this->getDoctrine()->getRepository(Users_team::class)->getIfUserExistInTeam($post['user_id'],$post['team_id']);

        if($ifIsInTeam) {
            $json = json_encode(array('message' => 'Utilisateur déjà dans la team'));
            return new JsonResponse($json, 400, [], true);
        }

        $em = $this->getDoctrine()->getManager();
        $userTeam =  new Users_team();
        $userTeam->setTeamsDetails($em->getReference('ApiBundle\Entity\Team_details', $post['team_id']));
        $userTeam->setTeamUsers($em->getReference('ApiBundle\Entity\Users', $post['user_id']));
        $em->persist($userTeam);
        $em->flush();

        $json = $this->get("jms_serializer")->serialize(array('response'=> true), 'json');
        return new JsonResponse($json, 200, [], true);
    }
}
