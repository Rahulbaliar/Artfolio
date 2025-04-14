<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Portfolio - Create Your Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    <div id="signup-container" class="bg-white bg-opacity-90 rounded-lg shadow-xl w-full max-w-md p-8 transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-2xl">
        <div class="text-center mb-6">
            <div class="bg-gradient-to-r from-purple-600 to-indigo-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto text-white text-2xl font-bold">
                A
            </div>
        </div>
        
        <h2 class="text-purple-800 text-2xl font-semibold text-center mb-2">Create Your Portfolio</h2>
        <p class="text-gray-600 text-center mb-6">Showcase your creative work to the world</p>
        
        <form id="signup-form" class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div class="relative">
                    <input type="text" id="first-name" class="w-full px-4 py-3 border-2 border-gray-300 rounded-md focus:outline-none focus:border-purple-500 focus:ring focus:ring-purple-200 transition-all peer" placeholder=" " required>
                    <label for="first-name" class="absolute left-4 top-3 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-purple-600 peer-focus:bg-white peer-focus:px-1 peer-focus:left-3 peer-not-placeholder-shown:-top-2.5 peer-not-placeholder-shown:text-sm peer-not-placeholder-shown:text-purple-600 peer-not-placeholder-shown:bg-white peer-not-placeholder-shown:px-1 peer-not-placeholder-shown:left-3">
                        First Name
                    </label>
                    <p id="first-name-error" class="text-red-500 text-xs mt-1 hidden">Required</p>
                </div>
                
                <div class="relative">
                    <input type="text" id="last-name" class="w-full px-4 py-3 border-2 border-gray-300 rounded-md focus:outline-none focus:border-purple-500 focus:ring focus:ring-purple-200 transition-all peer" placeholder=" " required>
                    <label for="last-name" class="absolute left-4 top-3 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-purple-600 peer-focus:bg-white peer-focus:px-1 peer-focus:left-3 peer-not-placeholder-shown:-top-2.5 peer-not-placeholder-shown:text-sm peer-not-placeholder-shown:text-purple-600 peer-not-placeholder-shown:bg-white peer-not-placeholder-shown:px-1 peer-not-placeholder-shown:left-3">
                        Last Name
                    </label>
                    <p id="last-name-error" class="text-red-500 text-xs mt-1 hidden">Required</p>
                </div>
            </div>
            
            <div class="relative">
                <input type="text" id="username" class="w-full px-4 py-3 border-2 border-gray-300 rounded-md focus:outline-none focus:border-purple-500 focus:ring focus:ring-purple-200 transition-all peer" placeholder=" " required>
                <label for="username" class="absolute left-4 top-3 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-purple-600 peer-focus:bg-white peer-focus:px-1 peer-focus:left-3 peer-not-placeholder-shown:-top-2.5 peer-not-placeholder-shown:text-sm peer-not-placeholder-shown:text-purple-600 peer-not-placeholder-shown:bg-white peer-not-placeholder-shown:px-1 peer-not-placeholder-shown:left-3">
                    Username
                </label>
                <p id="username-error" class="text-red-500 text-xs mt-1 hidden">Please choose a unique username</p>
            </div>
            
            <div class="relative">
                <input type="email" id="email" class="w-full px-4 py-3 border-2 border-gray-300 rounded-md focus:outline-none focus:border-purple-500 focus:ring focus:ring-purple-200 transition-all peer" placeholder=" " required>
                <label for="email" class="absolute left-4 top-3 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-purple-600 peer-focus:bg-white peer-focus:px-1 peer-focus:left-3 peer-not-placeholder-shown:-top-2.5 peer-not-placeholder-shown:text-sm peer-not-placeholder-shown:text-purple-600 peer-not-placeholder-shown:bg-white peer-not-placeholder-shown:px-1 peer-not-placeholder-shown:left-3">
                    Email Address
                </label>
                <p id="email-error" class="text-red-500 text-xs mt-1 hidden">Please enter a valid email address</p>
            </div>
            
            <div class="relative">
                <input type="password" id="password" class="w-full px-4 py-3 border-2 border-gray-300 rounded-md focus:outline-none focus:border-purple-500 focus:ring focus:ring-purple-200 transition-all peer" placeholder=" " required>
                <label for="password" class="absolute left-4 top-3 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-purple-600 peer-focus:bg-white peer-focus:px-1 peer-focus:left-3 peer-not-placeholder-shown:-top-2.5 peer-not-placeholder-shown:text-sm peer-not-placeholder-shown:text-purple-600 peer-not-placeholder-shown:bg-white peer-not-placeholder-shown:px-1 peer-not-placeholder-shown:left-3">
                    Password
                </label>
                <p id="password-error" class="text-red-500 text-xs mt-1 hidden">Password must be at least 8 characters</p>
            </div>
            
            <div class="relative">
                <select id="creative-field" class="w-full px-4 py-3 border-2 border-gray-300 rounded-md focus:outline-none focus:border-purple-500 focus:ring focus:ring-purple-200 transition-all appearance-none bg-white">
                    <option value="" disabled selected>Select your creative field</option>
                    <option value="visual-art">Visual Art</option>
                    <option value="photography">Photography</option>
                    <option value="illustration">Illustration</option>
                    <option value="graphic-design">Graphic Design</option>
                    <option value="digital-art">Digital Art</option>
                    <option value="animation">Animation</option>
                    <option value="sculpture">Sculpture</option>
                    <option value="fashion">Fashion</option>
                    <option value="jewelry">Jewelry</option>
                    <option value="other">Other</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <p id="creative-field-error" class="text-red-500 text-xs mt-1 hidden">Please select your creative field</p>
            </div>
            
            <div class="flex items-start mb-2">
                <input type="checkbox" id="terms" class="w-4 h-4 mt-1 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                <label for="terms" class="ml-2 text-gray-600 text-sm">
                    I agree to the <a href="#" class="text-purple-600 hover:underline">Terms of Service</a> and <a href="#" class="text-purple-600 hover:underline">Privacy Policy</a>
                </label>
                <p id="terms-error" class="text-red-500 text-xs mt-1 hidden">You must agree to the terms</p>
            </div>
            
            <button type="submit" class="w-full py-3 bg-gradient-to-r from-purple-600 to-indigo-800 text-white font-semibold rounded-md hover:from-purple-700 hover:to-indigo-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 transform transition-all duration-300 hover:-translate-y-0.5 active:translate-y-0">
                Create Your Portfolio
            </button>
        </form>
        
        <div class="text-center mt-5 text-gray-600 text-sm">
            Already have an account? <a href="#" class="text-purple-600 font-semibold hover:underline">Sign in</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('signup-form');
            const firstName = document.getElementById('first-name');
            const lastName = document.getElementById('last-name');
            const username = document.getElementById('username');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const creativeField = document.getElementById('creative-field');
            const terms = document.getElementById('terms');
            
            const firstNameError = document.getElementById('first-name-error');
            const lastNameError = document.getElementById('last-name-error');
            const usernameError = document.getElementById('username-error');
            const emailError = document.getElementById('email-error');
            const passwordError = document.getElementById('password-error');
            const creativeFieldError = document.getElementById('creative-field-error');
            const termsError = document.getElementById('terms-error');
            
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                let isValid = true;
                
                // Validate first name
                if (firstName.value.trim() === '') {
                    firstNameError.classList.remove('hidden');
                    firstName.classList.remove('border-gray-300', 'border-purple-500');
                    firstName.classList.add('border-red-500');
                    isValid = false;
                } else {
                    firstNameError.classList.add('hidden');
                    firstName.classList.remove('border-red-500', 'border-gray-300');
                    firstName.classList.add('border-purple-500');
                }
                
                // Validate last name
                if (lastName.value.trim() === '') {
                    lastNameError.classList.remove('hidden');
                    lastName.classList.remove('border-gray-300', 'border-purple-500');
                    lastName.classList.add('border-red-500');
                    isValid = false;
                } else {
                    lastNameError.classList.add('hidden');
                    lastName.classList.remove('border-red-500', 'border-gray-300');
                    lastName.classList.add('border-purple-500');
                }
                
                // Validate username
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
                
                // Validate email
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email.value)) {
                    emailError.classList.remove('hidden');
                    email.classList.remove('border-gray-300', 'border-purple-500');
                    email.classList.add('border-red-500');
                    isValid = false;
                } else {
                    emailError.classList.add('hidden');
                    email.classList.remove('border-red-500', 'border-gray-300');
                    email.classList.add('border-purple-500');
                }
                
                // Validate password
                if (password.value.length < 8) {
                    passwordError.classList.remove('hidden');
                    password.classList.remove('border-gray-300', 'border-purple-500');
                    password.classList.add('border-red-500');
                    isValid = false;
                } else {
                    passwordError.classList.add('hidden');
                    password.classList.remove('border-red-500', 'border-gray-300');
                    password.classList.add('border-purple-500');
                }
                
                // Validate creative field
                if (creativeField.value === '') {
                    creativeFieldError.classList.remove('hidden');
                    creativeField.classList.remove('border-gray-300', 'border-purple-500');
                    creativeField.classList.add('border-red-500');
                    isValid = false;
                } else {
                    creativeFieldError.classList.add('hidden');
                    creativeField.classList.remove('border-red-500', 'border-gray-300');
                    creativeField.classList.add('border-purple-500');
                }
                
                // Validate terms
                if (!terms.checked) {
                    termsError.textContent = "You must agree to the terms";
                    termsError.classList.remove('hidden');
                    isValid = false;
                } else {
                    termsError.classList.add('hidden');
                }
                
                if (!isValid) {
                    const container = document.getElementById('signup-container');
                    container.classList.add('animate-shake');
                    setTimeout(() => {
                        container.classList.remove('animate-shake');
                    }, 500);
                } else {
                    // If validation passes, you would normally submit the form
                    alert('Account created successfully! Welcome to our creative community.');
                    // Redirect to portfolio setup page
                    // window.location.href = 'portfolio-setup.html';
                }
            });
            
            // Clear errors on input focus
            const inputs = [firstName, lastName, username, email, password, creativeField];
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    const errorId = this.id + '-error';
                    document.getElementById(errorId).classList.add('hidden');
                    this.classList.remove('border-red-500');
                    this.classList.add('border-gray-300');
                });
            });
            
            // Special handling for terms checkbox
            terms.addEventListener('change', function() {
                if (this.checked) {
                    termsError.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>