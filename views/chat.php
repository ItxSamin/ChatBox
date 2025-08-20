<?php
include ('includes/header.php');
auth();

$user_query = "SELECT * FROM `users` where id = ".$_SESSION['id'];
$user_query_run = mysqli_query($connection, $user_query);
$user_data = mysqli_fetch_array($user_query_run);
$contact_query = "SELECT * FROM `contacts` where user_id = ".$_SESSION['id'];
$contact_query_run = mysqli_query($connection, $contact_query);



?>
    <div class="container">
        <div class="sidebar">
            <div class="header">
                <div class="user_info">
                    <div class="user_pic">
                        <img src="../<?php echo $user_data['image']; ?>" alt="Profile Picture">
                    </div>
                    <div class="user_details">
                        <h4><?php echo $user_data['name']; ?></h4>
                        <p><?php echo $user_data['username']; ?></p>
                    </div>
                    <div class="icons">
                        <i class="fa-regular fa-bell"></i>
                    </div>
                </div>
            </div>

            <div class="messages_list">
                <div class="somesection">
                <div class="heading">
                    <h4><strong>Messages</strong></h4>
                    <i class="fa-regular fa-message"></i>
                </div>
                <!-- <div class="search_area">
                    <input type="text" placeholder="Search chats">
                </div> -->
                </div>

                <div class="messages_pool">
                    <?php while ($contact_data = mysqli_fetch_array($contact_query_run)) {
                        $contact_pool_query = "SELECT `name`, `username`, `image` FROM `users` WHERE id = $contact_data[cont_user_id]";
                        $contact_pool_query_run = mysqli_query($connection, $contact_pool_query);
                        $contact_pool_data = mysqli_fetch_array($contact_pool_query_run);?>
                    <a class="messages_card active" type="button" href="/chat/<?php echo $contact_data['cont_user_id']; ?>">
                        <div class="sender_pic">
                            <img src="../<?php echo $contact_pool_data['image']; ?>">
                        </div>
                        <div class="sender_details">
                            <h4><?php echo $contact_pool_data['name'];?></h4>
                            <p><?php echo $contact_pool_data['username'];?></p>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="chat_area">
            <?php $chat_query = "SELECT `id`,`name`, `username`, `image` FROM `users` WHERE id = $chatid";
                        $chat_query_run = mysqli_query($connection, $chat_query);
                        $chat_data = mysqli_fetch_array($chat_query_run);?>
                <div class="chat_header">
                <div class="user_info">
                    <div class="user_pic">
                        <img src="../<?php echo $chat_data['image']; ?>" alt="Hassam">
                    </div>
                    <div class="user_details">
                        <h4><?php echo $chat_data['name']; ?></h4>
                        <p><?php echo $chat_data['username']; ?></p>
                    </div>
                    <div class="icons">
                        <i class="fa fa-video"></i>
                        <i class="fa fa-phone"></i>
                        <div class="dropdown">
                        <i class="fa fa-ellipsis-v " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        </i>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                <li><a class="dropdown-item" href="/add">Add-Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="chat_display" id="chatDisplay">
               
                
            </div>

            <div class="chat_input" method = "POST" action = "/controller">
                <input type="hidden" id ="to_id" value = "<?php echo $chatid; ?>">
                <input type="text" id ="message" placeholder="Type a message">
                <button type="button" id = "send_btn">
                    <i class="fa fa-paper-plane"></i>
                </button>
                    </div>
                
            
        </div>
    </div>

    <script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type = "text/javascript">
    $(document).ready(function() {
        var chatid = "<?php echo $chatid; ?>";
        function Loadchat(){
            $.ajax({
                url:"/load",
                type:"POST",
                data:{chatid:chatid},
                success: function(responce){
                    $("#chatDisplay").html(responce);
                    $("#chatDisplay").scrollTop($("#chatDisplay")[0].scrollHeight);
                }

            })
        }

        function updateseen(){
            $.ajax({
                url:"/updateseen",
                type:"POST",
                data:{chatid:chatid},
                success: function(responce){
                }
            })
        }

        $("#send_btn").on("click", function(e) {
            e.preventDefault();
            var to_id = $("#to_id").val();
            var message = $("#message").val();
            $.ajax({
                url:"/ajax",
                type:"POST",
                data:{to_id:to_id, message:message},
                success: function(responce){
                    $("#message").val("");  
                    Loadchat();
                    updateseen();
                }
            })
        });



        Loadchat();
        setInterval(Loadchat, 5000);
        setInterval(updateseen, 6000);

    })
</script>


    
<?php include ('includes/footer.php')?>