<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Web Programming'
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'JL. Nakula No. 123',
                    'kota' => 'Tegal'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'JL. sadewa No. 321',
                    'kota' => 'Tegal'
                ]
            ]
        ];

        return view('pages/contact', $data);
    }
}
