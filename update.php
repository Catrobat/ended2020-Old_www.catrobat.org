<?php
if (isset($_SERVER['HTTP_X_HUB_SIGNATURE']) && isset($_SERVER['HTTP_X_GITHUB_EVENT']) && $_SERVER['HTTP_X_GITHUB_EVENT'] === "push") {

  // get payload, delivered hash and calculate expected hash
  $payload = file_get_contents('php://input');
  $hmac_delivered = $_SERVER['HTTP_X_HUB_SIGNATURE'];
  $hmac_expected = "sha1=" . hash_hmac("sha1", $payload, webhooks_secret);

  // collect some information
  $str = "Date: " . date("Y-m-d H:i:s") . "\n";
  $str .= "Origin: " . $_SERVER["REMOTE_ADDR"] . "\n";

  $str .= "Expected HMAC: $hmac_expected\n";
  $str .= "Delivered HMAC: $hmac_delivered\n";
  
  // check if hashes match
  if (hash_equals ($hmac_expected, $hmac_delivered)) {
    $str .= "HMAC is ok!\n";
    $payload = json_decode($payload);
    if ($payload->ref === "refs/heads/master") {
      $str .= "HEAD commit: " . $payload->head_commit->id . "\n  ";
      $str .= $payload->head_commit->message . "\n  - " . $payload->head_commit->author->name . " (" . $payload->head_commit->author->email . ")\n";
      $str .= "Pulling changes...\n";
      $str .= shell_exec("git pull");
    } else {
      $str .= "Only updating on push to master but the pushed ref was " . $payload->ref . "!\n";
    }
    
  } else {
    $str .= "HMAC is invalid!\n";
  }

  file_put_contents("lastupdate.log", $str);
  die($str);
  
}
?>