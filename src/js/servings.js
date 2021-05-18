
(function($){
    var e = document.getElementById("servings");
    var i = e.value;
    var value = parseInt(i);
    console.log(value);
      var computeServing = function(serving) {
        $('.value-amount').each(function(index, item) {
                  $(item).children('span').html($(item)[0].dataset.basevalue * serving)
        })
      }
      $('#servings').on('change', function() {
        computeServing($(this).val())
      })
      computeServing(value)
}(jQuery));






