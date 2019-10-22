<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Subjects;
use ApiBundle\Entity\Team_details;
use ApiBundle\Entity\Tokens_transaction;
use ApiBundle\Entity\Users;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TokensController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function TransactionTokenAction(Request $request) {

        $required = array('coatch_id','subject_id','team_id','howmany');

        $content = $request->getContent();
        $post = json_decode($content, true);

        if (count(array_intersect_key(array_flip($required), $post)) !== count($required)) {
            $json = $this->get("jms_serializer")->serialize(array('message' => 'coatch_id, subject_id, team_id et howmany Obligatoire'), 'json');
            return new JsonResponse($json, 400, [], true);
        }

        $coatch = $this->getDoctrine()->getRepository(Users::class)->getUserById($post['coatch_id']);

        if(!$coatch) {
            $json = $this->get("jms_serializer")->serialize(array('message' => 'Le coatch n\'existe pas'), 'json');
            return new JsonResponse($json, 400, [], true);
        }

        $team = $this->getDoctrine()->getRepository(Team_details::class)->getTeam($post['team_id']);

        if(!$team) {
            $json = $this->get("jms_serializer")->serialize(array('message' => 'La team n\'existe pas'), 'json');
            return new JsonResponse($json, 400, [], true);
        }

        $subject = $this->getDoctrine()->getRepository(Subjects::class)->getSubject($post['subject_id']);

        if(!$subject) {
            $json = $this->get("jms_serializer")->serialize(array('message' => 'Le sujet n\'existe pas'), 'json');
            return new JsonResponse($json, 400, [], true);
        }

        $em = $this->getDoctrine()->getManager();
        $team = $em->getRepository(Team_details::class)->find($post['team_id']);

        if($team->getTokensCredit() < $post['howmany']) {
            $json = $this->get("jms_serializer")->serialize(array('message' => 'Pas assez de token'), 'json');
            return new JsonResponse($json, 400, [], true);
        }

        $calcule = $team->getTokensCredit() - $post['howmany'];
        $team->setTokensCredit($calcule);
        $em->flush();

        $transaction = new Tokens_transaction();
        $transaction->setHowmany($post['howmany']);
        $transaction->setTransactionTokenCoatchUsers($em->getReference('ApiBundle\Entity\Users', $post['coatch_id']));
        $transaction->setTokenSubjects($em->getReference('ApiBundle\Entity\Subjects', $post['subject_id']));
        $transaction->setTokenTeams($em->getReference('ApiBundle\Entity\Team_details', $post['team_id']));
        $em->persist($transaction);
        $em->flush();

        $json = json_encode(array('response' => true));
        return new JsonResponse($json, 200, [], true);
    }
}
