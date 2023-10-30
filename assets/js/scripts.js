$(document).ready(function(){
    $("#showAddressForm").click(function(){
        $("#first_name").val('');
        $("#last_name").val('');
        $("#email").val('');
        $("#street").val('');
        $("#zip_code").val('');
        $("#city_id").val('');
        $('#address_id').remove();
        $("#addressModal").show();
    });

    $(document).on("click", "#closeModal", function(){
        $("#addressModal").hide();
    });

    $(document).on("submit", "#addAddressForm", function(e){
        e.preventDefault();
        $.post("index.php", $("#addAddressForm").serialize(), function(response){
            if(response.success == 1){
                $('main').replaceWith($(response.html));
                $("#addressModal").hide();
            }
        });
    });

    
    $(document).on("click", ".edit-address", function(){
        let id = $(this).data('id');
        $('#address_id').remove();
        var input = $('<input type="hidden" name="id" id="address_id" value="'+id+'">');
        $('form#addAddressForm').append(input);
        $.get('index.php?id='+id, function(response) {
            $("#first_name").val(response.first_name);
            $("#last_name").val(response.last_name);
            $("#email").val(response.email);
            $("#street").val(response.street);
            $("#zip_code").val(response.zip_code);
            $("#city_id").val(response.city_id);
            $("#addressModal").show();
        });
    });

    $("#export_json").click(function() {
        $.get('index.php?get_json=1', function(response) {
            const blob = new Blob([JSON.stringify(response)], {type: "application/json"});
            const url = URL.createObjectURL(blob);
            const a = document.createElement("a");
            a.href = url;
            a.download = "addressBook.json";
            a.click();
            URL.revokeObjectURL(url);
        });
    });

    $("#export_xml").click(function() {
        $.ajax({
            url: "export-xml.php",
            dataType: "text",
            success: function(response) {
                const blob = new Blob([response], {type: "application/xml"});
                const url = URL.createObjectURL(blob);
                const a = document.createElement("a");
                a.href = url;
                a.download = "addressBook.xml";
                a.click();
                URL.revokeObjectURL(url);
            }
        });
    });    

    $(document).on('click', '.group-item', function(){
        var self = $(this);
        var group_id = self.data('id');
        $.get('index.php?page=group&group_id='+group_id, function(response) {
            console.log(response);
        })
    })
    
});
