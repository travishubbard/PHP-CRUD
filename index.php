<?php 

try {
  $db = new PDO('sqlite:cruddemo.sqlite');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  /*
  $stmt = $db->prepare(
    "INSERT INTO messages (title, message, time) 
      VALUES (:title, :message, :time)"
  );
  
  // Bind values directly to statement variables
  $stmt->bindValue(':title', 'Travis', SQLITE3_TEXT);
  $stmt->bindValue(':message', 'Fiddling with it.', SQLITE3_TEXT);
  
  // Format unix time to timestamp
  $formatted_time = date('Y-m-d H:i:s');
  $stmt->bindValue(':time', $formatted_time, SQLITE3_TEXT);

// Execute statement
  $stmt->execute();

  */
  // load demo data
  exec("sqlite3 cruddemo.sqlite < messages.sql");
    
  $messages = $db->query("SELECT * FROM messages");
    
  // Garbage collect db
  $db = null;
} catch (PDOException $ex) {
  echo $ex->getMessage();
}

?>

<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?= '<h1>Messages</h1>'; ?>
    
    <?php foreach ($messages as $msg) { 
      echo '<p>';
        echo '<h4>' . $msg['title'] . '</h4>';
        echo $msg['message']; echo '<br />';
        echo $msg['time'];  
      echo '</p>';
    } ?>
  </body>
</html>