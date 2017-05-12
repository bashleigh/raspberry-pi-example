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
    public function index(Request $request, GPIOManager $GPIOManager)
    {
        return view('gpio/index', [
            'redled' => $GPIOManager->get('redled'),
        ]);
    }

    /**
     * @param Request $request
     * @param GPIOManager $GPIOManager
     * @return mixed
     */
    public function redLed(Request $request, GPIOManager $GPIOManager)
    {
        if ($request->has('value'))
        {
            $GPIOManager->redled = $request->value;
        }

        $redled = $GPIOManager->get('redled');

        return $request->ajax() ? response()->json(['redled' => [
            'value' => $redled->getPrevious(),
        ]]) : redirect()->route('gpio.index');
    }
}
