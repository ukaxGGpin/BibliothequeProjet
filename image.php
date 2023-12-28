<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Bibliotheque LSB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <form method="post" enctype="multipart/form-data">
      <input type="file" name="image" required>
      <button type="submit">Upload Image</button>
  </form>

  <?php
   require_once('connexionSql.php'); 

   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $apiKey = 'cd6a844e5d84206dbc55078915239910'; // Replace with your imgbb API key
    $imagePath = $_FILES['image']['tmp_name']; // Path to the uploaded image file

    // Call the function and get the response
    $response = uploadToImgbb($imagePath, $apiKey, 600); // 600 seconds expiration

    if ($response['success']) {
        // Extract the image URL from the response
        $imageUrl = $response['data']['url'];

        // SQL to insert new record
        $sql = "INSERT INTO livre images VALUES (:imageUrl)";

        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(':imageUrl', $imageUrl);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }
}

  function uploadToImgbb($filePath, $apiKey, $expiration = null) {
      $url = 'https://api.imgbb.com/1/upload';

      // Check if the file exists
      if (!file_exists($filePath)) {
          return "File does not exist.";
      }

      // Encode the image
      $image = base64_encode(file_get_contents($filePath));

      // Prepare data for POST request
      $data = [
          'key' => $apiKey,
          'image' => $image
      ];

      // Add expiration if set
      if ($expiration) {
          $data['expiration'] = $expiration;
      }

      // Initialize cURL session
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      // Execute POST request and close cURL session
      $response = curl_exec($ch);
      curl_close($ch);

      return json_decode($response, true);
  }
  ?>
</body>

</html>



