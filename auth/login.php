<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purple Login Form with Tailwind</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        purple: {
                            light: '#9f7aea',
                            DEFAULT: '#805ad5',
                            dark: '#6b46c1',
                        }
                    },
                    animation: {
                        'shake': 'shake 0.5s linear',
                    },
                    keyframes: {
                        shake: {
                            '0%, 100%': { transform: 'translateX(0)' },
                            '10%, 30%, 50%, 70%, 90%': { transform: 'translateX(-5px)' },
                            '20%, 40%, 60%, 80%': { transform: 'translateX(5px)' },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-purple-700 to-blue-500 min-h-screen flex items-center justify-center p-4">
    <div id="login-container" class="bg-white bg-opacity-90 rounded-lg shadow-xl w-full max-w-md p-8 transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-2xl">
        <div class="text-center mb-6">
            <div class="bg-gradient-to-r from-purple-600 to-indigo-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto text-white text-2xl font-bold">
                P
            </div>
        </div>
        
        <h2 class="text-purple-800 text-2xl font-semibold text-center mb-6">Welcome Back</h2>
        
        <form id="login-form" class="space-y-5">
            <div class="relative">
                <input type="text" id="username" class="w-full px-4 py-3 border-2 border-gray-300 rounded-md focus:outline-none focus:border-purple-500 focus:ring focus:ring-purple-200 transition-all peer" placeholder=" " required>
                <label for="username" class="absolute left-4 top-3 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-purple-600 peer-focus:bg-white peer-focus:px-1 peer-focus:left-3 peer-not-placeholder-shown:-top-2.5 peer-not-placeholder-shown:text-sm peer-not-placeholder-shown:text-purple-600 peer-not-placeholder-shown:bg-white peer-not-placeholder-shown:px-1 peer-not-placeholder-shown:left-3">
                    Username or Email
                </label>
                <p id="username-error" class="text-red-500 text-xs mt-1 hidden">Please enter a valid username or email</p>
            </div>
            
            <div class="relative">
                <input type="password" id="password" class="w-full px-4 py-3 border-2 border-gray-300 rounded-md focus:outline-none focus:border-purple-500 focus:ring focus:ring-purple-200 transition-all peer" placeholder=" " required>
                <label for="password" class="absolute left-4 top-3 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-purple-600 peer-focus:bg-white peer-focus:px-1 peer-focus:left-3 peer-not-placeholder-shown:-top-2.5 peer-not-placeholder-shown:text-sm peer-not-placeholder-shown:text-purple-600 peer-not-placeholder-shown:bg-white peer-not-placeholder-shown:px-1 peer-not-placeholder-shown:left-3">
                    Password
                </label>
                <p id="password-error" class="text-red-500 text-xs mt-1 hidden">Password must be at least 6 characters</p>
            </div>
            
            <div class="flex items-center">
                <input type="checkbox" id="remember" class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                <label for="remember" class="ml-2 text-gray-600 text-sm">Remember me</label>
                <div class="ml-auto">
                    <a href="#" class="text-purple-600 text-sm hover:underline">Forgot password?</a>
                </div>
            </div>
            
            <button type="submit" class="w-full py-3 bg-gradient-to-r from-purple-600 to-indigo-800 text-white font-semibold rounded-md hover:from-purple-700 hover:to-indigo-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 transform transition-all duration-300 hover:-translate-y-0.5 active:translate-y-0">
                Login
            </button>
        </form>
        
        <div class="text-center mt-5 text-gray-600 text-sm">
            Don't have an account? <a href="#" class="text-purple-600 font-semibold hover:underline">Sign up</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('login-form');
            const username = document.getElementById('username');
            const password = document.getElementById('password');
            const usernameError = document.getElementById('username-error');
            const passwordError = document.getElementById('password-error');
            
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                let isValid = true;
                
                // Simple validation
                if (username.value.trim() === '') {
                    usernameError.classList.remove('hidden');
                    username.classList.remove('border-gray-300', 'border-purple-500');
                    username.classList.add('border-red-500');
                    isValid = false;
                } else {
                    usernameError.classList.add('hidden');
                    username.classList.remove('border-red-500', 'border-gray-300');
                    username.classList.add('border-purple-500');
                }
                
                if (password.value.length < 6) {
                    passwordError.classList.remove('hidden');
                    password.classList.remove('border-gray-300', 'border-purple-500');
                    password.classList.add('border-red-500');
                    isValid = false;
                } else {
                    passwordError.classList.add('hidden');
                    password.classList.remove('border-red-500', 'border-gray-300');
                    password.classList.add('border-purple-500');
                }
                
                if (!isValid) {
                    const container = document.getElementById('login-container');
                    container.classList.add('animate-shake');
                    setTimeout(() => {
                        container.classList.remove('animate-shake');
                    }, 500);
                } else {
                    // If validation passes, you would normally submit the form
                    // For this demo, let's show a success message
                    alert('Login successful!');
                    // You could redirect the user here: window.location.href = 'dashboard.html';
                }
            });
            
            // Clear errors on input focus
            username.addEventListener('focus', function() {
                usernameError.classList.add('hidden');
                username.classList.remove('border-red-500');
                username.classList.add('border-gray-300');
            });
            
            password.addEventListener('focus', function() {
                passwordError.classList.add('hidden');
                password.classList.remove('border-red-500');
                password.classList.add('border-gray-300');
            });
        });
    </script>
</body>
</html>