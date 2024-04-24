<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Wellbeing Tracker</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/stylistic.css">
<link rel="stylesheet" type="text/css" href="../css/quote.css">
<script src="../js/askName.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Neuton:ital,wght@0,200;0,300;0,400;0,700;0,800;1,400&display=swap" rel="stylesheet">
</head>
<body onload="askName()">
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
                        <ul class="navbar-nav">
                             <li class="nav-item header-items">
                                <button type="button" id="sidebarCollapse" class="btn btn-lg shadow-none">
                                    <i class="bi bi-list"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="main-content justify-content-center">
                    <h2 id="userpara"></h2>
                    <h2 id="noUser"></h2>

                    <?php
                    $day_of_year = date("z");
                    $size_of_list = 119;
                    $quote_index = fmod($day_of_year, $size_of_list);
                    $index = $quote_index;
                    ?>
                    <div class="blockquote">
                    <blockquote>
                        <p id="current-quote"></p>
                        <p id="author"></p>
                    </blockquote>
                    </div>
                    
                    <div>
                        <ul>
                            <li class="quote-buttons">
                                <button tabindex="0" type="button" id="previous" class="quote-button btn btn-outline-secondary" name="Previous">Previous</button>
                            </li>
                            <li class="quote-buttons">
                                <button tabindex="0" type="button" id="next" class="quote-button btn btn-outline-secondary" name="Next">Next</button>
                            </li>
                        </ul>
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

<script>

function getjson() {
    $.getJSON("../data/quotes.json").done(function (data) {
        quotesData = data;
        quotesArray = data.quotes.map(function (quoteObj) {
            return {
                quote: quoteObj.quote,
                author: quoteObj.author
            };
        });

        displayQuote(currentQuoteIndex, quotesArray);
    });
}

function displayQuote(index, quotesArray) {
    const currentQuote = quotesArray[index];
    document.getElementById("current-quote").textContent = currentQuote.quote;
    document.getElementById("author").textContent = currentQuote.author;
}


let currentQuoteIndex = <?php echo $quote_index ?>;

document.getElementById("previous").addEventListener("click", () => {
    currentQuoteIndex = (currentQuoteIndex - 1) % quotesArray.length;
    displayQuote(currentQuoteIndex, quotesArray);
});


document.getElementById("next").addEventListener("click", () => {
    currentQuoteIndex = (currentQuoteIndex + 1) % quotesArray.length;
    displayQuote(currentQuoteIndex, quotesArray);
});

getjson();

</script>
</body>    