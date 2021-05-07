@section('title', 'Unauthorized access')

<!DOCTYPE html>
<html lang="en">
    <head>

        @include('layouts.AdminLTE._includes._head')

    </head>
    <body class="hold-transition lockscreen">
        <div class="lockscreen-wrapper">
            <div class="text-center text-red">
              <h1><i class="fa fa-fw fa-user-times"></i></h1>
            </div>
            <div class="lockscreen-logo">
                <a href="">Unauthorized access</a>
            </div>
            <div class="text-center">
                <a href="#" onclick="window.history.go(-1); return false;"><button type="button" class="btn btn-block btn-primary btn-lg">Back</button></a>
            </div>
        </div>

        @include('layouts.AdminLTE._includes._script_footer')        
    </body>
</html>