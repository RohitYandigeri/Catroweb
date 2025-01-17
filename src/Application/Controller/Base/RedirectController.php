<?php

namespace App\Application\Controller\Base;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RedirectController extends AbstractController
{
  #[Route(path: '/stepByStep', name: 'legacy_stepByStep_routed_used_by_unkwown', methods: ['GET'])]
  #[Route(path: '/help', name: 'help', methods: ['GET'])]
  public function helpAction(Request $request): Response
  {
    $flavor = $request->attributes->get('flavor');
    if ('mindstorms' === $flavor) {
      return $this->redirect('https://catrob.at/MindstormsFlavorDocumentation');
    }

    return $this->redirect('https://wiki.catrobat.org/bin/view/Documentation/');
  }

  #[Route(path: '/gp', name: 'google_play_store', methods: ['GET'])]
  public function redirectToGooglePlayStore(Request $request): Response
  {
    $flavor = $request->attributes->get('flavor');
    if ('mindstorms' === $flavor) {
      return $this->redirect('https://catrob.at/MindstormsFlavorGooglePlay');
    }

    return $this->redirect('https://catrob.at/gp');
  }

  #[Route(path: '/robots.txt', name: 'robots.txt', methods: ['GET'])]
  public function robotsTxt(Request $request): Response
  {
    return $this->redirect('../../robots.txt', Response::HTTP_MOVED_PERMANENTLY);
    // The file is only hosted without flavors/themes!
  }

  #[Route(path: 'resetting/request', name: 'legacy_app_forgot_password_request')]
  public function legacyAppReset(Request $request): Response
  {
    return $this->redirectToRoute('app_forgot_password_request', [], Response::HTTP_MOVED_PERMANENTLY);
  }

  /**
   * Users coming from hour of code -> https://hourofcode.com/us/de/beyond.
   */
  #[Route(path: '/hourOfCode', methods: ['GET'])]
  public function hourOfCodeAction(Request $request): Response
  {
    return $this->redirect('/');
  }
}
