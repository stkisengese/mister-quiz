<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'QuizMaster Pro')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }
        
        .btn-hover-effect {
            transition: all 0.3s ease;
            transform: translateY(0);
        }
        
        .btn-hover-effect:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .btn-hover-effect:active {
            transform: translateY(1px);
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        
        .input-field {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            border-color: rgba(255, 255, 255, 0.4);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
            outline: none;
        }

        .error-field {
            border-color: rgba(239, 68, 68, 0.6);
        }

        .checkbox-item {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .checkbox-item:hover {
            background: rgba(59, 130, 246, 0.8);
            color: white;
            transform: translateX(5px);
        }

        .checkbox-item input:checked + span {
            background: rgba(37, 99, 235, 1);
            color: white;
        }

        .leaderboard-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .leaderboard-table thead th {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            text-align: left;
            font-weight: 600;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        }

        .leaderboard-table tbody tr {
            background: rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }

        .leaderboard-table tbody tr:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(5px);
        }

        .leaderboard-table tbody td {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>

    @yield('styles')
</head>

<body class="gradient-bg min-h-screen text-white">
    @yield('content')

    <script>
        feather.replace();
    </script>

    @yield('scripts')
</body>

</html>