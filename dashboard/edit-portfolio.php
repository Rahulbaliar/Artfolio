<?php
include('../includes/config.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Fetch existing portfolio
$stmt = $pdo->prepare("SELECT * FROM portfolios WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$portfolio = $stmt->fetch();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ... (same save logic as before, but add this at the end)
    header("Location: edit-portfolio.php?success=1");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Portfolio | PortfolioPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        // Live preview functionality
        function updatePreview() {
            document.getElementById('preview-name').innerText = document.getElementById('full_name').value || 'Your Name';
            document.getElementById('preview-bio').innerText = document.getElementById('bio').value || 'A short bio about yourself';
            
            // Update skills
            const skillsContainer = document.getElementById('preview-skills');
            skillsContainer.innerHTML = '';
            const skills = document.getElementById('skills').value.split(',');
            skills.forEach(skill => {
                if (skill.trim()) {
                    const skillEl = document.createElement('span');
                    skillEl.className = 'px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm';
                    skillEl.innerText = skill.trim();
                    skillsContainer.appendChild(skillEl);
                }
            });
            
            // Update profile picture preview
            const fileInput = document.getElementById('profile_pic');
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-avatar').src = e.target.result;
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar (same as dashboard) -->
        <?php include('../template/portfolio-template.php'); ?>

        <!-- Main Content -->
        <div class="flex-1 p-8 overflow-y-auto">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Edit Portfolio</h1>
                <?php if (isset($_GET['success'])): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        Portfolio updated successfully!
                    </div>
                <?php endif; ?>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Edit Form -->
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <form action="edit-portfolio.php" method="POST" enctype="multipart/form-data" oninput="updatePreview()">
                        <div class="space-y-6">
                            <!-- Profile Picture -->
                            <div>
                                <label class="block text-gray-700 mb-2">Profile Picture</label>
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <img id="current-avatar" src="<?= $portfolio && $portfolio['profile_pic'] ? '../uploads/' . $portfolio['profile_pic'] : 'https://via.placeholder.com/150' ?>" 
                                             class="w-20 h-20 rounded-full object-cover border-2 border-gray-200">
                                        <label for="profile_pic" class="absolute bottom-0 right-0 bg-indigo-600 text-white p-1 rounded-full cursor-pointer">
                                            <i class="fas fa-camera text-xs"></i>
                                            <input type="file" id="profile_pic" name="profile_pic" accept="image/*" class="hidden">
                                        </label>
                                    </div>
                                    <span class="text-gray-500 text-sm">JPG/PNG (max 2MB)</span>
                                </div>
                            </div>

                            <!-- Full Name -->
                            <div>
                                <label for="full_name" class="block text-gray-700 mb-2">Full Name</label>
                                <input type="text" id="full_name" name="full_name" value="<?= $portfolio['full_name'] ?? '' ?>" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <!-- Bio -->
                            <div>
                                <label for="bio" class="block text-gray-700 mb-2">Bio</label>
                                <textarea id="bio" name="bio" rows="4" 
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"><?= $portfolio['bio'] ?? '' ?></textarea>
                            </div>

                            <!-- Skills -->
                            <div>
                                <label for="skills" class="block text-gray-700 mb-2">Skills (comma separated)</label>
                                <input type="text" id="skills" name="skills" value="<?= $portfolio['skills'] ?? '' ?>" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <p class="text-gray-500 text-sm mt-1">Example: Web Design, PHP, JavaScript</p>
                            </div>

                            <!-- Social Links -->
                            <div class="space-y-4">
                                <h3 class="font-semibold text-gray-700">Social Links</h3>
                                <div>
                                    <label for="website_url" class="block text-gray-700 mb-2">Website URL</label>
                                    <input type="url" id="website_url" name="website_url" value="<?= $portfolio['website_url'] ?? '' ?>" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                <div>
                                    <label for="github_url" class="block text-gray-700 mb-2">GitHub</label>
                                    <input type="url" id="github_url" name="github_url" value="<?= $portfolio['github_url'] ?? '' ?>" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                <div>
                                    <label for="linkedin_url" class="block text-gray-700 mb-2">LinkedIn</label>
                                    <input type="url" id="linkedin_url" name="linkedin_url" value="<?= $portfolio['linkedin_url'] ?? '' ?>" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 transition font-semibold">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Live Preview -->
                <div class="bg-white p-6 rounded-xl shadow-md sticky top-8">
                    <h2 class="text-xl font-semibold mb-4 border-b pb-2">Live Preview</h2>
                    <div class="flex flex-col items-center text-center p-6 border border-gray-200 rounded-lg">
                        <img id="preview-avatar" src="<?= $portfolio && $portfolio['profile_pic'] ? '../uploads/' . $portfolio['profile_pic'] : 'https://via.placeholder.com/150' ?>" 
                             class="w-32 h-32 rounded-full object-cover border-4 border-indigo-100 mb-4">
                        <h3 id="preview-name" class="text-2xl font-bold"><?= $portfolio['full_name'] ?? 'Your Name' ?></h3>
                        <p id="preview-bio" class="text-gray-600 mb-4"><?= $portfolio['bio'] ?? 'A short bio about yourself' ?></p>
                        <div id="preview-skills" class="flex flex-wrap justify-center gap-2">
                            <?php if ($portfolio && $portfolio['skills']): ?>
                                <?php foreach (explode(',', $portfolio['skills']) as $skill): ?>
                                    <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm"><?= trim($skill) ?></span>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="mt-6 text-center">
                        <a href="../profile/<?= $_SESSION['username'] ?>" target="_blank" class="text-indigo-600 hover:underline">
                            <i class="fas fa-external-link-alt mr-1"></i> View full portfolio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>