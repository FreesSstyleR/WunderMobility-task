<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use Config\Services;

class Home extends Controller
{
	private $session;

	public function __construct()
	{
		$db = \Config\Database::connect();
		#var_dump(phpinfo());
		#$db->query('SELECT * FROM users');

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

	public function success()
	{

		$this->_render('success', []);
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
		$user = new UserModel();
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

		$user->save($data);


		return redirect()->to('/success');
	}


	private function _render($view, $data)
	{
		echo view('Templates/header');
		echo view('Register/' . $view, $data);
		echo view('Templates/footer');
	}
}
