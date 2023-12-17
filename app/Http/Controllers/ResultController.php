<?php

namespace App\Http\Controllers;

use App\Traits\KnowledgeBase;
use Illuminate\Http\Request;

class ResultController extends Controller
{
	use KnowledgeBase;

    public function run(Request $request)
    {
    	$this->handle($request);
    }
}
