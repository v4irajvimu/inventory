<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studio";

// Create connection
$db = new mysqli($servername, $username, $password,$dbname);
// Check connection
// if ($conn->connect_error) {
//     $color =  "red";
// }
// else{
//   $color =  "blue";
// }

$sql = "SELECT * FROM company WHERE online='1' LIMIT 0,1";
$result = $db->query($sql)->fetch_assoc();


 $clr_header_bg = $result['clr_header_bg'];
 $clr_header_txt = $result['clr_header_txt'];
 $clr_subheader_bg = $result['clr_subheader_bg'];
 $clr_subheader_txt = $result['clr_subheader_txt'];
 $clr_body_bg = $result['clr_body_bg'];
 $clr_body_txt  = $result['clr_body_txt'];
 $clr_popup_border = $result['clr_popup_border'];
 $clr_popup_bg = $result['clr_popup_bg'];
 $clr_popup_txt = $result['clr_popup_txt'];
$clr_ui_border_bottom = $result['clr_ui_border_bottom'];
$clr_subheader_bg_hover = $result['clr_subheader_bg_hover'];

    header("Content-type: text/css; charset: UTF-8");


?>

h2,h3{
    margin: 2px;
    font-size: 16px;
}

footer
{
	padding: 10px 15px;
	font-size: 0.8em;
	text-align: left;
	border-top: 1px solid #e3e3e3;
        background: white;
        position: fixed;
        bottom: 0px;
        width: 100%;
        z-index: 2;
        z-index: 190;
}

header{
    background: <?=$clr_header_bg?>;
    border-bottom: 1px solid <?=$clr_header_bg?>;
    position: fixed;
    width: 100%;
    top: 0px;
    z-index: 190;
    min-height: 50px;
    padding: 0px 15px;
}

header h2{
    font-size: 18px;
    margin: 15px 0;
    color: white;
}

#navigation{
    background: <?=$clr_subheader_bg?>;
    color: <?=$clr_subheader_txt?>;
    position: fixed;
    top: 50px;
    width: 100%;
    padding: 0 15px;
    z-index: 190;
    border-bottom: solid 2px <?=$clr_ui_border_bottom?>;
}

#quick_nav{
    position: fixed;
    top: 80px;
    width: 100%;
    padding: 6px 15px;
    box-shadow: 1px 5px 10px rgba(0,0,0,0.1);
    z-index: 2000;
    background: white;

}

#navigation h3{
    margin: 0px;
    padding: 8px 0;
    font-size: 14px;
}

header .company{
    margin: 14px 0;
    color: white;
    font-size: 18px;
    font-weight: normal;
}

.company a{
    color: white;
    text-decoration: none;
}

.company a:hover{
    color: white;
    text-decoration: underline;
}

.side_nav h3{
    color: <?=$clr_header_bg?>;
}
.side_nav ul{
    margin: 0px;
    padding: 0px;
    list-style: none;
    margin-bottom: 10px;
}

.side_nav ul li{
    display: block;


}
.side_nav ul li a{
    display: block;
    padding: 6px 10px;
    background: <?=$clr_subheader_bg?>;
    margin-bottom: 2px;
    color: #333333;
    font-size: 12px;
    border-right: 2px solid <?=$clr_header_bg?>;
    border-radius:5px;
    border-bottom: solid 2px <?=$clr_subheader_bg?>;
}
.side_nav ul li a:hover{
    background: <?=$clr_subheader_bg_hover?>;
    text-decoration: none;
    color: <?=$clr_ui_border_bottom?>;
    border-bottom: solid 2px <?=$clr_ui_border_bottom?>;
    border-right: 2px solid <?=$clr_ui_border_bottom?>;
}
.active_{
    background: <?=$clr_header_bg?> !important;
    text-decoration: none !important;
    color: <?=$clr_header_txt?> !important;
    border-bottom: solid 2px <?=$clr_ui_border_bottom?> !important;
    border-right: 2px solid <?=$clr_ui_border_bottom?> !important;
}

.header_topic{
    margin-bottom: 5px;
    padding-bottom: 5px;
}

/***************** cus-form **************/
.cus-form{
    padding-top: 10px;
}
.cus-form h3{
    padding: 5px 0;
    color: #707070;
    font-size: 16px;
    font-weight: bold;
}

.cus-form label{
    font-weight: normal;
    font-size: 12px;
    color: #858585;
    margin-top: 3px;
}
.cus-form textarea.form-control{
    height: 50px;
}


