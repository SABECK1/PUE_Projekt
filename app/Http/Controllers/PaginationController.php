<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
class PaginationController extends Controller
{
    public function index($myArray)
    {
        $data = $this->paginate($myArray);
        return $data;
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        //Erstellt Paginatorobjekt -> Standardlibrary von Laravel
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        //Collection ist ein Laravelwrapper für klassische Arrays
        //Sind die Items Teil einer Collection? -> Wenn nicht, dann mach eine!
        $items = $items instanceof Collection ? $items : Collection::make($items);
        //Paginatorobjekt mit der spezifizierten Anzahl items pro Seite erstellen
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
