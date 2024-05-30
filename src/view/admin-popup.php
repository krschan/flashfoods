  <?php session_start(); ?>

    <div class="info-box center">
      <div class="info-form aligned">
        <h2>Create Affiliation</h2>
        <article id="affiliation-information">
          <form id="information" method="POST" action="controller/AdminController.php" enctype="multipart/form-data">
            <div class="img image-upload">
              <?php if (isset($_SESSION['imageAffiliation']) && !empty($_SESSION['imageAffiliation'])): ?>
                <label for="file-input">
                  <div class="hover-box">
                    <img class="user-img" src="model/<?php echo $_SESSION['imageAffiliation']; ?>" alt="image-affiliation">
                    <div class="hover-content">
                      <span>Edit Photo</span>
                    </div>
                  </div>
                </label>
              <?php else: ?>
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
            
            <label for="name">Name</label>
            <input type="text" id="name" name="name" require>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phoneNumber"> 

            <label for="email">Mail</label>
            <input type="email" id="email" name="mail">

            <label for="description">Description</label>
            <textarea id="description" name="description"></textarea>

            <button type="submit" name="create_affiliation" class="normal-button">Create affiliation</button>
            <a href="view/list-affiliations.php" target="_blank" class="btn">Show affiliations</a>

          </form>
        </article>
      </div>
    </div>
