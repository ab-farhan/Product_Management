<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ProductRequisition;
use Carbon\Carbon;
use Session;
use Image;
use Auth;

class ProfileController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return redirect('dashboard/account/profile');
    }

}
