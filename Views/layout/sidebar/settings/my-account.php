<div class="category">
    <a href="#" class="title collapsed" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="material-icons md-30 online">person_outline</i>
        <div class="data">
            <h5>My Account</h5>
            <p>Update your profile details</p>
        </div>
        <i class="material-icons">keyboard_arrow_right</i>
    </a>
    <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionSettings">
        <div class="content">
            <div class="upload">
                <div class="data">
                    <img class="avatar-xl" src="<?php echo $user->getAvatar(); ?>" alt="image">
                    <label>
                        <!-- <input type="file"> -->
                        <button data-toggle="modal" data-target="#uploadAvatar" class="btn button">Upload avatar</button>
                    </label>
                </div>
                <p>For best results, use an image at least 256px by 256px in either .jpg or .png format!</p>
            </div>
            <form action="?chatpage=1&account=update" method="post">
                <!-- <div class="parent">
                    <div class="field">
                        <label for="firstName">First name <span>*</span></label>
                        <input type="text" class="form-control" id="firstName" placeholder="First name" value="Michael" required>
                    </div>
                    <div class="field">
                        <label for="lastName">Last name <span>*</span></label>
                        <input type="text" class="form-control" id="lastName" placeholder="Last name" value="Knudsen" required>
                    </div>
                </div> -->
                <div class="field">
                        <label for="lastName">Your Name<span>*</span></label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name" value="<?php echo $user->getName(); ?>" required>
                    </div>
                <div class="field">
                    <label for="email">Email <span>*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" value="<?php echo $user->getEmail(); ?>" required>
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter a new password" value="<?php echo $user->getPassword(); ?>" required>
                </div>
                <a class="btn btn-link w-100" href="?chatpage=1&account=delete">Delete Account</a>
                <button type="submit" class="btn button w-100">Apply</button>
            </form>
        </div>
    </div>
</div>