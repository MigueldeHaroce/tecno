$('.button').click(function(event) {
    event.preventDefault();

    var name = $('input[name="txt"]').val(); 
    var action = $(this).attr('name'); 

    $.ajax({
        type: "POST",
        url: "index.php",
        data: { action: 'fetch_latest_data' }
    }).done(function(response) {
        var data = JSON.parse(response);
        updateChartData(data);
        console.log(response);
    });
});