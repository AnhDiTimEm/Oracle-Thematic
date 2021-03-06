<div class="modal fade" id="startnewchat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="requests">
            <div class="title">
                <h1>Start Group Chat</h1>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i class="material-icons">close</i></button>
            </div>
            <div class="content">
                <form method="POST" action="?chatpage=1&create=success">
                    <div class="form-group">
                        <label for="participant">Group's Name:</label>
                        <input type="text" class="form-control" id="participant" placeholder="Name of this group..." required name="password">
                        <!-- <div class="user" id="recipient">
                            <img class="avatar-sm" src="./asset/img/avatars/avatar-female-5.jpg" alt="avatar">
                            <h5>Keith Morris</h5>
                            <button class="btn"><i class="material-icons">close</i></button>
                        </div> -->
                    </div>
                    <!-- <div class="form-group">
                        <label for="topic">Topic:</label>
                        <input type="text" class="form-control" id="topic" placeholder="What's the topic?" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="text-control" id="message" placeholder="Send your welcome message...">Hmm, are you friendly?</textarea>
                    </div> -->
                    <button type="submit" class="btn button w-100">Start New Chat</button>
                </form>
            </div>
        </div>
    </div>
</div>