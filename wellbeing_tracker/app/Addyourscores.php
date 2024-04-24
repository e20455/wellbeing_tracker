<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Wellbeing Tracker</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/stylistic.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body class="add-scores">
    <div id="content">
        <div class="wrapper">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h1>Wellbeing Tracker</h1>
                </div>
                <ul class="list-unstyled components" aria-labelledby="menu-button-1">
                    <li role="none">
                        <a role="menuitem" href="Home.php">Home</a>
                    </li>
                    <li role="none">
                        <a role="menuitem" href="../SearchforQuotes.html">Search for Quotes</a>
                    </li>
                    <li role="none">
                        <a role="menuitem" href="Addyourscores.php">Add your Scores</a>
                    </li>
                    <li role="none">
                        <a role="menuitem" href="../GraphofScores.html">Graph of your Scores</a>
                    </li>
                </ul>
            </nav>
            
            <div class="w-100"> 
                <nav class="navbar navbar-expand-md justify-content-center header-bar">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse" id="collapsingNavbar">
                        <ul class="navbar-nav header-items">
                             <li class="nav-item header-items">
                                <button type="button" id="sidebarCollapse" class="btn btn-lg shadow-none">
                                    <i class="bi bi-list"></i>
                                </button>
                            </li>
                            <li>
                                <a class="header-items">Add your Scores</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="main-content justify-content-center add-scores">
                    <div class="justify-content-center description">
                        <p class="subdescription">Welcome to your Wellbeing Tracker, here you can monitor and improve your mental health. </p>
                        <p class="subdescription">You can track various aspects of your wellbeing, by adding your own categories such as your happiness, workload management, and anxiety levels.</p>
                        <p class="subdescription">You can score each category on a scale of 1-5 (1 being poor, 5 being good).</p>
                    </div>
                    <div class="add-scores-form">
                        <p>Fill out the form below with today's scores.</p>
                        <form id="form">
                            <label for="happiness">Happiness</label>
                            <input tabindex="0" type="range" id="happiness" min="1" max="5" value="3" class="slider"aria-required="true"> Value: <span id="slider1"></span> <br>
                            <label for="workload-management">Workload Management</label>
                            <input tabindex="0" type="range" id="workload-management" min="1" max="5" value="3" class="slider" aria-required="true"> Value: <span id="slider2"></span> <br>
                            <label for="anxiety-levels">Anxiety Levels</label>
                            <input tabindex="0" type="range" id="anxiety-levels" min="1" max="5" value="3" class="slider" aria-required="true"> Value: <span id="slider3"></span> <br>
                            <input tabindex="0" type="button" id="submit" value="Submit">
                            <p id="confirm">Scores have been submitted. You can update these if you wish.</p>
                        </form>
                    </div>
                </main>
            </div>
  
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    `<script>
        var slider1 = document.getElementById("happiness");
        var output1 = document.getElementById("slider1");
        output1.innerHTML = slider1.value;

        slider1.oninput = function() {
        output1.innerHTML = this.value;
        } 
    </script>

    <script>
        var slider2 = document.getElementById("workload-management");
        var output2 = document.getElementById("slider2");
        output2.innerHTML = slider2.value;

        slider2.oninput = function() {
        output2.innerHTML = this.value;
        }
    </script>

    <script>
        var slider3 = document.getElementById("anxiety-levels");
        var output3 = document.getElementById("slider3");
        output3.innerHTML = slider3.value;

        slider3.oninput = function() {
        output3.innerHTML = this.value;
        }
    </script>

    <script>
        $(document).ready(function() {
            $("#confirm").hide();
                $("#submit").click(function(e) {
                    $("#confirm").show();
                });
            });
    </script>

    <script>
        let happiness_scores = [];
        let workload_scores = [];
        let anxiety_scores = [];
       
        const addHappiness = (ev)=>{
            ev.preventDefault();
            current_date = Date();
            date = current_date.substring(0,15);
            
            let happiness_score = {
                date: date,
                value: document.getElementById('happiness').value
            }

            current_date = Date();
            date = current_date.substring(0,15);
            
            const retrievedString = JSON.parse(localStorage.getItem('Happiness_scores_list'));

            if (retrievedString) {
            
            const removelast = retrievedString.pop();

                if (removelast.date === date) {
                    retrievedString.push(happiness_score);
                    localStorage.setItem('Happiness_scores_list', JSON.stringify(retrievedString) )
                }

                else { 
                    retrievedString.push(removelast);
                    retrievedString.push(happiness_score);
                    localStorage.setItem('Happiness_scores_list', JSON.stringify(retrievedString) );
                }
            }

            else {
                happiness_scores.push(happiness_score);
                localStorage.setItem('Happiness_scores_list', JSON.stringify(happiness_scores) );
            }

            }
            
        const addWorkload = (ev)=>{
            ev.preventDefault();
            current_date = Date();
            date = current_date.substring(0,15);

            let workload_score = {
                date: date,
                value: document.getElementById('workload-management').value
            }
            
            current_date = Date();
            date = current_date.substring(0,15);

            const retrievedString = JSON.parse(localStorage.getItem('Workload_scores_list'));

            if (retrievedString) {
    
            const removelast = retrievedString.pop();

                if (removelast.date === date) {
                    retrievedString.push(workload_score);
                    localStorage.setItem('Workload_scores_list', JSON.stringify(retrievedString) )
                }

                else { 
                    retrievedString.push(removelast);
                    retrievedString.push(workload_score);
                    localStorage.setItem('Workload_scores_list', JSON.stringify(retrievedString) );
                }
            }

            else {
                workload_scores.push(workload_score);
                localStorage.setItem('Workload_scores_list', JSON.stringify(workload_scores) );
            }

            }

        const addAnxiety = (ev)=>{
            ev.preventDefault();
            current_date = Date();
            date = current_date.substring(0,15);

            let anxiety_score = {
                date: date,
                value: document.getElementById('anxiety-levels').value
            }
           
            current_date = Date();
            date = current_date.substring(0,15);
        

            const retrievedString = JSON.parse(localStorage.getItem('Anxiety_scores_list'));

            if (retrievedString) {
            
            const removelast = retrievedString.pop();

                if (removelast.date === date) {
                    retrievedString.push(anxiety_score);
                    localStorage.setItem('Anxiety_scores_list', JSON.stringify(retrievedString) )
                }

                else { 
                    retrievedString.push(removelast);
                    retrievedString.push(anxiety_score);
                    localStorage.setItem('Anxiety_scores_list', JSON.stringify(retrievedString) );
                }
            }

            else {
                anxiety_scores.push(anxiety_score);
                localStorage.setItem('Anxiety_scores_list', JSON.stringify(anxiety_scores) );
            }
        }
        
        const seekAssistance = (ev)=>{
                var retrievedString = JSON.parse(localStorage.getItem('Happiness_scores_list') )
                    if (retrievedString) {
                       
                        if (retrievedString.length > 2) {;
                            const last = retrievedString.pop();
                            const secondtolast = retrievedString.pop();
                            const thirdtolast = retrievedString.pop();
                            intlast = parseInt(last.value)
                            intsecondtolast = parseInt(secondtolast.value)
                            intthirdtolast = parseInt(thirdtolast.value)
                            
                            sumvalues = intlast + intsecondtolast + intthirdtolast;
                            console.log(sumvalues);
                            if ((sumvalues / 3) < 1.5) {
                                alert("The average of your last 3 happiness scores has been below 1.5, you are advised to seek professional assistance");
                        }

                    }
                }

                var retrievedString = JSON.parse(localStorage.getItem('Workload_scores_list') )
                    if (retrievedString) {
                    
                        if (retrievedString.length > 2) {;
                            const last = retrievedString.pop();
                            const secondtolast = retrievedString.pop();
                            const thirdtolast = retrievedString.pop();
                            intlast = parseInt(last.value)
                            intsecondtolast = parseInt(secondtolast.value)
                            intthirdtolast = parseInt(thirdtolast.value)
                            
                            sumvalues = intlast + intsecondtolast + intthirdtolast;
                        
                            if ((sumvalues / 3) < 1.5) {
                                alert("The average of your last 3 workload management scores has been below 1.5, you are advised to seek professional assistance");
                        }

                    }
                }

                var retrievedString = JSON.parse(localStorage.getItem('Anxiety_scores_list') )
                    if (retrievedString) {
                    
                        if (retrievedString.length > 2) {;
                            const last = retrievedString.pop();
                            const secondtolast = retrievedString.pop();
                            const thirdtolast = retrievedString.pop();
                            intlast = parseInt(last.value)
                            intsecondtolast = parseInt(secondtolast.value)
                            intthirdtolast = parseInt(thirdtolast.value)
                        
                            sumvalues = intlast + intsecondtolast + intthirdtolast;
                            console.log(sumvalues);
                            if ((sumvalues / 3) < 1.5) {
                                alert("The average of your last 3 anxiety level scores has been below 1.5, you are advised to seek professional assistance");
                        }

                    }
                }
        }
        
        document.addEventListener('DOMContentLoaded', ()=>{
            document.getElementById('submit').addEventListener('click', addHappiness)
            document.getElementById('submit').addEventListener('click', addWorkload)
            document.getElementById('submit').addEventListener('click', addAnxiety)
            document.getElementById('submit').addEventListener('click', seekAssistance);
        });
    </script>
</body>    