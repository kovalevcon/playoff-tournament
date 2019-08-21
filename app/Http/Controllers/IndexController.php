<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Entities\TournamentMatch;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class IndexController
 *
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * Render main page with tournament grid
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        return view(
            'index',
            ['matches' => TournamentMatch::getDataForView((int)$request->get('id', 1))]
        );
    }
}
