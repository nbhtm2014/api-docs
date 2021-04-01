<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apo-Docs</title>
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>

    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Source Sans Pro', 'Helvetica Neue', Arial, sans-serif;
            font-size: 15px;
            letter-spacing: 0;
            margin: 0 0 0 0;
            overflow-x: hidden;
        }

        div {
            display: block;
        }

        ul {
            list-style-type: disc;
        }

        li {
            display: list-item;
            text-align: -webkit-match-parent;
        }

        p {
            display: block;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
        }
        thead tr th{
            color: #fff;
            background-color: #343a40;
            border-color: #454d55;
        }
        .sidebar {
            border-right: 1px solid rgba(0, 0, 0, 0.07);
            overflow-y: auto;
            padding: 20px 0 0;
            top: 0;
            bottom: 0;
            left: 0;
            transition: transform 250ms ease-out;
            width: 300px;
            z-index: 20;
            position: fixed;
            background-color: #fff;
            color: #364149;
        }

        .sidebar ul {
            margin: 0 0 0 15px;
            padding: 0 0 0 0;
        }

        .sidebar li {
            margin: 6px 0 6px 0;
        }

        .sidebar li > p {
            font-weight: 700;
            margin: 0 0 0 0;
        }

        .sidebar ul, .sidebar ul li {
            list-style: none;
        }

        .sidebar ul li ul {
            padding: 0 0 0 0;
        }

        .sidebar ul li a {
            color: #7a8ca0;
            font-size: 13px;
            font-weight: normal;
            overflow: hidden;
            text-decoration: none;
            text-overflow: ellipsis;
            white-space: nowrap;
            border-bottom: none;
            display: block;
        }

        .sidebar .sidebar-nav {
            line-height: 2em;
            padding-bottom: 40px;
        }

        .content {
            padding: 20px 100px 60px 20px;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 300px;
            transition: left 250ms ease;
        }

        .app-sub-sidebar {
            display: none;
        }

        .app-sub-sidebar li::before {
            content: '-';
            padding-right: 4px;
            float: left;
        }
        /*.github-corner{*/
        /*    border-bottom: 0;*/
        /*    position: fixed;*/
        /*    right: 0;*/
        /*    text-decoration: none;*/
        /*    top: 0;*/
        /*    z-index: 1;*/
        /*}*/
        .github-corner svg{
            color: #fff;
            fill: #4256b9;
            height: 80px;
            width: 80px;
        }
        svg:not(:root){
            overflow: hidden;
        }
        .github-corner .octo-arm :hover  {
            animation: octocat-wave 560ms ease-in-out;
        }
    </style>
