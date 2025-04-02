<?php
/**
 * This file contains the BasicController class
 */

namespace App\Controllers;

use Charm\Vivid\Controller;
use Charm\Vivid\Kernel\Output\View;
use Charm\Vivid\Router\Attributes\Route;

/**
 * Class BasicController
 *
 * Handling basic endpoints
 *
 * @package App\Controllers
 */
class BasicController extends Controller
{
    #[Route("GET", "/", "index")]
    public function getIndex() : View
    {
        return View::make('index')->with([

        ]);
    }

}