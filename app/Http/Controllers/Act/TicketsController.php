<?php

namespace App\Http\Controllers\Act;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * 电子门票
 * Class TicketsController
 * @package App\Http\Controllers\Admin
 */
class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.permission:act');
    }
	/**
	 * 控制台
	 * @author 晚黎
	 * @date   2016-10-29
	 * @return [type]     [description]
	 */
    public function index()
    {
    	return view('act.tickets.index');
    }

}
