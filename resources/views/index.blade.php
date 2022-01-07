<!doctype html>
<html lang="zh-CN">
<head>
    <!-- 必须的 meta 标签 -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 的 CSS 文件 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery.serializeJSON/3.2.1/jquery.serializejson.js"></script>
    <style>
        body {
            height: 100%;
            overflow-x: hidden;
            overflow-y: hidden;
        }

        html {
            height: -webkit-fill-available;
        }

        main {
            /*display: flex;*/
            flex-wrap: nowrap;
            height: 100vh;
            height: -webkit-fill-available;
            max-height: 100vh;
            overflow-x: hidden;
            overflow-y: auto;

        }

        .b-example-divider {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .bi {
            vertical-align: -.125em;
            pointer-events: none;
            fill: currentColor;
        }

        .dropdown-toggle {
            outline: 0;
        }

        .nav-flush .nav-link {
            border-radius: 0;
        }

        .btn-toggle {
            display: inline-flex;
            align-items: center;
            padding: .25rem .5rem;
            font-weight: 600;
            /*color: rgba(0, 0, 0, .65);*/
            background-color: transparent;
            border: 0;
        }

        .btn-toggle:hover,
        .btn-toggle:focus {
            /*color: rgba(0, 0, 0, .85);*/
            background-color: #0d6efd;
        }

        .btn-toggle::before {
            width: 1.25em;
            line-height: 0;
            content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
            transition: transform .35s ease;
            transform-origin: .5em 50%;
        }

        .btn-toggle[aria-expanded="true"] {
            /*color: rgba(0, 0, 0, .85);*/
        }

        .btn-toggle[aria-expanded="true"]::before {
            transform: rotate(90deg);
        }

        .btn-toggle-nav a {
            display: inline-flex;
            padding: .1875rem .5rem;
            margin-top: .125rem;
            /*margin-left: 2rem;*/
            align-items: center;
            text-decoration: none;
        }

        .btn-toggle-nav a:hover,
        .btn-toggle-nav a:focus {
            background-color: #0d6efd;
        }

        .scrollarea {
            overflow-y: auto;
        }

        .fw-semibold {
            font-weight: 600;
        }

        .lh-tight {
            line-height: 1.25;
        }

        #myTab {
            padding-left: 0.5rem;
        }

        #myTab button {
            color: #6c757d;
        }

        #myTab li > button.active {
            /*font-weight: bold;*/
            color: #000000;
        }

        .tab-class {
            padding-left: 1.5rem !important;
            margin-top: 1rem;
            color: #6C7587;
            font-size: 12px;
        }

        .docs-input::-webkit-input-placeholder {
            color: #a0aec0;
            font-size: 14px;
        }

        .docs-input {
            border: none;
            padding: 0;
        }

        table thead tr {
            font-size: 14px;
            border-bottom: 1px solid #dee2e6 !important;
        }

        table tbody {
            border-top: none !important;
        }

        .btn-delete {
            padding: 0;
            display: none
        }

        .td-delete:hover .btn-delete {
            display: inline-block;
        }

        .POST {
            color: #f8be40;
        }

        .GET {
            color: #8bc6af;
        }

        .DELETE {
            color: red;
        }

        .PUT {
            color: #6ac5cd;
        }

        #myResponseTab button {
            color: #6C7587 !important;
            border: none !important;
        }

        #myResponseTab button.active {
            border-bottom: 2px solid #000000 !important;
            color: #000000 !important;
        }

        #myResponseTabContent {
            padding: 0.5rem;
        }

        #status span {
            color: #20c997
        }

        #response_table {
            border-collapse: unset;
        }

        #response_table tbody tr td {
            padding: 0;
        }

        #response_table input::-webkit-input-placeholder {
            color: #a0aec0;
            font-size: 14px;
        }

        #response_table tbody tr td button {
            border-radius: unset;
            border: none;
        }

        .btn-group {
            margin: 0 !important;
        }
    </style>
