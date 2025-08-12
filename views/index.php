<?php include ('includes/header.php')?>
    <div class="container">
        <div class="sidebar">
            <div class="header">
                <div class="user_info">
                    <div class="user_pic">
                        <img src="assets/img/profile_img.webp" alt="Profile Picture">
                    </div>
                    <div class="user_details">
                        <h4>Samin</h4>
                        <p>@samin_bhai</p>
                    </div>
                    <div class="icons">
                        <i class="fa-regular fa-bell"></i>
                    </div>
                </div>
            </div>

            <div class="messages_list">
                <div class="somesection">
                <div class="heading">
                    <h4>Messages</h4>
                    <i class="fa-regular fa-message"></i>
                </div>
                <div class="search_area">
                    <input type="text" placeholder="Search chats">
                </div>
                </div>

                <div class="messages_pool">
                    <div class="messages_card active">
                        <div class="sender_pic">
                            <img src="assets/img/profile_img.webp" alt="Hassam">
                        </div>
                        <div class="sender_details">
                            <h4>Hassam</h4>
                            <p>Hello, how are you</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="chat_area">
            <div class="chat_header">
                <div class="user_info">
                    <div class="user_pic">
                        <img src="assets/img/profile_img.webp" alt="Hassam">
                    </div>
                    <div class="user_details">
                        <h4>Hassam</h4>
                        <p>@janwar</p>
                    </div>
                    <div class="icons">
                        <i class="fa fa-video"></i>
                        <i class="fa fa-phone"></i>
                        <i class="fa fa-ellipsis-vertical"></i>
                    </div>
                </div>
            </div>

            <div class="chat_display" id="chatDisplay">
                <div class="message incoming">
                    <p>Hey, how are you?</p>
                    <span>10:30 AM</span>
                </div>
                
                <div class="message outgoing">
                    <p>I'm good! How about you?</p>
                    <span>10:31 AM</span>
                </div>
            </div>

            <div class="chat_input">
                <input type="text" id="messageInput" placeholder="Type a message">
                <button onclick="sendMessage()">
                    <i class="fa fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>

    
<?php include ('includes/footer.php')?>