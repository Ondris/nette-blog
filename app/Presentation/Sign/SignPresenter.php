<?php
namespace App\Presentation\Sign;

use Nette;
use Nette\Application\UI\Form;

final class SignPresenter extends Nette\Application\UI\Presenter
{
    public function actionOut(): void {
	$this->getUser()->logout();
	$this->flashMessage('Odhlášení bylo úspěšné.');
	$this->redirect('Home:');
    }

    protected function createComponentSignInForm(): Form {
	$form = new Form;
		
        $form->addText('username', 'Uživatelské jméno:')
            ->setRequired('Prosím vyplňte své uživatelské jméno.');

	$form->addPassword('password', 'Heslo:')
            ->setRequired('Prosím vyplňte své heslo.');

	$form->addSubmit('send', 'Přihlásit');

	$form->onSuccess[] = $this->signInFormSucceeded(...);
	return $form;
    }
        
    private function signInFormSucceeded(Form $form, \stdClass $data): void {
	try {
            $this->getUser()->login($data->username, $data->password);
            $this->redirect('Home:');
	} catch (Nette\Security\AuthenticationException $e) {
            $form->addError('Nesprávné přihlašovací jméno nebo heslo.');
	}
    }
}
