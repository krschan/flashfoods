
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
const inputBox = document.getElementById("input-search-box");

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
