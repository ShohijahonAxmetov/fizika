<?php

namespace App\Http\Controllers;

use App\Traits\KnowledgeBase;
use Illuminate\Http\Request;

class ResultController extends Controller
{
	use KnowledgeBase;

    public function run(Request $request)
    {
    	$this
    	$q = $request->input('q');

    	$reflectionFunc = new \ReflectionFunction($q);
    	dd($reflectionFunc->getParameters());
    	$result = $this->$q(10, 2);

    	return $result;
    }
}
