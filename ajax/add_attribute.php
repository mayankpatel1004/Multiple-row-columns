<?php
$newrowcounter = "";
$newcolumncounter = "";
if((isset($_REQUEST['rowcounter']) && $_REQUEST['rowcounter'] != "") && (isset($_REQUEST['option']) && $_REQUEST['option'] == 'addsectionrow')){
    $newrowcounter = $_REQUEST['rowcounter']+1;
    $row = "<div class='row rowcounter_".$newrowcounter."' id='row_".$newrowcounter."'><br />
            <input type='text' style='width:50px;display:none;' value='0' id='columncntr_".$newrowcounter."' />
            <input type='text' name='rowcounter[]' placeholder='Row ".$newrowcounter."' id='row_input_".$newrowcounter."' /><a onclick='return fnDeleterow($newrowcounter)'>Delete</a>
            <div class='add_columns' id='rowid_".$newrowcounter."' data-row='".$newrowcounter."' onclick='fnAddrowcolumns(".$newrowcounter.")'>Add Columns</div>
            <div class='add_rowcolumns_".$newrowcounter."'></div>
        </div>";
    $ary = array('newrowcounter' => $newrowcounter,'row' => $row);
    echo json_encode($ary);exit;
}

if((isset($_REQUEST['columncounter']) && $_REQUEST['columncounter'] != "") && (isset($_REQUEST['option']) && $_REQUEST['option'] == 'addsectioncolumn')){
    $rowid = $_REQUEST['rowid'];
    $newcolumncounter = $_REQUEST['columncounter']+1;
    $counterhiddeninput = "<input type='text' style='width:50px;display:none;' value='0' name=rowcolumn[$newcolumncounter][] id='columncounter_".$newcolumncounter."' />";
    $columns = "<div class='columns columncounter_".$newcolumncounter."' id='row_col_".$rowid."_".$newcolumncounter."'>
            <input type='text' placeholder='Please enter title ".$rowid."_".$newcolumncounter."' name='columntitle[".$rowid."][]' id='title_".$rowid."_".$newcolumncounter."' />
            <input type='text' placeholder='Please enter alias' name='columnalias[".$rowid."][]' id='alias_".$rowid."_".$newcolumncounter."' />
            <input type='text' placeholder='Please enter amount' name='columnamount[".$rowid."][]' id='amount_".$rowid."_".$newcolumncounter."' />
            <a onclick='return fnDeletecol(".$rowid.",".$newcolumncounter.")'>Delete</a>
        </div>";
    $ary = array('newcolumncounter' => $newcolumncounter,'columns' => $columns,'counterhiddeninput' => $counterhiddeninput);
    echo json_encode($ary);exit;
}
?>