<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Team_details;
use ApiBundle\Entity\Users;
use ApiBundle\Entity\Users_team;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TeamsController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getTeamsAction()
    {
        $teams = $this->getDoctrine()->getRepository(Team_details::class)->getTeams();

        $json = json_encode($teams);
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @return JsonResponse
     */
    public function getOneTeamAction($team_id)
    {
        $team = $this->getDoctrine()->getRepository(Team_details::class)->getTeam($team_id);

        if(!$team) {
            $json = json_encode(array('message' => 'La team n\'existe pas'));
            return new JsonResponse($json, 400, [], true);
        }

        $json = json_encode($team[0]);
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @param $team_id
     * @return JsonResponse
     */
    public function getUsersByTeamAction($team_id) {
        $users = $this->getDoctrine()->getRepository(Users::class)->getUsersByTeam($team_id);

        $json = json_encode($users);
        return new JsonResponse($json, 200, [], true);
    }
}
