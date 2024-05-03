// popup
function openPopup(content) {
  var popup = document.getElementById("popup");
  var popupContent = document.querySelector(".popup-content");
  var popupUrl = '';

  switch(content) {
    case 'change-user-data-popup.php':
      popupUrl = 'view/change-user-data-popup.php';
      break;
    case 'adresses-popup.php':
      popupUrl = 'view/adresses-popup.php';
      break;
    case 'history-popup.php':
      popupUrl = 'view/history-popup.php';
      break;
    case 'planning-popup.php':
      popupUrl = 'view/planning-poSpup.php';
      break;
    case 'cupons-popup.php':
      popupUrl = 'view/cupons-popup.php';
      break;
    case 'wishlist-popup.php':
      popupUrl = 'view/wishlist-popup.php';
      break;
    default:
      popupUrl = 'view/index.php';
  }

  popupContent.innerHTML = '';
  fetch(popupUrl)
    .then(response => response.text())
    .then(data => {
      popupContent.innerHTML = data;
      popup.style.display = "block";
    })
    .catch(error => console.error('Error loading popup content:', error));
}