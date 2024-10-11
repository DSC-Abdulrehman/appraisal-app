function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);



$(function () {
    var bindDatePicker = function() {
         $(".date").datetimepicker({
         format:'YYYY-MM-DD',
             icons: {
                 time: "fa fa-clock-o",
                 date: "fa fa-calendar",
                 up: "fa fa-arrow-up",
                 down: "fa fa-arrow-down"
             }
         }).find('input:first').on("blur",function () {
             // check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
             // update the format if it's yyyy-mm-dd
             var date = parseDate($(this).val());
 
             if (! isValidDate(date)) {
                 //create date based on momentjs (we have that)
                 date = moment().format('YYYY-MM-DD');
             }
 
             $(this).val(date);
         });
     }
    
    var isValidDate = function(value, format) {
         format = format || false;
         // lets parse the date to the best of our knowledge
         if (format) {
             value = parseDate(value);
         }
 
         var timestamp = Date.parse(value);
 
         return isNaN(timestamp) == false;
    }
    
    var parseDate = function(value) {
         var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
         if (m)
             value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);
 
         return value;
    }
    
    bindDatePicker();
  });
  
  
  function addDiv(parent_div, content, attrs) {
    var div = document.createElement('div');
    var parent = document.getElementById(parent_div);
  
    for (var key in attrs) {
      if (attrs.hasOwnProperty(key)) {
        div.setAttribute(key, attrs[key]);
      }
    }
    div.innerHTML = content;
    if (parent) {
      parent.appendChild(div);
    }
  }
  
  var button = document.getElementsByClassName('add-more-btn__add')[0];
  var i=2;
  if (button) {
    button.addEventListener('click', function() {
      // change dynamically your new div
      // addDiv('strength-development-parent', '<input class="form-control" type="text" placeholder="Default input" aria-label="default input">', {
      //   'class': 'someclass someclass',
      //   'data-attr': 'attr'
      // });
      
      addDiv('strength-development-parent-1', '<input class="form-control input-half" type="text" placeholder="Area of Strength ' + i + '" aria-label="default input example" style="border-right: 1px solid #000; border-radius:0px;"><input class="form-control input-half" type="text" placeholder="Area of Development ' + i + '" aria-label="default input example">', {
        'class': 'row align-center margin-off border-bottom-custom',
        'data-attr': 'attr'
      });
      i++;
    });
  }