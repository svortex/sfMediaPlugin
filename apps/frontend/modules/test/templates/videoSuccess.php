


<label>Url</label><input type="text" name="url" id="url" />

<div id="result">

</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
    $("#url").change(function(){
      if($("#url").val()!=""){


        $.ajax({
          type: "post",
          url: "<?php echo url_for('@add') ?>",
          data: {url: $("#url").val()},
          success: function(data, textStatus, jqXHR) {
              $("#result").html(data);
          }


        });



      }else{

        $("#result").html("");
      }

    });

  });


</script>