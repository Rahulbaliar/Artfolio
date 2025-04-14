<?php
include('../includes/config.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Get user's portfolio data
$stmt = $pdo->prepare("SELECT * FROM portfolios WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$portfolio = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | PortfolioPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Sidebar Navigation -->
    <div class="flex h-screen">
        <div class="w-64 bg-indigo-800 text-white p-4">
            <div class="flex items-center space-x-2 p-4 mb-8">
                <i class="fas fa-user-circle text-3xl"></i>
                <span class="font-bold"><?= $_SESSION['username'] ?></span>
            </div>
            <nav>
                <a href="index.php" class="flex items-center space-x-2 p-3 bg-indigo-700 rounded-lg mb-2">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a href="edit-portfolio.php" class="flex items-center space-x-2 p-3 hover:bg-indigo-700 rounded-lg mb-2">
                    <i class="fas fa-edit"></i>
                    <span>Edit Portfolio</span>
                </a>
                <a href="../profile/<?= $_SESSION['username'] ?>" class="flex items-center space-x-2 p-3 hover:bg-indigo-700 rounded-lg mb-2">
                    <i class="fas fa-eye"></i>
                    <span>View Portfolio</span>
                </a>
                <a href="../auth/logout.php" class="flex items-center space-x-2 p-3 text-red-300 hover:bg-indigo-700 rounded-lg mt-8">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8 overflow-y-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Your Dashboard</h1>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500">Portfolio Views</p>
                            <p class="text-2xl font-bold">1,248</p>
                        </div>
                        <i class="fas fa-chart-line text-indigo-500 text-2xl"></i>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500">Last Updated</p>
                            <p class="text-2xl font-bold">
                                <?= $portfolio ? date('M d, Y', strtotime($portfolio['updated_at'] ?? 'now')) : 'Never' ?>
                            </p>
                        </div>
                        <i class="fas fa-calendar-check text-indigo-500 text-2xl"></i>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500">Your Skills</p>
                            <p class="text-2xl font-bold">
                                <?= $portfolio ? substr_count($portfolio['skills'], ',') + 1 : '0' ?>
                            </p>
                        </div>
                        <i class="fas fa-code text-indigo-500 text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white p-6 rounded-xl shadow-md mb-8">
                <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
                <div class="flex flex-wrap gap-4">
                    <a href="edit-portfolio.php" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition flex items-center space-x-2">
                        <i class="fas fa-pen"></i>
                        <span>Edit Portfolio</span>
                    </a>
                    <a href="../profile/<?= $_SESSION['username'] ?>" target="_blank" class="px-6 py-3 border border-indigo-600 text-indigo-600 rounded-lg hover:bg-indigo-50 transition flex items-center space-x-2">
                        <i class="fas fa-external-link-alt"></i>
                        <span>View Live</span>
                    </a>
                    <a href="#" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition flex items-center space-x-2">
                        <i class="fas fa-download"></i>
                        <span>Export PDF</span>
                    </a>
                </div>
            </div>

            <!-- Portfolio Preview -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-xl font-semibold mb-4">Portfolio Preview</h2>
                <?php if ($portfolio): ?>
                    <div class="border border-gray-200 rounded-lg p-6">
                        <div class="flex flex-col md:flex-row gap-6">
                            <?php if ($portfolio['profile_pic']): ?>
                                <img src="../uploads/<?= $portfolio['profile_pic'] ?>" alt="Profile" class="w-32 h-32 rounded-full object-cover border-4 border-indigo-100">
                            <?php else: ?>
                                <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center border-4 border-indigo-100">
                                    <i class="fas fa-user text-4xl text-gray-400"></i>
                                </div>
                            <?php endif; ?>
                            <div>
                                <h3 class="text-2xl font-bold"><?= $portfolio['full_name'] ?? 'Your Name' ?></h3>
                                <p class="text-gray-600 mb-4"><?= $portfolio['bio'] ?? 'A short bio about yourself' ?></p>
                                <div class="flex flex-wrap gap-2">
                                    <?php if ($portfolio['skills']): ?>
                                        <?php foreach (explode(',', $portfolio['skills']) as $skill): ?>
                                            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm"><?= trim($skill) ?></span>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="text-center py-8 text-gray-500">
                        <i class="fas fa-exclamation-circle text-3xl mb-2"></i>
                        <p>You haven't created your portfolio yet!</p>
                        <a href="edit-portfolio.php" class="text-indigo-600 hover:underline mt-2 inline-block">Get started →</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>