<?php session_start();
$connection = mysqli_connect("localhost", "root", "", "chatbox");?>
                <?php
                      $sessionid = $_SESSION['id'];
                      $chatid = $_POST['chatid'];
                      $fetch_query = "SELECT * FROM `messages` WHERE ( from_id = $chatid AND to_id = $sessionid ) OR ( to_id = $chatid AND from_id = $sessionid ) ORDER BY `time_sent` ASC";
                      $fetch_query_run = mysqli_query($connection, $fetch_query);
                      if(mysqli_num_rows($fetch_query_run) > 0){
                        while($fetch_data = mysqli_fetch_array($fetch_query_run)){
                            $time = new DateTime($fetch_data['time_sent']);
                            if($fetch_data['from_id'] == $chatid ){?>
                            <div class="message incoming">
                        <p><?php echo $fetch_data['message']; ?></p>
                        <span><?php echo $time->format('h:i A'); ?></span>
                    </div>
                    <?php }
                    else {
                            $time = new DateTime($fetch_data['time_sent']);
                        ?>
                    
                    <div class="message outgoing">
                        <p><?php echo $fetch_data['message']; ?></p>
                        <span><?php echo $time->format('h:i A');?></span>
                    </div>
                    <?php
                        }}}
                    ?>
                
