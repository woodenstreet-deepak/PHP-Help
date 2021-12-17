<?php
header('Content-type: text/xml');
?>
  <Response>
  <Say>Thanks for contacting our sales department. Our next available representative will take your call</Say>
    <Dial record="record-from-ringing-dual" timeout="20" timeLimit="3600">
        <Client>MRP</Client>
    </Dial>
</Response>