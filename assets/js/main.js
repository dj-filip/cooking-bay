// CALLING FUNCTIONS:
  // CHECK IF ON SPECIFIC PAGE AND THEN CALL...
  document.addEventListener('DOMContentLoaded', function() {
    if (window.location.href.indexOf('signup') > -1 || window.location.href.indexOf('login') 
    > -1 || window.location.href.indexOf('edit') > -1 || window.location.href.indexOf('create') > -1) {
      validate();
      document.querySelectorAll('input, select').forEach(function(item) {
        item.addEventListener('keyup', validate);
        item.addEventListener('change', validate);
      })
      // JQUERY: $('input, select').on('keyup change', validate);
    }
  });


  document.addEventListener('DOMContentLoaded', function() {
    if (window.location.href.indexOf('explore') > -1) {
      gridMaker();
    }
  });


  document.addEventListener('DOMContentLoaded', function() {
    if (window.location.href.indexOf('edit') > -1 || window.location.href.indexOf('create') > -1) {
    // CK editor
    ClassicEditor.create( document.querySelector( '#editor' ), {
      toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
      heading: {
          options: [
              { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
              { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
              { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
          ]
      }
    })
      .catch( error => {
      console.log( error );
      });
    }
  }, false);


  // CALLING ACCOUNT BUTTON DROPDOWN
    $(document).ready(function() {
      $("div.account button").click(function() {
        $(".account-drop").toggleClass("active-accdrop")
      })
    });

    // Account Drop Bar Close by Clicking Outside
      $(document).click(function() {
        $(".account-drop").removeClass("active-accdrop");
      });

      $(".account-drop, div.account button").click(function(e) {
        e.stopPropagation();
      });





// ENABLE BUTTON IF ALL INPUTS ARE FILLED
function validate() {
  var inputsWithValues = 0;

  // get all input fields except for type='submit'
  var myInputsRaw = $('input:not([type=submit], [type=hidden]), select');
  var img = $('input[type=file]');
  var select = $('select').val();

  myInputsRaw.each(function(e) {
    // check if trimmed input values are not empty space, and increment the counter
    if (!$.trim($(this).val()) == "") {
      inputsWithValues += 1;
    }
  });
  // console.log(select, myInputsRaw.length, inputsWithValues);
  if (inputsWithValues == myInputsRaw.length) {
    $('#sbmt').removeAttr('disabled');
  } else {
    $('#sbmt').attr('disabled', 'disabled');
  }
  console.log('radi');
};


// GRID
function gridMaker() {
  var grid = document.getElementsByClassName('app')[0];
  var gridElements = grid.children;
  // console.log(grid);

  for (var i = 0; i < gridElements.length; i++) {
    if (gridElements[i].matches('.s')) {
      console.log(gridElements[i], 'evo ga s u prvom redu?!');
    }
    if (gridElements[i].matches('.m')) {
      console.log(gridElements[i], 'evo ga m u prvom redu?!');
    }
  }


  var min = -Infinity;
  var rowCount = 1;
  var rowSpace = 0;
  var fullRowSpace = 5;
  var position = 1;
  var rowElementPosition = [];

  // WITH GAPS
  // var fullRowSpace = 1260; 
  for (var i = 0; i < gridElements.length; i++) {
    var wdth = gridElements[i].getBoundingClientRect().width;
    if (gridElements[i].getBoundingClientRect().width == 220) {
      var size = 's';
      var sizeN = 1;
    }
    if (gridElements[i].getBoundingClientRect().width == 480 && gridElements[i].getBoundingClientRect().height != 740) {
      var size = 'm';
      var sizeN = 2;
    }
    if (gridElements[i].getBoundingClientRect().width == 740) {
      var size = 'l';
      var sizeN = 3;
    }
    if (gridElements[i].getBoundingClientRect().width == 480 && gridElements[i].getBoundingClientRect().height == 740) {
      var size = 'xl';
      var sizeN = 2;
    }

    // ONE ROW

    if (min > gridElements[i].getBoundingClientRect().left) {
      min = -Infinity;
      // i--;
      console.log(rowCount + '.row space: ' + rowSpace + ' last element: ' + gridElements[i].className + ', free space: ' + (fullRowSpace - rowSpace));
      rowCount++;
      // console.log(rowCount + '.row ', 'width: ' + size + ', ' + wdth + 'px', ' from left: ' + gridElements[i].getBoundingClientRect().left, gridElements[i]);
      rowSpace = 0;
      rowSpace += sizeN;
      console.log(rowElementPosition);
      rowElementPosition = [];
      position = 1;
    }
    if (min < gridElements[i].getBoundingClientRect().left) {
      min = gridElements[i].getBoundingClientRect().left;
      if (gridElements[i].classList.contains('m') || gridElements[i].classList.contains('xl')) {
        var wdth = gridElements[i].getBoundingClientRect().width - 40;
      }
      if (gridElements[i].classList.contains('l')) {
        var wdth = gridElements[i].getBoundingClientRect().width - 80;
      } 
      var wdth = gridElements[i].getBoundingClientRect().width;
      rowSpace += sizeN;
      console.log(rowCount + '.row ', 'width: ' + size + ', ' + wdth + 'px', ' from left: ' + gridElements[i].getBoundingClientRect().left, gridElements[i]);

      if (size =='s') {
        rowElementPosition.push( position + '(' + size + ')');
        position += 1;
      } else if (size == 'm') {
        rowElementPosition.push( position + '-' + (position+1) + '(' + size + ')');
        position += 2;
      } else if (size == 'l') {
        rowElementPosition.push( position + '-' + (position+1) + '-' + (position+1) + '(' + size + ')');
        position += 3;
      } else {
        rowElementPosition.push( position + '-' + (position+1) + '(' + size + ')');
        position += 2;
      }
    }
    if (i == gridElements.length - 1) {
      console.log(rowCount + '.row space: ' + rowSpace + ' last element: ' + gridElements[i].className + ', free space: ' + (fullRowSpace - rowSpace));
    }
  }

  var gridInfo = getComputedStyle(grid).getPropertyValue("grid-template-columns");
  console.log(gridInfo);
}


// STYLE NAV MENU BASED ON PAGE
let currentUrl = document.location;

let ul = document.querySelector('ul');
let navItems = ul.querySelectorAll('a');
navItems.forEach(function(navItem) {
  if(navItem.href == currentUrl) {
    navItem.classList += ' current';
  }
});
console.log(navItems);