<?php session_start(); ?>

<div class="info-box center">
    <div class="info-form aligned">
        <h2>Account Information</h2>
        <article id="user-information">
            <div class="img">
                <div class="img">
                    <?php if (isset($_SESSION['image']) && !empty($_SESSION['image'])): ?>
                        <img class="user-img" src="model/<?php echo $_SESSION['image']; ?>" alt="profile-image" />
                    <?php else: ?>
                        <img class="user-img" src="model/user-img.jpg" alt="profile-image" />
                    <?php endif; ?>
                </div>
            </div>
            <form id="information">
                <label for="username">Username</label>
                <input type="text" id="user" name="username" placeholder="username" />

                <label for="name-surname">Name and Surname</label>
                <input type="text" id="nameSurname" name="nameSurname" placeholder="name surname1 surname2" />

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="email" />

                <label for="birth-date">Birth Date</label>
                <input type="date" id="birthDate" name="birthDate" />

                <label for="phone-number">Phone Number</label>
                <input type="tel" id="phoneNumberr" name="phoneNumberr" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" />

                <?php
                if (isset($_SESSION['error'])) {
                    echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
                    unset($_SESSION['error']);
                }

                ?>
                <button type=submit id="normal-button">Update</button>
                <button type=submit id="red-button">DELETE ACCOUNT</button>

            </form>
        </article>
    </div>
</div>