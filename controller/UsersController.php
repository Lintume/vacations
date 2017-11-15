<?php
include __DIR__.'/../model/User.php';
include __DIR__.'/Controller.php';


class UsersController extends Controller {
	private $user = NULL;

	public function __construct() {
		$this->user = new User();
	}

    public function handleRequest()
    {
        $cmd = $this->from_get('cmd');
        if (!$cmd) {
            $cmd = $this->from_post('cmd');
        }
        try {
            if (!$cmd || $cmd == 'list') {
                $this->listUsers();
            } elseif ($cmd == 'new') {
                $this->saveUser();
            } elseif ($cmd == 'delete') {
                $this->deleteUser();
            } elseif ($cmd == 'update') {
                $this->updateUser();
            } else {
                $this->showError("Page not found", "Page for operation $cmd was not found!");
            }
        } catch (Exception $e) {
            $this->showError("Application error", $e->getMessage());
        }
    }

	public function listUsers() {
		$users = $this->user->getAllUsers();
		include __DIR__.'/../view/users.php';
	}

    public function saveUser()
    {
        $name = $this->from_post('user_name');
        $vacation_limit = $this->from_post('vacation_limit');

        try {
            $this->user->createUser($name, $vacation_limit);
            $this->redirect('index.php');
            return;
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }
    }

	public function deleteUser() {
		$id = $this->from_get('id');
		if (!$id) {
			throw new Exception('Internal error.');
		}
		$this->user->deleteUser($id);
		$this->redirect('index.php');
	}

	private function updateUser() {
		$errors = '';
		if (isset($_POST['form-submitted'])) {
			$name = $this->from_post('user_name');
            $vacation_limit = $this->from_post('vacation_limit');
            $id = $this->from_post('id');

			try {
				$this->user->updateUser($name, $vacation_limit, $id);
				$this->redirect('index.php');
				return;
			} catch (ValidationException $e) {
				$errors = $e->getErrors();
			}
		}
		else{
            $user = $this->user->getUser($this->from_get('id'));
            include __DIR__.'/../view/user-form.php';
        }
	}
}