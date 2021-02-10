<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FormStepFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // $current_uri = (string)current_url(true)
        //     ->setHost('')
        //     ->setScheme('')
        //     ->stripQuery('token');
        // var_dump($current_uri);

        // if ($current_uri != '/') {
        //     if (!session()->get('step_one')) {
        //         return redirect()->to('/');
        //     }
        //     if (!session()->get('step_two')) {
        //         return redirect()->to('/address');
        //     }
        //     if (!session()->get('step_three')) {
        //         return redirect()->to('/payment');
        //     }
        // }

        // if (session()->get('step_one')) {
        //     return redirect()->to('/address');
        // }
        // if (session()->get('step_two')) {
        //     return redirect()->to('/payment');
        // }
        // if (session()->get('step_three')) {
        //     return redirect()->to('/payment');
        // }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
