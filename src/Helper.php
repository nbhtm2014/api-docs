<?php
namespace Nbhtm\ApiDocs;

use Illuminate\Validation\Rules\In;
use Illuminate\Validation\Rules\Unique;

trait Helper
{
    /**
     * exists dingo api
     * @return bool
     * @author htm
     * date 2021-07-08 15:57:49
     */
    public function hasDingoApi(){
        return class_exists(\Dingo\Api\Routing\Router::class);
    }


    /**
     * Finds the first valid annotation
     *
     * @param string $input The docblock string to parse
     */
    public function findInitialTokenPosition($input): ?int
    {
        $pos = 0;

        // search for first valid annotation
        while (($pos = strpos($input, '@', $pos)) !== false) {
            $preceding = substr($input, $pos - 1, 1);

            // if the @ is preceded by a space, a tab or * it is valid
            if ($pos === 0 || $preceding === ' ' || $preceding === '*' || $preceding === "\t") {
                return $pos;
            }

            $pos++;
        }

        return null;
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


    /**
     * @return array
     * @author htm
     * date 2021-03-25 15:45:13
     */
    public function getToken(){
        $tokens = [];
        $guards = config('auth.guards');
        foreach ($guards as $k=>$v){
            if ($v['driver'] == 'jwt'){
                $model = config('auth.providers.'.$v['provider'].'.model');
                $user = (new $model())->first();
                if (!empty($user)){
                    $tokens[$v['provider']] = auth($k)->fromUser($user);
                }else{
                    $tokens[$v['provider']]  = '';
                }
            }
        }
        return $tokens;
    }
}