.cus-form .info{
    padding: 6px;
    margin: 0px;
    font-size: 12px;
    background: #f3f3f3;
    margin-bottom: 12px;
}

.cus-form .btn-row{
    margin-top: 10px;
}


.tab-content{
    padding: 8px;
    padding-top: 0px;
    border: 1px solid #dddddd;
    border-top: none;
}

.btn-cog{
    margin-top: 3px;
}


/************** GRID *********************/
.headerdiv{
    background: <?=$clr_header_bg?>;
    color: <?=$clr_header_txt?>;
    font-size: 12px;
    padding: 4px;
    font-weight: bold;
}

.cells{
    padding: 4px 4px;
    font-size: 12px;
}
.datarow{
    border-bottom: 2px solid #ffffff;
    -webkit-transition : border 400ms ease-out;
  -moz-transition : border 400ms ease-out;
  -o-transition : border 400ms ease-out;
  transition : border 400ms ease-out;
}

.datarow:nth-child(even){
    background: #eeeeee;
    border-bottom: 2px solid #eeeeee;
    -webkit-transition : border 500ms ease-out;
  -moz-transition : border 500ms ease-out;
  -o-transition : border 500ms ease-out;
  transition : border 500ms ease-out;
}

.datarow:hover{
    cursor: pointer;
    border-bottom: 2px solid <?=$clr_header_bg?>;

}


.inner_nav{
    padding: 6px;
    background: #ececec;
    border: 1px solid #e0e0e0;

}

/************* popup_menu *********/
.popup_menu{
    position: fixed;
    top: 23%;
    left: 40%;
    width: 900px;
    margin-left: -300px;
    margin-top: -100px;
    background: white;
    box-shadow: 1px 1px 108px <?=$clr_header_bg?>;
    z-index: 5000;
    display: none;
}

.popup_menu_div{
    display: none;
    background-color: #f2f2f2;
    border: 2px solid #999999;
    padding: 6px;
    margin-top: 15px;
    margin-bottom: 10px;
}



.popup_menu h2{
    text-transform: capitalize;
    margin: 0;
    color: #343434;
    font-size: 15px;
    background: #eaeaea;
    padding: 6px 10px;
    border-bottom: 1px solid #cbcbcb;
    cursor: move;
}

.popup_menu form label{
    font-size: 12px;
    font-weight: normal;
}

.popup_menu .cus-form{
    padding: 10px;
}

.popup_menu #exit{
    position: absolute;
    right: 5px;
    top: 5px;
    cursor: pointer;
    z-index: 5001;
}

.popup_menu_note{
    position: fixed;
    top: 50%;
    left: 50%;
    width: 600px;
    margin-left: -300px;
    margin-top: -100px;
    background: #fdfcc0;
    box-shadow: 1px 1px 108px rgba(0,0,0,0.3);
    z-index: 5000;
    display: none;
}

.popup_menu_note h2{
    text-transform: capitalize;
    margin: 0;
    color: #343434;
    font-size: 15px;
    background: #f8f7b6;
    padding: 6px 10px;
    cursor: move;
    border: none;
}

.popup_menu_note textarea{
    border: none;
    background: none;
    box-shadow: none;
    min-height: 150px;
    resize: none;
    font-family: "Comic Sans MS", cursive, sans-serif;
    font-size: 14px;
}
.popup_menu_note textarea:focus{
    box-shadow: none;
}


#err{
    position: fixed;
    z-index: 2500;
    right: 15px;
    top: 15px;
    background: rgba(0,0,0,0.8);
    padding: 14px;
    display: none;
}

.errp{
    margin: 0px;
    color: white;
    font-weight: bold;
    font-size: 14px;
    padding: 5px 0;
}

.mini_dashboard{
    background: #484848;
    padding: 15px;
    margin-top: 8px;
    border-radius: 2px;
    color: yellowgreen;
    text-align: center;

}



.mini_dashboard .topic{
    font-weight: bold;
    margin: 2px 0;
    font-size: 14px;
}
.mini_dashboard .figur{
    margin: 2px 0;
    font-size: 30px;
}

.red{
    color: #ff5050 !important;
}

.chart{
    padding: 15px;
    height:405px;
}

.fundsbox h4{
    margin: 1px 0;
    font-size: 12px;
    font-weight: bold;
}

.fundsbox h3{
    font-size: 18px;
    font-weight: bold;
    color: white;
}


form .error{
    color: red;
}

.form-sub{
    margin-bottom: 12px;
}

