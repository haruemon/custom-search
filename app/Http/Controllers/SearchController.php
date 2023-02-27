<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JanDrda\LaravelGoogleCustomSearchEngine\LaravelGoogleCustomSearchEngine;

class SearchController extends Controller
{
    const SEARCH_LIST_COUNT = 10;

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $fulltext = new LaravelGoogleCustomSearchEngine();

        $parameters = [
            'start' => (int)$request->start ?? 1,
            'num' => self::SEARCH_LIST_COUNT
        ];

        $fulltext = new LaravelGoogleCustomSearchEngine();
        $results = $fulltext->getResults($request->search_keyword, $parameters);
        $rawResults = $fulltext->getRawResult();
        $info = $fulltext->getSearchInformation();

        return view('search', compact('results', 'info', 'rawResults'));
    }
}
