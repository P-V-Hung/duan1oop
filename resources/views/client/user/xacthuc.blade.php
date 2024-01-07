<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Xác thực tài khoản</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 60vh;
        }

        .alert {
            border: 1px solid #333;
            width: 400px;
            text-align: center;
        }
        .alert-header{
            padding: 10px 0;
            border-bottom: 3px solid green;
            background-color: green;
            color: #fff;
        }
        .alert-body p{
            padding-top: 10px;
            font-weight: 600;
            font-size: 1.2rem;
        }
        .alert-icon{
            padding: 15px 0;
        }
        .alert-icon i{
            font-size: 6rem;
            color: green;
        }
        .alert-footer{
            border-top:1px solid #cdcdcd;
            padding: 10px 20px;
            display: flex;
            justify-content: end;
            align-items: center;
        }
        .alert-footer a{
            display: block;
            border: 1px solid #333;
            padding: 7px 21px;
            padding-top: 4px;
            text-decoration: none;
            box-shadow: 5px 5px #333;
            color: black;
        }
        .alert-footer a:active{
            transform: translate(5px ,5px);
            box-shadow: none;
        }
    </style>
</head>

<body>
    <div class="alert">
        <div class="alert-header">
            <h1>
                Thông báo
            </h1>
        </div>
        <div class="alert-body">
            <p>
                {{$title}}
            </p>
            <div class="alert-icon">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>
        <div class="alert-footer">
            <a href="/login">Đăng nhập</a>
        </div>
    </div>
</body>

</html>