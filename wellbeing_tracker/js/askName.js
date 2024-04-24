        function askName() { 
            var user=localStorage.getItem('username');
            if(user){
            document.getElementById("userpara").innerHTML = "Hello " + user + ", today's inspiration quote is..."; 
            }
            else{
            let username = prompt("Please enter your name or press cancel to continue."); if (username != null) { 
            user=localStorage.setItem('username', username)
            document.getElementById("userpara").innerHTML = "Hello " + username + ", today's inspiration quote is..."; 
            } else { 
            document.getElementById("noUser").innerHTML = "Hello, today's inspiration quote is...";
            }} }
