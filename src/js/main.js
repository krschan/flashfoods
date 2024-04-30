let availableKeywords = [
  'McDonald\'s',
  'Burger King',
  'KFC',
  'Pizza Hut',
  'Domino\'s Pizza',
  'Telepizza',
  'Pans & Company',
  'VIPS',
  'Foster\'s Hollywood',
  'Subway',
  'Taco Bell',
  'Burger King',
  'The Good Burger (TGB)',
  'Kentucky Fried Chicken (KFC)',
  'Papa John\'s',
];

const resultsBox = document.querySelector(".result-box");
const inputBox = document.getElementById("input-box");

inputBox.onkeyup = function(){
  let result = [];
  let input = inputBox.value;
  if(input.length){
    result = availableKeywords.filter((keyword)=>{
      return keyword.toLowerCase().includes(input.toLowerCase());
    });
    console.log(result);
  }
  display(result);

  if(!result.length){
    resultsBox.innerHTML = '';
  }
}

function display(result){
  const content = result.map((list)=>{
    return "<li onclick=selectInput(this)>" + list + "</li>";
  });

  resultsBox.innerHTML = "<ul>" + content.join('') + "</ul>";
}

function selectInput(list){
  inputBox.value = list.innerHTML;
  resultsBox.innerHTML = '';
}

// popup
function openPopup(content) {
  var popup = document.getElementById("popup");
  var popupContent = document.querySelector(".popup-content");
  var popupUrl = '';

  switch(content) {
    case 'ChangeUserDataPopup.php':
      popupUrl = 'view/ChangeUserDataPopup.php';
      break;
    case 'AdressesPopup.php':
      popupUrl = 'view/AdressesPopup.php';
      break;
    case 'HistoryPopup.php':
      popupUrl = 'view/HistoryPopup.php';
      break;
    case 'PlanningPopup.php':
      popupUrl = 'view/PlanningPopup.php';
      break;
    case 'CuponsPopup.php':
      popupUrl = 'view/CuponsPopup.php';
      break;
    case 'WishlistPopup.php':
      popupUrl = 'view/WishlistPopup.php';
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

