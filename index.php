<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
<input type="text" style="width:60px;display:none;" id="add_row_cntr" value="0" />
<div id="insert_row"></div>
<br />
<br />
<div class="add_section">Add Section</div>

<script type="text/javascript">
$(document).ready(function(){
   $(".add_section").click(function(){
       var arr = { rowcounter:$("#add_row_cntr").val(),option:"addsectionrow"};
       $.ajax({
            url: 'ajax/add_attribute.php',
            type: 'POST',
            async: false,
            data: arr,
            success: function(response) {
                var arrresponse =  JSON.parse(response);
                $("#add_row_cntr").val(arrresponse.newrowcounter);
                $("#insert_row").append(arrresponse.row);
            }
        });
   });
});
function fnAddrowcolumns(rowid){
    var arr = { columncounter:$("#columncntr_"+rowid).val(),option:"addsectioncolumn",rowid:rowid};
    $.ajax({
         url: 'ajax/add_attribute.php',
         type: 'POST',
         async: false,
         data: arr,
         success: function(response) {
             var arrresponse =  JSON.parse(response);
             $(".add_rowcolumns_"+rowid).append(arrresponse.columns);
             setTimeout(function(){
                $("#columncntr_"+rowid).val(arrresponse.newcolumncounter);
            }, 10);
         }
     });
}
function fnDeletecol(rowid,columnid){
    if(confirm("Are you sure you wan't to delete current row?")){
        $("#row_col_"+rowid+"_"+columnid).remove();
    }
    if($('.add_rowcolumns_'+rowid+" .columns").length < 1){
        fnDeleterow(rowid,'yes');
    }
}
function fnDeleterow(rowid,confirm='no'){
    if(confirm == 'yes'){
        $("#row_"+rowid).remove();
    }else{
        if(confirm("Are you sure you wan't delete entire attribute? ")){
            $("#row_"+rowid).remove();
        }
    }
}
</script>