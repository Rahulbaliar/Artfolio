<?php
include('../includes/config.php');

$username = $_GET['username'] ?? '';
if (empty($username)) {
    header("Location: ../index.php");
    exit();
}
// Fetch portfolio data
$stmt = $pdo->prepare("SELECT u.username, p.* FROM users u LEFT JOIN portfolios p ON u.id = p.user_id WHERE u.username = ?");
$stmt->execute([$username]);
$portfolio = $stmt->fetch();

if (!$portfolio) die("Portfolio not found");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $portfolio['full_name'] ?? $username ?> | Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .hero-pattern {
            background-image: radial-gradient(circle at 10% 20%, rgba(91, 33, 182, 0.1) 0%, rgba(99, 102, 241, 0.05) 90%);
        }
    </style>
</head>
<body class="hero-pattern">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="../" class="text-2xl font-bold text-indigo-600">PortfolioPro</a>
            <?php if (isset($_SESSION['user_id']) && $_SESSION['username'] === $username): ?>
                <a href="../dashboard/" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Edit Portfolio
                </a>
            <?php endif; ?>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 py-12">
        <!-- Profile Section -->
        <section class="flex flex-col md:flex-row gap-12 items-center mb-16">
            <div class="w-full md:w-1/3 flex justify-center">
                <?php if ($portfolio['profile_pic']): ?>
                    <img src="../uploads/<?= $portfolio['profile_pic'] ?>" alt="Profile" 
                         class="w-64 h-64 rounded-full object-cover border-8 border-white shadow-lg">
                <?php else: ?>
                    <div class="w-64 h-64 rounded-full bg-gray-200 flex items-center justify-center border-8 border-white shadow-lg">
                        <i class="fas fa-user text-6xl text-gray-400"></i>
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-full md:w-2/3">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4"><?= $portfolio['full_name'] ?? $username ?></h1>
                <p class="text-xl text-gray-600 mb-6"><?= $portfolio['bio'] ?? 'Welcome to my portfolio!' ?></p>
                
                <?php if ($portfolio['skills']): ?>
                    <div class="flex flex-wrap gap-2 mb-8">
                        <?php foreach (explode(',', $portfolio['skills']) as $skill): ?>
                            <span class="px-4 py-2 bg-indigo-100 text-indigo-800 rounded-full font-medium"><?= trim($skill) ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="flex gap-4">
                    <?php if ($portfolio['website_url']): ?>
                        <a href="<?= $portfolio['website_url'] ?>" target="_blank" class="p-3 bg-white rounded-full shadow-md text-indigo-600 hover:bg-indigo-50 transition">
                            <i class="fas fa-globe text-xl"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($portfolio['github_url']): ?>
                        <a href="<?= $portfolio['github_url'] ?>" target="_blank" class="p-3 bg-white rounded-full shadow-md text-gray-800 hover:bg-gray-100 transition">
                            <i class="fab fa-github text-xl"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($portfolio['linkedin_url']): ?>
                        <a href="<?= $portfolio['linkedin_url'] ?>" target="_blank" class="p-3 bg-white rounded-full shadow-md text-blue-600 hover:bg-blue-50 transition">
                            <i class="fab fa-linkedin-in text-xl"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 border-b pb-2">Featured Projects</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Project 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="h-48 bg-indigo-100"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">E-Commerce Website</h3>
                        <p class="text-gray-600 mb-4">A fully responsive online store with payment integration.</p>
                        <div class="flex gap-2">
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm">PHP</span>
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm">MySQL</span>
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm">JavaScript</span>
                        </div>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="h-48 bg-blue-100"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Task Management App</h3>
                        <p class="text-gray-600 mb-4">A productivity app for team collaboration.</p>
                        <div class="flex gap-2">
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm">React</span>
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm">Node.js</span>
                        </div>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="h-48 bg-purple-100"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Portfolio Template</h3>
                        <p class="text-gray-600 mb-4">A customizable portfolio template for creatives.</p>
                        <div class="flex gap-2">
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm">HTML/CSS</span>
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm">JavaScript</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="bg-white rounded-xl shadow-md p-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Get In Touch</h2>
            <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-gray-700 mb-2">Your Name</label>
                    <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="email" class="block text-gray-700 mb-2">Your Email</label>
                    <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>
                <div class="md:col-span-2">
                    <label for="message" class="block text-gray-700 mb-2">Message</label>
                    <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"></textarea>
                </div>
                <button type="submit" class="md:col-span-2 px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-semibold">
                    Send Message
                </button>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <p>&copy; <?= date('Y') ?> <?= $portfolio['full_name'] ?? $username ?>. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>