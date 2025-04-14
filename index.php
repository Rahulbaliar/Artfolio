<?php
session_start();
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Showcase | Build Your Online Presence</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom styles -->
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #6b46c1 0%, #4299e1 100%);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="index.php" class="flex items-center space-x-2">
                    <span class="text-2xl font-bold text-indigo-600">PortfolioPro</span>
                </a>
                <div class="flex space-x-4">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="dashboard/" class="px-4 py-2 text-gray-700 hover:text-indigo-600">Dashboard</a>
                        <a href="auth/logout.php" class="px-4 py-2 text-gray-700 hover:text-indigo-600">Logout</a>
                    <?php else: ?>
                        <a href="auth/login.php" class="px-4 py-2 text-gray-700 hover:text-indigo-600">Login</a>
                        <a href="auth/register.php" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">Sign Up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-gradient text-white py-20">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-6">Showcase Your Work in Style</h1>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Create a stunning portfolio website to highlight your skills, projects, and professional journey.
            </p>
            <div class="space-x-4">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="dashboard/" class="px-8 py-3 bg-white text-indigo-600 rounded-lg font-semibold hover:bg-gray-100 transition">Go to Dashboard</a>
                <?php else: ?>
                    <a href="auth/register.php" class="px-8 py-3 bg-white text-indigo-600 rounded-lg font-semibold hover:bg-gray-100 transition">Get Started</a>
                    <a href="#features" class="px-8 py-3 border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition">Learn More</a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Why Choose PortfolioPro?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition">
                    <div class="text-indigo-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Easy Setup</h3>
                    <p class="text-gray-600">Get your portfolio up and running in minutes with our intuitive dashboard.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition">
                    <div class="text-indigo-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Beautiful Templates</h3>
                    <p class="text-gray-600">Choose from modern, responsive designs that make your work stand out.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition">
                    <div class="text-indigo-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Secure & Private</h3>
                    <p class="text-gray-600">Your data is protected with secure authentication and encryption.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Example Portfolios -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Featured Portfolios</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Portfolio 1 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                    <div class="h-48 bg-indigo-100"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Jane Doe</h3>
                        <p class="text-gray-600 mb-4">Web Developer & Designer</p>
                        <a href="profile/jane_doe" class="text-indigo-600 hover:underline">View Portfolio →</a>
                    </div>
                </div>

                <!-- Portfolio 2 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                    <div class="h-48 bg-blue-100"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">John Smith</h3>
                        <p class="text-gray-600 mb-4">Graphic Designer</p>
                        <a href="profile/john_smith" class="text-indigo-600 hover:underline">View Portfolio →</a>
                    </div>
                </div>

                <!-- Portfolio 3 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                    <div class="h-48 bg-purple-100"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Alex Johnson</h3>
                        <p class="text-gray-600 mb-4">Photographer</p>
                        <a href="profile/alex_johnson" class="text-indigo-600 hover:underline">View Portfolio →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-indigo-700 text-white">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Ready to Build Your Portfolio?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Join thousands of professionals showcasing their work with PortfolioPro.
            </p>
            <a href="<?= isset($_SESSION['user_id']) ? 'dashboard/' : 'auth/register.php' ?>" class="px-8 py-3 bg-white text-indigo-600 rounded-lg font-semibold hover:bg-gray-100 transition">
                <?= isset($_SESSION['user_id']) ? 'Go to Dashboard' : 'Get Started for Free' ?>
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <a href="index.php" class="text-2xl font-bold text-indigo-400">PortfolioPro</a>
                    <p class="text-gray-400 mt-2">Build your online presence with ease.</p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white">Terms</a>
                    <a href="#" class="text-gray-400 hover:text-white">Privacy</a>
                    <a href="#" class="text-gray-400 hover:text-white">Contact</a>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; <?= date('Y') ?> PortfolioPro. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>