function chkSession() {
    $.ajax({
        type: 'GET',
        url: 'https://srv.net.fje.edu/apisiia/conNETctor.php/vidatokenCookie/' + getCookie('tokenNet'),
        dataType: 'json',
        success: function(data) {

		switch (true) {
            case (data.vida < 6):
                clearInterval(timer);
                messageEnd();
                break;
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
			if (jqXHR.status==401) {
				message401();
			}else{
				console.log(jqXHR);
			}
        }
    });
}

function messageEnd() {
    deleteCookie('tokenNet', '/', '.fje.edu');
    window.location.href = 'https://srv.net.fje.edu/lg/loginNET/?me=0';
}
function message401() {
	//deleteCookie('tokenNet', '/', '.fje.edu');
    //window.location.href = 'http://srv.net.fje.edu/lg/loginNET/?me=0';
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "0";
}
function deleteCookie(name, path, domain) {
    if (getCookie(name)) {
        document.cookie = name + "=" + ((path) ? ";path=" + path : "") + ((domain) ? ";domain=" + domain : "") + ";expires=Thu, 01 Jan 1970 00:00:01 GMT";
    }
}

//chkSession();
var timer = setInterval(chkSession, 300000);
