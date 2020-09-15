<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CSS</title>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
            crossorigin="anonymous"></script>
 
        <style>
        .btn
        {
            display: block;
            width: 96px;
            height: 32px;
            line-height: 32px;
            background-color: #3692ff;
            color: #fff;
            text-align: center;
        }
 
        .btn.active {
            background-color: red;
        }
 
        .btn > span:last-of-type,
        .btn.active > span:first-of-type
        {
            display: none;
        }
 
        .btn.active > span:last-of-type {
            display: inline;
        }
        </style>
 
        <script>
        $(function(){
            $('.btn').on('click', function(event){
                event.preventDefault();
                $(this).toggleClass('active');
            });
        });
        </script>
    </head>
    <body>
        <a class="btn" href="#">
            <span>Click</span>
            <span>ok</span>
            <a>
                {{$user->id}}
            </a>
        </a>
    </body>
</html>