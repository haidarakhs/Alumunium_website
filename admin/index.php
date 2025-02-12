<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md text-center">
        <div class="logo mb-4">
            <img src="image/logo.png" alt="Logo" class="w-24 mx-auto">
        </div>
        <h3 class="text-2xl font-semibold mb-6">Login Sekarang</h3>
        <form action="dashboard.php" method="post">
            <div class="mb-4">
                <input type="text" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Username" name="username" required>
            </div>
            <div class="mb-4">
                <input type="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Password" name="password" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300">Login</button>
        </form>
    </div>
</body>
</html>
