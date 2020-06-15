<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function json($args, $status_code = 200, $status = true)
    {
        $args['status'] = $status ;
        return response()->json($args, $status_code);
    }


    public function pager($component, $title=null, $search=false, $data=[])
    {
        $data['page'] = $component;
        $data['search'] = $search;
        if ($title && $title !== null) $data['title'] = $title;
        return view('admin.index.index')->with($data);
    }

}
