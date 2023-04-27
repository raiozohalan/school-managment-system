function valEd(id,class_id,stud_id,quarter,col,val){
	var a = document.getElementById(id).innerHTML;
	var b = document.getElementById(id);
	if(a !=""){
		if(a === "A" || a === "A-" || a === "B" || a === "B-" || a === "C" || a === "C-" || a === "D" || a === "D-"){
			loadContent(id,'../libraries/php-func/valEd.php?quarter='+quarter+'&class_id='+class_id+'&stud_id='+stud_id+'&col='+col+'&val='+val); 
		}else{
			b.innerHTML = "Your enter invalid data, Please Refer to Evaluation Code (Ex: A)";
		}
	}
}
function PrintElem(id,class_id) {
	var myWindow = window.open("../libraries/php-func/RC-print.php?tbl_id="+id+"&class_id="+class_id,"_blank","toolbar=yes, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=900, height=680"); 
    myWindow.onload=function(){ // necessary if the div contain images
		
		myWindow.focus(); // necessary for IE >= 10
		myWindow.print();
		myWindow.close();
    };
}
function send(container,action,responeCon) {
    $(document).ready(function (e) {
		$("#"+container).on('submit',(function(e) {
			e.preventDefault();
			$.ajax({
				url: action,
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(data)
				{
					$("#"+responeCon).html(data);
				},
				error: function() 
				{} 	        
			});
		}));
	});
}
function loadContent(container,url) {
	var xmlhttp;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(container).innerHTML = xmlhttp.responseText;
        }else{
			document.getElementById(container).innerHTML = '<i class="fa fa-spinner w3-spin"></i>';
		}
    }
    xmlhttp.open("GET",url, true);
    xmlhttp.send();
} 
function loadModalContent(container,url,modal) {
	$('#'+modal).show();
    var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(container).innerHTML = xmlhttp.responseText;
        }else{
			document.getElementById(container).innerHTML = '<span class="fa fa-spinner w3-spin w3-text-teal" style="text-shadow:0px 0px 1px gray;"></span>';
		}
    }
    xmlhttp.open("GET",url, true);
    xmlhttp.send();
}

function reload(container,url){
	setInterval(function(){
		$("#"+container).load(url);
	}, 2000);
} 
function readURL(input,postImgPrev,type) {
    if (input.files && input.files[0]) {
		if(type == "image"){
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#'+postImgPrev).attr('src', e.target.result);
			}
		reader.readAsDataURL(input.files[0]);
		}else if(type == "audio"){
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#'+postImgPrev).attr('src', e.target.result);
			}
		}else if(type == "video"){
			document.getElementById(postImgPrev).innerHTML = input.files[0].name;
		}
    }
}
function readURL1(input,PreviewContainer,PrevMask,type) {
    if (input.files && input.files[0]) {
		if(type == "image"){
			var reader = new FileReader();
			reader.onload = function (e) {
            $('#'+PreviewContainer).attr('src', e.target.result);
            $('#'+PrevMask).show();
			}
			reader.readAsDataURL(input.files[0]);
		}else if(type == "audio"){
			$('#'+PrevMask).show();
			document.getElementById(PreviewContainer).innerHTML = input.files[0].name;
		}else if(type == "video"){
			$('#'+PrevMask).show();
			document.getElementById(PreviewContainer).innerHTML = input.files[0].name;
		}
    }
}  
