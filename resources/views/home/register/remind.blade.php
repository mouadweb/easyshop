<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <p>你好!</p>

    <p>感谢你注册星梦购物。
    你的绑定邮箱为：{{$email}}。请点击以下链接激活帐号：</p>


    <a href="http://laravel7.com/home/success?id={{$id}}&token={{$token}}">http://www.laravel.com/home/success?id={{$id}}&token={{$token}}</a>

    <p>
        如果以上链接无法点击，请将上面的地址复制到你的浏览器(如IE)的地址栏进入星梦购物。 （该链接在48小时内有效，48小时后需要重新注册）
    </p>

</body>
</html>