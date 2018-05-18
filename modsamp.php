<!-- Samp details Modal -->
<form method="POST" action="labform3.php">
<div id="modsamp" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header" style="padding:10px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> <i class="fa fa-flask"></i> Add Sample Details</h4>
      </div>
      <div class="modal-body">
      <div class="panel-body" style="border:1px solid #eaeaea;" id="sampdtls">
    <div class="row">
      <div class="col-md-4">
         <div class="form-group" id="rightside" style="display:none;">
          <label>Control ID:</label>
             <input class="form-control" type="text" value="" id="right1" name="contid">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label>Sample No.:</label>
          <input class="form-control" type="text"  name="sampno" id="sampno">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label>Sta. No.:</label>
          <select class="form-control" name="statno" id="statno">
                <option value="0">---</option>
                <option >1</option>
                <option >2</option>
                <option >3</option>
                <option >4</option> 
                <option >5</option> 
                <option >6</option> 
                <option >7</option> 
                <option >8</option> 
                <option >9</option> 
                <option >10</option>                 
          </select>
        </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
            <label>Station:</label> 
            <select class="form-control modstation" name="statname" id="statname" style="width:100% !important;"> 
                <option value="">Select Station</option>          
            </select>
          </div>
      </div>
      <div class="col-md-3">
         <div class="form-group">
          <label>Col. Time:</label>
            <input class="form-control" type="text" id="coltime" name="coltime" >
        </div>
      </div>
    </div><!--end row-->

 <!-- start dynamic fields for param -->
   <form method="post" name="modform" id="modform">
    <div class="row">
        <div class="col-md-12">
          <div class="input-group control-group after-add-more">
          <?php require 'lab/pardrop.php'; ?> 
          </select>
         <input type="text" name="parval[]" class="form-control parval" id="parvall" placeholder="Value" style="width:100px;">
         <button class="btn btn-success addmore" type="button" style="border-radius:0px;" data-toggle="tooltip" title="Add Parameter"><i class="glyphicon glyphicon-plus"></i></button>
        </div>
        </div>
    </div>
<!--start hidden fields-->  
     <div class="row">
        <div class="col-md-12">
          <div class="copy-fields hide">
            <div class="control-group input-group" style="margin-top:10px">
             <?php require 'lab/pardrop.php'; ?>
              </select>
              <input type="text" name="parval[]" id="parval" class="form-control parvall" placeholder="Value" style="width:100px;">
                <button class="btn btn-danger remove" type="button" style="border-radius:0px;"><i class="glyphicon glyphicon-remove"></i></button>
            </div>
        </div>
        </div>
    </div> 
      <br>  
<!-- end hidden fields for param -->
<!-- start dynamic fields for bacte -->
    <div class="row">
        <div class="col-md-12">
          <div class="input-group control-group2 after-add-more2">
          <?php require 'lab/bacdrop.php'; ?> 
          </select>
         <input type="text" name="bacval[]" class="form-control bacvall" id="bacval" placeholder="Value" style="width:100px;">
         <button class="btn btn-success addmore2" type="button" style="border-radius:0px;" data-toggle="tooltip" title="Add Bacte"><i class="glyphicon glyphicon-plus"></i></button>
        </div>
        </div>
    </div>
<!--start hidden fields-->  
     <div class="row">
        <div class="col-md-12">
          <div class="copy-fields2 hide">
            <div class="control-group input-group" style="margin-top:10px">
             <?php require 'lab/bacdrop.php'; ?>
              </select>
              <input type="text" name="bacval[]" id="bacval" class="form-control bacvall" placeholder="Value" style="width:100px;">
                <button class="btn btn-danger remove" type="button" style="border-radius:0px;"><i class="glyphicon glyphicon-remove"></i></button>
            </div>
        </div>
        </div>
    </div> 
     <br> 

<!-- end hidden fields for bacte-->
<!-- end dynamic fields -->
      </div>
      <div class="modal-footer" style="padding:5px;">
        <button class="btn btn-info" type="button" name="btnsamp2" id="btnsamp2"><i class="fa fa-save"></i></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i></button>
      </div>
    </div>

  </div>
</div>
</div>
</form>
<!--end modal-->

<!--ajax code-->
 <script>
    $(document).ready(function(){
      $("#btnsamp2").click(function(){
          $.ajax({
                url:'insamp2.php', 
                method:'POST',
                data: $('input[name="parnam[]"]').serialize() + '&' + $('input[name="parnam[]"]').serialize() + '&' + $('input[name="parval[]"]').serialize()
                + '&' + $('input[name="bacnam[]"]').serialize() + '&' + $('input[name="bacval[]"]').serialize()
                + '&' + $('input[name="contid"]').serialize() + '&' + $('input[name="sampno"]').serialize()
                + '&' + $('input[name="statno"]').serialize() + '&' + $('input[name="statname"]').serialize()
                + '&' + $('input[name="coltime"]').serialize(),

                   success:function(data){
                       alert(data);
                   }
                });
            });
        });
</script>
<!--end ajax code-->

<!--start dynamic textboxes-->
<script type="text/javascript">
   j(document).ready(function() {

  //add fields
      j(".addmore").click(function(){ 
          var html = j(".copy-fields").html();
          j(".after-add-more").after(html);
      });
//remove appended fields
      j("body").on("click",".remove",function(){ 
          j(this).parents(".control-group").remove();
      });
    });

</script>

<script type="text/javascript">
    j(document).ready(function() {
 
  //add fields for bacte
      j(".addmore2").click(function(){ 
          var html = j(".copy-fields2").html();
          j(".after-add-more2").after(html);
      });
//remove appended fields for bacte
      j("body").on("click",".remove2",function(){ 
          j(this).parents(".control-group").remove();
      });
 
    });
</script>
<!--end dynamic-->
