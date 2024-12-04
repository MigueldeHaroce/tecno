$('.button').click(function(event) {
    event.preventDefault();

    var name = $('input[name="txt"]').val(); 
    var action = $(this).attr('name'); 

    $.ajax({
        type: "POST",
        url: "index.php",
        data: { name: name, action: action }
    }).done(function(response) {
    
        $('body').append(response);
        console.log(response);
    });
});