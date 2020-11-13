<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>laravel api docs</title>

</head>
<body>
api.version = {{$version}}
<br>
@foreach($routes as $k=>$route)
    <select>
        @foreach($route->methods as $v)
            <option value="{{$v}}">{{$v}}</option>
        @endforeach
    </select>
    <input type="text" value="{{$route->uri}}">
    @if(isset($request[$route->uri.'@'.$route->controllerMethod]))
        <label>启用</label>
        <table>
            <thead>
            <tr>
                <th>参数</th>
                <th>参数规则</th>
                <th>示例</th>
            </tr>
            </thead>
            <tbody>
            @foreach($request[$route->uri.'@'.$route->controllerMethod] as $key=>$value)
                @if(!empty($value))
                    @foreach($value as $kk=>$vv)
                        <tr>
                            <td>{{$kk}}</td>
                            <td>{{ is_string($vv) ?$vv : ''}}</td>
                            <td><input type="text"></td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
            </tbody>
        </table>
    @else
        方法未定义
    @endif
    <button>提交</button>
    <br>
@endforeach
</body>
</html>
