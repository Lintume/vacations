<?php
include __DIR__.'/../model/Request.php';
include __DIR__.'/Controller.php';

class RequestsController extends Controller{
	private $request = NULL;

	public function __construct() {
		$this->request = new Request();
	}

	public function handleRequest() {
		$cmd = $this->from_get('cmd');
		if (!$cmd){
			$cmd = $this->from_post('cmd');
		}
		try {
			if (!$cmd || $cmd == 'list') {
				$this->listRequests();
			} elseif ($cmd == 'new') {
				$this->saveRequest();
			} elseif ($cmd == 'delete') {
				$this->deleteRequest();
			} elseif ($cmd == 'update') {
				$this->updateRequest();
			} else {
				$this->showError("Page not found", "Page for operation $cmd was not found!");
			}
		} catch (Exception $e) {
			$this->showError("Application error", $e->getMessage());
		}
	}

	public function listRequests() {
		$requests = $this->request->getAllRequest();
		include __DIR__.'/../view/requests.php';
	}

	public function saveRequest() {
        $user_id = $this->from_post('user_id');
        $vacation_request = $this->from_post('vacation_request');

        try {
            $this->request->createRequest($user_id, $vacation_request);
            $this->redirect('requests.php');
            return;
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }
	}

	public function deleteRequest() {
		$id = $this->from_get('id');
		if (!$id) {
			throw new Exception('Internal error.');
		}
		$this->request->deleteRequest($id);
		$this->redirect('requests.php');
	}

	private function updateRequest()
    {
        $errors = '';
        if (isset($_POST['form-submitted'])) {
            $user_id = $this->from_post('user_id');
            $vacation_request = $this->from_post('vacation_request');
            $approved = $this->from_post('approved') == NULL ? 0 : 1;
            $id = $this->from_post('id');

            try {
                $this->request->updateRequest($user_id, $vacation_request, $approved, $id);
                $this->redirect('requests.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        } else {
            $request = $this->request->getRequest($this->from_get('id'));
            include __DIR__ . '/../view/request-form.php';
        }
    }
}