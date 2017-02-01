(function($) {

  $(document).ready( function() {
    var roiFields = {
      employees : {
        elem: $('#roi-employees'),
      },
      employeesWithDependants : {
        elem: $('#roi-employees-with-dependants'),
        default: $('#roi-employees-with-dependants-default'),
      },
      dependants : {
        elem: $('#roi-dependants'),
        default : $('#roi-dependants-default'),
      },
      dependantSpend : {
        elem: $('#roi-dependant-spend'),
        default : $('#roi-dependant-spend-default'),
      },
      totals: {
        low : $('.roi-savings-low .roi-total-amount'),
        average : $('.roi-savings-average .roi-total-amount'),
        high : $('.roi-savings-high .roi-total-amount')
      }
    };

    $('.roi-calculator-form input').keyup( function(){
      updateVals(roiFields);
    });

    $('.roi-calculator-form input').click( function(){
      updateVals(roiFields);
    });

    $('.roi-calculator-form .form-group:has(.checkbox) input[type="text"]').click(function(){
      $(this).val('');
      $(this).siblings('.checkbox').find('input').prop('checked', false);
    });

  });

  function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    }
    return val;
  }

  function updateVals(roiFields) {
    Object.keys(roiFields).forEach( function(k) {
      if(roiFields[k].hasOwnProperty("default")) {
        console.log(roiFields[k].default.prop("checked"));
        if(roiFields[k].default.prop("checked")) {
          var defaultValue;
          if(k === 'employeesWithDependants'){
            defaultValue = Math.round(roiFields.employees.elem.val() * 52) / 100;
            console.log(defaultValue);
          }
          else if(k === 'dependants') {
            defaultValue = Math.round(roiFields.employeesWithDependants.elem.val() * 210) / 100;
          }
          else {
            defaultValue = roiFields[k].default.val()
          }
          roiFields[k].elem.val(defaultValue);
        }
      }
    });
    updateTotals(roiFields);
  }

  function updateTotals(roiFields) {
    roiFields.totals.low.text(
      commaSeparateNumber((roiFields.dependants.elem.val() * roiFields.dependantSpend.elem.val().replace(',', '') * 0.04 ).toFixed(2))
    );
    roiFields.totals.average.text(
      commaSeparateNumber((roiFields.dependants.elem.val() * roiFields.dependantSpend.elem.val().replace(',', '') * 0.08 ).toFixed(2))
    );
    roiFields.totals.high.text(
      commaSeparateNumber((roiFields.dependants.elem.val() * roiFields.dependantSpend.elem.val().replace(',', '') * 0.12 ).toFixed(2))
    );
  }

})(jQuery);
