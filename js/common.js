$(document).ready(function(){					
	$('[data-toggle="tooltip"]').tooltip();

	$("#closeButton").click(function(){				
		$("#alertMessage").hide(2000);
	});

});	

function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else{
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    return unescape(dc.substring(begin + prefix.length, end));
}

function record_ans(question_number, option){
	var d = new Date();
    d.setTime(d.getTime() + (2*60*60*1000));
    var expires = "expires=" + d.toGMTString();  
    var my_cookie  = getCookie(question_number);
    var progress = null;

    if(my_cookie == null){
        set_answered_questions(get_answered_questions() + 1 );
        set_unanswered_questions(get_unanswered_questions() - 1);    	

        progress=((get_answered_questions())/(get_answered_questions()+get_unanswered_questions()))*100;
        add_glyphicon(question_number);  	
    }
    document.cookie = question_number + "=option" + option + "; " + expires + ";path=/";    
    document.getElementById("reset_button_"+question_number).style.visibility="visible";
    if(progress!=null)
    progress_bar_refresh(progress);

}

function set_answered_questions(value) {
    document.getElementById("answered_questions").innerHTML = value;     
}

function set_unanswered_questions(value) {
    document.getElementById("unanswered_questions").innerHTML = value;     
}

function get_answered_questions() {
    var ans_ques = document.getElementById("answered_questions").innerHTML;
     return(parseInt(ans_ques));   
}

function get_unanswered_questions() {
    var unans_ques = document.getElementById("unanswered_questions").innerHTML;
        return(parseInt(unans_ques));
}

function delete_cookie(cookie_name){
    document.cookie = cookie_name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/';
}

function progress_bar_refresh (progress_made) {
    var progress_bar=document.getElementById("progress_bar");
    progress_bar.setAttribute("style","width:"+progress_made+"%");
    progress_bar.innerHTML=parseInt(progress_made)+"%";

}

function add_glyphicon(panel_no) {
    var icon=document.createElement("span");
    icon.className="glyphicon glyphicon-ok";
    icon.setAttribute("id","panel_glyphicon_"+panel_no);
    var panel_id=document.getElementById("glyphicon"+panel_no);
    panel_id.appendChild(icon);

}

function remove_glyphicon(panel_no) {
    var parent=document.getElementById("glyphicon"+panel_no);
    var child=document.getElementById("panel_glyphicon_"+panel_no);
    parent.removeChild(child);   
}


function reset_question (question_no) {

    delete_cookie(question_no);

    var ans=get_answered_questions()-1;
    set_answered_questions(ans);

    var unans=get_unanswered_questions()+1;
    set_unanswered_questions(unans);
      
    var progress=((get_answered_questions())/(get_answered_questions()+get_unanswered_questions()))*100;
    progress_bar_refresh(progress);

    if(document.getElementById("panel_glyphicon_"+question_no)!=null)
    remove_glyphicon(question_no);

    var ele=document.getElementsByName("q"+question_no+"op");
    for(var i=0;i<ele.length;i++)
    {
        ele[i].checked=false;
    }
     document.getElementById("reset_button_"+question_no).style.visibility="hidden";
    

}
// function active_pagination(number) {
//     var pagination_id=document.getElementById("pagination_id_"+number);
//     var active_or_not=pagination_id.getAttribute("class");
//     if(active_or_not=="active")
//     pagination_id.removeAttribute("class");
//     else
//     pagination_id.setAttribute("class","active");
        

// }




