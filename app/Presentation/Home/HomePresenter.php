<?php

declare(strict_types=1);

namespace App\Presentation\Home;

use Nette;

final class HomePresenter extends Nette\Application\UI\Presenter {

    public function __construct(private \App\Model\PostFacade $postFacade) {
    }
    
    public function renderDefault() {
        $this->template->posts = $this->postFacade->getPublicArticles()->limit(5);
    }
}
