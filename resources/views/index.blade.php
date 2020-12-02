<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>laravel api docs</title>
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>

    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>

<div class="col-lg-8">
    <h2> api.version = {{$version}} </h2>
    <label for="token">jwt-token</label>
    <input type="text" id="token" value="{{ $token }}">
    @foreach($request as $key=>$value)
        {{--        {{ var_dump($value) }}--}}
        {{--接口标题 --}}
        <div style="margin-bottom: 10px">
            @if(isset( $value['annotation']['title']))
                <text style="font-size: 30px;font-weight:500;margin-right: 20px">{{ $value['annotation']['title'] }}</text>
            @endif
            <span class="label label-{{ $value['enabled'] ? 'success' : 'danger' }}">{{ $value['enabled'] ? '启用' : '未定义' }}</span>
        </div>
        {{--接口地址--}}
        <div>
            <p><kbd>{{ $key }}</kbd></p>
        </div>
        <form id="{{ $value['index'] }}">
            <div>
                <select name="method">
                    @if(isset($value['methods']))
                        @foreach($value['methods'] as $k=>$v)
                            <option value="{{$v}}">{{$v}}</option>
                        @endforeach
                    @endif
                </select>
                <input type="text" name="uri" value="{{$value['uri']}}">
                <a href="javascript:void(0);" onclick="js_method('{{$value['index']}}')" class="btn btn-default btn-xs"
                   role="button">提交</a>
            </div>
            @if(!empty($value['request']))
                <div>
                    <table class="table table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th>参数</th>
                            <th>是否必填</th>
                            <th>规则</th>
                            <th>传参</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($value['request'] as $k=>$v)
                            <tr>
                                <td>{{ $k }}</td>
                                <td>{{ in_array('required',$v) ? '是':'否'}}</td>
                                <td>{{ implode(' | ',$v) }}</td>
                                <td><input name="{{ $k }}" type="text" data-key="{{ $k }}"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </form>
        <pre style="color: #ffffff;background-color: #333333;margin-top: 20px;" hidden id="pre_{{ $value['index'] }}"></pre>
        <hr>
    @endforeach
</div>
<script>
    function js_method(id) {
        var t = $('#' + id).serializeArray()
        var method;
        var indexMethod;
        var indexUri;
        var uri;
        var data = {};
        var token = $('#token').val();
        console.log(token)
        $.each(t, function (i, val) {
            if (val.name == 'uri') {
                uri = val.value
                indexUri = i
            } else if (val.name == "method") {
                method = val.value
                indexMethod = i
            } else if (val.value != '' && val.value != ' ') {
                data[val.name] = val.value;
            }
        })
        t.splice(indexUri, 1)
        t.splice(indexMethod, 1)

        data =  JSON.stringify(data) == '{}' ? '' : JSON.stringify(data)

        console.log(data)
        $.ajax({
            headers: {
                "Authorization": "Bearer " + token
            },
            type: method,
            url: uri,
            dataType: 'json',
            data: data,
            mimeType: "multipart/form-data",
            contentType: 'application/json;charset=UTF-8',
            success: function (r) {
                var pre = $('#pre_' + id);
                pre.html(syntaxHighlight(r));
                pre.show()
            },
            error: function (r) {
                var j = r.responseJSON;
                var pre = $('#pre_' + id);
                pre.html(syntaxHighlight(j));
                pre.show()
            }
        })
    }

    function syntaxHighlight(json) {
        if (typeof json != 'string') {
            json = JSON.stringify(json, undefined, 2);
        }
        json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
        return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
            var cls = 'number';
            if (/^"/.test(match)) {
                if (/:$/.test(match)) {
                    cls = 'key';
                } else {
                    cls = 'string';
                }
            } else if (/true|false/.test(match)) {
                cls = 'boolean';
            } else if (/null/.test(match)) {
                cls = 'null';
            }
            return '<span class="' + cls + '">' + match + '</span>';
        });
    }
</script>
</body>
</html>
