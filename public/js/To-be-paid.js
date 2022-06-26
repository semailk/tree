var int = document.querySelector('#to_be_paid_int');
var input = document.querySelector('#to_be_paid');
var number_of_trees = document.querySelector('#number_of_trees');
number_of_trees.addEventListener("keyup", () => {
    input.value = int.textContent.replace('$','') * number_of_trees.value;
});

