<?php
/**
 * Exercise 6: Files (Form + JSON Saving + Reading)
 * To respect "1 exercise = 1 file", this file handles both
 * saving (Part 1) and display (Part 2).
 */

$json_file = 'user_data.json';
$display_mode = false;
$data = [];

// --- FORM PROCESSING (Saving) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Data collection and cleaning
    $new_data = [
        'firstname' => htmlspecialchars(isset($_POST['firstname']) ? $_POST['firstname'] : ''),
        'birth_date' => isset($_POST['birth_date']) ? $_POST['birth_date'] : '',
        'favorite_dish' => isset($_POST['favorite_dish']) ? $_POST['favorite_dish'] : '',
        'color' => isset($_POST['color']) ? $_POST['color'] : '#ffffff'
    ];

    // Save to JSON file
    file_put_contents($json_file, json_encode($new_data, JSON_PRETTY_PRINT));

    // Redirect to self in display mode to avoid re-submission
    header("Location: ?mode=view");
    exit;
}

// --- DISPLAY MODE (Reading) ---
if (isset($_GET['mode']) && $_GET['mode'] === 'view') {
    if (file_exists($json_file)) {
        $json_content = file_get_contents($json_file);
        $data = json_decode($json_content, true);
        $display_mode = true;
    } else {
        echo "No data saved yet.";
        exit;
    }
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise 6 - Profile</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 40px;
            /* Variant 1: Dynamic background color */
            background-color: <?= $display_mode ? $data['color'] : '#f0f0f0' ?>;
            /* Trick for readability if the color is dark, we could add contrast */
        }
        .container { background: white; padding: 20px; border-radius: 8px; max-width: 500px; margin: auto; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .dish-img { max-width: 100%; height: auto; border-radius: 4px; margin-top: 10px; }
    </style>
</head>
<body>

<div class="container">
    <?php if ($display_mode): ?>
        <!-- --- PAGE 2: Data Display --- -->
        
        <h1>Profile of <?= $data['firstname'] ?></h1>
        <?php
        // Variant 2 & 3: Age calculation and Birthday
        if (!empty($data['birth_date'])) {
            $birth_date = new DateTime($data['birth_date']);
            $today = new DateTime();
            $age = $today->diff($birth_date)->y;
            
            // Birthday check (Same Month and Day)
            if ($birth_date->format('m-d') === $today->format('m-d')) {
                echo "<h2 style='color:red'>🎉 Happy Birthday! 🎉</h2>";
            }

            echo "<p>Age: <strong>$age years</strong> (" . ($age >= 18 ? "Adult" : "Minor") . ")</p>";
        }
        ?>

        <p>Favorite dish: <strong><?= $data['favorite_dish'] ?></strong></p>
        
        <!-- Variant 4: Dish image (Simulation with placeholders) -->
        <?php
        // Dummy image URL based on dish name for demo
        $img_url = "https://placehold.co/400x200?text=" . urlencode($data['favorite_dish']);
        ?>
        <img src="<?= $img_url ?>" alt="<?= $data['favorite_dish'] ?>" class="dish-img">
        
        <br><br>
        <a href="?">Edit information</a>
    
    <?php else: ?>
        <!-- --- PAGE 1: Form --- -->
        
        <h1>Your Information</h1>
        <form method="POST">
            <label>First name:</label><br>
            <input type="text" name="firstname" required><br><br>
            
            <label>Birth date:</label><br>
            <input type="date" name="birth_date" required><br><br>
            
            <label>Favorite dish:</label><br>
            <select name="favorite_dish">
                <option value="Pizza">Pizza</option>
                <option value="Sushi">Sushi</option>
                <option value="Raclette">Raclette</option>
                <option value="Salad">Salad</option>
            </select><br><br>
            
            <label>Favorite color (for background):</label><br>
            <input type="color" name="color" value="#ffffff"><br><br>
            
            <button type="submit">Save</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>