<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ChickenTikkaMasala\GPIO\GPIOManager;

/**
 * Class GPIOManagerExampleController
 * @package App\Http\Controllers
 *
 * Example class to show how to use GPIO manager
 */
class GPIOManagerExampleController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return view('GPIOManager/index.blade.php');
    }

    /**
     * @param Request $request
     * @param GPIOManager $GPIOManager
     * @return mixed
     */
    public function redLight(Request $request, GPIOManager $GPIOManager)
    {
        if ($request->has('value'))
        {
            $GPIOManager->redlight = $request->value;
        }

        return $request->ajax() ? response()->json(['value' => $GPIOManager->redlight->getPrevious()]) : redirect()->route('gpiomanager.index');
    }
}
