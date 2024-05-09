<?php session_start(); ?>

  <div class="info-box center">
    <div class="info-form aligned">
      <h2>Create affiliation</h2>
      <article id="affiliation-information">
        <div class="img">
          <div class="img">
              <?php if (isset($_SESSION['image']) && !empty($_SESSION['image'])): ?>
                  <img class="user-img" src="model/<?php echo $_SESSION['image']; ?>" alt="profile-image" />
              <?php else: ?>
                  <img class="user-img" src="model/user-img.jpg" alt="profile-image" />
              <?php endif; ?>
          </div>
        </div>
        <form id="information" method="POST" action="controller/AdminController.php">
          <label for="name">Name</label> <br>
          <input type="text" id="name" require> <br>

          <label for="phone">Phone Number</label> <br>
          <input type="tel" id="phone">  <br>

          <label for="email">Mail</label> <br>
          <input type="email" id="email"> <br>

          <label for="description">Description</label> <br>
          <textarea id="description"></textarea> <br>

          <button type="submit" id="normal-button">Create</button>
        </form>
      </article>
  </div>
</div>
