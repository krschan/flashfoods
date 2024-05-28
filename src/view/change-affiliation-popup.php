<?php session_start(); ?>

<div class="info-box center">
    <div class="info-form aligned">
        <h2>Edit affiliation</h2>
        <article id="affiliation-information">
            <form id="information" method="POST" action="controller/AdminController.php" enctype="multipart/form-data">
                <div class="img">
                    <div class="img image-upload">
                        <?php if (isset($_SESSION['imageAffiliation']) && !empty($_SESSION['imageAffiliation'])) : ?>
                            <label for="file-input">
                                <div class="hover-box">
                                    <img class="user-img" src="model/<?php echo $_SESSION['imageAffiliation']; ?>" alt="image-affiliation">
                                    <div class="hover-content">
                                        <span>Edit Photo</span>
                                    </div>
                                </div>
                            </label>
                        <?php else : ?>
                            <label for="file-input">
                                <div class="hover-box">
                                    <img class="user-img edit-photo" src="images/edit-photo.png" alt="edit-photo" />
                                    <div class="hover-content">
                                        <span>Edit Photo</span>
                                    </div>
                                </div>
                            </label>
                        <?php endif; ?>
                        <input type="file" name="fileUpload" id="file-input">
                    </div>
                </div>

                <label for="name">Name</label> <br>
                <input type="text" id="name" name="name" require> <br>

                <label for="phone">Phone Number</label> <br>
                <input type="tel" id="phone" name="phoneNumber"> <br>

                <label for="email">Mail</label> <br>
                <input type="email" id="email" name="mail"> <br>

                <label for="description">Description</label> <br>
                <textarea id="description" name="description"></textarea> <br>

                <button type="submit" name="save" class="normal-button">Save</button>
                <a href="view/list-affiliations.php"><button type="submit" name="show_affiliations" class="normal-button">Cancel</button></a>
            </form>
        </article>
    </div>
</div>