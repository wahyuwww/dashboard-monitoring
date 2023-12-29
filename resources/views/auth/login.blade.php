<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Welcome</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #000;
        }

        video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.514);
            /* Adjust the alpha value for transparency */
            z-index: 0;
        }

        .content {
            z-index: 1;
            text-align: center;
            color: #fff;
            width: 470px;
        }

        .login-container {
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            margin-left: 10px;
            border: none
        }

        .users {
            display: flex;
            margin: 5px 10px 2px 10px
        }

        .btn {
            display: inline-block;
            padding: 8px 15px;
            font-size: 1.2rem;
            text-decoration: none;
            color: #fff;
            background-color: #3498db;
            border-radius: 5px;
            border: 2px solid #2980b9;
            margin-bottom: 20px;
            margin-top: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            background-color: #2980b9;
            transform: scale(1.1);
        }

        i {
            color: #00000081;
            margin-top: 10px
        }
    </style>
</head>

<body>

    <video autoplay muted loop>
        <source src="{{ asset('video/background.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="overlay"></div>

    <div class="content">
        <div class="login-container">
            <h2>Silahkan Login</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="users">
                    <i class="fas fa-inbox"></i>
                    <input type="text" name="email" placeholder="Masukan email" required>
                </div>
                <div class="users">
                    <i class="fas fa-keyboard"></i>
                    <input type="password" name="password" placeholder="Masukan password" required>
                </div>

                <button class="btn" type="submit">Login</button>
            </form>
        </div>
    </div>

</body>

</html>