<?php
/**
 * Creator htm
 * Created by 2020/11/13 10:33
 **/

namespace Szkj\ApiDocs\Controllers;

use Dingo\Api\Routing\Router;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DocsController extends Controller
{
    public $router;

    /**
     * Create a new routes command instance.
     *
     * @param Router $router
     *
     * @return void
     */
    public function __construct(Router $router)
    {

        $this->router = $router;
    }

    public function index()
    {
        $all_routes = $this->router->getRoutes();

        $version = array_key_first($all_routes);

        $routes = $all_routes[$version];

        $request = [];

        foreach ($routes as $k => $v) {

            $controller = get_class($v->controller);
            $controllerMethod = $v->controllerMethod;
//              $new_controller = new $controller;
            $ref = new \ReflectionClass($controller);
            if ($ref->hasMethod($controllerMethod)) {
//                $method = $ref->getMethod($controllerMethod);
//                $reader = new AnnotationReader();
//                dd($reader->getMethodAnnotation($method,Title::class));
                $parameters = $ref->getMethod($controllerMethod)->getParameters();
                foreach ($parameters as $parameter) {
                    $name = $parameter->name;
                    if ($parameter_class = $parameter->getClass()) {
                        $parameter_class_name = $parameter_class->isInstance(new Request());
                        if (!$parameter_class_name) {
                            $a = $parameter->getClass()->getMethod('rules')->class;
                            $request[$v->uri . '@' . $controllerMethod] = (new $a())->rules();
                        } else {
                            $request[$v->uri . '@' . $controllerMethod][] = [];
                        }
                    } else {
                        $request[$v->uri . '@' . $controllerMethod] = [$name => 'required'];
                    }
                }
            }
        }
//        dd($request);
        return view('szkj::index', ['routes' => $routes, 'version' => $version]);
    }
}