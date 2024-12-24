<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $wish = trim($_POST['wish']);

    if (!empty($wish)) {
        // Path to the file on your desktop
        $filePath = '/Users/YourUsername/Desktop/wishes.txt'; // For macOS/Linux
        // $filePath = 'C:\\Users\\YourUsername\\Desktop\\wishes.txt'; // For Windows

        // Sanitize the input to avoid issues
        $sanitizedWish = htmlspecialchars($wish);

        // Prepare the entry to be saved
        $entry = "Wish: " . $sanitizedWish . "\nDate: " . date("Y-m-d H:i:s") . "\n\n";

        // Write the entry to the file
        if (file_put_contents($filePath, $entry, FILE_APPEND | LOCK_EX)) {
            echo "🎉 Thank you for your wish! It has been saved.";
        } else {
            echo "⚠️ Oops! Could not save your wish. Please try again.";
        }
    } else {
        echo "⚠️ Please write a wish before submitting.";
    }
} else {
    echo "⚠️ Invalid request method.";
}
?>
