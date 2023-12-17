<?php

namespace App\Http\Controllers;

use Spipu\Html2Pdf\Html2Pdf;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function test()
    {
    	$html2pdf = new Html2Pdf();
		$html2pdf->writeHTML('<h1>HelloWorld</h1>This is my first test');
		$html2pdf->output();
    }
}
