// CALLING FUNCTIONS:
  // CHECK IF ON SPECIFIC PAGE AND THEN CALL...
  $(document).ready(function() {
    if (window.location.href.indexOf('signup') > -1 || window.location.href.indexOf('login') 
    > -1 || window.location.href.indexOf('edit') > -1 || window.location.href.indexOf('create') > -1) {
      validate();
      $('input, select').on('keyup change', validate);
    }
  });


  $(document).ready(function() {
    if (window.location.href.indexOf('explore') > -1) {
      gridMaker();
    }
  });


  $(document).ready(function() {
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
  });


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


// var m = document.getElementsByClassName('m')[0];
// var s = document.getElementsByClassName('s')[0];
// var gridRowN = 5;
// var sW = 220;
// var mW = 480;  2s + 40;
// var lW = 740;  3s + 80;
// gridRow = 1180;
// if (gridRow - rowElements >= 220 ) {}

// console.log(m,s);
// gridRowN = sum(gridRowChildren); 
// gridRowChildren.foreach(function(gridRowChild) {
//   if(gridRowChild elementbyClassName == 's') {
//     s = gridRowChild;
//   } elseif (gridRowChild elementbyClassName == 'm') {
//     m = gridRowChild;
//   } elseif (gridRowChild elementbyClassName == 'l') {
//     l = gridRowChild;
//   }
// });

// gridRowRawN - gridRowN
// gridRowElementsSpace = 5 - gridRowElements(s, m, l, s);


// 1G = 40
// 1260 with gaps...
// 5 s = 1100 + 4G
// 4 s = 880 + 4G
// 3 s = 660 + 3G

// 1lRaw = 740
// 1mRaw = 480
// without gaps inside them:
// m = mRaw - G
// l = lRaw - 2G

// full rows:
// 1m + 2s = 920 + 3G
// 1l + 1s = 960 + 2G
// THEN ROW IS 1100
// 1l + 1m = 1220 + 1G
// 2m + 1s = 1180
// 1l + 2s = 1180

// so i have 3s = 660
// 1260 - 660 - 80

// Row = elements
// if elements = 1260 ...gap = elements - 1

// s = 1
// m = 2
// l = 3
// xl = 2 (width) + 2(if previous row has xl)
// rowSpace = 5
// 5s = true
// 1m, 3s =

// if size = xl;
// wdth = 2
// rowSpace += 2 but also +2 for next row!? same position, next row - 2 spaces and also occupied space on that position as in previous row for xl
// if previous rowSizes contains XL, then add 2 space for next row and also occupied space on that position
// rowSizes = [s, xl, m]

// rowElementPosition = [1, 2-3, 4-5]
// rowElementPositionNext = [?, 2-3(occupied with XL from previous), ?]