</head>
<body>
{{--<a href="https://github.com/nbhtm2014/api-docs" class="github-corner" aria-label="View source on GitHub"><svg width="80" height="80" viewBox="0 0 250 250" style="z-index: 100;fill:#70B7FD; color:#fff; position: fixed; top: 0; border: 0; left: 0; transform: scale(-1, 1);" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>--}}
<div class="container-fluid" style="height: 100%">
    <div class="row" style="height: 100%">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 20%;overflow-x: hidden;
            overflow-y: auto;height: 100%">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark text-white sidebar collapse"
                 style="width: 100%;">
                <ul class="nav nav-pills  mb-auto" style="display: block!important;">
                    @foreach($all_routes[array_key_first($all_routes)] as $key=>$value)
                        <li class="nav-item">
                            <button class="btn btn-toggle align-items-center rounded collapsed text-white"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#home-{{$key}}" aria-expanded="false">
                                {{ $key }} <span style="top: 0px!important;left: 5px"
                                                 class="badge bg-secondary">{{ count($value) }}</span>
                            </button>
                            <div class="collapse " id="home-{{$key}}">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    @foreach($value as $k=>$v)
                                        <li>
                                            <a href="javascript:void(0);"
                                               onclick="getApiDocsDetail('{{$v['url']}}','{{$v['methods'][0]}}')"
                                               class="link-dark rounded text-white"
                                               style="width: 100%;justify-content:flex-start">
                                                <span class="{{$v['methods'][0]}}"
                                                      style="margin-right: 1rem;margin-left: 2rem;font-size: 10px;width: 50px">{{$v['methods'][0]}}</span>
                                                <span>{{ isset($v['annotation']['Title']->title) ? $v['annotation']['Title']->title: $v['url'] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>

        <main id="main" class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="width: 80%;padding-right: 0px!important;
    padding-left: 0px!important;">
            {{--title--}}
            <div style="padding: 0.5rem">
                <h5 id="title"></h5>
                <span id="author" class="badge rounded-pill bg-dark"></span>
            </div>

            {{--host--}}
            <div class="input-group mb-4 " style="padding: 0.5rem">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        id="method_" value="POST"
                        aria-expanded="false">POST
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" onclick="method_chonge('POST')" href="javascript:void(0);">POST</a>
                    </li>
                    <li><a class="dropdown-item" onclick="method_chonge('GET')" href="javascript:void(0);">GET</a></li>
                    <li><a class="dropdown-item" onclick="method_chonge('PUT')" href="javascript:void(0);">PUT</a></li>
                    <li><a class="dropdown-item" onclick="method_chonge('DELETE')" href="javascript:void(0);">DELETE</a>
                    </li>
                </ul>


                <span class="input-group-text">{{ $host }}</span>
                <input type="text" class="form-control" id="url" aria-describedby="basic-addon3">
                <button class="btn  btn-outline-secondary" onclick="send()" type="button" id="button-addon2">Send
                </button>
            </div>

            <div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#Params"
                                type="button" role="tab" aria-controls="Params" aria-selected="true">Params
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#Authorization"
                                type="button" role="tab" aria-controls="Authorization" aria-selected="false">
                            Authorization
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#Headers"
                                type="button" role="tab" aria-controls="Headers" aria-selected="false">Headers
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#Body"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">Body
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    {{--params--}}
                    <div class="tab-pane fade show active" id="Params" role="tabpanel" aria-labelledby="home-tab">
                        <p class="tab-class">Query Params</p>
                        <form name="params_form" id="params_form">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">KEY</th>
                                    <th scope="col">VALUE</th>
                                    <th scope="col">DESCRIPTION</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="td-delete" width="3%" style="text-align: center">
                                        <button onclick="deleteTr($(this))" class="btn btn-sm btn-delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        </button>
                                    </td>
                                    <td><input onchange="inputChange($(this))" placeholder="Key"
                                               class="form-control docs-input" type="text"></td>
                                    <td><input placeholder="Value"
                                               class="form-control docs-input" type="text"></td>
                                    <td><input placeholder="Description"
                                               class="form-control docs-input" type="text"></td>
                                    <td></td>
                                </tr>

                                </tbody>
                            </table>
                        </form>
                    </div>
                    {{--Authorization--}}
                    <div class="tab-pane fade  " id="Authorization" role="tabpanel" aria-labelledby="Authorization-tab">
                        {{--                        <p class="tab-class">Authorization</p>--}}
                        <form name="authorization_form" id="authorization_form">
                            <table class="table table-borderless" style="border-collapse:unset">
                                <thead>
                                <tr>
                                    {{--                                    <th scope="col"></th>--}}
                                    {{--                                    <th scope="col">TYPE</th>--}}
                                    {{--                                    <th scope="col">TOKEN</th>--}}
                                    {{--                                    <th scope="col"></th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    {{--                                    <td class="td-delete" width="3%" style="text-align: center">--}}
                                    {{--                                        <button onclick="deleteTr($(this))" class="btn btn-sm btn-delete">--}}
                                    {{--                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"--}}
                                    {{--                                                 fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">--}}
                                    {{--                                                <path--}}
                                    {{--                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>--}}
                                    {{--                                            </svg>--}}
                                    {{--                                        </button>--}}
                                    {{--                                    </td>--}}
                                    <td style="width: 30%;vertical-align:middle;">
                                        <label for="authorization_type" style="margin-left: 1.5rem">Type</label>
                                        <button id="authorization_type" style="margin-left: 1.5rem"
                                                class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">No Auth
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:void(0);"
                                                   onclick="Authorization('Bearer')" id="Bearer" data-value="Bearer">Bearer
                                                    Token</a></li>
                                            {{--                                            <li><a class="dropdown-item" href="#">Another action</a></li>--}}
                                            {{--                                            <li><a class="dropdown-item" href="#">Something else here</a></li>--}}

                                            {{--                                            <li><a class="dropdown-item" href="#">Separated link</a></li>--}}
                                        </ul>
                                    </td>
                                    <td>
                                        {{--                                        <div class="form-floating">--}}
                                        <textarea name="Authorization" class="form-control" placeholder="Token"
                                                  id="authorization_token" style="height: 100px"></textarea>
                                    {{--                                            <label for="authorization_token">Token</label>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    <td></td>--}}
                                </tr>

                                </tbody>
                            </table>
                        </form>
                    </div>

                    {{--header--}}
                    <div class="tab-pane fade" id="Headers" role="tabpanel" aria-labelledby="profile-tab">
                        <p class="tab-class">Headers</p>
                        <form name="header_form" id="header_form">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">KEY</th>
                                    <th scope="col">VALUE</th>
                                    <th scope="col">DESCRIPTION</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="td-delete" width="3%" style="text-align: center">
                                        <button onclick="deleteTr($(this))" class="btn btn-sm btn-delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        </button>
                                    </td>
                                    <td><input onchange="inputChange($(this))" placeholder="Key"
                                               class="form-control docs-input" type="text"></td>
                                    <td><input placeholder="Value"
                                               class="form-control docs-input" type="text"></td>
                                    <td><input placeholder="Description"
                                               class="form-control docs-input" type="text"></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    {{--                    Boby--}}
                    <div class="tab-pane fade" id="Body" role="tabpanel" aria-labelledby="contact-tab">
                        <p class="tab-class">Body</p>
                        <form name="body_form" id="body_form">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">KEY</th>
                                    <th scope="col">VALUE</th>
                                    <th scope="col">DESCRIPTION</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody id="requestBodyTbody">
                                <tr>
                                    <td class="td-delete" width="3%" style="text-align: center">
                                        <button onclick="deleteTr($(this))" class="btn btn-sm btn-delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        </button>
                                    </td>
                                    <td><input onchange="inputChange($(this))" placeholder="Key"
                                               class="form-control docs-input" type="text"></td>
                                    <td><input placeholder="Value"
                                               class="form-control docs-input" type="text"></td>
                                    <td><input placeholder="Description"
                                               class="form-control docs-input" type="text"></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

            {{--            <hr>--}}
            <div style="width: 100%;" id="ResponseContent">
                {{--                <p class="tab-class">Response</p>--}}
                <div>
                    <ul class="nav nav-tabs" id="myResponseTab" role="tablist"
                        style="padding-left: 0.5rem;font-size: 12px">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#Response"
                                    type="button" role="tab" aria-controls="Response" aria-selected="true">Response
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button onclick="showResponse()" class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#status200"
                                    type="button" role="tab" aria-controls="status200" aria-selected="false">200
                            </button>
                        </li>

                    </ul>
                </div>


                <div class="tab-content" id="myResponseTabContent">
                    <div class="row justify-content-between" style="width: 100%;margin: 0;font-size: 12px">
                        <div class="col-4">Body</div>
                        <div class="col-4" id="status">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                 class="bi bi-globe" viewBox="0 0 16 16">
                                <path
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                            </svg>
                            <label for="status_code">Status:</label>
                            <span id="status_code"></span>
                            <span id="status_text"></span>
                            <label for="time" style="margin-left: 10px">Time:</label>
                            <span id="time"></span>
                            {{--                                <label for="size" style="margin-left: 10px">Size:</label>--}}
                            {{--                                <span id="size"></span>--}}

                        </div>
                    </div>

                    <div class="tab-pane fade show active" id="Response" role="tabpanel" aria-labelledby="home-tab">
                        <div style="width: 100%;margin: 0;padding: 0.5rem">
                            <pre style="color: #ffffff;background-color: #333333;" class="language-json"
                                 data-lang="json"
                                 id="pre"></pre>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="status200" role="tabpanel" aria-labelledby="home-tab">
                        <div style="width: 100%;margin: 0;padding: 0.5rem">
                            <form id="response_table_form">
                                <table class="table table-borderless" id="response_table">
                                    <thead>
                                    <tr>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div style="width: 100%;margin: 0;padding: 0.5rem;text-align: right">
                            <button onclick="save()" type="button" class="btn btn-secondary">Save</button>
                        </div>
                    </div>
                </div>


            </div>
        </main>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script>

    var responseData = {}

    function showResponse() {
        if (!$('#response_table').children('tbody').children('tr').length) {
            $('#response_table').children('tbody').html(getResponeseHtml(0, 1))
        }

        // console.log(Math.floor(Math.random() * 100000))
    }


    function Authorization(type, token = null) {
        $('#authorization_type').html(type)
        $('#authorization_type').val(type)
        $('#authorization_token').attr('value', type)
    }

    function save() {
        var data = $('#response_table_form').serializeArray()
        var tbody = $('#response_table').children('tbody').html()
        // console.log(tbody)
        var url = $('#url').val()
        var methods = $('#method_').val()
        $.post('/docs/save', {"api": url, 'methods': methods, 'data': data, 'tbody': tbody}, function (r) {
            console.log(r)
        })
    }

    function deleteResponseTr(tr) {
        var trId = tr.attr('id')
        if (responseData[trId] != undefined) {
            delete responseData[trId]
        }
        if (tr.siblings().length) {
            tr.remove()
        }

    }

    /**
     *
     * @param input
     */
    function responseChangeKey(input) {
        var trId = input.parents('tr').attr('id')

        if (responseData[trId] == undefined) {
            responseData[trId] = {'key': input.val()}
        } else {
            responseData[trId]['key'] = input.val()
        }
        if(input.parents('tr').data('for')){
            responseData[trId]['for'] = input.parents('tr').data('for')
        }

        console.log(responseData)
    }


    function responseChangeDesc(input) {
        var trId = input.parents('tr').attr('id')

        if (responseData[trId] == undefined) {
            responseData[trId] = {'desc': input.val()}
        } else {
            responseData[trId]['desc'] = input.val()
        }
        if(input.parents('tr').data('for')){
            responseData[trId]['for'] = input.parents('tr').data('for')
        }

        console.log(responseData)
    }

    function responseChangeSelect(select) {
        var select_val = select.val();
        var tr = select.parents('tr')
        if (select_val == 'object') {

            addResponseTr(tr, true)
        }
    }

    function addSibling(tr) {
        addResponseTr(tr)
    }

    function addResponseTr(tr, is_children = false) {
        var level = tr.children('td').first().data('level')
        if (is_children) {
            padding_left = level * 15
            tr.after(getResponeseHtml(padding_left, level + 1,tr))

        } else {
            padding_left = (level - 1) * 15
            tr.before(getResponeseHtml(padding_left, level,tr))
            // tr.after(getResponeseHtml())
        }
    }


    function getNameRandom() {
        var time = new Date().getTime()
        var random = Math.floor(Math.random() * 100000)
        return time + '_' + random
    }

    function getResponeseHtml(padding_left, level,tr) {
        if (level > 1) {
            var trId = tr.attr('id')
            var dataFor = 'data-for="' + trId + '"'
            var tr = '<tr class="level_' + level + '" ' + dataFor + ' id="' + getNameRandom() + '">'

        } else {
            var tr = '<tr class="level_' + level + '" id="' + getNameRandom() + '">'

        }
        var tdKey = '<td data-level ="' + level + '" style="padding-left: ' + padding_left + 'px"><input onchange="responseChangeKey($(this))" name="' + getNameRandom() + '"  placeholder="Key" class="form-control" type="text"></td>'
        var tdSelect = '<td style="width: 20%">' +
            '<select onchange="responseChangeSelect($(this))" class="form-select" aria-label="Default select example" name="' + getNameRandom() + '">' +
            '<option value="object">object</option>' +
            '<option value="string" selected>string</option>' +
            '<option value="integer">integer</option>' +
            '<option value="array">array</option>' +
            '<option value="boolean">boolean</option>' +
            '<option value="null">null</option>' +
            '<option value="any" >any</option>' +
            '</select></td>'
        var tdDesc = '<td style="width: 25%"><input onchange="responseChangeDesc($(this))" name="' + getNameRandom() + '" placeholder="说明" class="form-control" type="text"></td>'
        var buttonGroup = '<td style="width: 1%">' +
            '<div class="btn-group me-2" role="group" aria-label="First group">' +
            '<button onclick="deleteResponseTr($(this).parents(\'tr\'))" type="button" class="btn btn-outline-secondary" >' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> ' +
            '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>' +
            '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>' +
            '</svg>' +
            '</button>' +
            '<button onclick="addSibling($(this).parents(\'tr\'))" type="button" class="btn btn-outline-secondary"  title="添加同节点"> ' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"> ' +
            '<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/> ' +
            '</svg></button></div></td>'
        return html = tr + tdKey + tdSelect + tdDesc + buttonGroup + '</tr>'
    }

    /**
     *
     * @param tr
     */
    function inputChange(tr) {
        var a = tr.parents("tr")
        var next_input = tr.parents("td").next().children('input')
        next_input.attr('name', tr.val())
        if (!endLine(a)) {
            var html = addTr()
            a.after(html)
        }
    }

    /**
     * 添加tr
     * @returns {string}
     */
    function addTr(key = '', value = '', type = '', desc = '') {
        var firstBtn = '<td class="td-delete" width="3%" style="text-align: center"><button onclick="deleteTr($(this))" class="btn btn-sm btn-delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></button></td>'
        var tdKey = '<td><input onchange="inputChange($(this))" placeholder="Key" class="form-control docs-input" type="text"  value="' + key + '"></td>'
        var tdValue = '<td><input  placeholder="Value" class="form-control docs-input" type="text" name="' + key + '" value="' + value + '">'
        var tdDescription = '<td><input  placeholder="Description" class="form-control docs-input" type="text" value="' + desc + '"></td>'
        var tdEnd = '<td></td>'
        return "<tr>" + firstBtn + tdKey + tdValue + tdDescription + tdEnd + "</tr>"
    }

    /**
     * 删除tr
     * @param button
     */
    function deleteTr(button) {
        var tr = button.parents("tr")
        if (endLine(tr)) {
            console.log("tr remove")
            tr.remove()
        }
    }

    /**
     * 判断是否是最后一行tr
     * @param tr
     * @returns {*}
     */
    function endLine(tr) {
        // console.log(tr.next())
        return tr.next().length
    }

    /**
     *
     * @param v
     */
    function getApiDocsDetail(url, methods) {
        $('#pre').empty()
        $('#status_code').empty()
        $('#status_text').empty()
        $('#time').empty()
        $.post('/docs/detail', {"api": url, 'methods': methods}, function (rep) {
            $('#contact-tab').click()
            var tr = $('#requestBodyTbody').children('tr')
            tr.remove()
            $('#requestBodyTbody').html(addTr())
            var new_tr = $('#requestBodyTbody').children('tr')
            if (rep.annotation) {
                if (rep.annotation.Title.title) {
                    $('#title').html(rep.annotation.Title.title)
                }
                if (rep.annotation.author) {
                    $('#author').html(rep.annotation.author)
                }
                if (rep.annotation.RequestBody) {

                    for (const repKey in rep.annotation.RequestBody) {
                        var key = rep.annotation.RequestBody[repKey].key
                        var value = rep.annotation.RequestBody[repKey].value
                        var desc = rep.annotation.RequestBody[repKey].desc
                        var type = rep.annotation.RequestBody[repKey].type
                        var html = addTr(key, value ?? '', type ?? '', desc ?? '')
                        new_tr.before(html)
                    }
                } else if (rep.request) {

                    for (const repKey in rep.request) {
                        var key = repKey
                        var desc = rep.request[repKey]
                        var html = addTr(key, value ?? '', type ?? '', desc ?? '')
                        new_tr.before(html)
                    }
                } else {
                    var tr = $('#requestBodyTbody').children('tr')
                    tr.remove()
                    $('#requestBodyTbody').html(addTr())
                }
            }
            if(rep.token){
                Authorization('Bearer')
                $('#authorization_token').val(rep.token)
            }
            if (rep.methods) {
                method_chonge(rep.methods[0])
            }
            if (rep.url) {
                $('#url').val(rep.url)
            }
            if (rep.response_table_tbody) {
                $('#response_table').children('tbody').html(rep.response_table_tbody.tbody)
                var data = rep.response_table_tbody.data
                for (const dataKey in data) {
                    // console.log(data[dataKey].value)
                    $('[name="' + data[dataKey].name + '"]').val(data[dataKey].value)
                }
            } else {
                $('#response_table').children('tbody').children('tr').remove()
                $('#response_table').children('tbody').html(getResponeseHtml(0, 1))
            }
        })
    }

    /**
     * 发送请求
     */
    function send() {
        var method = $('#method_').val()
        var url = '{{ $host }}' + $('#url').val()

        var headers = $('#header_form').serializeJSON()
        var body_data = $('#body_form').serializeJSON()

        var authorization_data = $('#authorization_form').serializeJSON();
        for (const authorizationDataKey in authorization_data) {
            var value = $('#authorization_token').attr('value')
            authorization_data[authorizationDataKey] = value + ' ' + authorization_data[authorizationDataKey]
        }
        console.log(authorization_data)
        var headers_data = Object.assign(headers, authorization_data);
        body_data = unsetBodyData(body_data)
        request(url, headers_data, body_data, method)
    }

    function unsetBodyData(body_data) {
        for (const bodyDataKey in body_data) {
            if (body_data[bodyDataKey] == '' || body_data[bodyDataKey] == undefined) {
                delete body_data[bodyDataKey]
            }
        }
        console.log(body_data)
        return body_data
    }

    /**
     *
     * @param url
     * @param headers
     * @param body_data
     * @constructor
     */
    function request(url, headers, body_data, method) {
        var ajaxTime = new Date().getTime();
        $.ajax({
            headers: headers,
            url: url,
            type: method,
            data: body_data,
            dataType: 'json',
            success: function (r) {

            },
            error: function (r) {
                // var pre = $('#pre');

            },
            complete: function (r) {
                setsStatusText(r)
                setTime(ajaxTime)

                var pre = $('#pre');
                if (r.responseJSON) {
                    pre.html(syntaxHighlight(r.responseJSON));
                } else {
                    pre.html(r.responseText);
                }
                // pre.html(syntaxHighlight(r.responseJSON));

            }
        })
    }


    /**
     *
     * @param r
     */
    function setsStatusText(r) {
        var status = r.status
        var statusText = r.statusText
        $('#status_code').html(status)
        $('#status_text').html(statusText)
    }


    /**
     *
     * @param time
     */
    function setTime(ajaxTime) {
        var totalTime = new Date().getTime() - ajaxTime;
        $('#time').html(totalTime + 'ms')
    }


    /**
     *
     * @param json
     * @returns {string}
     */
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

    /**
     *
     * @param method
     */
    function method_chonge(method) {
        $('#method_').html(method)
        $('#method_').val(method)
    }
</script>
</body>
</html>