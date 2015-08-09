<?php

namespace App\Responder;

use Rad\Network\Http\Response;

/**
 * Index Responder
 *
 * @package App\Responder
 */
class IndexResponder extends AppResponder
{
    public function getMethod()
    {
        if ($this->getRequest()->isAjax()) {
            $content = json_encode(['examples' => $this->getData('examples')]);
        } else {
            /** @var \Twig_Environment $twig */
            $twig = $this->getContainer()->get('twig');
            $examples = $this->getData('examples');

            $content = $twig->render('@App/index.twig', ['examples' => $examples]);
        }

        return new Response($content);
    }
}
