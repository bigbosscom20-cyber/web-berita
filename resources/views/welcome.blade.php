<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Laravel - Aplikasi Hebat</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            width: 100%;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(10px);
            text-align: center;
        }

        .logo {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        h1 {
            font-size: 3.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .subtitle {
            font-size: 1.2rem;
            color: #4a5568;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .divider {
            width: 100px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 2rem auto;
            border-radius: 3px;
        }

        .links {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.8rem 1.8rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary {
            background: #48bb78;
            color: white;
        }

        .btn-secondary:hover {
            background: #38a169;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: #f56565;
            color: white;
        }

        .btn-danger:hover {
            background: #e53e3e;
            transform: translateY(-2px);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid #667eea;
            color: #667eea;
        }

        .btn-outline:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
            padding-top: 2rem;
        }

        .feature {
            padding: 1.5rem;
            background: #f7fafc;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .feature:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .feature h3 {
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .feature p {
            color: #718096;
            font-size: 0.9rem;
        }

        .footer {
            margin-top: 3rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .card {
                padding: 2rem;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .subtitle {
                font-size: 1rem;
            }
            
            .features {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="logo">🚀</div>
            <h1>Laravel</h1>
            <p class="subtitle">
                Framework PHP yang elegan dan powerful<br>
                untuk pengembangan web modern
            </p>
            <div class="divider"></div>

            @if (Route::has('login'))
                <div class="links">
                    @auth
                        <a href="{{ url('/admin/dashboard') }}" class="btn btn-primary">
                            📊 Dashboard Admin
                        </a>
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                🚪 Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            🔐 Login
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-secondary">
                                📝 Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="features">
                <div class="feature">
                    <div class="feature-icon">⚡</div>
                    <h3>Fast & Efficient</h3>
                    <p>Performa tinggi dengan berbagai fitur caching dan optimasi</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">🔒</div>
                    <h3>Secure</h3>
                    <p>Keamanan terjamin dengan proteksi CSRF, XSS, dan SQL injection</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">🎨</div>
                    <h3>Modern</h3>
                    <p>Mendukung teknologi modern seperti Vite, Tailwind, dan Livewire</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">📦</div>
                    <h3>Ecosystem</h3>
                    <p>Ekosistem lengkap dengan berbagai package official</p>
                </div>
            </div>
        </div>
        
        <div class="footer">
            <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
            <p style="margin-top: 0.5rem;">&copy; {{ date('Y') }} Laravel. All rights reserved.</p>
        </div>
    </div>
</body>
</html>