.sub_header{
    font-size: 16px;
    font-weight: bold;
    margin: 2px 0;
    border-bottom: 1px solid #d7d7d7;
    padding-bottom: 10px;
    margin-bottom: 0px;
}

.totBar .headerdiv{
    padding-top: 15px;
    padding-bottom: 15px;
    background: none;
    border-bottom: 4px double #686868;
    border-top: 2px solid #686868;
    color: #373737;
}

.reminder{
    font-size: 12px;
    margin:5px 0;
    color: #8e8e8e;
}



.fileuploads:hover{
    background: #f2f2f2;
    cursor: pointer;
}

a.green{
    background: #82bd36 !important;
    color: white;
}

.logrow{
    border: 1px solid #f3f3f3;
    margin-bottom: 4px;
}

.logrow .date{
    font-weight: bold;
    font-size: 22px;
    margin: 0px;
    padding: 5px;
    text-align: center;
    background: #f8f8f8;
    color: #4a4a4a;
    border-radius: 2px 2px 0 0;
    border: 1px solid #d5d5d5;
    border-bottom: none;
}

.logrow .month{
    font-size: 11px;
    margin: 0px;
    padding: 2px;
    text-align: center;
    background: #bf1111;
    color: white;
    border-radius: 0 0 2px 2px;
}

.logrow .action{
    text-align: center;
}

.logrow .project{
    font-size: 13px;
    padding: 3px 1px;
    border-bottom: 1px solid #eeeeee;
}

.logrow .activity{
    font-size: 12px;
    color: #696969;
    padding: 2px 1px;
}

.logrow .users{
    font-size: 11px;
    color: #cccccc;
    margin: 0px;
    padding: 1px;
}

.logrow .completed{
    color: #75b028;
    font-size: 12px;
    padding: 3px 1;
}

.paylines{
    margin: 4px 0;
}

.dashboard h2{
    text-align: center;
    font-size: 18px;
    color: #484848;
    padding: 10px;
}
.dashboard h3{
    text-align: center;
    font-size: 28px;
    font-weight: bold;
    color: #484848;
    padding: 10px;
}

.dashboard .items_box{
    padding: 5px;
    margin-top: 10px;
    border: 1px solid #e3e3e3;
    background: #f8f8f8;
    height: 195px;
}


/*All view.php CSS */
.view_row{
    margin-top: 10px;
}
.view_row h2{
    font-weight: bold;
    font-size: 25px;
}
.delete-div{
    background-color: white;
    padding: 5px;
    margin-bottom: 3px;
    border-radius: 15px;
    border: 2px solid #1d87df;
}
.update-div{
    background-color: white;
    padding: 5px;
    margin-bottom: 3px;
    border-radius: 15px;
    border: 2px solid #1d87df;
}
.main-thumb{
    padding: 3x;
    margin-right: 2px;
    background-repeat: no-repeat;
    background-size: cover;
    height: 350px;
    border: 2px solid #1d87df;
    margin-bottom: 15px;
}
.main-video{
    padding: 3px;
    margin-right: 2px;
    height: 400px;
    border: 2px solid #1d87df;
}
.main-video iframe{
    height: 100%;
    width: 100%;
}

<!-- dashboard css -->
.main-tile{
    width:100%;
    height:150px;
    background: <?=$clr_subheader_bg?>;
    border: 2px red solid;
}
.title-midle{
    padding:10px;
    background:<?=$clr_subheader_bg?>    ;
    height:130px;
    border-radius:10px;
}
.link-box{
    width:100%;
    height:100%;
    padding:10px;
    border: 1px <?=$clr_ui_border_bottom?> dashed;
    border-radius:10px;
    font-weight:bold;
    font-size:20px;

}
.title-midle a{
    text-decoration:none;
}
.title-midle a:hover{
    text-decoration:none;
    color: <?=$clr_ui_border_bottom?>;
    
}
#left-dash{
    border-radius:10px;
    background:<?=$clr_subheader_bg?> ;
}
#stockvalue {
    height: 520px; 
    width:100%;
    margin: 0 auto;
}
#totalsales {
    height: 520px; 
    width:100%;
    margin: 0 auto;
}
.chart-box{
    padding:10px;
    border: 6px solid <?=$clr_subheader_bg?>;
    border-radius:10px;
}
#homelink{
    color: <?=$clr_ui_border_bottom?>
}
#homelink:hover{
    color: <?=$clr_header_bg?>
}
.loader{
    width: 30px;
    height: 30px;
    display:none;
}
