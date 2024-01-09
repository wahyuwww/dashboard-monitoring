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
            background: #24c0db;
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
            /* text-align: center; */
            color: #d3cdcd;
            width: 470px;
        }

        .login-container {
            /* text-align: center; */
            padding: 20px;
            background-color: rgb(236, 230, 230);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        input {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            margin-top: 5px;
            box-sizing: border-box;
            margin-left: 10px;
            border: none
        }

        .users {
            /* display: flex; */
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
            margin-left: 20px;
            cursor: pointer;
            width: 87%;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .password {
      margin-left: 10px;
      margin-bottom: 10px;
            color: #000
        }

        /* #showPassword {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            background-color: red
        } */

        .login-text{
            margin-left: 20px;
        }
        .password-container {
            margin: 5px 15px 2px 10px
        }
        i {
            color: #00000081;
            margin-top: 10px
        }
        strong {
          margin-left: 20px;
          margin-right: 20px;
          font-weight: 200;
        color: red;
padding-top: -50px;
        font-size: 10px;
        }

    </style>
</head>

<body>
    <div class="overlay"></div>

    <div class="content">
        <div class="login-container">
            <h2 class="login-text">Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="users">
                    <label class="password" for="password">Email:</label>
                    <input type="text" name="email" placeholder="Masukan email" required>
                </div>
                @error('email')
                <strong>{{$message }}</strong>
                {{-- <span class="invalid-feedback" role="alert">
                </span> --}}
                @enderror <div class="users">
                   <label class="password" for="password">Password:</label>
                  <input oninput="validatePassword()" type="password" id="password" name="password" placeholder="Enter your password">
                  <div class="validation-message" id="validationMessage"></div>
                   {{-- <i class="eye-icon fas fa-eye" id="togglePassword"></i> --}}
          
                </div>
                @error('password')
                <strong>Password must have at least 8 characters, including at least one uppercase letter, one lowercase letter, one number, and
                one symbol.</strong>
                {{-- <span class="invalid-feedback" role="alert">
                </span> --}}
                @enderror
                <button class="btn" type="submit">Login</button>
            </form>
        </div>
    </div>

</body>
<script>
    function validatePassword() {
    const passwordInput = document.getElementById('password');
    const validationMessage = document.getElementById('validationMessage');
    const password = passwordInput.value;
    
    const hasUpperCase = /[A-Z]/.test(password);
    const hasLowerCase = /[a-z]/.test(password);
    const hasNumber = /\d/.test(password);
    const hasSymbol = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(password);
        const hasMinLength = password.length >= 8;
    
        if (hasUpperCase && hasLowerCase && hasNumber && hasSymbol && hasMinLength) {
        validationMessage.textContent = 'Password is valid.';
        validationMessage.style.color = 'green';
        } else {
        validationMessage.textContent = 'Password must have at least 8 characters, including at least one uppercase letter,
        one lowercase letter, one number, and one symbol.';
        validationMessage.style.color = 'red';
        }
        }
    // const passwordInput = document.getElementById('password');
    // const togglePasswordButton = document.getElementById('togglePassword');

    // togglePasswordButton.addEventListener('click', () => {
    //   const type = passwordInput.type === 'password' ? 'text' : 'password';
    //   passwordInput.type = type;
    //   togglePasswordButton.classList.toggle('fa-eye-slash');
    // });
</script>

</html>