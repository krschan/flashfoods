// list of available keywords for search
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

// get the element by its ID
const inputBox = document.getElementById("input-search-box");

// get the element where the results will be displayed.
const resultsBox = document.querySelector(".result-box");

// add an event listener to the input box for keyup event
inputBox.onkeyup = function(){
  let result = [];
  let input = inputBox.value;
  // if there's input, filter the available keywords that include the input
  if(input.length){
    result = availableKeywords.filter((keyword)=>{
      return keyword.toLowerCase().includes(input.toLowerCase());
    });
    console.log(result);
  }
  // display the filtered results
  display(result);

  // if there are no results, clear the results box
  if(!result.length){
    resultsBox.innerHTML = '';
  }
}

// function to display the results
function display(result){
  // map the results to list items
  const content = result.map((list)=>{
    return "<li onclick=selectInput(this)>" + list + "</li>";
  });

  // display the list items in the results box
  resultsBox.innerHTML = "<ul>" + content.join('') + "</ul>";
}

// function to select an item from the results
function selectInput(list){
  // set the input box value to the selected item
  inputBox.value = list.innerHTML;
  // clear the results box
  resultsBox.innerHTML = '';
}
