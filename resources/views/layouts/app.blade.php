<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Demandas</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: #f4f7f6; 
            color: #333;
            margin: 0; 
            padding: 20px; 
        }
        .container {
            max-width: 800px; /* Centraliza e limita a largura do site */
            margin: 0 auto;
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        h1, h2, h3 { color: #2c3e50; }
        .card { 
            background: #fdfdfd; 
            padding: 15px; 
            border-radius: 6px; 
            margin-bottom: 15px; 
            border: 1px solid #e1e4e8; 
        }
        input { 
            padding: 10px; 
            margin: 5px 0; 
            border-radius: 4px; 
            border: 1px solid #ccc; 
            width: calc(100% - 22px);
            box-sizing: border-box;
        }
        input#search { width: 70%; display: inline-block; }
        button { 
            padding: 10px 15px; 
            cursor: pointer; 
            background: #007bff; 
            color: white; 
            border: none; 
            border-radius: 4px; 
            font-weight: bold;
            transition: background 0.3s;
        }
        button:hover { background: #0056b3; }
        button.delete-btn { background: #dc3545; margin-right: 10px; }
        button.delete-btn:hover { background: #c82333; }
        hr { border: 0; border-top: 1px solid #eee; margin: 20px 0; }
        a { color: #007bff; text-decoration: none; font-weight: bold; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestão de Demandas</h1>
        <hr>
        
        @yield('content')
    </div>

    <script src="/js/app.js"></script>
</body>
</html>