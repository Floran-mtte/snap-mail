<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SnapMail</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .form-title {
                text-align: center;
            }

            .mail_form {
                width: 20%;
                margin: auto;
            }

            #email_user {
                width: 100%;
            }
            #mail_content {
                width: 100%;
                height: 200px;
            }

            #send_mail {
                width: 20%;
                border: 1px solid grey;
                background: none;
                padding: 5px;
            }

            #send_mail:hover {
                background: grey;
                color: white;
            }
        </style>
    </head>
    <body>
        <div class="flex-center">
            <h1>Snap Mail</h1>
        </div>
        <div class="mail_form">
            <form method="post" action="/">
                {{csrf_field()}}
                <h3 class="form-title">Envoyer un e-mail</h3>
                <div class="sender">
                    <label for="email_user">Destinataire</label>
                    <br>
                    <input id="email_user" type="email" name="email_user">
                </div>

                <div class="message">
                    <label for="mail_content">Message</label>
                    <br>
                    <textarea id="mail_content" name="mail_content"></textarea>
                </div>

                <input type="submit" value="Envoyer" id="send_mail">
            </form>
        </div>
    </body>
</html>
