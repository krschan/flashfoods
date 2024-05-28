function openPopup(content) {
  // get the element by its ID
  var popup = document.getElementById("popup");

  // get the element where the popup will be displayed.
  var popupContent = document.querySelector(".popup-content");

  var popupUrl = "";

  // depending on the option chosen, select one URL or another (with its PHP  file).
  switch (content) {
    case "change-user-data-popup.php":
      popupUrl = "view/change-user-data-popup.php";
      break;
    case "adresses-popup.php":
      popupUrl = "view/adresses-popup.php";
      break;
    case "history-popup.php":
      popupUrl = "view/history-popup.php";
      break;
    case "planning-popup.php":
      popupUrl = "view/planning-popup.php";
      break;
    case "coupons-popup.php":
      popupUrl = "view/coupons-popup.php";
      break;
    case "wishlist-popup.php":
      popupUrl = "view/wishlist-popup.php";
      break;
    case "admin-popup.php":
      popupUrl = "view/admin-popup.php";
      break;
    case "change-affiliation-popup.php":
      popupUrl = "change-affiliation-popup.php";
      break;
    default:
      popupUrl = "view/index.php";
  }

  // clear the content of the popup.
  popupContent.innerHTML = "";

  // fetch the content from the specified URL
  fetch(popupUrl)
    .then((response) => response.text()) // convert the response to text
    .then((data) => {
      // set the content of the popup to the fetched data
      popupContent.innerHTML = data;

      // display the popup
      popup.style.display = "block";
    })
    .catch((error) => console.error("Error loading popup content:", error)); // Log any errors
}
