 
$(document).ready(function(){
    
    $("#send").click(function(){
       var message=$.trim($("#message").val());
       if(message!=''){
            sendMessage(message);
       }
    })
    
    
    function sendMessage(message){
        $.ajax({
            type:'post',
            url:window.location.pathname,
            data:{ajax_message:message},
            success:function(result){
               $("#message").val("");
             
              
            }
        })
    }
    
    function viewMessage(){
       var view="";
        $.ajax({
            type:'post',
            url:window.location.pathname,
            dataType:'json',
            data:{ajax_date:last_date},
            success:function(result){
                var str="";
                $.each(result, function(key,val){
                    str+="<b>"+val.f_name+" "+val.l_name+"</b> <i><small>"+val.date+"</small></i><p>"+val.text+"</p>";
                    last_date=val.date;
                })
               $("#mess_content").append(str);
              
                
               
            }
        }) 
    }
    setInterval(function(){
        viewMessage();
  
    },1200)
    
})

