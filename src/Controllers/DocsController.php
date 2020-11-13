<?php
/**
 * Creator htm
 * Created by 2020/11/13 10:33
 **/

namespace Szkj\ApiDocs\Controllers;

use Illuminate\Routing\Controller;

class DocsController extends Controller
{
    public function index(){
        return view('szkj::index');
    }
}