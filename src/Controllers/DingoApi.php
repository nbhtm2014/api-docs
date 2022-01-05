<?php


namespace Nbhtm\ApiDocs\Controllers;


use Dingo\Api\Contract\Routing\Adapter;
use Dingo\Api\Dispatcher;
use Dingo\Api\Routing\Route;
use Dingo\Api\Routing\Router;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\DocParser;
use Illuminate\Container\Container;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Facade;
use Nbhtm\ApiDocs\Annotation\Title;
use Nbhtm\ApiDocs\Helper;
use Symfony\Component\HttpFoundation\Request;

class DingoApi
{

    use Helper;


    public $version;


    public $adapter_routes;

    public function __construct()
    {
        $this->adapter_routes = $this->getAdapterRoutes();
        $this->version = $this->getVersion($this->adapter_routes);
    }


    public function getRoutes($token = null)
    {
        $routes = $this->adapter_routes[$this->version];

        $groups = [];
        foreach ($routes as $key => $value) {
            $uses = $value->action['uses'];
            $controller = explode('@', $uses)[0];
            $controllerMethod = explode('@', $uses)[1];
            $reflection_class = new \ReflectionClass($controller);

            if ($reflection_class->hasMethod($controllerMethod)) {

                $annotation = $this->getAnnotation($controllerMethod, $reflection_class);
                $temp['annotation'] = $annotation;
                $array_uri = explode('/', $value->uri);
                $temp['url'] = $value->uri;
                $temp['methods'] = $value->methods;
                $groups[$array_uri[0]][$array_uri[1]][] = $temp;
            }


        }
        return $groups;
    }

    /**
     * @return array
     * @author htm
     * date 2021-12-27 10:17:01
     */
    public function getAdapterRoutes()
    {
        return app('Dingo\Api\Routing\Router')->getAdapterRoutes();
    }

    /**
     * @param $routes
     * @return int|string|void|null
     * @author htm
     * date 2021-12-27 10:17:03
     */
    public function getVersion($routes)
    {
        return array_key_first($routes);
    }


    /**
     * @param $controller
     * @return mixed|string|void
     * @author htm
     * date 2021-12-27 15:17:19
     */
    public function controller($controller)
    {
        if (strpos($controller, '@')) {
            return explode('@', $controller)[0];
        }

    }

    /**
     * @param string $class_name
     * @param $method
     * @return array
     * @throws \ReflectionException
     * @author htm
     * date 2021-12-27 15:17:14
     */
    public function exists_annotation(string $class_name, $method)
    {
        $reflection_class = new \ReflectionClass($class_name);
        $annotation = $this->getAnnotation($method, $reflection_class);
        return $annotation;

    }


    /**
     * 获取Annotation注解
     * @param $controllerMethod
     * @param $reflection_class
     * @return array
     * @author htm
     * date 2021-07-08 15:51:55
     */
    public function getAnnotation($controllerMethod, $reflection_class)
    {
        $method = $reflection_class->getMethod($controllerMethod);
        $reader = new AnnotationReader();
        $method_annotations = $reader->getMethodAnnotations($method);


        $annotation = [];
        foreach ($method_annotations as $k => $v) {

            $class_string_name = get_class($v);
            $class_array_name = explode('\\', $class_string_name);
            $class_name = $class_array_name[array_key_last($class_array_name)];
            if ($v instanceof Title) {
                $annotation[$class_name] = $v;
            } else {
                $annotation[$class_name][] = $v;
            }
        }
        return $this->getMethodAnnotation($method, $annotation);
    }

    /**
     * 获取方法其他注释内容
     * @param $method
     * @param $annotation
     * @return mixed
     * @author htm
     * date 2021-07-08 15:53:30
     */
    private function getMethodAnnotation($method, $annotation)
    {
        $docs = $method->getDocComment();

        $pos = $this->findInitialTokenPosition($docs);

        if (!is_null($pos)) {
            $docs = trim(substr($docs, $pos), '* /');
            $docs = str_replace(['"', '*', '/', '/n', PHP_EOL], '', $docs);
            $docs = explode('@', $docs);
            foreach ($docs as $docsKey => $docsValue) {
                if (strstr($docsValue, 'author')) {
                    $annotation['author'] = $docsValue;
                }
            }
        }
        return $annotation;
    }


}