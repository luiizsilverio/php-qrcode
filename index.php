<?php include 'qrcode.php';

  if (isset($_POST['qr'])) {
    $text = $_POST['qr'];

    $name = md5(time()) . ".png";
    $file = "files/{$name}";

    $options = array(
      'w' => 500,
      'h' => 500
    );

    $generator = new QRCode($text, $options);

    // mostra o QRcode na tela
    // $generator->output_image(); 

    // Create bitmap image
    $image = $generator->render_image();
    imagepng($image, $file);
    imagedestroy($image);

    echo "<p>Imagem gerada com sucesso!</p>";
    echo "<a href='{$file}' target='_blank'>Clique aqui para visualizar</a>";
  }

?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QR Code Generator</title>
</head>
<body>
  <form action="" method="POST">
    <input type="text" name="qr" placeholder="Enter text">
    <button type="submit">Generate!</button>
  </form>
  
</body>
</html>