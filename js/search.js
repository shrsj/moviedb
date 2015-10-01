
    $(document).ready(function(){
        $("#search-box").keyup(function(){
            $.ajax({
            type: "POST",
            url: "readMovie.php",
            data:'keyword='+$(this).val(),
            beforeSend: function(){
                $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data){
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                $("#search-box").css("background","#FFF");
            }
            });
        });
    });

    function selectMovie(val) {
    $("#search-box").val(val);
    $("#suggesstion-box").hide();
    }

    function del(mid)
    {
       return confirm("ARE You Sure You Want to DELETE The Movie??");

    }
    function hidelogin()
    {
        document.getElementById("signup").style.visibility = "hidden"; 
        document.getElementById("login1").style.visibility = "hidden";
    }     