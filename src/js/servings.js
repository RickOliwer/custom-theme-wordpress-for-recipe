
(function($){
    var computeServing = function(serving) {
        $('.value-amount').each(function(index, item) {
          $(item).children('span').html($(item)[0].dataset.basevalue * serving)
        })
      }
      $('#servings').on('change', function() {
        computeServing($(this).val())
      })
      $('.js-decreaseService').on('click', function() {
        var currentServing = $('#servings').val()
        $('#servings').val(currentServing - 2)
        computeServing(currentServing - 2)
      })
      $('.js-increaseService').on('click', function() {
        var currentServing = $('#servings').val()
        $('#servings').val(parseInt(currentServing) + 2)
        computeServing(parseInt(currentServing) + 2)
      })
      computeServing(2)
}(jQuery));



