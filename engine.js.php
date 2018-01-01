<script>
// define function to call on document load and to re-register button after submitting form
function <?php echo $templ["clean_dirname"]; ?>_register_button_submit() {

 // ajax background call. adjust as needed to submit form but avoid page refresh.
 $("#pg_<?php echo $templ["dirname"]; ?>_form").submit(function(e) {
    var url = "<?php echo $templ["engine_web_loc"]; ?>";
    $.ajax({
           type: "POST",
           url: url,
           data: $("#pg_<?php echo $templ["dirname"]; ?>_form").serialize(),
           success: function(data)
           {
               $("#<?php echo $templ["dirname"]; ?>DivWrapper").html(data);
               <?php echo $templ["clean_dirname"]; ?>_register_button_submit(); // re-register button action 
           },
           error: function(data)
           {
                alert("Error: "+data);
           }
         });

    e.preventDefault();
 });
}

// document on load
$(function() {
        <?php echo $templ["clean_dirname"]; ?>_register_button_submit();
});
</script>