</head>
<body>
<a href="https://github.com/nbhtm2014/api-docs" class="github-corner" aria-label="View source on GitHub"><svg width="80" height="80" viewBox="0 0 250 250" style="z-index: 100;fill:#70B7FD; color:#fff; position: fixed; top: 0; border: 0; left: 0; transform: scale(-1, 1);" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>
<main>
    <div class="sidebar">
        <div class="sidebar-nav">
            <h3 class="text-center">Api-Docs</h3>
            <ul>
                @foreach($group as $k=>$v)
                    <li>
                        <p>{{ $k }}</p>
                        @if(!empty($v))
                            <ul>
                                @foreach($v as $key=>$value)
                                    <li>
                                        <a href="#{{ $key }}" title="{{$key}}">{{$key}}</a>
                                        @if(!empty($value))
                                            <ul class="app-sub-sidebar">
                                                @foreach($value as $kk=>$vv)
                                                    <li>
                                                        <a class="section-link" href="#{{$kk}}"
                                                           title="{{$kk}}">{{isset($vv['annotation']['title'])?$vv['annotation']['title']:$kk}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="content">
        @foreach($group as $k=>$v)
            <h1 id="{{$k}}">{{$k}}</h1>
            @if(!empty($v))
                @foreach($v as $key=>$value)
                    <div class="bs-docs-section">
                        <h3 id="{{ $key }}">{{$key}}</h3>
                        @if(!empty($value))
                            @foreach($value as $kk=>$vv)
                                <h4 id="{{$kk}}">{{isset($vv['annotation']['title'])?$vv['annotation']['title']:$kk}}</h4>
                                @if(isset($vv['annotation']['desc']))
                                    <blockquote>
                                        <footer>{{$vv['annotation']['desc']}}</footer>
                                    </blockquote>
                                @endif
                                <p><kbd>{{$kk}}</kbd>
                                    <span
                                        class="label label-{{ $vv['enabled'] ? 'success' : 'danger' }}">{{ $vv['enabled'] ? '启用' : '未定义' }}</span>
                                </p>
                                <div class="row">
                                    <div class="col-xs-2">
                                        <select class="form-control" name="method" id="{{ $vv['index'] }}_method">
                                            @if(isset($vv['methods']))
                                                @foreach($vv['methods'] as $kkk=>$vvv)
                                                    <option value="{{$vvv}}">{{$vvv}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col-xs-7">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon3">{{ $host }}</span>
                                            <input type="text" name="uri" value="{{$vv['uri']}}"
                                                   class="form-control"
                                                   aria-describedby="sizing-addon2"
                                                   id="{{ $vv['index'] }}_uri">
                                        </div>

                                    </div>

                                    <div class="col-xs-1">

                                        <a href="javascript:void(0);" onclick="js_method('{{$vv['index']}}')"
                                           class="btn btn-info"
                                           role="button">提交
                                        </a>
                                    </div>
                                </div>
                                <p></p>
                                <form id="{{ $vv['index'] }}">
                                    {{--                                        @if(!empty($vv['request']))--}}
                                    <ul id="tab" class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#body-table-{{ $vv['index'] }}" data-toggle="tab">
                                                Body
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#header-table-{{ $vv['index'] }}" data-toggle="tab">
                                                Headers
                                            </a>
                                        </li>
                                    </ul>
                                    <div id="tabConten" class="tab-content">
                                        <div class="tab-pane fade in active" id="body-table-{{ $vv['index'] }}">
                                            <table id="{{$vv['index']}}_table" class="table  table-hover" style="border-bottom: 1px solid #ddd">
                                                <thead>
                                                <tr>
                                                    <th>参数</th>
                                                    <th>是否必填</th>
                                                    <th>规则</th>
                                                    <th>传参</th>
                                                    <th>操作</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($vv['request'] as $kkk=>$vvv)
                                                    <tr>
                                                        <td>{{ $kkk }}</td>
                                                        <td>{{ in_array('required',$vvv) ? '是':'否'}}</td>
                                                        <td>{{ implode(' | ',$vvv) }}</td>
                                                        <td><input class="" name="{{ $kkk }}" type="text"
                                                                   data-key="{{ $kkk }}"></td>
                                                        <td><button onclick="deleteRow({{$vv['index']}},$(this))" type="button" class="btn btn-danger btn-xs" title="删除行"><span class="glyphicon glyphicon-minus"></span></button></td>
                                                    </tr>
                                                    @if(in_array('confirmed',$vvv))
                                                        <tr>
                                                            <td>{{ $kkk.'_confirmation' }}</td>
                                                            <td>{{ in_array('required',$vvv) ? '是':'否'}}</td>
                                                            <td></td>
                                                            <td><input name="{{ $kkk.'_confirmation' }}" type="text"
                                                                       data-key="{{ $kkk.'_confirmation' }}"></td>
                                                            <td><button onclick="deleteRow($(this))" type="button" class="btn btn-danger btn-xs" title="删除行"><span class="glyphicon glyphicon-minus"></span></button></td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade in" id="header-table-{{ $vv['index'] }}">
                                            <table class="table  table-hover ">
                                                <thead>
                                                <tr>
                                                    <th>KEY</th>
                                                    <th>VALUE</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Authorization</td>
                                                    <td><input class="form-control" type="text"
                                                               name="authorization"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{--                                        @endif--}}
                                </form>

                                <div style="margin-top: 30px" id="collapse_{{ $vv['index'] }}" hidden>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                   href="#collapse{{$vv['index']}}" aria-expanded="true"
                                                   aria-controls="collapseOne">
                                                    Response
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse{{$vv['index']}}" class="panel-collapse collapse in"
                                             role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                        <pre style="color: #ffffff;background-color: #333333;" class="language-php"
                                             data-lang="php"
                                             id="pre_{{ $vv['index'] }}">
                                        </pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @endif
                    </div>
                @endforeach
            @endif
        @endforeach
        <button style="position: fixed;z-index: 214783647;top: 80px;right: 20px;"
                type="button"
                class="btn btn-primary btn-lg"
                data-toggle="modal"
                data-target="#getToken">
            token
        </button>
        <a style="position: fixed;
            z-index: 214783647;
            bottom: 40px;
            right: 40px;
            width: 38px;
            height: 38px;
            text-indent:-999999px;
            background-image: url('https://cdn.learnku.com/build/img/top.png')"
           href="#top">
        </a>
        <!-- Modal -->
        <div class="modal fade" id="getToken" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Get Token</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            @foreach($tokens as $tokenKey => $tokenValue)
                                <div class="form-group">
                                    <label for="message-text" class="control-label">{{$tokenKey}}</label>
                                    <textarea class="form-control" id="message-text"
                                              rows="5">{{$tokenValue}}</textarea>
                                </div>
                            @endforeach
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function () {
        $('.sidebar-nav ul li a').click(function () {
            var first_li = $(this).parents('li').first();
            var ul = first_li.children("ul")
            ul.toggle(10)
        })
    });

    function js_method(id) {
        var form = $('#' + id).serializeArray()
        var token = form.find((token) => (token.name == 'authorization')).value

        var findIndex = form.findIndex(function (element) {
            return element.name == 'authorization'
        })
        form.splice(findIndex, 1)
        var method = $('#' + id + '_method').val().toUpperCase();
        var uri = $('#' + id + '_uri').val();

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
                toastr.success(r.message)
                var pre = $('#pre_' + id);
                pre.html(syntaxHighlight(r));
            },
            error: function (r) {
                if (r.responseJSON.code) {
                    toastr.error(r.responseJSON.message)
                    var j = r.responseJSON;
                    var pre = $('#pre_' + id);
                    pre.html(syntaxHighlight(j));
                } else {
                    var pre = $('#pre_' + id);
                    pre.html(r.responseText);
                }
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
                toastr.success(r.message)
                var pre = $('#pre_' + id);
                pre.html(syntaxHighlight(r));
            },
            error: function (r) {
                if (r.responseJSON.code) {
                    toastr.error(r.responseJSON.message)
                    var j = r.responseJSON;
                    var pre = $('#pre_' + id);
                    pre.html(syntaxHighlight(j));
                } else {
                    var pre = $('#pre_' + id);
                    pre.html(r.responseText);
                }
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
        var a = $.ajax({
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
                toastr.success(r.message)
                var pre = $('#pre_' + id);
                pre.html(syntaxHighlight(r));
            },
            error: function (r) {
                if (r.code) {
                    toastr.error(r.message)
                    var j = r.responseJSON;
                    var pre = $('#pre_' + id);
                    pre.html(syntaxHighlight(j));
                } else {
                    var pre = $('#pre_' + id);
                    pre.html(r.responseText);
                }

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
                toastr.success(r.message)
                var pre = $('#pre_' + id);
                pre.html(syntaxHighlight(r));
            },
            error: function (r) {
                if (r.responseJSON.code) {
                    toastr.error(r.responseJSON.message)
                    var j = r.responseJSON;
                    var pre = $('#pre_' + id);
                    pre.html(syntaxHighlight(j));
                } else {
                    var pre = $('#pre_' + id);
                    pre.html(r.responseText);
                }
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

    function deleteRow(row){
        row.parent().parent().remove();
    }

</script>
</body>
</html>