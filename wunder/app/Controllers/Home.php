<?php

namespace App\Controllers;

use App\Entities\User;
use App\Models\UserModel;
use CodeIgniter\Controller;
use Config\Services;

class Home extends Controller
{
	private $session;

	public function __construct()
	{
		if (session_status() == PHP_SESSION_NONE) {
			$this->session = Services::session();
		}
	}

	public function index()
	{
		$data = [];
		$view = "personal_info";
		if ($this->session->get('step_two')) {
			$view = 'payment_info';
		} else if ($this->session->get('step_one')) {
			$view = 'address_info';
		}

		$this->_render($view, $data);
	}

	public function success($user_id)
	{
		$userModel = new UserModel();
		$user = $userModel->find($user_id);

		$data = [
			'user' => $user
		];

		$this->_render('success', $data);
	}

	public function personal_info()
	{
		$set_session = [
			"step_one" => [
				'first_name' => $this->request->getPost('first_name'),
				'last_name' => $this->request->getPost('last_name'),
				'telephone' => $this->request->getPost('phone'),
			]
		];

		$this->session->set($set_session);

		return redirect()->to('/');
	}

	public function address_info()
	{
		$set_session = [
			"step_two" => [
				'street' => $this->request->getPost('street'),
				'house_number' => $this->request->getPost('house_number'),
				'zip_code' => $this->request->getPost('zip_code'),
				'city' => $this->request->getPost('city'),
			]
		];

		$this->session->set($set_session);

		return redirect()->to('/');
	}

	public function payment_info()
	{
		$user_model = new UserModel();
		$step_one = $this->session->get('step_one');
		$step_two = $this->session->get('step_two');
		$data = [
			'first_name' => $step_one['first_name'],
			'last_name' => $step_one['last_name'],
			'telephone' => $step_one['telephone'],
			'street' => $step_two['street'],
			'house_number' => $step_two['house_number'],
			'zip_code' => $step_two['zip_code'],
			'city' => $step_two['city'],
			'account_owner' => $this->request->getPost('account_owner'),
			'iban' => $this->request->getPost('iban'),
		];

		$user_id = $user_model->insert($data);
		$response = $this->post($user_id);

		if ($response) {

			$session_remove = ['step_one', 'step_two'];

			$this->session->remove($session_remove);

			return redirect()->to('/success/' . $user_id);
		}

		$this->session->setFlashdata('error', 'Unable to process your request.');

		return redirect()->to('/');
	}

	private function post($user_id)
	{
		$user_model = new UserModel();
		$user = $user_model->find($user_id);

		$data = array(
			'customerId' => $user->ID,
			'iban' => $user->iban,
			'owner'    => $user->account_owner,
		);

		$data_string = json_encode($data);

		$curl = curl_init('https://37f32cl571.execute-api.eu-central-1.amazonaws.com/default/wunderfleet-recruiting-backend-dev-save-payment-data');

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

		curl_setopt(
			$curl,
			CURLOPT_HTTPHEADER,
			array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data_string)
			)
		);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

		$result = curl_exec($curl);
		$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

		if ($httpcode == "400") {
			return false;
		}

		$data_result = json_decode($result);
		$user->data_payment_id = $data_result->paymentDataId;
		$user_model->update($user_id, $user);

		curl_close($curl);

		return true;
	}


	private function _render($view, $data)
	{
		echo view('Templates/header');
		echo view('Register/' . $view, $data);
		echo view('Templates/footer');
	}
}
