$(function(){
    $('#Search').keyup(function() {
        var value = $(this).val();

        $(".Searchable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
    });
});
