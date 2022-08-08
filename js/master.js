function del(){
    var id = [];
    $(':checkbox:checked').each(function(i){
        id[i] = $(this).val();
    });
    var type = [];
    $(':checkbox:checked').each(function(e){
        type[e] = $(this).attr('name');
    });
  
    if(id.length === 0){
        alert("Please select atleast one checkbox");
    } else {
        if(confirm("Are you sure you want to delete this?")){
            $.ajax({
                url:'destroy',
                method:'POST',
                data:{where: id},
                dataType: "json",
                complete: function() {
                    window.location.reload();
                },
            });
        } else {
    
            return false;
        }
    }
}

function validation(){
    var name = $('#name').val();
    var price = $('#price').val();
    var currency = $('#currency option:selected').val();
    var type = $('#type option:selected').val();

    if(name == null || name == ""){
        $('#name-warning').text("Please fill in the field");
        return false;
    } else if(price == null || price == ""){
        $('#price-warning').text("Please fill in the field");
        return false;
    } else if(currency == null || currency == ""){
        $('#currency-warning').text("Please fill in the field");
        return false;
    } else if (type == null || type == ""){
        $('#type-warning').text("Please select category");
        return false;
    }

}

