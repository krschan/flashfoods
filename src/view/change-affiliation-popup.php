<div class="info-box center">
    <div class="info-form aligned">
        <h2>Edit affiliation</h2>
        <article id="affiliation-information">
            <form id="information" method="POST" action="../controller/AdminController.php"
                enctype="multipart/form-data">
                <div class="img">
                    <div class="img image-upload">
                        <label for="file-input">
                            <div class="hover-box">
                                <img class="user-img" src="../model/<?php echo $_SESSION['imageAffiliation']; ?>"
                                    alt="image-affiliation">
                                <div class="hover-content">
                                    <span>Edit Photo</span>
                                </div>
                            </div>
                        </label>
                        <input type="file" name="fileUpload" id="file-input">
                    </div>
                </div>

                <label for="name">Name</label> <br>
                <input type="text" id="name" name="name" value="<?php echo $_SESSION['nameAffiliation']; ?>" required>
                <br>

                <label for="phone">Phone Number</label> <br>
                <input type="tel" id="phone" name="phoneNumber" value="<?php echo $_SESSION['phoneAffiliation']; ?>">
                <br>

                <label for="email">Mail</label> <br>
                <input type="email" id="email" name="mail" value="<?php echo $_SESSION['mailAffiliation']; ?>"> <br>

                <label for="description">Description</label> <br>
                <textarea id="description"
                    name="description"><?php echo $_SESSION['descriptionAffiliation']; ?></textarea> <br>

                <input type="hidden" id="id_affiliation" name="id_affiliation"
                    value="<?php echo $_SESSION['id_affiliation']; ?>">
                <div id='validation-message'></div>
                <button type="submit" name="update_affiliation" class="normal-button">Save changes (PHP)</button>
                <input type="button" name="edit_affiliation_ajax" class="btn" value="Save changes (AJAX)"
                    id="update-ajax-button">
                <a href="list-affiliations.php"><button type="submit" name="show_affiliations"
                        class="normal-button">Cancel</button></a>
            </form>
        </article>
    </div>
</div>
<script src="/src/js/jquery-3.7.1.min.js"></script>
<script src="/src/js/dist/jquery.validate.js"></script>
<script src="/src/js/dist/additional-methods.js"></script>
<script src="/src/js/ajax-update-user.js"></script>