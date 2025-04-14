<?php
include('includes/config.php');

$username = $_GET['username'] ?? '';
if (empty($username)) {
    header("Location: index.php");
    exit();
}

// Get user and portfolio data
$stmt = $pdo->prepare("SELECT u.username, p.* FROM users u LEFT JOIN portfolios p ON u.id = p.user_id WHERE u.username = ?");
$stmt->execute([$username]);
$data = $stmt->fetch();

if (!$data) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['full_name'] ?? $username ?>'s Portfolio</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="portfolio-container">
        <?php if ($data['profile_pic']): ?>
            <img src="uploads/<?= $data['profile_pic'] ?>" alt="Profile Picture" class="profile-pic">
        <?php endif; ?>
        <h1><?= $data['full_name'] ?? $username ?></h1>
        <p class="bio"><?= $data['bio'] ?? 'No bio yet.' ?></p>
        
        <?php if ($data['skills']): ?>
            <div class="skills">
                <h3>Skills</h3>
                <ul>
                    <?php foreach (explode(',', $data['skills']) as $skill): ?>
                        <li><?= trim($skill) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="social-links">
            <?php if ($data['website_url']): ?>
                <a href="<?= $data['website_url'] ?>" target="_blank">Website</a>
            <?php endif; ?>
            <?php if ($data['github_url']): ?>
                <a href="<?= $data['github_url'] ?>" target="_blank">GitHub</a>
            <?php endif; ?>
            <?php if ($data['linkedin_url']): ?>
                <a href="<?= $data['linkedin_url'] ?>" target="_blank">LinkedIn</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>