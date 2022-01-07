<?php
/**
 * Creator htm
 * Created by 2020/11/13 10:33
 **/

namespace Nbhtm\ApiDocs\Controllers;

use Dingo\Api\Routing\Router;

use Doctrine\Common\Annotations\Annotation;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Annotations\DocParser;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Doctrine\Common\Annotations\AnnotationReader;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\In;
use Illuminate\Validation\Rules\Unique;
use League\CommonMark\DocParserInterface;
use Nbhtm\ApiDocs\Annotation\Title;
use Nbhtm\ApiDocs\Helper;
use Tymon\JWTAuth\JWTAuth;

class DocsController
{
    use Helper;

    public $dingApi;

    public $host;

    public function __construct()
    {
        $this->dingApi = new DingoApi();

        $this->host = request()->getSchemeAndHttpHost() . '/';
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @author htm
     * date 2021-12-27 15:20:59
     */
    public function index()
    {
//        $tokens = $this->getToken();
        if ($this->hasDingoApi()) {
            $all_routes = $this->dingApi->getRoutes();
            return view('nbhtm::index', ['all_routes' => $all_routes,'host'=>$this->host]);

        }
        return view('nbhtm::index', ['all_routes' => $all_routes,'host'=>$this->host]);
    }

    /**
     * @param Request $request
     * @return array
     * @throws \ReflectionException
     * @author htm
     * date 2021-12-27 15:21:03
     */
    public function getApiDocsDetail(Request $request)
    {

        $adapterRoutes = $this->dingApi->getAdapterRoutes();
        $version = $this->dingApi->getVersion($adapterRoutes);
        $routes = $adapterRoutes[$version];
        $routesByMethod = $routes->getRoutesByMethod()[strtoupper($request->methods)][$request->api];


        $uses = $routesByMethod->action['uses'];
        $controller = explode('@', $uses)[0];
        $controllerMethod = explode('@', $uses)[1];
        $reflection_class = new \ReflectionClass($controller);
        $request_ = [];
        $request_['request'] = [];
        if ($reflection_class->hasMethod($controllerMethod)) {

            $annotation = $this->dingApi->getAnnotation($controllerMethod, $reflection_class);

            $parameters = $reflection_class->getMethod($controllerMethod)->getParameters();


            foreach ($parameters as $parameter) {

                $name = $parameter->name;

                if ($parameter_class = $parameter->getClass()) {

//                    $parameter_class_name = $parameter_class->isInstance(new \Symfony\Component\HttpFoundation\Request());
//
//                    if (!$parameter_class_name) {

                    if ($parameter->getClass()->hasMethod('rules')) {

                        $rules = $parameter->getClass()->getMethod('rules')->class;

                        if (!isset($annotation['RequestBody'])){
                            $temp_annotation = $this->dingApi->exists_annotation($rules,'rules');
                            if (isset($temp_annotation['RequestBody'])) $annotation['RequestBody'] = $temp_annotation['RequestBody'];

                        }

                        $request_['request'] = (new $rules())->rules();
//                        }
                    }
                }
            }
        }
        if (isset($annotation)) $request_['annotation'] = $annotation;
        $request_['url'] = $routesByMethod->uri;
        $request_['methods'] = $routesByMethod->methods;
        if (Cache::store('file')->has($request->methods.$request->api)){
            $request_['response_table_tbody'] = Cache::store('file')->get($request->methods.$request->api);
        }
        $ttl = config('jwt.ttl');
        if (Cache::store('file')->has('api.doc.token')){
            $token = Cache::store('file')->get('api.doc.token');
        }else{
            $token = $this->getToken();
            Cache::store('file')->put('api.doc.token',$token,$ttl);
        }
        $request_['token'] = $token[array_key_first($token)];
        return $request_;
    }

    public function save(Request $request){
        $api = $request->api;
        $method = $request->methods;
        $data = $request->data;
        $tbody = $request->tbody;
        $data = ['data'=>$data,'tbody'=>$tbody];
        Cache::store('file')->put($method.$api,$data);
    }

}