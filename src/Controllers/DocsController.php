<?php
/**
 * Creator htm
 * Created by 2020/11/13 10:33
 **/

namespace Szkj\ApiDocs\Controllers;

use Dingo\Api\Routing\Router;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Doctrine\Common\Annotations\AnnotationReader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\In;
use Illuminate\Validation\Rules\Unique;
use PhpAmqpLib\Package;
use Szkj\ApiDocs\Annotation\Title;
use Tymon\JWTAuth\JWTAuth;

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

        $api_group = [];

        foreach ($routes as $k => $v) {
            $controller = get_class($v->controller);
            $controllerMethod = $v->controllerMethod;

            $ref = new \ReflectionClass($controller);

            //判断该方法是否存在
            if ($ref->hasMethod($controllerMethod)) {
                $method = $ref->getMethod($controllerMethod);
                $reader = new AnnotationReader();
                $myAnnotation = $reader->getMethodAnnotations(
                    $method
                );
                $annotation = [];
                //TODO 获取该方法的所有注释 目前只获取 title

                foreach ($myAnnotation as $key => $vv) {
                    $annotation['title'] = $vv->title;
                    $annotation['desc'] = $vv->desc;
                }
                $request[$v->uri . '@' . $controllerMethod]['annotation'] = $annotation;
                $parameters = $ref->getMethod($controllerMethod)->getParameters();
                //创建分组
                $group = explode('/', $v->uri);
                $api_group[$group[0]][$group[1]] = [];
                //开始遍历 parameters 获取参数
                foreach ($parameters as $parameter) {
                    $name = $parameter->name;
                    if ($parameter_class = $parameter->getClass()) {
                        $parameter_class_name = $parameter_class->isInstance(new Request());
                        if (!$parameter_class_name) {
                            $a = $parameter->getClass()->getMethod('rules')->class;
                            $request[$v->uri . '@' . $controllerMethod]['request'] = (new $a())->rules();
                        } else {
                            $request[$v->uri . '@' . $controllerMethod]['request'] = [];
                        }
                    } else {
                        $request[$v->uri . '@' . $controllerMethod]['request'] = [$name => 'required'];
                    }
                }
            }
        }
        $request = $this->re($routes, $request);
        try {
            $superadmin = DB::table('users')->where('superadmin', 1)->first()->id;
            $token = auth()->guard('api')->tokenById($superadmin);
        } catch (\Exception $exception) {
            $token = '';
        }
        $api_group = $this->group($api_group, $request);
        return view('szkj::index', ['token' => $token, 'version' => $version, 'request' => $request]);
    }

    /**
     * @param $api_group
     * @param $request
     * @return array
     */
    public function group($api_group, $request) : array
    {
        foreach ($request as $key => $value) {
            $uri = explode('@', $key);
            $array_uri = explode('/', $uri[0]);
            $api_group[$array_uri[0]][$array_uri[1]][$key] =  $value;
        }
        return $api_group;
    }


    public function re($routes, $request)
    {
        foreach ($routes as $k => $route) {
            $request[$route->uri . '@' . $route->controllerMethod]['enabled'] = isset($request[$route->uri . '@' . $route->controllerMethod]);
            $request[$route->uri . '@' . $route->controllerMethod]['methods'] = $route->methods;
            $request[$route->uri . '@' . $route->controllerMethod]['uri'] = $route->uri;
        }
        $index = 1;
        foreach ($request as $k => $v) {
            if (!empty($v['request'])) {
                $request[$k]['request'] = $this->reRequest($v['request']);
            } else {
                $request[$k]['request'] = [];
            }
            $request[$k]['index'] = $index++;
        }
        return $request;
    }

    public function reRequest(array $array)
    {
        foreach ($array as $k => $v) {
            if (!empty($v)) {
                if (is_array($v)) {
                    $array[$k] = $this->isObject($v);
                }
                if (!is_array($v)) $array[$k] = explode('|', $v);
            }
        }
        return $array;
    }

    //处理对象参数
    public function isObject($array)
    {
        foreach ($array as $k => $v) {
            if (is_object($v)) {
                if ($v instanceof In) {
                    $array[$k] = $v->__toString();
                }
                if ($v instanceof Unique) {
                    $array[$k] = $v->__toString();
                }
            }
        }
        return $array;
    }
}