<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $page->getTitle() }}</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @foreach($page->getCssStack() as $css)
            {!! $css !!}
        @endforeach
    </head>
    <body>
        <div class="content-container js-content-container">
            <div class="login-form-container js-login-form-container">
                <form class="js-form">
                    <div class="form-group">
                        <div class="form-error js-email-error"></div>
                        <input type="text" class="form-control js-email-input" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <div class="form-error js-password-error"></div>
                        <input type="password" class="form-control js-password-input">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Ok</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            let settings = {!! json_encode($page->getJsSettings()) !!};
        </script>
        @foreach($page->getJsStack() as $js)
            {!! $js !!}
        @endforeach
    </body>
</html>
