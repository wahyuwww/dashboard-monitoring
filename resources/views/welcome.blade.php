<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Website Kami</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #fff;
            overflow: hidden;
            background: linear-gradient(45deg, #3498db, #9b59b6);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        h1 {
            font-size: 3rem;
            overflow: hidden;
            white-space: nowrap;
            border-right: 2px solid #fff;
            margin: 0;
            padding-right: 10px;
            display: inline-block;
        }

        p {
            font-size: 1.2rem;
            margin-top: 20px;
        }

    </style>
</head>

<body>

    <div class="container">
        <h1>Selamat Datang di Nasari Digital</h1>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
      const heading = document.querySelector('h1');
      const text = "Selamat Datang di Nasari Digital";
      let index = 0;

      function type() {
        heading.textContent = text.slice(0, index);
        index++;

        if (index <= text.length) {
          setTimeout(type, 100); 
        }
      }

      type();
    });
    </script>

</body>

</html>