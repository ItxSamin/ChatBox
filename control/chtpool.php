<?php 
session_start();
$connection = new mysqli("localhost", "root", "", "chatbox");

$sessionid = $_SESSION['id'];

$contact_query = "SELECT c.*, m.message as last_message, m.time_sent as last_time, m.from_id as last_from
                  FROM contacts c
                  LEFT JOIN messages m ON c.last_msg = m.id
                  WHERE c.user_id = $sessionid
                  ORDER BY m.time_sent DESC, c.id DESC";

$contact_query_run = mysqli_query($connection, $contact_query);

if(mysqli_num_rows($contact_query_run) > 0) {
    while ($contact_data = mysqli_fetch_array($contact_query_run)) {

        $contact_pool_query = "SELECT `id`, `name`, `username`, `image` FROM `users` WHERE id = $contact_data[cont_user_id]";
        $contact_pool_query_run = mysqli_query($connection, $contact_pool_query);
        $contact_pool_data = mysqli_fetch_array($contact_pool_query_run);
        

        $last_message_display = "No new messages yet";
        
        if (!empty($contact_data['last_message'])) {
            $last_message = $contact_data['last_message'];
            
            if (strlen($last_message) > 35) {
                $last_message = substr($last_message, 0, 35) . '...';
            }

                $last_message_display = $last_message;

        }
        ?>
        <a class="messages_card active" href="/chat/<?php echo $contact_data['cont_user_id']; ?>">
            <div class="sender_pic">
                <img src="../<?php echo $contact_pool_data['image']; ?>" alt="<?php echo $contact_pool_data['name']; ?>">
            </div>
            <div class="sender_details">
                <div class="sender_info">
                    <h4><?php echo $contact_pool_data['name']; ?></h4>
                    
                </div>
                <p><?php echo $last_message_display; ?></p>
            </div>
        </a>
        <?php
    }
} else {
    echo "No contacts found.";
}
?>