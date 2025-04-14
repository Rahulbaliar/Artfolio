<?php
include('config.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $bio = $_POST['bio'];
    $skills = $_POST['skills'];
    $website_url = $_POST['website_url'];
    $github_url = $_POST['github_url'];
    $linkedin_url = $_POST['linkedin_url'];
    $user_id = $_SESSION['user_id'];

    // Handle file upload
    $profile_pic = '';
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = '../uploads/';
        $file_name = uniqid() . '_' . basename($_FILES['profile_pic']['name']);
        move_uploaded_file($_FILES['profile_pic']['tmp_name'], $upload_dir . $file_name);
        $profile_pic = $file_name;
    }

    // Check if portfolio exists
    $stmt = $pdo->prepare("SELECT id FROM portfolios WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $exists = $stmt->fetch();

    if ($exists) {
        // Update existing portfolio
        $query = "UPDATE portfolios SET full_name=?, bio=?, skills=?, website_url=?, github_url=?, linkedin_url=?" . 
                 ($profile_pic ? ", profile_pic=?" : "") . " WHERE user_id=?";
        $params = [$full_name, $bio, $skills, $website_url, $github_url, $linkedin_url];
        if ($profile_pic) $params[] = $profile_pic;
        $params[] = $user_id;
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
    } else {
        // Insert new portfolio
        $stmt = $pdo->prepare("INSERT INTO portfolios (user_id, full_name, bio, skills, profile_pic, website_url, github_url, linkedin_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$user_id, $full_name, $bio, $skills, $profile_pic, $website_url, $github_url, $linkedin_url]);
    }

    header("Location: ../dashboard/");
    exit();
}
?>