<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\Profile;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class Index extends Controller
{

    public function __construct()
    {
        $this->data['profile']      = User::with('profile')->where('id', 1)->first();
    }

    public function index()
    {
        $this->data['services']     = Service::with('benefits')->get();
        $this->data['portofolios']  = Portofolio::all();
        return $this->renderView('index');
    }

    public function portfolio_detail($slug)
    {
        $this->data['detail']           = Portofolio::with('images_portofolio')->where('slug', $slug)->firstOrFail();

        return $this->renderView('portfolio_detail');
    }
}
