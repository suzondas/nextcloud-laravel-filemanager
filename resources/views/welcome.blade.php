<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Nextcloud File Manager using Laravel </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href=" {{asset('font-awesome/css/font-awesome.min.css')}}"/>

    <script type="text/javascript" src=" {{asset('js/jquery-1.10.2.min.js')}}"></script>
    <script type="text/javascript" src=" {{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>

<div class="container">

    <div class="page-header">
        <h1>File Manager
            <small>Nextcloud WebDav</small>
        </h1>
    </div>

    <!-- File Manager - START -->

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="row">
                        <ul class="collapse navbar-collapse nav navbar-nav navbar-left" id="options">
                            <li><a href="/"><i class="fa fa-home fa-lg">Home</i> </a></li>
                            <li>
                                <a href="" data-toggle="modal"
                                        data-target="#exampleModal">
                                   <i class="fa fa-file fa-lg"></i> Add a File</a>
                            </li>
                            <li style="padding-left: 5px;">
                                <a href="" data-toggle="modal"
                                   data-target="#exampleModal2">
                                    <i class="fa fa-folder fa-lg"></i> Add a Folder</a>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-info" style="padding:10px;">
                        <b> Current Path:</b> /{{$currPath}}
                    </div>
                    <div class="panel-body pb-filemng-panel-body">

                        <div class="row">
                            <div class="col-sm-12 col-md-12 pb-filemng-template-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th>File/Folder Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($response as $item)
                                        <tr>
                                            <td>
                                                @if($item["type"] === 'dir')
                                                    <i class="fa fa-folder fa-lg"></i>
                                                @elseif($item["type"] === 'file')
                                                    <i class="fa fa-file fa-lg"></i>
                                                @endif
                                                <div class="header">{{$item["basename"]}}</div>
                                            </td>
                                            <td>
                                                @if($item["type"] === 'dir')
                                                    <a class="btn" href="/?dirname={{$item["path"]}}"><i
                                                                class="fa fa-expand fa-lg"></i> Open </a>
                                                @elseif($item["type"] === 'file')
                                                    <a class="btn"
                                                       href="http://v2202104146053149958.hotsrv.de/nextcloud/remote.php/webdav/{{$item["path"]}}"
                                                       target="_blank"><i class="fa fa-eye fa-lg"></i> View</a>
                                                @endif
                                                <a class="btn"
                                                   href="delete?path={{$item["path"]}}&currPath={{$currPath}}"><i
                                                            class="fa fa-trash fa-lg"></i> Remove</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Add a file</h2>

            </div>
            <div class="modal-body">
                <form action="newFile" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    File Content: <textarea name="fileContent" class="form-control w-50"></textarea><br>
                    File Name: <input type="text" name="fileName" class="form-control w-50"/><br>
                    <input type="hidden" value="{{$currPath}}" name="currPath"/>
                    <input type="submit" value="Save"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Add a Folder</h2>

            </div>
            <div class="modal-body">
                <form action="newFolder" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    Folder Name: <input type="text" name="folderName" class="form-control w-50"/><br>
                    <input type="hidden" value="{{$currPath}}" name="currPath"/>
                    <input type="submit" value="Save"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>