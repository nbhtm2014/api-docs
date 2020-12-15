<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <style>

        ul li {
            padding-top: 0px;
            padding-bottom: 0px;
            padding-left: 30px;
            font-size: 12px;
            font-weight: 400;
            line-height: 1px;
        }
    </style>
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-3" role="complementary">
            @foreach($group as $k=>$v)
                <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix">
                    <ul class="nav bs-docs-sidenav">
                        <li class=><a href="#{{$k}}">{{$k}}</a>
                            @if(!empty($v))
                                <ul class="nav">
                                    @foreach($v as $key=>$value)
                                        <li class><a href="#{{ $key }}">{{$key}}<span style="margin-left: 5px" class="badge">{{count($value)}}</span></a>
                                            @if(!empty($value))
                                                <ul class="nav" style="display: none">
                                                    @foreach($value as $kk=>$vv)
                                                        <li class><a href="#{{$kk}}">{{isset($vv['annotation']['title'])?$vv['annotation']['title']:$kk}}</a>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    </ul>
                    @endforeach
                </nav>
        </div>
        <div class="col-xs-8" role="main">
            <input hidden id="token" value="{{ $token }}">
            @foreach($group as $k=>$v)
                <h1 id="{{$k}}">{{$k}}</h1>
                @if(!empty($v))
                    @foreach($v as $key=>$value)
                        <div class="bs-docs-section">
                            <h2 id="{{ $key }}">{{$key}}</h2>
                            @if(!empty($value))
                                @foreach($value as $kk=>$vv)
                                    <h3 id="{{$kk}}">{{isset($vv['annotation']['title'])?$vv['annotation']['title']:$kk}}</h3>
                                    @if(isset($vv['annotation']['desc']))
                                        <blockquote>
                                            <footer>{{$vv['annotation']['desc']}}</footer>
                                        </blockquote>
                                    @endif
                                    <p><kbd>{{$kk}}</kbd>
                                        <span class="label label-{{ $vv['enabled'] ? 'success' : 'danger' }}">{{ $vv['enabled'] ? '启用' : '未定义' }}</span>
                                    </p>
                                    <div>
                                        <select name="method" id="{{ $vv['index'] }}_method">
                                            @if(isset($vv['methods']))
                                                @foreach($vv['methods'] as $kkk=>$vvv)
                                                    <option value="{{$vvv}}">{{$vvv}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <input type="text" name="uri" value="{{$vv['uri']}}"
                                               id="{{ $vv['index'] }}_uri">
                                        <a href="javascript:void(0);" onclick="js_method('{{$vv['index']}}')"
                                           class="btn btn-default btn-xs"
                                           role="button">提交</a>
                                    </div>
                                    <form id="{{ $vv['index'] }}">
                                        @if(!empty($vv['request']))
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
                                                    @foreach($vv['request'] as $kkk=>$vvv)
                                                        <tr>
                                                            <td>{{ $kkk }}</td>
                                                            <td>{{ in_array('required',$vvv) ? '是':'否'}}</td>
                                                            <td>{{ implode(' | ',$vvv) }}</td>
                                                            <td><input name="{{ $kkk }}" type="text"
                                                                       data-key="{{ $kkk }}"></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    </form>

                                    <div style="margin-top: 30px" id="collapse_{{ $vv['index'] }}" hidden>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                       href="#collapse{{$vv['index']}}" aria-expanded="true"
                                                       aria-controls="collapseOne">
                                                        #Collapse
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse{{$vv['index']}}" class="panel-collapse collapse in"
                                                 role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                        <pre style="color: #ffffff;background-color: #333333;" class="language-php" data-lang="php"
                                             id="pre_{{ $vv['index'] }}">
                                        </pre>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
</div>

</body>
<script>
    $(document).ready(function () {

        $('.nav ul li a').click(function () {
            var first_li = $(this).parents('li').first();
            var ul = first_li.children("ul")
            ul.toggle();
        })

    });

    function js_method(id) {
        var form = $('#' + id).serializeArray()
        var method = $('#' + id + '_method').val().toUpperCase();
        var uri = $('#' + id + '_uri').val();
        var token = $('#token').val();
        var data = {};
        window[method](uri, token, form, id)
    }

    function PUT(uri, token, form, id) {
        var data = '';
        $.each(form, function (i, v) {
            if (v.value != '') {
                data += v.name + '=' + v.value + '&'
            }
        })
        if (data != '') {
            data = data.substring(0, data.length - 1)
            uri = uri + '?' + data
        }
        $.ajax({
            headers: {
                "Authorization": "Bearer " + token
            },
            url: uri,
            type: 'put',
            dataType: 'json',
            mimeType: "multipart/form-data",
            contentType: 'application/json;charset=UTF-8',
            success: function (r) {
                var pre = $('#pre_' + id);
                pre.html(syntaxHighlight(r));
            },
            error: function (r) {
                var j = r.responseJSON;
                var pre = $('#pre_' + id);
                pre.html(syntaxHighlight(j));
            },
            complete: function (r) {
                var collapse = $('#collapse_' + id);
                collapse.show()
            }
        })
    }

    function DELETE(uri, token, form, id) {
        var data = '';
        $.each(form, function (i, v) {
            if (v.value != '') {
                data += v.name + '=' + v.value + '&'
            }
        })
        if (data != '') {
            data = data.substring(0, data.length - 1)
            uri = uri + '?' + data
        }
        $.ajax({
            headers: {
                "Authorization": "Bearer " + token
            },
            url: uri,
            type: 'delete',
            dataType: 'json',
            mimeType: "multipart/form-data",
            contentType: 'application/json;charset=UTF-8',
            success: function (r) {
                var pre = $('#pre_' + id);
                pre.html(syntaxHighlight(r));
            },
            error: function (r) {
                var j = r.responseJSON;
                var pre = $('#pre_' + id);
                pre.html(syntaxHighlight(j));
            },
            complete: function (r) {
                var collapse = $('#collapse_' + id);
                collapse.show()
            }
        })
    }

    function POST(uri, token, form, id) {
        var data = {}
        $.each(form, function (i, val) {
            if (val.value != '' && val.value != ' ') {
                data[val.name] = val.value;
            }
        })
        data = JSON.stringify(data) == '{}' ? '' : JSON.stringify(data)
        $.ajax({
            headers: {
                "Authorization": "Bearer " + token
            },
            type: 'post',
            url: uri,
            dataType: 'json',
            data: data,
            mimeType: "multipart/form-data",
            contentType: 'application/json;charset=UTF-8',
            success: function (r) {
                var pre = $('#pre_' + id);
                pre.html(syntaxHighlight(r));
            },
            error: function (r) {
                var j = r.responseJSON;
                var pre = $('#pre_' + id);
                pre.html(syntaxHighlight(j));
            },
            complete: function (r) {
                var collapse = $('#collapse_' + id);
                collapse.show()
            }
        })
    }

    function GET(uri, token, form, id) {
        var data = '';
        $.each(form, function (i, v) {
            if (v.value != '') {
                data += v.name + '=' + v.value + '&'
            }
        })
        if (data != '') {
            data = data.substring(0, data.length - 1)
            uri = uri + '?' + data
        }
        $.ajax({
            headers: {
                "Authorization": "Bearer " + token
            },
            url: uri,
            type: 'get',
            dataType: 'json',
            mimeType: "multipart/form-data",
            contentType: 'application/json;charset=UTF-8',
            success: function (r) {
                var pre = $('#pre_' + id);
                pre.html(syntaxHighlight(r));
            },
            error: function (r) {
                var j = r.responseJSON;
                var pre = $('#pre_' + id);
                pre.html(syntaxHighlight(j));
            },
            complete: function (r) {
                var collapse = $('#collapse_' + id);
                collapse.show()
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
</html>