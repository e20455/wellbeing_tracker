
        var dataArr = {};
            $(function() { 
                $.getJSON("data/quotes.json").done(function(data) {
                    window.dataArr = data;
                    var quotesArray = data.quotes.map(function(quoteObj) {
                        return  {
                            quote: quoteObj.quote,
                            author: quoteObj.author
                        };
                    }); 
                    window.dataArr = quotesArray;
                }).fail(function(data) {
                    console.log('no results found');
                });
            });
            $("#keyword").on('keypress keyup change input', function() { 
                var arrival = $(this).val().toLowerCase();
                $('#matches1').text(!arrival.length ? '' :
                    dataArr.filter(function(place) {
                    return (place.quote.toLowerCase().indexOf(arrival) !== -1);
                    }).map(function(place) {
                        return place.quote + " - " + place.author;
                    }).join('\n')); 
            });

    
            var dataArr = {};
                $(function() { 
                    $.getJSON("data/quotes.json").done(function(data) {
                        window.dataArr = data;
                        var quotesArray = data.quotes.map(function(quoteObj) {
                            return  {
                                quote: quoteObj.quote,
                                author: quoteObj.author
                            };
                        }); 
                        window.dataArr = quotesArray;
                    }).fail(function(data) {
                        console.log('no results found');
                       
                    });
                });
                $("#author").on('keypress keyup change input', function() { 
                    var arrival = $(this).val().toLowerCase();
                    $('#matches2').text(!arrival.length ? '' :
                        dataArr.filter(function(place) {
                        return (place.author.toLowerCase().indexOf(arrival) !== -1);
                        }).map(function(place) {
                            return place.author + " - " + place.quote;
                        }).join('\n')); 
                });