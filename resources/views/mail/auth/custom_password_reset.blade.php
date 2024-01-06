<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Password Reset</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
            }

            .header {
                background-color: #3498db;
                color: #fff;
                text-align: center;
                padding: 20px;
            }

            .content {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .button {
                background-color: #3498db;
                color: #fff;
                text-decoration: none;
                padding: 10px 20px;
                border-radius: 5px;
                display: inline-block;
            }

            .footer {
                background-color: #f4f4f4;
                text-align: center;
                padding: 10px;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>رابط إعادة تعيين كلمة المرور</h1>
            </div>
            <div class="content">
                <p>مرحبًا!</p>
                <p>لقد قمت بطلب إعادة تعيين كلمة المرور الخاصة بك على موقعنا. للمتابعة، يرجى النقر على الزر أدناه:</p>
                <p>
                    <a href="{{ $resetUrl }}" class="button">إعادة تعيين كلمة المرور</a>
                </p>
                <p>إذا لم تكن قد قمت بطلب إعادة تعيين كلمة المرور، يرجى تجاهل هذا البريد الإلكتروني.</p>
                <p>شكرًا لك!</p>
            </div>
            <div class="footer">
                &copy; {{ date('Y') }} FrameCar
            </div>
        </div>
    </body>
</html>
