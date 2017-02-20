var time = 0;
$("document").ready(
    function()
    {  
        
        $.webshims.setOptions("waitReady", false);
        $.webshims.polyfill();
        
        var currentDaysVal = $("#days").val();
        var currentDateVal = $("#date").val();
        
            setInterval(
                function()
                {
                    var days = $("#days").val();
                    var date = $("#date").val();
                    
                    if(currentDaysVal != days || currentDateVal != date)
                    {
                        currentDaysVal = days;
                        currentDateVal = date;
                        checkAvailibility(days,date);
                    }   
                }
            ,3000);
    }
);
function checkAvailibility(days,date)
{
    var url = $("[data-ajax]").attr("data-ajax");
    $.post(url,
        {
            "mode":"checkRoomAvailibility",
            "date":date,
            "days":days
        },
        function(data)
        {   
            if(data)
            {
                for(var i = 0; i<data.length;i++)
                {
                    var id = data[i].id;
                    $("#free_place_"+id).text(data[i].placeToStore);

                    if(parseInt(data[i].placeToStore) <= 0)
                        $("#reserve_room_"+id).fadeOut(300);
                    else
                        $("#reserve_room_"+id).fadeIn(300);
                }
            }
        },"json"
    );
}