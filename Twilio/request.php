<?php
header('Content-type: text/xml');

if(isset($_POST['To']) && $_POST['To'] !== '447862127770' && $_POST['To'] !== '+447862127770'){ ?>
<Response>
    <Dial record="record-from-ringing-dual" callerId="+447862127770"><?php  echo $_POST['To'];?></Dial>
</Response>
<?php }else{ ?>
    <Response>
        <Dial callerId="<?php  echo $_POST['Caller'];?>" record="false" timeout="20" timeLimit="3600">
            <Client>MRP</Client>
        </Dial>
    </Response>
<?php } ?>
