<?php
if(isset($_SESSION['logged']) == true){
  echo '<nav>
  <ul>
    <li>
      <a href="index.php">
        <i class="fas fa-bars"></i>
        <span class="nav-item logo"><img src="images/flashfoods-logo.png" alt="flashfoods-logo"></span>
      </a>
    </li>
    <li><a href="#" onclick="openPopup(\'change-user-data-popup.php\')">
      <i class="fas fa-user"></i>
      <span class="nav-item">Change user data</span>
      </a>
    </li>
    <li><a href="#" onclick="openPopup(\'adresses-popup.php\')">
      <i class="fas fa-location-pin"></i>
      <span class="nav-item">Addresses</span>
    </a></li>
    <li><a href="#" onclick="openPopup(\'history-popup.php\')">
      <i class="fas fa-history"></i>
      <span class="nav-item">History</span>
    </a></li>
    <li><a href="#" onclick="openPopup(\'planning-popup.php\')">
      <i class="fas fa-file"></i>
      <span class="nav-item">Planning</span>
    </a></li>
    <li><a href="#" onclick="openPopup(\'cupons-popup.php\')">
      <i class="fas fa-ticket"></i>
      <span class="nav-item">Cupons</span>
    </a></li>
    <li><a href="#" onclick="openPopup(\'wishlist-popup.php\')">
      <i class="fas fa-heart"></i>
      <span class="nav-item">Wishlist</span>
    </a></li>
    <li><a href="view/technical-support.php">
    <i class="fas fa-circle-info"></i>
    <span class="nav-item">Technical support</span>
    </a></li>
  
  </ul>
  </nav>';
} else {
  echo '<nav>
  <ul>
    <li>
      <a href="index.php">
        <i class="fas fa-bars"></i>
        <span class="nav-item logo"><img src="images/flashfoods-logo.png" alt="flashfoods-logo"></span>
      </a>
    </li>
    <li class="content-locked"><a href="#">
        <i class="fas fa-user"></i>
        <span class="nav-item">Change user data</span>
      </a>
    </li>
    <li class="content-locked"><a href="#">
      <i class="fas fa-location-pin"></i>
      <span class="nav-item">Addresses</span>
    </a></li>
    <li class="content-locked"><a href="#">
      <i class="fas fa-history"></i>
      <span class="nav-item">History</span>
    </a></li>
    <li class="content-locked"><a href="#">
      <i class="fas fa-file"></i>
      <span class="nav-item">Planning</span>
    </a></li>
    <li class="content-locked"><a href="#">
      <i class="fas fa-ticket"></i>
      <span class="nav-item">Cupons</span>
    </a></li>
    <li class="content-locked"><a href="#">
      <i class="fas fa-heart"></i>
      <span class="nav-item">Wishlist</span>
    </a></li>
    <li><a href="view/technical-support.php">
    <i class="fas fa-circle-info"></i>
    <span class="nav-item">Technical support</span>
    </a></li>
  
  </ul> 
  </nav>';
};
