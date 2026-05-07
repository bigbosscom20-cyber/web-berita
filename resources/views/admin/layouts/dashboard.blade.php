<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        .header { background: #4CAF50; color: white; padding: 20px; border-radius: 5px; }
        .content { background: #f4f4f4; padding: 20px; margin-top: 20px; border-radius: 5px; }
        .logout-btn { background: #f44336; color: white; padding: 10px 15px; border: none; cursor: pointer; border-radius: 3px; }
        .logout-btn:hover { background: #d32f2f; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Admin Dashboard</h1>
            <p>Selamat datang, {{ Auth::user()->name ?? 'Admin' }}!</p>
        </div>
        
        <div class="content">
            <h2>Halo, {{ Auth::user()->name ?? 'User' }}!</h2>
            <p>Anda berhasil login ke halaman admin.</p>
            <p>Email: {{ Auth::user()->email ?? '-' }}</p>
            
            <form method="POST" action="{{ route('logout') }}" style="margin-top: 20px;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>